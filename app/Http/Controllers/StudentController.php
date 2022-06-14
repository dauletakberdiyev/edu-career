<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Faculty;

class StudentController extends Controller
{
    public function index() {
        $user = Auth::user();
        if ($user->hasRole('admin'))
            $f_id = [1,2,3,4,5,6,7,8];
        else if ($user->hasRole('coordinator')) 
            $f_id = [$user->faculty->id];
        else
            $f_id = [];
        $users = User::role('student')->whereIn('faculty_id', $f_id)->paginate(10);
        return view('student.manage')->with(['users' => $users]);
    }

    public function add() {
        $faculties = Faculty::all();
        $roles = Role::all();
        return view('student.add')->with(['faculties' => $faculties, 'roles' => $roles]);
    }

    public function update($id) {
        $faculties = Faculty::all();
        $roles = Role::all();
        $user = User::find($id);
        return view('student.update')->with(['user' => $user, 'faculties' => $faculties, 'roles' => $roles]);
    }

    public function search(Request $request) {
        $users = User::
                                            where('email', 'like', '%' . $request->search . '%')
                                            ->paginate(10);
        return view('student.manage')->with(['users' => $users]);
    }

    public function profile($id) {
        $user = User::find($id);
        return view('student.profile')->with(['user' => $user]);
    }
}
