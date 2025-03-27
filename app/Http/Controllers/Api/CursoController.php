<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CursoController extends Controller
{
    public function index()
    {
        return response()->json(Curso::all(), Response::HTTP_OK);
    }

    public function show($id)
    {
        $curso = Curso::find($id);

        if (!$curso) {
            return response()->json(['message' => 'Curso não encontrado'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($curso, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:150',
            'descricao' => 'nullable|string',
        ]);

        $curso = Curso::create($validated);

        return response()->json($curso, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::find($id);

        if (!$curso) {
            return response()->json(['message' => 'Curso não encontrado'], Response::HTTP_NOT_FOUND);
        }

        $validated = $request->validate([
            'titulo' => 'sometimes|required|string|max:150',
            'descricao' => 'nullable|string',
        ]);

        $curso->update($validated);

        return response()->json($curso, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $curso = Curso::find($id);

        if (!$curso) {
            return response()->json(['message' => 'Curso não encontrado'], Response::HTTP_NOT_FOUND);
        }

        $curso->delete();

        return response()->json(['message' => 'Curso removido com sucesso'], Response::HTTP_OK);
    }
}
