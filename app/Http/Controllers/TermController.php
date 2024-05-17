<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Term;
use App\Rules\OneActiveTermRule;

class TermController extends Controller
{
    //
    public function index() {
        $terms = Term::all();
        $current = Term::where('active', '=', 1)->first();
        return view('term.index')->with(['terms' => $terms, 'current' => $current]);
    }

    public function edit(Term $term) {
        return view('term.edit')->with(['term' => $term]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'registration_end' => 'required',
            'grading_start' => 'required',
            'grading_end' => 'required',
            'term_end' => 'required',
            'active' => ['required', new OneActiveTermRule],
        ]);

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

        $request->validate([
            'active' => [new OneActiveTermRule],
        ]);

        $term = Term::find($request->id);
        $term->name = $request->name;
        $term->registration_end = $request->registration_end;
        $term->grading_start = $request->grading_start;
        $term->grading_end = $request->grading_end;
        $term->term_end = $request->term_end;
        $term->active = $request->active;
        $term->save();
        return redirect()->back()->with('success', 'Term updated successfully');
    }
}
