<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\User;

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
}
