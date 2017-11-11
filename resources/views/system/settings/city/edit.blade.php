@php($page = array("5"=>true,"503"=>true,"5032"=>true))
@extends("system.default.default")
@section("title","Configurar >> Cidades")
@section("css")
    <link href="{{url("/assets/css/table-responsive.css")}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url("/assets/js/gritter/css/jquery.gritter.css")}}" />
    <style>
      td{
        vertical-align: middle !important;
      }
      .displayNone{
        display: none;
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
    <div class="form-panel">
      <h4><i class="fa fa-angle-right"></i> Editar Cidade: {{$city->name}}, {{$city->state->name}}, {{$city->state->country->name}}</h4>
      <form class="form-horizontal style-form" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $city->id }}">
        @php(
          $fields=array(
            array("Nome","name","Nome da Cidade. Exemplo: Cascavel.","text",$city->name,true)
          )
        )
        @foreach($fields as $field)
          <div class="form-group @if ($errors->has($field[1])) has-error @endif {{$field[1]}}">
            <div class="col-sm-12">
              <label class="col-sm-12">
                {{$field[0]}}
                <input type="{{$field[3]}}" name="{{$field[1]}}" class="form-control" id="{{$field[1]}}" placeholder="{{$field[2]}}" value="@if($field[4]){{$field[4]}}@else{{old($field[1])}}@endif" @if($field[5]) required="required" @endif>
                @if ($errors->has($field[1]))
                  <label class="control-label" for="{{$field[1]}}"><i class="fa fa-times-circle-o"></i> <span>{!! $errors->first($field[1]) !!}</span></label><br>
                @else
                  <label class="control-label displayNone" for="{{$field[1]}}"><i class="fa fa-times-circle-o"></i> <span></span></label><br>
                @endif
              </label>
            </div>
          </div>
        @endforeach

        <div class="form-group @if ($errors->has("country")) has-error @endif">
          <div class="col-sm-12">
            <label class="col-sm-12">
              País
              <select name="country" id="country" class="form-control">
                <option value="" selected="selected" required> --- Selecione --- </option>
                @foreach($countries as $country)
                  <option value="{{$country->id}}"@if($city->state->country_id == $country->id) selected="selected"@endif>{{$country->abbr}}-{{$country->name}}</option>
                @endforeach
              </select>
              @if ($errors->has("country"))
                <label class="control-label" for="country"><i class="fa fa-times-circle-o"></i> <span>{!! $errors->first("country") !!}</span></label><br>
              @else
                <label class="control-label displayNone" for="country"><i class="fa fa-times-circle-o"></i> <span></span></label><br>
              @endif
            </label>
          </div>
        </div>
        <div class="form-group @if ($errors->has("state")) has-error @endif">
          <div class="col-sm-12">
            <label class="col-sm-12">
              Estado
              <select name="state" id="state" class="form-control" required>
                <option value="">--- Selecione ---</option>
                @foreach($states as $state)
                  <option value="{{$state->id}}"@if($city->state_id == $state->id) selected="selected"@endif>{{$state->abbr}}-{{$state->name}}</option>
                @endforeach
              </select>
              @if ($errors->has("state"))
                <label class="control-label" for="state"><i class="fa fa-times-circle-o"></i> <span>{!! $errors->first("state") !!}</span></label><br>
              @else
                <label class="control-label displayNone" for="state"><i class="fa fa-times-circle-o"></i> <span></span></label><br>
              @endif
            </label>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
            <label class="col-sm-12">
              <button class="btn btn-success btn-sm pull-right" href="#">Salvar</button>
            </label>
          </div>
        </div>

      </form>
    </div><!-- /content-panel -->
  </div><!-- /col-lg-4 -->
</div><!-- /row -->
@endsection
