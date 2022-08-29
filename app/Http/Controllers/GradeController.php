<?php

namespace App\Http\Controllers;

use App\Models\User;

class GradeController extends Controller
{
    public function index()
    {
        $grade = auth()->user()->grade;

        return view('grade.index')->with(['grade' => $grade]);
    }

    public function show($id)
    {
        $user = User::find($id);
        $grade = $user->grade;

        return view('grade.index')->with(['grade' => $grade]);
    }
}
