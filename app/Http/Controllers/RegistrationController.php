<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Vacancy;
use App\Models\Registration;
use App\Models\Term;

class RegistrationController extends Controller
{
    public function index() {
        $user = Auth::user();
        $vacancies = $user->applies()->wherePivot('status', '=', 1)->get();
        return view('registration.index')->with(['vacancies' => $vacancies]);
    }

    public function manage() {
        $registrations = Registration::paginate(20);
        return view('registration.manage')->with(['registrations' => $registrations]);
    }

    public function pending(Request $request) {
        $user = User::find($request->user_id);
        $vacancy = Vacancy::find($request->vacancy_id);
        if ($user->registration != null)
            $registration = $user->registration;
        else
            $registration = new Registration();

        $registration->user_id = $user->id;
        $registration->vacancy_id = $vacancy->id;
        $registration->type = $vacancy->type;
        $registration->status = 0;
        $registration->term_id = Term::where('active', '=', 1)->first()->id;
        $registration->save();

        if ($request->hasFile('agreement')) {
            $filename = $request->agreement->getClientOriginalName();
            $extension = $request->agreement->getClientOriginalExtension();
            $request->agreement->storeAs('agreements', $registration->id . '_co.' . $extension, 'public');
            $registration->agreement = Storage::url('agreements/' . $registration->id . '_co.' . $extension);
        }
        $registration->save();

        return redirect()->back()->with('success', 'Registration added successfully');
    }

    public function confirm(Request $request) {

        $registration = Registration::find($request->registration_id);
        $registration->reason = $request->reason;
        $registration->status = 1;
        $registration->save();

        return redirect()->back()->with('success', 'Registration confirmed successfully');
    }

    public function reject(Request $request) {
        $registration = Registration::find($request->registration_id);
        $registration->reason = $request->reason;
        $registration->status = 2;
        $registration->save();

        return redirect()->back()->with('success', 'Registration rejected successfully');
    }
}
