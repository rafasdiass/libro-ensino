<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Aluno;
use App\Models\Curso;

class MatriculaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function aluno_pode_ser_matriculado_em_um_curso()
    {
        $aluno = Aluno::factory()->create();
        $curso = Curso::factory()->create();

        $response = $this->postJson('/api/matriculas', [
            'aluno_id' => $aluno->id,
            'curso_id' => $curso->id,
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'aluno_id' => $aluno->id,
                     'curso_id' => $curso->id,
                 ]);

        $this->assertDatabaseHas('matriculas', [
            'aluno_id' => $aluno->id,
            'curso_id' => $curso->id,
        ]);
    }
}
