<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AlunoController extends Controller
{
    public function index()
    {
        return response()->json(Aluno::all(), Response::HTTP_OK);
    }

    public function show($id)
    {
        $aluno = Aluno::find($id);

        if (!$aluno) {
            return response()->json(['message' => 'Aluno não encontrado'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($aluno, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:150',
            'email' => 'required|email|unique:alunos,email',
            'sexo' => 'nullable|in:M,F,O',
            'data_nascimento' => 'required|date',
        ]);

        $aluno = Aluno::create($validated);

        return response()->json($aluno, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $aluno = Aluno::find($id);

        if (!$aluno) {
            return response()->json(['message' => 'Aluno não encontrado'], Response::HTTP_NOT_FOUND);
        }

        $validated = $request->validate([
            'nome' => 'sometimes|required|string|max:150',
            'email' => 'sometimes|required|email|unique:alunos,email,' . $aluno->id,
            'sexo' => 'nullable|in:M,F,O',
            'data_nascimento' => 'sometimes|required|date',
        ]);

        $aluno->update($validated);

        return response()->json($aluno, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $aluno = Aluno::find($id);

        if (!$aluno) {
            return response()->json(['message' => 'Aluno não encontrado'], Response::HTTP_NOT_FOUND);
        }

        $aluno->delete();

        return response()->json(['message' => 'Aluno removido com sucesso'], Response::HTTP_OK);
    }

    public function buscar(Request $request)
    {
        $nome = $request->query('nome');
        $email = $request->query('email');

        $alunos = Aluno::query()
            ->when($nome, fn($query) => $query->where('nome', 'like', "%{$nome}%"))
            ->when($email, fn($query) => $query->where('email', 'like', "%{$email}%"))
            ->get();

        return response()->json($alunos, Response::HTTP_OK);
    }
}
