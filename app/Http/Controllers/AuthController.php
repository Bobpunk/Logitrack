<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importante para validar senha
use App\Models\User; 

class AuthController extends Controller
{
    // Função Login
    public function login(Request $request)
    {
        // Validação do login
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Credenciais invalidas'
            ], 401);
        }

        // Se tiver ok, valida o login
        $user = Auth::user();

        // Sanatização dos tokens
        $user->tokens()->delete();

        // Cria novos tokens
        $token = $user->createToken('auth_token')->plainTextToken;

        // Devolve o token com o login
        return response()->json([
            'token' => $token,
            'token_type' => 'Bearer'
        ]);
    }
}