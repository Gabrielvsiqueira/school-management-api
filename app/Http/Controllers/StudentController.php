<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json([
            "status" => "success",
            "data" => Student::all()
        ]);
    }

    public function store(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            "name" => "required|string",
            "date_of_birth" => "required|date",
            "turma_id" => "required|integer|exists:turmas,id"
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "validation_failed",
                "errors" => $validator->errors()
            ], 422);
        }

        $data = $validator->validated();

        $student = Student::create($data);

        return response()->json([
            "status" => "success",
            "message" => "Aluno criado com sucesso!",
            "data" => $student
        ], 201);
    }
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            "name" => "sometimes|string|max:255",
            "date_of_birth" => "sometimes|date",
            "turma_id" => "sometimes|integer|exists:turmas,id"
        ]);

        $student->update($data);

        return response()->json([
            "status" => "success",
            "message" => "Aluno atualizado com sucesso.",
            "data" => $student
        ]);
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            "status" => "success",
            "message" => "Aluno deletado com sucesso!"
        ]);
    }
}
