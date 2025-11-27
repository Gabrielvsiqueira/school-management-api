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
            "name" => "required",
            "year" => "required",
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
}
