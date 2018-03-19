<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Type;

class TypeController extends Controller
{
    public function index(){
      $types = Type::all();
      return view("system.type.list",compact("types"));
    }


    public function new(){
      return view("system.type.new");
    }
    public function new_post(Request $request){


      $messages = [
        'name.required' => 'O nome da Modalidade é necessário para efetuarmos o cadastro da federação.',
        'name.between' => 'O nome precisa ter até 100 caracteres.'
      ];
      // Faz a validação dos dados
      $requisicao = $request->all();
      $validator = \Validator::make($requisicao, [
        'name' => 'required|string|max:100'
      ], $messages);
      if($validator->fails()){
          return redirect()->back()->withErrors($validator->errors());
      }

      $type = new Type;
      $type->name = $requisicao["name"];
      $type->save();
      $messageBag = new MessageBag;
      if($type->id > 0){
        $messageBag->add("alert","Modalidade cadastrada com sucesso.");
        $messageBag->add("type","success");
        return redirect("/type/edit/".$type->id)->withErrors($messageBag);
      }
      $messageBag->add("alert","Ocorreu um erro interno não esperado e não foi possível concluir a solicitação. Por favor, tente novamente mais tarde.");
      $messageBag->add("type","warning");
      return redirect()->back()->withErrors($messageBag);
    }


    public function edit($id){
      $type = Type::find($id);
      return view("system.type.edit",compact("type"));
    }
    public function edit_post(Request $request){
      $type = Type::find($request->input("id"));
      if(!$type){
        return redirect()->back();
      }
      $messages = [
        'name.required' => 'O nome da modalidade é necessária para efetuarmos o cadastro da modalidade.',

        'name.between' => 'O nome precisa ter até 100 caracteres.'
      ];
      // Faz a validação dos dados
      $requisicao = $request->all();
      $validator = \Validator::make($requisicao, [
            'name' => 'required|string|max:100'
      ], $messages);
      if($validator->fails()){
          return redirect()->back()->withErrors($validator->errors());
      }
      $type->name = $requisicao["name"];
      $type->save();
      $messageBag = new MessageBag;
      $messageBag->add("alert","Modalidade atualizada com sucesso.");
      $messageBag->add("type","success");
      return redirect("/type/edit/".$type->id)->withErrors($messageBag);
    }

    public function delete($id){
      $modalidade = Type::find($id);
      $messageBag = new MessageBag;
      if($federation){
        $modalidade->delete();
        $messageBag->add("alert","Modalidade deletada com sucesso.");
        $messageBag->add("type","success");
        return redirect("/type/")->withErrors($messageBag);
      }
      $messageBag->add("alert","Erro inesperado. Por favor, tente novamente mais tarde.");
      $messageBag->add("type","warning");
      return redirect()->back($messageBag);
    }
}
