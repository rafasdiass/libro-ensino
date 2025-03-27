<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Matricula;
use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MatriculaController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::with(['aluno', 'curso'])->get();
        return response()->json($matriculas, Response::HTTP_OK);
    }

    public function show($id)
    {
        $matricula = Matricula::with(['aluno', 'curso'])->find($id);

        if (!$matricula) {
            return response()->json(['message' => 'Matrícula não encontrada'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($matricula, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'curso_id' => 'required|exists:cursos,id',
        ]);

        $matricula = Matricula::create($validated);

        return response()->json($matricula->load(['aluno', 'curso']), Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $matricula = Matricula::find($id);

        if (!$matricula) {
            return response()->json(['message' => 'Matrícula não encontrada'], Response::HTTP_NOT_FOUND);
        }

        $validated = $request->validate([
            'aluno_id' => 'sometimes|required|exists:alunos,id',
            'curso_id' => 'sometimes|required|exists:cursos,id',
        ]);

        $matricula->update($validated);

        return response()->json($matricula->load(['aluno', 'curso']), Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $matricula = Matricula::find($id);

        if (!$matricula) {
            return response()->json(['message' => 'Matrícula não encontrada'], Response::HTTP_NOT_FOUND);
        }

        $matricula->delete();

        return response()->json(['message' => 'Matrícula removida com sucesso'], Response::HTTP_OK);
    }
}
