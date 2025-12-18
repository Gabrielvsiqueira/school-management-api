<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassModelController extends Controller
{
    public function index()
    {
        return response()->json([
            "status" => "success",
            "data" => ClassModel::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string",
            "year" => "required|integer|min:1900|max:2090",
        ]);

        $classModel = ClassModel::create($data);

        return response()->json([
            "status" => "success",
            "message" => "Turma cadastrado com sucesso!",
            "data" => $classModel
        ], 201);
    }

    public function update(Request $request, ClassModel $classModel)
    {
        $data = $request->validate([
            "name" => "sometimes",
            "year" => "sometimes",
        ]);

        $classModel->update($data);

        return response()->json([
            "status" => "success",
            "message" => "Turma atualizado com sucesso!",
            "data" => $classModel
        ], 201);
    }

    public function destroy(ClassModel $classModel) {
        $classModel->delete();

        return response()->json([
            "status" => "success",
            "message" => "Turma deletado com sucesso!"
        ]);
    }

    public function addTeacher(Request $request, ClassModel $classModel)
    {
        $data = $request->validate([
            'teacher_id' => 'required|integer|exists:teachers,id',
        ]);

        $teacherId = $data['teacher_id'];

        if ($classModel->teachers()->where('teacher_id', $teacherId)->exists()) {
            return response()->json([
                "status" => "error",
                "message" => "O professor já está associado a esta turma."
            ], 409);
        }

        $classModel->teachers()->attach($teacherId);

        return response()->json([
            "status" => "success",
            "message" => "Professor adicionado à turma com sucesso!",
            "turma_id" => $classModel->id,
            "teacher_id" => $teacherId
        ], 201);
    }

    public function show(ClassModel $classModel)
    {
        $classModelComDetalhes = $classModel->load(['students', 'teachers']);

        return response()->json([
            "status" => "success",
            "data" => $classModelComDetalhes
        ]);
    }
}
