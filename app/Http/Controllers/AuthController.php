<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * Store to User of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input("email"),
            'password' => Hash::make($request->input('password'))
        ]);

        return response($user, Response::HTTP_CREATED);
    }

    /**
     * Store to User of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        if(!Auth::attempt($request->only(
            'email','password'
        ))){
            return response([
                'status' => 'failed',
                'error' => 'Invalid credentials!'
            ], Response::HTTP_UNAUTHORIZED);

            
        };
       
        /**@var User $user */
        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        return Response([
            'jwt' => $token
        ]);
    }

    public function user(Request $request){
        return $request->user();
    }

    public function users(Request $request) {
        $users = User::all();
        
        return $users;
    }

    public function logout(){
       Auth()->guard('web')->logout();
    }
}
