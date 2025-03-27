<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'sexo',
        'data_nascimento',
    ];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'matriculas');
    }
}
