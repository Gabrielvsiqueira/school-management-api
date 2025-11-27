<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        return response()->json([
            "status" => "success",
            "data" => Teacher::all()
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:teachers",
            "password" => "required|min:6",
            "department" => "nullable|string",
        ]);

        $data["password"] = Hash::make($data["password"]);

        $teacher = Teacher::create($data);

        return response()->json([
            "status" => "success",
            "message" => "Professor criado com sucesso.",
            "data" => $teacher
        ], 201);
    }

    public function update(Request $request, Teacher $teacher)
    {
        $data = $request->validate([
            "name" => "sometimes|string",
            "email" => "sometimes|email|unique:teachers,email," . $teacher->id,
            "password" => "sometimes|min:6",
            "department" => "sometimes|string",
        ]);

        if (isset($data["password"])) {
            $data["password"] = Hash::make($data["password"]);
        }

        $teacher->update($data);

        return response()->json([
            "status" => "success",
            "message" => "Professor atualizado com sucesso.",
            "data" => $teacher
        ]);
    }


    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return response()->json([
            "status" => "success",
            "message" => "Professor deletado com sucesso."
        ]);
    }
}
