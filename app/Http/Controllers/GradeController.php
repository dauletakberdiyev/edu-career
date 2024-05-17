<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GradeController extends Controller
{
    public function index()
    {
        $grade = auth()->user()->grade;
        if ($grade == null) {
            $grade = Grade::create([
                'user_id' => auth()->user()->id,
                'supervisor_mark' => json_encode([0.0, 0.0, 0.0, 0.0])
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
                'supervisor_mark' => json_encode([0.0, 0.0, 0.0, 0.0])
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
        $supervisorMarks = json_decode($grade->supervisor_mark, true);
        $index = $request->get('index');
        $supervisorMarks[$index] = $request->get('mark');
    
        // Calculate the sum of supervisor marks
        $supervisorSum = array_sum($supervisorMarks);
    
        // Update supervisor mark array and supervisor column
        if ($request->get('index') != null)
            $grade->supervisor_mark = json_encode($supervisorMarks);
        $grade->supervisor = $supervisorSum;
        $grade->save();
    
        return response()->json(['success' => true]);
    }
    

    public function updateFinalMark(Request $request)
    {
        $grade = Grade::find($request->get('id'));
        $grade->final = $request->get('mark');
        $grade->save();

        return redirect()->back();
    }

    public function updateMark(Request $request)
    {
        $grade = Grade::find($request->get('id'));

        if ($request->get('type') == 'internshipplan') {
            $grade->internship_plan = $request->get('mark');
        } elseif ($request->get('type') == 'weeklyreport') {
            $grade->weekly_report = $request->get('mark');
        }

        $grade->save();

        return response()->json(['success' => true]);
    }
}
