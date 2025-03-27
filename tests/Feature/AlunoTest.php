<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Aluno;

class AlunoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function cria_um_aluno_com_dados_validos()
    {
        $response = $this->postJson('/api/alunos', [
            'nome' => 'João Silva',
            'email' => 'joao@example.com',
            'sexo' => 'M',
            'data_nascimento' => '2000-05-12',
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment(['email' => 'joao@example.com']);

        $this->assertDatabaseHas('alunos', ['email' => 'joao@example.com']);
    }

    /** @test */
    public function retorna_erro_ao_criar_aluno_com_dados_invalidos()
    {
        $response = $this->postJson('/api/alunos', [
            'nome' => '',
            'email' => 'email-invalido',
            'data_nascimento' => 'not-a-date',
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['nome', 'email', 'data_nascimento']);
    }
}
