<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Faculty;
use App\Models\User;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{
    //

    public function index() {
        $users = User::paginate(10);
        return view('staff.manage')->with(['users' => $users]);
    }

    public function add() {
        $faculties = Faculty::all();
        $roles = Role::all();
        return view('staff.add')->with(['faculties' => $faculties, 'roles' => $roles]);
    }

    public function update($id) {
        $faculties = Faculty::all();
        $roles = Role::all();
        $user = User::find($id);
        return view('staff.update')->with(['user' => $user, 'faculties' => $faculties, 'roles' => $roles]);
    }

    public function search(Request $request) {
        $users = User::
                                            where('email', 'like', '%' . $request->search . '%')
                                            ->paginate(10);
        return view('staff.manage')->with(['users' => $users]);
    }
}
