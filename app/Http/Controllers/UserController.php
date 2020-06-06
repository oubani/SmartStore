<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use App\Http\Requests\storeUserRequest;

class UserController extends Controller
{
    //
    public function register(storeUserRequest $request)
    {
        $user =  User::create([
            'name' =>  $request['name'],
            'lastName' =>  $request['lastName'],
            'email' =>  $request['email'],
            'password' => Hash::make($request['password']),
            'type' =>  0,
            'phone' =>  $request['phone'],
            'address' =>  $request['address'],
        ]);

        return new UserResource($user);
    }
    public function profile()
    {
        $data = auth()->user();
        return view('auth.profile', ['data' => $data]);
    }

    public function editProfile()
    {
        return view('auth.editProfile');
    }

    public function update(Request $request)
    {
        return $request;
    }
}
