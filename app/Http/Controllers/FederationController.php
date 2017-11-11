<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Federation;

class FederationController extends Controller
{
    public function index(){
      $federations = Federation::all();
      return view("system.settings.federation.list",compact("federations"));
    }


    public function new(){
      return view("system.settings.federation.new");
    }
    public function new_post(Request $request){


      $messages = [
        'name.required' => 'O nome da federação é necessário para efetuarmos o cadastro da federação.',
        'abbr.required' => 'A abreviação é necessária para efetuarmos o cadastro da federação.',
        'abbr.unique' => 'A abreviação informada já está vinculada a outro cadastro.',

        'name.between' => 'O nome precisa ter até 100 caracteres.',
        'abbr.between' => 'A abreviação precisa ter até 5 caracteres.'
      ];
      // Faz a validação dos dados
      $requisicao = $request->all();
      $validator = \Validator::make($requisicao, [
        'name' => 'required|string|max:100',
        'abbr' => 'required|string|max:5|unique:federation,abbr'
      ], $messages);
      if($validator->fails()){
          return redirect()->back()->withErrors($validator->errors());
      }

      $federation = new Federation;
      $federation->name = $requisicao["name"];
      $federation->abbr = strtoupper($requisicao["abbr"]);
      $federation->save();
      $messageBag = new MessageBag;
      if($federation->id > 0){
        $messageBag->add("alert","Federação cadastrada com sucesso.");
        $messageBag->add("type","success");
        return redirect("/settings/federation/edit/".$federation->id)->withErrors($messageBag);
      }
      $messageBag->add("alert","Ocorreu um erro interno não esperado e não foi possível concluir a solicitação. Por favor, tente novamente mais tarde.");
      $messageBag->add("type","warning");
      return redirect()->back()->withErrors($messageBag);
    }


    public function edit($id){
      $federation = Federation::find($id);
      return view("system.settings.federation.edit",compact("federation"));
    }
    public function edit_post(Request $request){
      $federation = Federation::find($request->input("id"));
      if(!$federation){
        return redirect()->back();
      }
      $messages = [
        'name.required' => 'O nome da federação é necessária para efetuarmos o cadastro da federação.',
        'abbr.required' => 'A abreviação é necessária para efetuarmos o cadastro da federação.',
        'abbr.unique' => 'A abreviação informada já está vinculada a outro cadastro.',

        'name.between' => 'O nome precisa ter até 100 caracteres.',
        'abbr.between' => 'A abreviação precisa ter até 5 caracteres.'
      ];
      // Faz a validação dos dados
      $requisicao = $request->all();
      if($federation->abbr != $requisicao["abbr"]){
        $validator = \Validator::make($requisicao, [
          'name' => 'required|string|max:100',
          'abbr' => 'required|string|max:5|unique:federation,abbr'
        ], $messages);
      }else{
        $validator = \Validator::make($requisicao, [
          'name' => 'required|string|max:100',
        ], $messages);
      }
      if($validator->fails()){
          return redirect()->back()->withErrors($validator->errors());
      }
      $federation->name = $requisicao["name"];
      $federation->abbr = strtoupper($requisicao["abbr"]);
      $federation->save();
      $messageBag = new MessageBag;
      $messageBag->add("alert","Federação atualizada com sucesso.");
      $messageBag->add("type","success");
      return redirect("/settings/federation/edit/".$federation->id)->withErrors($messageBag);
    }

    public function delete($id){
      $federation = Federation::find($id);
      $messageBag = new MessageBag;
      if($federation){
        $federation->delete();
        $messageBag->add("alert","Federação deletada com sucesso.");
        $messageBag->add("type","success");
        return redirect("/settings/federation/")->withErrors($messageBag);
      }
      $messageBag->add("alert","Erro inesperado. Por favor, tente novamente mais tarde.");
      $messageBag->add("type","warning");
      return redirect()->back($messageBag);
    }
}
