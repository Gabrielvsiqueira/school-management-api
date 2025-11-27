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
        $data = $request->validate([
            "name" => "required",
            "date_of_birth" => "required",
            "turma" => "required"
        ]);

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
            "name" => "sometimes",
            "date_of_birth" => "sometimes",
            "turma" => "sometimes"
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
