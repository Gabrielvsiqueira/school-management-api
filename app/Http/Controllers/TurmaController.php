<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        return response()->json([
            "status" => "success",
            "data" => Turma::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string",
            "year" => "required|integer|min:1900|max:2090",
        ]);

        $turma = Turma::create($data);

        return response()->json([
            "status" => "success",
            "message" => "Turma cadastrado com sucesso!",
            "data" => $turma
        ], 201);
    }

    public function update(Request $request, Turma $turma)
    {
        $data = $request->validate([
            "name" => "sometimes",
            "year" => "sometimes",
        ]);

        $turma->update($data);

        return response()->json([
            "status" => "success",
            "message" => "Turma atualizado com sucesso!",
            "data" => $turma
        ], 201);
    }

    public function destroy(Turma $turma) {
        $turma->delete();

        return response()->json([
            "status" => "success",
            "message" => "Turma deletado com sucesso!"
        ]);
    }

    public function addTeacher(Request $request, Turma $turma)
    {
        $data = $request->validate([
            'teacher_id' => 'required|integer|exists:teachers,id',
        ]);

        $teacherId = $data['teacher_id'];

        if ($turma->teachers()->where('teacher_id', $teacherId)->exists()) {
            return response()->json([
                "status" => "error",
                "message" => "O professor já está associado a esta turma."
            ], 409); // 409 Conflict
        }

        $turma->teachers()->attach($teacherId);

        return response()->json([
            "status" => "success",
            "message" => "Professor adicionado à turma com sucesso!",
            "turma_id" => $turma->id,
            "teacher_id" => $teacherId
        ], 201);
    }
}
