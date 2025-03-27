<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aluno;

class AlunosSeeder extends Seeder
{
    public function run(): void
    {
        Aluno::factory()->count(10)->create();
    }
}
