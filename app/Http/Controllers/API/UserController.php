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
     */
    public function index(Request $request)
    {
        if($request->role == 'student'){
            $whole_id=DB::table('model_has_roles')->select('model_id')->where('role_id',1)->get();
            foreach ($whole_id as $id) {
                $user[] = User::find($id->model_id);
            }
            return UserResource::make($user);
        }if($request->role == 'staff'){
            $whole_id=DB::table('model_has_roles')->select('model_id')->where('role_id',2)->get();
            foreach ($whole_id as $id) {
                $user[] = User::find($id->model_id);
            }
            return UserResource::make($user);
        }
        if($request->role == 'company'){
            $whole_id=DB::table('model_has_roles')->select('model_id')->where('role_id',3)->get();
            foreach ($whole_id as $id) {
                $user[]  = User::find($id->model_id);                
            }
            return UserResource::make($user);
        }
        if($request->role == 'admin'){
            $whole_id=DB::table('model_has_roles')->select('model_id')->where('role_id',4)->get();
            foreach ($whole_id as $id) {
                $user[] = User::find($id->model_id);
            }
            return UserResource::make($user);
        }else{
            $user = User::orderBy('created_at', 'desc')->paginate(10);
            return response([  UserResource::collection($user), 'message' => 'Retrieved successfully'], 200);
        }
    }
    
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'name' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $user = User::create($data);
        $user->assignRole($request->role);

        return response(['users' => new UserResource($user), 'message' => 'Created successfully'], 201);
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
