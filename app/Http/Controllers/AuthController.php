<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
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
