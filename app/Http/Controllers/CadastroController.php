<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function index(){

    }

    //Função para cadastrar o Aluno
    
    public function store(Request $request){
        //Criar o objeto do model Student

        $student = new Student;
        $student->nome=$request->nome;
        $student->curso=$request->curso;

        //salvar no banco 

        $student->save();

        //retornar mensagem que estudante foi cadastrado com possível mensagem e erro

        return response()->json([
            'message'=>'Estudante cadastrado', 201
        ]);
    }
}
