<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    public function faixaEtariaPorCursoESexo()
    {
        $resultados = DB::table('matriculas')
            ->join('alunos', 'matriculas.aluno_id', '=', 'alunos.id')
            ->join('cursos', 'matriculas.curso_id', '=', 'cursos.id')
            ->select(
                'cursos.titulo as curso',
                'alunos.sexo',
                DB::raw("CASE
                    WHEN strftime('%Y', 'now') - strftime('%Y', alunos.data_nascimento) < 15 THEN '< 15'
                    WHEN strftime('%Y', 'now') - strftime('%Y', alunos.data_nascimento) BETWEEN 15 AND 18 THEN '15–18'
                    WHEN strftime('%Y', 'now') - strftime('%Y', alunos.data_nascimento) BETWEEN 19 AND 24 THEN '19–24'
                    WHEN strftime('%Y', 'now') - strftime('%Y', alunos.data_nascimento) BETWEEN 25 AND 30 THEN '25–30'
                    ELSE '> 30' END AS faixa_etaria"),
                DB::raw('count(*) as total')
            )
            ->groupBy('curso', 'alunos.sexo', 'faixa_etaria')
            ->orderBy('curso')
            ->get();

        return response()->json($resultados, Response::HTTP_OK);
    }
}
