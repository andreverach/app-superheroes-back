<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //loguearnos y obtener token
    public function login(Request $request){ 

        if(Auth::attempt($request->only('email', 'password'))){
            return response()->json([                                     
                'token' => $request->user()->createToken($request->name)->plainTextToken,
                'message' => 'Autorizado!'
            ]);
        }

        return response()->json([
            'mensaje' => 'Datos incorrectos!'
        ], 404);

    }
}
