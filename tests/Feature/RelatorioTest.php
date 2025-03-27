<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Aluno;
use App\Models\Curso;

class RelatorioTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function endpoint_relatorio_faixa_etaria_responde_com_sucesso()
    {
        $curso = Curso::factory()->create();
        $aluno = Aluno::factory()->create([
            'data_nascimento' => now()->subYears(20)->format('Y-m-d'),
            'sexo' => 'F'
        ]);

        $aluno->cursos()->attach($curso->id);

        $response = $this->getJson('/api/relatorios/faixa-etaria');

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'curso' => $curso->titulo,
                     'sexo' => 'F',
                     'faixa_etaria' => '19–24',
                 ]);
    }
}
