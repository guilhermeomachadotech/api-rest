<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function index(){

    }
    //Função de exibição de todos os dados através do id

    public function show(string $id){
        //Responsável por buscar todos os registros e listar//
        $student = Student::get()->toJson(JSON_PRETTY_PRINT);
        return response($student, 200);
    }

    //Responsável por buscar cada estudante pelo id//

    public function exibirEstudante($id){
        if (Student::where('id', $id)->exists()) {
            $student = Student::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200);
        }else{
            return response()->json([
                'message'=> 'Estudante não encontrado'
            ], 404);
        }
    }


    //Função para atualizar o estudante por id

    public function update(Request $request, string $id){
        if (Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            //Verificar se os campos não estão nulos

            $student->nome = is_null($request->nome) ? $student->nome : $request->nome;
            $student->curso = is_null($request->curso) ? $student->curso : $request->curso; 

            //Salvar no banco

            $student->save();

            return response()->json([
                'message' => 'Atualização do estudante do id '.$id.' realizada com sucesso!'
            ], 200);
        }else{
            return response()->json([
                'message' => 'Estudante não encontrado!'
            ], 404);
        }
    }


    //Função para deletar o usuário pelo id

    public function destroy(string $id){
        //Verificar se existe usuário

        if (Student::where('id', $id)->exists()) {
            $student = Student::find($id);

            $student ->delete();

            return response()->json([
                'message' => 'Estudante do id '.$id.' deletado com sucesso!'
            ], 202);
        }else{
            return response()->json([
                'message' => 'Estudante não encontrado!'
            ], 404);
        }
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
