<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Country;
use App\State;
use App\City;

class CityController extends Controller
{
    public function index(){
      $cities = City::all();
      return view("system.settings.city.list",compact("cities"));
    }


    public function new(){
      $countries = Country::orderBy("name")->get();
      return view("system.settings.city.new",compact("countries"));
    }
    public function new_post(Request $request){


      $messages = [
        'name.required' => 'O nome da cidade é necessário para efetuarmos o cadastro da cidade.',
        'state.required' => 'O Estado é necessário para efetuarmos o cadastro da cidade.',

        'name.between' => 'O nome precisa ter até 100 caracteres.',
      ];
      // Faz a validação dos dados
      $requisicao = $request->all();
      $validator = \Validator::make($requisicao, [
        'name' => 'required|string|max:100',
        'state' => 'required|integer'
      ], $messages);
      if($validator->fails()){
          return redirect()->back()->withErrors($validator->errors());
      }

      $city = new City;
      $city->name = $requisicao["name"];
      $city->state_id = $requisicao["state"];
      $city->save();
      $messageBag = new MessageBag;
      if($city->id > 0){
        $messageBag->add("alert","Cidade cadastrada com sucesso.");
        $messageBag->add("type","success");
        return redirect("/settings/city/edit/".$city->id)->withErrors($messageBag);
      }
      $messageBag->add("alert","Ocorreu um erro interno não esperado e não foi possível concluir a solicitação. Por favor, tente novamente mais tarde.");
      $messageBag->add("type","warning");
      return redirect()->back()->withErrors($messageBag);
    }


    public function edit($id){
      $countries = Country::orderBy("name")->get();
      $city = City::find($id);
      $states = State::where([["country_id","=",$city->state->country_id]])->orderBy("name")->get();
      return view("system.settings.city.edit",compact("countries","city","states"));
    }

    public function edit_post(Request $request){
      $city = City::find($request->input("id"));
      $messageBag = new MessageBag;
      if(!$city){
        $messageBag->add("alert","Ocorreu um erro interno inesperado. Por favor, tente novamente mais tarde.");
        $messageBag->add("type","warning");
        return redirect()->back()->withErrors($messageBag);
      }

      $messages = [
        'name.required' => 'O nome da cidade é necessário para efetuarmos o cadastro da cidade.',
        'state.required' => 'O Estado é necessário para efetuarmos o cadastro da cidade.',

        'name.between' => 'O nome precisa ter até 100 caracteres.',
      ];
      // Faz a validação dos dados
      $requisicao = $request->all();
      $validator = \Validator::make($requisicao, [
        'name' => 'required|string|max:100',
        'state' => 'required|integer'
      ], $messages);
      if($validator->fails()){
          return redirect()->back()->withErrors($validator->errors());
      }

      $city = new City;
      $city->name = $requisicao["name"];
      $city->state_id = $requisicao["state"];
      $city->save();
      $messageBag = new MessageBag;
      $messageBag->add("alert","Cidade editada com sucesso!");
      $messageBag->add("type","success");
      return redirect("/settings/city/edit/".$city->id)->withErrors($messageBag);
    }

    public function delete($id){
      $city = City::find($id);
      $messageBag = new MessageBag;
      if($city){
        $city->delete();
        $messageBag->add("alert","Cidade deletads com sucesso.");
        $messageBag->add("type","success");
        return redirect("/settings/city/")->withErrors($messageBag);
      }
      $messageBag->add("alert","Erro inesperado. Por favor, tente novamente mais tarde.");
      $messageBag->add("type","warning");
      return redirect()->back()->withErrors($messageBag);
    }
}
