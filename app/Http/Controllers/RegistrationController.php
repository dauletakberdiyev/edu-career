<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Feedback;
use App\Models\Registration;
use App\Models\Term;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $vacancies = $user->applies()->wherePivot('status', '=', 1)->get();
        $term = Term::where('active', '=', 1)->first();

        return view('registration.index')->with(['vacancies' => $vacancies, 'term' => $term]);
    }

    public function manage()
    {
        $registrations = Registration::paginate(20);

        return view('registration.manage')->with(['registrations' => $registrations]);
    }

    public function pending(Request $request)
    {
        $user = User::find($request->user_id);
        $vacancy = Vacancy::find($request->vacancy_id);
        $term = Term::where('active', '=', 1)->first();

        if ($term->registration_end < date('Y-m-d')) {
            return redirect()->back()->with('error', 'Registration period has ended');
        }

        if ($user->registration != null) {
            $registration = $user->registration;
        } else {
            $registration = new Registration();
        }

        $registration->user_id = $user->id;
        $registration->vacancy_id = $vacancy->id;
        $registration->type = $vacancy->type;
        $registration->status = 0;
        $registration->term_id = Term::where('active', '=', 1)->first()->id;
        $registration->save();

        if ($request->hasFile('agreement')) {
            $filename = $request->agreement->getClientOriginalName();
            $extension = $request->agreement->getClientOriginalExtension();
            $request->agreement->storeAs('agreements', $registration->id.'_co.'.$extension, 'public');
            $registration->agreement = Storage::url('agreements/'.$registration->id.'_co.'.$extension);
        }
        $registration->save();

        return redirect()->back()->with('success', 'Registration added successfully');
    }

    public function confirm(Request $request)
    {
        $registration = Registration::find($request->registration_id);
        $registration->reason = $request->reason;
        $registration->status = 1;
        $registration->save();

        return redirect()->back()->with('success', 'Registration confirmed successfully');
    }

    public function reject(Request $request)
    {
        $registration = Registration::find($request->registration_id);
        $registration->reason = $request->reason;
        $registration->status = 2;
        $registration->save();

        return redirect()->back()->with('success', 'Registration rejected successfully');
    }

    public function assignIndex()
    {
        $students = User::role('student')->orderBy('email')->get();
        $companies = Company::orderBy('name')->get();
        $registrations = Registration::all();

        return view('assign.index', compact('students', 'companies', 'registrations'));
    }

    public function assignStudent(Request $request)
    {
        Registration::create([
            'user_id' => $request->get('user_id'),
            'status' => 1,
            'term_id' => Term::where('active', '=', 1)->first()->id,
            'company_id' => $request->get('company_id'),
        ]);

        return redirect()->back();
    }

    public function storeFeedback(Request $request)
    {
        Feedback::create([
            'user_id' => $request->get('user_id'),
            'rate' => $request->get('rate'),
            'note' => $request->has('note') ? $request->get('note') : null,
        ]);

        return redirect()->back();
    }

    public function password()
    {
        return view('admin.password');
    }

    public function setPassword(Request $request)
    {
        $user = User::where('email', $request->get('email'))->first();

        if ($user == null) {
            return redirect()->back();
        }

        $user->password = Hash::make($request->get('password'));
        $user->save();

        return redirect()->back();
    }
}
