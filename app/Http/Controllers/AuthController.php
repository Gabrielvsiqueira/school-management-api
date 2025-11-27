<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // 1. Validação dos dados de entrada
        $data = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:teachers",
            "password" => "required|min:6|confirmed",
            "department" => "nullable|string|max:255",
        ]);

        // 2. Criação do Professor
        $teacher = Teacher::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'department' => $data['department'] ?? null,
        ]);

        // 3. Geração do Bearer Token
        // O `createToken` cria o token de acesso pessoal
        $token = $teacher->createToken("auth_token")->plainTextToken;

        // 4. Retorno da resposta
        return response()->json([
            "status" => "success",
            "message" => "Professor registrado com sucesso!",
            "data" => [
                "teacher" => $teacher,
                "token" => $token, // O token para autenticação
                "token_type" => "Bearer"
            ]
        ], 201); // 201 Created
    }
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        $teacher = Teacher::where("email", $request->email)->first();

        if (! $teacher || ! Hash::check($request->password, $teacher->password)) {
            return response()->json([
                "status" => "error",
                "message" => "Credenciais inválidas"
            ], 401);
        }

        $token = $teacher->createToken("api-token")->plainTextToken;

        return response()->json([
            "status" => "success",
            "data" => [
                "teacher" => $teacher,
                "token" => $token
            ]
        ]);
    }


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            "status" => "success",
            "message" => "Logout realizado com sucesso."
        ]);
    }
}
