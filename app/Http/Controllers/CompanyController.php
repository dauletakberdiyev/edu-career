<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Faculty;
use App\Models\Company;
use Spatie\Permission\Models\Role;

class CompanyController extends Controller
{
    public function index() {
        $users = User::role('company')->paginate(10);
        $companies = Company::orderBy('in_whitelist', 'asc')->paginate(15);
        return view('company.manage')->with(['users' => $users, 'companies' => $companies]);
    }

    public function detail($id) {
        $company = Company::find($id);
        return view('company.detail')->with(['company' => $company]);
    }

    public function add() {
        $users = User::all();
        return view('company.add')->with(['users' => $users]);
    }

    public function update($id) {
        $company = Company::find($id);
        return view('company.update')->with(['company' => $company]);
    }

    public function add_form(Request $request) {
        $company = new Company();
        $company->name = $request->name;
        $company->address = $request->address;
        $company->user_id = $request->user_id;
        $company->description = $request->description;
        $company->save();

        $user = User::find($request->user_id);
        $user->assignRole('company');

        if ($request->hasFile('avatar')) {
            $filename = $request->avatar->getClientOriginalName();
            $extension = $request->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('avatars', $company->id . '_co.' . $extension, 'public');
            $company->avatar = Storage::url('avatars/' . $company->id . '_co.' . $extension);
            $company->save();
        }

        if ($request->hasFile('cv')) {
            $filename = $request->cv->getClientOriginalName();
            $extension = $request->cv->getClientOriginalExtension();
            $request->cv->storeAs('cv', $company->id . '_co.' . $extension, 'public');
            $company->cv = Storage::url('cv/' . $company->id . '_co.' . $extension);
            $company->save();
        }

        return redirect()->back()->with('success', 'Company added successfully');
    }

    public function update_form(Request $request) {
        $company = Company::find($request->id);
        $company->update($request->all());


        if ($request->hasFile('company_avatar')) {
            $filename = $request->company_avatar->getClientOriginalName();
            $extension = $request->company_avatar->getClientOriginalExtension();
            $request->company_avatar->storeAs('avatars', $company->id . '.' . $extension, 'public');
            $company->avatar = Storage::url('avatars/' . $company->id . '.' . $extension);
            $company->save();
        }

        if ($request->hasFile('cv')) {
            $filename = $request->cv->getClientOriginalName();
            $extension = $request->cv->getClientOriginalExtension();
            $request->cv->storeAs('cv', $company->id . '_co.' . $extension, 'public');
            $company->cv = Storage::url('cv/' . $company->id . '_co.' . $extension);
            $company->save();
        }

        return redirect()->back()->with('success', 'Company updated successfully');
    }

    public function search(Request $request) {
        $users = User::
                                            where('email', 'like', '%' . $request->search . '%')
                                            ->paginate(10);
        return view('company.manage')->with(['users' => $users]);
    }

    public function approve(Request $request) {
        $company = Company::find($request->company_id);
        $company->in_whitelist = 1;
        $company->save();
        return response()->json(['message' => 'Company approved successfully']);
    }

    public function reject(Request $request) {
        $company = Company::find($request->company_id);
        $company->in_whitelist = 0;
        $company->save();
        return response()->json(['message' => 'Company unapproved successfully']);
    }
}
