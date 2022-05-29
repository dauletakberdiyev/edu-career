<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Term;

class TermController extends Controller
{
    //
    public function index() {
        $terms = Term::all();
        $current = Term::where('active', '=', 1)->first();
        return view('term.index')->with(['terms' => $terms, 'current' => $current]);
    }

    public function edit() {
        $term = Term::where('active', '=', 1)->first();
        return view('term.edit')->with(['term' => $term]);
    }

    public function store(Request $request) {
        $term = new Term();
        $term->name = $request->name;
        $term->registration_end = $request->registration_end;
        $term->grading_start = $request->grading_start;
        $term->grading_end = $request->grading_end;
        $term->term_end = $request->term_end;
        $term->save();
        return redirect()->back()->with('success', 'Term added successfully');
    }

    public function update(Request $request) {
        $term = Term::find($request->id);
        $term->name = $request->name;
        $term->registration_end = $request->registration_end;
        $term->grading_start = $request->grading_start;
        $term->grading_end = $request->grading_end;
        $term->term_end = $request->term_end;
        $term->save();
        return redirect()->back()->with('success', 'Term updated successfully');
    }
}
