<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Matricula;

class MatriculasSeeder extends Seeder
{
    public function run(): void
    {
        $alunos = Aluno::all();
        $cursos = Curso::all();

        foreach ($alunos as $aluno) {
            $cursosAleatorios = $cursos->random(rand(1, 3));

            foreach ($cursosAleatorios as $curso) {
                Matricula::create([
                    'aluno_id' => $aluno->id,
                    'curso_id' => $curso->id,
                ]);
            }
        }
    }
}
