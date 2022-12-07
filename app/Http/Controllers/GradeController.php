<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\User;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grade = auth()->user()->grade;
        if ($grade == null) {
            $grade = Grade::create([
                'user_id' => auth()->user()->id,
            ]);
        }

        return view('grade.index')->with(['grade' => $grade]);
    }

    public function show($id)
    {
        $user = User::find($id);
        $grade = $user->grade;

        if ($grade == null) {
            $grade = Grade::create([
                'user_id' => $user->id,
            ]);
        }

        return view('grade.index')->with(['grade' => $grade]);
    }

    public function grades()
    {
        $user = auth()->user();
        if (auth()->user()->hasRole('company')) {
            $company = $user->company;
            $registrations = $company->registrations()->pluck('user_id')->toArray();

            $grades = Grade::whereIn('user_id', $registrations)->get();
        } else {
            $grades = Grade::all();
        }

        return view('grade.all', compact('grades'));
    }

    public function putSupervisor(Request $request)
    {
    }

    public function putFinall(Request $request)
    {
    }

    public function updateSupervisorMark(Request $request)
    {
        $grade = Grade::find($request->get('id'));
        $grade->supervisor = $request->get('mark');
        $grade->save();

        return redirect()->back();
    }

    public function updateFinalMark(Request $request)
    {
        $grade = Grade::find($request->get('id'));
        $grade->final = $request->get('mark');
        $grade->save();

        return redirect()->back();
    }
}
