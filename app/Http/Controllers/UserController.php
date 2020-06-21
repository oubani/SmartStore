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
        // return $data;
        return view('clients.profile', ['data' => $data]);
    }

    public function editProfile()
    {
        return view('clients.editProfile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $user = User::findorFail(auth()->user()->id);
        $user->name = $request->name;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect('/profile');
    }
}
