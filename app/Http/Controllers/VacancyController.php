<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Company;
use App\Models\Vacancy;
use App\Models\Faculty;

class VacancyController extends Controller
{
    //
    public function index() {
        $user = Auth::user();
        if ($user->hasRole('admin'))
            $f_id = [1,2,3,4,5,6,7,8];
        else if ($user->hasRole('coordinator') || $user->hasRole('student'))
            $f_id = [$user->faculty->id];
        else
            $f_id = [];
        $vacancies = Vacancy::whereIn('faculty_id', $f_id)->orderBy('created_at', 'desc')->paginate(15);
        return view('vacancy.index')->with(['vacancies' => $vacancies]);
    }
    public function vacancy($id) {
        $company = Company::find($id);
        $vacancies = Vacancy::where('company_id', $company->id)->paginate(10);
        return view('vacancy.manage')->with(['vacancies' => $vacancies, 'company' => $company]);
    }

    public function add() {
        $faculties = Faculty::all();
        return view('vacancy.add')->with(['faculties' => $faculties]);
    }

    public function edit($id) {
        $vacancy = Vacancy::find($id);
        $faculties = Faculty::all();
        return view('vacancy.edit')->with(['vacancy' => $vacancy, 'faculties' => $faculties]);
    }

    public function add_form(Request $request) {
        $company = Company::find($request->company_id);
        if ($company->in_whitelist == 0) {
            return redirect()->back()->with('error', 'Company not in whitelist');
        }
        $vacancy = new Vacancy();
        $vacancy->title = $request->title;
        $vacancy->description = $request->description;
        $vacancy->quota = $request->quota;
        $vacancy->company_id = $request->company_id;
        $vacancy->faculty_id = $request->faculty_id;
        if (Auth::user()->hasRole('teacher'))
            $vacancy->type = 1;
        $vacancy->save();

        return redirect()->back()->with('success', 'Vacancy added successfully');
    }

    public function edit_form(Request $request) {
        $vacancy = Vacancy::find($request->id);
        $vacancy->title = $request->title;
        $vacancy->description = $request->description;
        $vacancy->quota = $request->quota;
        $vacancy->faculty_id = $request->faculty_id;
        $vacancy->save();

        return redirect()->back()->with('success', 'Vacancy editted successfully');
    }

    public function delete($id) {
        $vacancy = Vacancy::find($id);
        $vacancy->delete();
        return redirect()->back()->with('success', 'Vacancy delleted successfully');
    }

    public function detail($id) {
        $vacancy = Vacancy::find($id);
        $applicants = $vacancy->applicants()->paginate(10);
        return view('vacancy.detail')->with(['vacancy' => $vacancy, 'applicants' => $applicants]);
    }

    public function apply(Request $request) {
        $vacancy = Vacancy::find($request->vacancy_id);
        if ($vacancy->applicants()->where('user_id', $request->user_id)->exists()) {
            return response()->json(['message' => 'You have already applied for this vacancy']);
        }
        $vacancy->applicants()->attach($request->user_id, ['company_id' => $vacancy->company->id]);
        $vacancy->save();

        return response()->json(['message' => 'You have applied successfully']);
    }

    public function reject_application(Request $request) {
        $vacancy = Vacancy::find($request->vacancy_id);
        $vacancy->applicants()->detach($request->user_id);
        $vacancy->save();

        return response()->json(['message' => 'You have canceled successfully']);
    }


    public function approve(Request $request) {
        $vacancy = Vacancy::find($request->vacancy_id);
        if ($vacancy->applicants()->where('user_id', $request->user_id)->first()->pivot->status == 1) {
            return response()->json(['message' => 'You have already approved successfully']);
        }
        if ($vacancy->quota == 0) {
            return response()->json(['message' => 'Quota is full']);
        }
        $vacancy->applicants()->updateExistingPivot($request->user_id, ['status' => 1]);
        $vacancy->quota = $vacancy->quota - 1;
        $vacancy->save();
        return response()->json(['message' => 'You have approved successfully']);
    }

    public function reject(Request $request) {
        $vacancy = Vacancy::find($request->vacancy_id);
        if ($vacancy->applicants()->where('user_id', $request->user_id)->first()->pivot->status == 1) {
            $vacancy->quota = $vacancy->quota + 1;
            $vacancy->save();
        }
        $vacancy->applicants()->updateExistingPivot($request->user_id, ['status' => 2]);


        return response()->json(['message' => 'You have rejected successfully']);
    }

    public function pending(Request $request) {
        $vacancy = Vacancy::find($request->vacancy_id);
        if ($vacancy->applicants()->where('user_id', $request->user_id)->first()->pivot->status == 1) {
            $vacancy->quota = $vacancy->quota + 1;
            $vacancy->save();
        }
        $vacancy->applicants()->updateExistingPivot($request->user_id, ['status' => 0]);
        return response()->json(['message' => 'You have pending successfully']);
    }
}
