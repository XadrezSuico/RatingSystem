<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\State;
use App\Country;

class StateController extends Controller
{
    public function index(){
      $states = State::all();
      return view("system.settings.state.list",compact("states"));
    }


    public function new(){
      $countries = Country::all();
      return view("system.settings.state.new",compact("countries"));
    }
    public function new_post(Request $request){


      $messages = [
        'name.required' => 'O nome do país é necessário para efetuarmos o cadastro do país.',
        'abbr.required' => 'A abreviação é necessária para efetuarmos o cadastro do país.',
        'country.required' => 'O País é necessário para efetuarmos o cadastro do país.',
        'abbr.unique' => 'A abreviação informada já está vinculada a outro cadastro.',

        'name.between' => 'O nome precisa ter até 100 caracteres.',
        'abbr.between' => 'A abreviação precisa ter até 5 caracteres.'
      ];
      // Faz a validação dos dados
      $requisicao = $request->all();
      $validator = \Validator::make($requisicao, [
        'name' => 'required|string|max:100',
        'abbr' => 'required|string|max:5|unique:state,abbr',
        'country' => 'required|integer'
      ], $messages);
      if($validator->fails()){
          return redirect()->back()->withErrors($validator->errors());
      }

      $state = new State;
      $state->name = $requisicao["name"];
      $state->abbr = strtoupper($requisicao["abbr"]);
      $state->country_id = $requisicao["country"];
      $state->save();
      $messageBag = new MessageBag;
      if($state->id > 0){
        $messageBag->add("alert","Estado cadastrado com sucesso.");
        $messageBag->add("type","success");
        return redirect("/settings/state/edit/".$state->id)->withErrors($messageBag);
      }
      $messageBag->add("alert","Ocorreu um erro interno não esperado e não foi possível concluir a solicitação. Por favor, tente novamente mais tarde.");
      $messageBag->add("type","warning");
      return redirect()->back()->withErrors($messageBag);
    }


    public function edit($id){
      $countries = Country::all();
      $state = State::find($id);
      return view("system.settings.state.edit",compact("countries","state"));
    }

    public function edit_post(Request $request){
      $state = State::find($request->input("id"));
      $messageBag = new MessageBag;
      if(!$state){
        $messageBag->add("alert","Ocorreu um erro interno inesperado. Por favor, tente novamente mais tarde.");
        $messageBag->add("type","warning");
        return redirect()->back()->withErrors($messageBag);
      }

      $messages = [
        'name.required' => 'O nome do país é necessário para efetuarmos o cadastro do país.',
        'abbr.required' => 'A abreviação é necessária para efetuarmos o cadastro do país.',
        'country.required' => 'O País é necessário para efetuarmos o cadastro do país.',
        'abbr.unique' => 'A abreviação informada já está vinculada a outro cadastro.',

        'name.between' => 'O nome precisa ter até 100 caracteres.',
        'abbr.between' => 'A abreviação precisa ter até 5 caracteres.'
      ];
      // Faz a validação dos dados
      $requisicao = $request->all();
      if($state->abbr != strtoupper($requisicao["abbr"])){
        $validator = \Validator::make($requisicao, [
          'name' => 'required|string|max:100',
          'abbr' => 'required|string|max:5|unique:state,abbr',
          'country' => 'required|integer'
        ], $messages);
      }else{
        $validator = \Validator::make($requisicao, [
          'name' => 'required|string|max:100',
          'country' => 'required|integer'
        ], $messages);
      }
      if($validator->fails()){
          return redirect()->back()->withErrors($validator->errors());
      }

      $state->name = $requisicao["name"];
      $state->abbr = strtoupper($requisicao["abbr"]);
      $state->country_id = $requisicao["country"];
      $state->save();
      $messageBag = new MessageBag;
      $messageBag->add("alert","Estado editado com sucesso!");
      $messageBag->add("type","success");
      return redirect("/settings/state/edit/".$state->id)->withErrors($messageBag);
    }

    public function delete($id){
      $state = State::find($id);
      $messageBag = new MessageBag;
      if($state){
        $state->delete();
        $messageBag->add("alert","Estado deletado com sucesso.");
        $messageBag->add("type","success");
        return redirect("/settings/state/")->withErrors($messageBag);
      }
      $messageBag->add("alert","Erro inesperado. Por favor, tente novamente mais tarde.");
      $messageBag->add("type","warning");
      return redirect()->back()->withErrors($messageBag);
    }







      public function api_listByCountry($country_id){
        $states = State::where([["country_id","=",$country_id]])->orderBy("name")->get();
        return view("system.settings.state.listByCountry",compact("states"));
      }
      public function api_listNothing(){
        return view("system.settings.state.listByCountry");
      }
}
