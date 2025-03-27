<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AlunoController;
use App\Http\Controllers\Api\CursoController;
use App\Http\Controllers\Api\MatriculaController;
use App\Http\Controllers\Api\RelatorioController;

// ROTAS DE ALUNOS
Route::prefix('alunos')->group(function () {
    Route::get('/', [AlunoController::class, 'index']);
    Route::post('/', [AlunoController::class, 'store']);
    Route::get('/{id}', [AlunoController::class, 'show']);
    Route::put('/{id}', [AlunoController::class, 'update']);
    Route::delete('/{id}', [AlunoController::class, 'destroy']);
    Route::get('/buscar', [AlunoController::class, 'buscar']);
});

// ROTAS DE CURSOS
Route::prefix('cursos')->group(function () {
    Route::get('/', [CursoController::class, 'index']);
    Route::post('/', [CursoController::class, 'store']);
    Route::get('/{id}', [CursoController::class, 'show']);
    Route::put('/{id}', [CursoController::class, 'update']);
    Route::delete('/{id}', [CursoController::class, 'destroy']);
});

// ROTAS DE MATRÍCULAS
Route::prefix('matriculas')->group(function () {
    Route::get('/', [MatriculaController::class, 'index']);
    Route::post('/', [MatriculaController::class, 'store']);
    Route::get('/{id}', [MatriculaController::class, 'show']);
    Route::put('/{id}', [MatriculaController::class, 'update']);
    Route::delete('/{id}', [MatriculaController::class, 'destroy']);
});

// RELATÓRIO DE FAIXA ETÁRIA
Route::get('/relatorios/faixa-etaria', [RelatorioController::class, 'faixaEtariaPorCursoESexo']);
