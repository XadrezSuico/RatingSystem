@extends('adminlte::page')
@section("title","Pessoas")
@section("css")
    <style>
      td{
        vertical-align: middle !important;
      }
    </style>
  @endsection
  @section('content_header')
      <h1>Pessoas</h1>
  @stop
@section("content")
@if ($errors->has("alert"))
  <div class="row mt">
    <div class="col-lg-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="alert alert-{{$errors->first("type")}}" role="alert">
            @if($errors->first("type") == "success")<strong>Tudo certo!</strong> @endif{!! $errors->first("alert") !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
<div class="row mt">
  <div class="col-lg-12 connectedSortable">
    <div class="box">
      <h4><i class="fa fa-angle-right"></i> Listar Pessoas</h4>
      <section id="no-more-tables">
        <table class="table table-bordered table-striped table-condensed cf">
          <thead class="cf">
            <tr>
              <th class="numeric">#</th>
              <th>Nome</th>
              <th width="20%">Opções</th>
            </tr>
          </thead>
          <tbody>
            @foreach($persons as $person)
              <tr>
                <td data-title="Código" class="numeric">{{$person->id}}</td>
                <td data-title="Nome">{{$person->firstname}} {{$person->lastname}}</td>
                <td data-title="Federação">{{$person->federation->name}}</td>
                <td data-title="Opções">
    							<a class="btn btn-warning btn-sm" href="{{url("/person/edit/".$person->id)}}">Editar</a>
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#lista_{{$person->id}}">
      						  Excluir
      						</button>
      						<!-- Modal -->
      						<div class="modal fade" id="lista_{{$person->id}}" tabindex="-1" role="dialog" aria-labelledby="listaLabel_{{$person->id}}" aria-hidden="true">
      						  <div class="modal-dialog">
      						    <div class="modal-content">
      						      <div class="modal-header">
      						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      						        <h4 class="modal-title" id="listaLabel_{{$person->id}}">Deseja mesmo excluir o registro?</h4>
      						      </div>
      						      <div class="modal-body">
                          Nome: {{$person->firstname}} {{$person->lastname}}<br/>
                          Sexo: @if($person->sex == "M") Masculino @else Feminino @endif<br/>
                          Data de Nascimento: {{$person->getBirthday()}}<br/>
                          Federação: {{$person->federation->name}}<br/>
      						      </div>
      						      <div class="modal-footer">
      						        <button type="button" class="btn btn-success" data-dismiss="modal">Não quero</button>
      						        <a href="{{url("/person/delete/".$person->id)}}" class="btn btn-danger">Excluir</a>
      						      </div>
      						    </div>
      						  </div>
      						</div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </section>
    </div><!-- /content-panel -->
  </div><!-- /col-lg-4 -->
</div><!-- /row -->
@endsection
