<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Country;

class CountryController extends Controller
{
    public function index(){
      $countries = Country::all();
      return view("system.settings.country.list",compact("countries"));
    }


    public function new(){
      return view("system.settings.country.new");
    }
    public function new_post(Request $request){


      $messages = [
        'name.required' => 'O nome do país é necessário para efetuarmos o cadastro do país.',
        'abbr.required' => 'A abreviação é necessária para efetuarmos o cadastro do país.',
        'abbr.unique' => 'A abreviação informada já está vinculada a outro cadastro.',

        'name.between' => 'O nome precisa ter até 100 caracteres.',
        'abbr.between' => 'A abreviação precisa ter até 5 caracteres.'
      ];
      // Faz a validação dos dados
      $requisicao = $request->all();
      $validator = \Validator::make($requisicao, [
        'name' => 'required|string|max:100',
        'abbr' => 'required|string|max:5|unique:country,abbr'
      ], $messages);
      if($validator->fails()){
          return redirect()->back()->withErrors($validator->errors());
      }

      $country = new Country;
      $country->name = $requisicao["name"];
      $country->abbr = strtoupper($requisicao["abbr"]);
      $country->save();
      $messageBag = new MessageBag;
      if($country->id > 0){
        $messageBag->add("alert","País cadastrado com sucesso.");
        $messageBag->add("type","success");
        return redirect("/settings/country/edit/".$country->id)->withErrors($messageBag);
      }
      $messageBag->add("alert","Ocorreu um erro interno não esperado e não foi possível concluir a solicitação. Por favor, tente novamente mais tarde.");
      $messageBag->add("type","warning");
      return redirect()->back()->withErrors($messageBag);
    }


    public function edit($id){
      $country = Country::find($id);
      return view("system.settings.country.edit",compact("country"));
    }
    public function edit_post(Request $request){
      $country = Country::find($request->input("id"));
      if(!$country){
        return redirect()->back();
      }
      $messages = [
        'name.required' => 'O nome do país é necessário para efetuarmos o cadastro do país.',
        'abbr.required' => 'A abreviação é necessária para efetuarmos o cadastro do país.',
        'abbr.unique' => 'A abreviação informada já está vinculada a outro cadastro.',

        'name.between' => 'O nome precisa ter até 100 caracteres.',
        'abbr.between' => 'A abreviação precisa ter até 5 caracteres.'
      ];
      // Faz a validação dos dados
      $requisicao = $request->all();
      if($country->abbr != $requisicao["abbr"]){
        $validator = \Validator::make($requisicao, [
          'name' => 'required|string|max:100',
          'abbr' => 'required|string|max:5|unique:country,abbr'
        ], $messages);
      }else{
        $validator = \Validator::make($requisicao, [
          'name' => 'required|string|max:100',
        ], $messages);
      }
      if($validator->fails()){
          return redirect()->back()->withErrors($validator->errors());
      }
      $country->name = $requisicao["name"];
      $country->abbr = strtoupper($requisicao["abbr"]);
      $country->save();
      $messageBag = new MessageBag;
      $messageBag->add("alert","País atualizado com sucesso.");
      $messageBag->add("type","success");
      return redirect("/settings/country/edit/".$country->id)->withErrors($messageBag);
    }

    public function delete($id){
      $country = Country::find($id);
      $messageBag = new MessageBag;
      if($country){
        $country->delete();
        $messageBag->add("alert","País deletado com sucesso.");
        $messageBag->add("type","success");
        return redirect("/settings/country/")->withErrors($messageBag);
      }
      $messageBag->add("alert","Erro inesperado. Por favor, tente novamente mais tarde.");
      $messageBag->add("type","warning");
      return redirect()->back($messageBag);
    }
}
