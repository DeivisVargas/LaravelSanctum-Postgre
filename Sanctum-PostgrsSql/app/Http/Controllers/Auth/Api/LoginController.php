<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use const http\Client\Curl\AUTH_ANY;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        //TO-DO: VALIDAR REQUEST
        $credentials = $request->only('email' , 'password');
        if(!auth()->attempt($credentials))
            abort(401, 'credenciais inválidas');

        $token = auth()->user()->createToken('authToken');
        return response()->json(
            [
                'data' => [
                    'token' => $token->plainTextToken
                ]
            ]
        );
    }

    public function logout(Request $request ,User $user){
        //$remover = $user->tokens()->where('id', 2)->delete();
        //TO-DO: VALIDAR REQUEST
        $user->tokens()->delete();
        //auth()->user()->tokens()->delete(); //remove todos token do usuario


        return response()->json(
            [
                'data' => [
                    'message' => 'Token revogado'
                ]
            ]
        );
    }
}
