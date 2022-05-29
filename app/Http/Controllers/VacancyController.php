<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Vacancy;

class VacancyController extends Controller
{
    //
    public function index() {
        $vacancies = Vacancy::paginate(10);
        return view('vacancy.index')->with(['vacancies' => $vacancies]);
    }
    public function vacancy($id) {
        $company = Company::find($id);
        $vacancies = Vacancy::where('company_id', $company->id)->paginate(10);
        return view('vacancy.manage')->with(['vacancies' => $vacancies, 'company' => $company]);
    }

    public function add() {
        return view('vacancy.add');
    }

    public function edit($id) {
        $vacancy = Vacancy::find($id);
        return view('vacancy.edit')->with(['vacancy' => $vacancy]);
    }

    public function add_form(Request $request) {
        $vacancy = new Vacancy();
        $vacancy->title = $request->title;
        $vacancy->description = $request->description;
        $vacancy->quota = $request->quota;
        $vacancy->company_id = $request->company_id;
        $vacancy->save();

        return redirect()->back()->with('success', 'Vacancy added successfully');
    }

    public function edit_form(Request $request) {
        $vacancy = Vacancy::find($request->id);
        $vacancy->title = $request->title;
        $vacancy->description = $request->description;
        $vacancy->quota = $request->quota;
        $vacancy->save();

        return redirect()->back()->with('success', 'Vacancy editted successfully');
    }

    public function delete(Request $request) {
        $res = Vacancy::find($request->id)->delete();
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
