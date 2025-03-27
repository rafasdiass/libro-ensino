<?php

namespace Database\Factories;

use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlunoFactory extends Factory
{
    protected $model = Aluno::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'sexo' => $this->faker->randomElement(['M', 'F', 'O']),
            'data_nascimento' => $this->faker->date('Y-m-d', '-15 years'),
        ];
    }
}
