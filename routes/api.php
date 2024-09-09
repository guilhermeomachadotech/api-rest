<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;


//Construir a rota do tipo post e aponta para o cadastro Controlle e seu métodod de cadastrar
Route::post('/estudante',[CadastroController::class , 'store']);

//Rota para listar o usuário atráves do seu id

Route::get('/estudante/{id}', [CadastroController::class, 'show']);

//Exibir todos os dados por estudante

Route::get('/estudante/{id}', [CadastroController::class, 'exibirEstudante']);

//Atualizar o usuário

Route::put('/estudante/{id}', [CadastroController::class, 'update']);

//Deletar o estudante

Route::delete('/estudante/{id}', [CadastroController::class, 'destroy']);