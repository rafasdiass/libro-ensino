<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
    ];

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'matriculas');
    }
}
