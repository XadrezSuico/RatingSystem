@php($page = array("5"=>true,"503"=>true,"5034"=>true))
@extends("system.default.default")
@section("title","Configurar >> Estados")
@section("css")
    <link href="{{url("/assets/css/table-responsive.css")}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url("/assets/js/gritter/css/jquery.gritter.css")}}" />
    <style>
      td{
        vertical-align: middle !important;
      }
    </style>
@endsection
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
  <div class="col-lg-12">
    <div class="content-panel">
      <h4><i class="fa fa-angle-right"></i> Listar Estados</h4>
      <section id="no-more-tables">
        <table class="table table-bordered table-striped table-condensed cf">
          <thead class="cf">
            <tr>
              <th class="numeric">#</th>
              <th>Nome</th>
              <th>Abreviação</th>
              <th>País</th>
              <th width="20%">Opções</th>
            </tr>
          </thead>
          <tbody>
            @foreach($states as $state)
              <tr>
                <td data-title="Código" class="numeric">{{$state->id}}</td>
                <td data-title="Nome">{{$state->name}}</td>
                <td data-title="Abreviação">{{$state->abbr}}</td>
                <td data-title="País">{{$state->country->abbr}}-{{$state->country->name}}</td>
                <td data-title="Opções">
    							<a class="btn btn-warning btn-sm" href="{{url("/settings/state/edit/".$state->id)}}">Editar</a>
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#lista_{{$state->id}}">
      						  Excluir
      						</button>
      						<!-- Modal -->
      						<div class="modal fade" id="lista_{{$state->id}}" tabindex="-1" role="dialog" aria-labelledby="listaLabel_{{$state->id}}" aria-hidden="true">
      						  <div class="modal-dialog">
      						    <div class="modal-content">
      						      <div class="modal-header">
      						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      						        <h4 class="modal-title" id="listaLabel_{{$state->id}}">Deseja mesmo excluir o registro?</h4>
      						      </div>
      						      <div class="modal-body">
                          Nome: {{$state->name}}<br/>
                          Abreviação/UF: {{$state->abbr}}<br/>
      						        País: {{$state->country->abbr}}-{{$state->country->name}}
      						      </div>
      						      <div class="modal-footer">
      						        <button type="button" class="btn btn-success" data-dismiss="modal">Não quero</button>
      						        <a href="{{url("/settings/state/delete/".$state->id)}}" class="btn btn-danger">Excluir</a>
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
