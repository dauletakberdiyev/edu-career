<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use App\Http\Resources\UserResource;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @urlParam role required The role of the user.
     */
    public function index(Request $request)
    {
        if ($request->role != Null)
            $user = User::role($request->role)->paginate(20);
        else
            $user = User::orderBy('created_at', 'desc')->paginate(10);
        return new UserResource($user);

        if($request->role == 'student'){
            $user = User::role('student')->paginate(20);
            return new UserResource($user);
        } else if($request->role == 'staff'){
            $user = User::role('staff')->paginate(20);
            return new UserResource($user);
        } else if($request->role == 'company'){
            $user = User::role('company')->paginate(20);
            return new UserResource($user);
        } else if($request->role == 'admin'){
            $user = User::role('admin')->paginate(20);
            return new UserResource($user);
        } else { 
            $user = User::orderBy('created_at', 'desc')->paginate(10);
            return new UserResource($user);
        }
    }
    
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * @urlParam name 
     * @urlParam email
     * @urlParam password
     * @urlParam role
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|unique:users',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $user->assignRole($request->role);

        if ($request->hasFile('avatar')) {
            $filename = $request->avatar->getClientOriginalName();
            $extension = $request->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('avatars', $user->id . '.' . $extension, 'public');
            $user->avatar = Storage::url('avatars/' . $user->id . '.' . $extension);
            $user->save();
        }
        if ($request->login == 1)
            return redirect()->route('login');
        return redirect()->back()->with('success', 'User created successfully');
    }
    
     /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response(['users' => new UserResource($user), 'message' => 'Retrieved successfully'], 200);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->update($request->all());
        if ($request->hasFile('avatar')) {
            $filename = $request->avatar->getClientOriginalName();
            $extension = $request->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('avatars', $user->id . '.' . $extension, 'public');
            $user->avatar = Storage::url('avatars/' . $user->id . '.' . $extension);
            $user->save();
        }
        
        return redirect()->back()->with('success', 'User updated successfully');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response(['message' => 'Deleted']);
    }

}
