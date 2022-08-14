<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::all();
        return view('report.manage', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('report.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'detail' => 'required',
            'due_date' => 'required',
            'name' => 'required',
        ]);
        $report = new Report([
            'detail' => $request->get('detail'),
            'due_date' => $request->get('due_date'),
            'name' => $request->get('name'),
        ]);
        $report->save();
        return redirect()->back()->with('success', 'Report saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::find($id);
        return view('report.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::find($id);
        $report->delete();

        return redirect()->back()->with('success', 'Report deleted!');
    }

    public function updateMark(Request $request) 
    {
        $report = Report::find($request->get('report_id'));
        $report->users()->syncWithoutDetaching([$request->get('id') => ['mark' => $request->get('mark')]]);
        return response()->json(['success' => 'Mark updated!']);
    }

    public function submit() 
    {
        $report = Report::where('due_date', '>=', date('Y-m-d'))->first();
        return view('report.submit', compact('report'));
    }

    public function reportAdd(Request $request) 
    {
        $report = Report::find($request->get('report_id'));
        
        $report->users()->attach($request->get('user_id'), ['submission_link' => $request->get('submission_link')]);
        $report->save();
        return response()->json(['success' => 'Report submitted!']);
    }
}
