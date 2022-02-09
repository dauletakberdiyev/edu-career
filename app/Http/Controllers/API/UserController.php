<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


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
            'name' => 'required|string',
            'email' => 'required|unique:users',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $user = User::create($data);
        $user->assignRole($request->role);

        return response(new UserResource($user), 201);
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
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return response(['users' => new UserResource($user), 'message' => 'Update successfully'], 200);
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
