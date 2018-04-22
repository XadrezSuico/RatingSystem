<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Person;
use App\RatingType;

class PersonController extends Controller
{
    public function index(){
        $persons = Person::all();
        return view("system.person.list",compact("persons"));
      }
  
  
      public function new(){
        return view("system.person.new");
      }
      public function new_post(Request $request){
  
  
        $messages = [
          'name.required' => 'O nome da pessoa é necessário para efetuarmos o cadastro da pessoa.',
          'name.between' => 'O nome precisa ter até 100 caracteres.',
  
          'abbr.required' => 'A abreviação é necessária para efetuarmos o cadastro da pessoa.',
          'abbr.unique' => 'A abreviação informada já está vinculada a outro cadastro.',
          'abbr.between' => 'A abreviação precisa ter até 5 caracteres.'
        ];
        // Faz a validação dos dados
        $requisicao = $request->all();
        $validator = \Validator::make($requisicao, [
          'firstname' => 'required|string|max:100',
          'lastname' => 'required|string|max:100',
          'sex' => 'required|string|max:1',
          'federation' => 'required|integer',
          'birthday' => 'required|string',
        ], $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
  
        $person = new Person;
        $person->firstname = $requisicao["firstname"];
        $person->lastname = $requisicao["lastname"];
        $person->sex = $requisicao["sex"];
        $person->federation_id = $requisicao["federation"];
        $person->setBirthday($requisicao["birthday"]);
        $person->save();
        $messageBag = new MessageBag;
        if($person->id > 0){
          $messageBag->add("alert","Pessoa cadastrada com sucesso.");
          $messageBag->add("type","success");
          return redirect("/person/edit/".$person->id)->withErrors($messageBag);
        }
        $messageBag->add("alert","Ocorreu um erro interno não esperado e não foi possível concluir a solicitação. Por favor, tente novamente mais tarde.");
        $messageBag->add("type","warning");
        return redirect()->back()->withErrors($messageBag);
      }
  
  
      public function edit($id){
        $person = Person::find($id);
        return view("system.person.edit",compact("person"));
      }
      public function edit_post(Request $request){
        $person = Person::find($request->input("id"));
        if(!$person){
          return redirect()->back();
        }
        $messages = [
          'name.required' => 'O nome da pessoa é necessário para efetuarmos o cadastro da pessoa.',
          'name.between' => 'O nome precisa ter até 100 caracteres.',
  
          'abbr.required' => 'A abreviação é necessária para efetuarmos o cadastro da pessoa.',
          'abbr.unique' => 'A abreviação informada já está vinculada a outro cadastro.',
          'abbr.between' => 'A abreviação precisa ter até 5 caracteres.'
        ];
        // Faz a validação dos dados
        $requisicao = $request->all();
        $validator = \Validator::make($requisicao, [
          'firstname' => 'required|string|max:100',
          'lastname' => 'required|string|max:100',
          'sex' => 'required|string|max:1',
          'federation' => 'required|integer',
          'birthday' => 'required|string',
        ], $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        $person->firstname = $requisicao["firstname"];
        $person->lastname = $requisicao["lastname"];
        $person->sex = $requisicao["sex"];
        $person->federation_id = $requisicao["federation"];
        $person->setBirthday($requisicao["birthday"]);
        $person->save();
        $messageBag = new MessageBag;
        $messageBag->add("alert","Pessoa atualizada com sucesso.");
        $messageBag->add("type","success");
        return redirect("/person/edit/".$person->id)->withErrors($messageBag);
      }
  
      public function delete($id){
        $pessoa = Person::find($id);
        $messageBag = new MessageBag;
        if($pessoa){
          $pessoa->delete();
          $messageBag->add("alert","Pessoa deletada com sucesso.");
          $messageBag->add("type","success");
          return redirect("/person/")->withErrors($messageBag);
        }
        $messageBag->add("alert","Erro inesperado. Por favor, tente novamente mais tarde.");
        $messageBag->add("type","warning");
        return redirect()->back()->withErrors($messageBag);
      }
}
