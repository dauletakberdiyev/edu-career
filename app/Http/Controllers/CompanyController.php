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
        $companies = Company::paginate(10);
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

    public function update_form(Request $request) {
        $company = Company::find($request->id);
        $company->update($request->all());

        if ($request->hasFile('avatar')) {
            $filename = $request->avatar->getClientOriginalName();
            $extension = $request->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('avatars', $company->id . '.' . $extension, 'public');
            $company->avatar = Storage::url('avatars/' . $company->id . '.' . $extension);
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
}
