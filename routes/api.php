<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;


//Construir a rota do tipo post e aponta para o cadastro Controlle e seu métodod de cadastrar
Route::post('/estudante',[CadastroController::class , 'store']);