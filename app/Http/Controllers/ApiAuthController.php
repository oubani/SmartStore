<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;

class ApiAuthController extends Controller
{
    // create login api function
    public function login(Request $request)
    {


        try {

            $http = new \GuzzleHttp\Client;

            $response = $http->post('http://localhost/app/smartStoreaApi/public/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => '2',
                    'client_secret' => 'HaQaqPttwv4QW8M1pIPOFbbSrXlVrMHcmw5rT2hI',
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => '',
                ],
            ]);

            return $response->getBody();
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            return response()->json('errors ', $e->getCode());
        }
    }
    public function Logout()
    {
        auth()->user()->tokens->each(function ($token) {
            $token->delete();
        });
        return response()->json(' you  logged out successfuly ', 200);
    }
}
