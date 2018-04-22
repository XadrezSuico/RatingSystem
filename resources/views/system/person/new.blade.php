@extends('adminlte::page')
@section("title","Pessoas >> Nova")
@section("css")
    <style>
      .displayNone{
        display: none;
      }
    </style>
@endsection
@section('content_header')
    <h1>Pessoas >> Nova</h1>
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
  <div class="col-lg-12">
    <div class="box">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Nova Pessoa</h4>
        <form class="form-horizontal style-form" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          @php(
            $fields=array(
              array("Nome","firstname","Nome do Enxadrista.","text","",true),
              array("Sobrenome","lastname","Sobrenome do Enxadrista.","text","",true),
              array("Data de Nascimento","birthday","Data de Nascimento do Enxadrista.","text","",true)
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

          <div class="form-group @if ($errors->has("sex")) has-error @endif sex">
            <div class="col-sm-12">
              <label class="col-sm-12">
                Sexo
                <select name="sex" class="form-control">
                  <optgroup label="Sexo"></optgroup>
                  <option value="m">Masculino</option>
                  <option value="f">Feminino</option>
                </select>
                @if ($errors->has("sex"))
                  <label class="control-label" for="sex"><i class="fa fa-times-circle-o"></i> <span>{!! $errors->first("sex") !!}</span></label><br>
                @else
                  <label class="control-label displayNone" for="sex"><i class="fa fa-times-circle-o"></i> <span></span></label><br>
                @endif
              </label>
            </div>
          </div>

          <div class="form-group @if ($errors->has("federation")) has-error @endif federation">
            <div class="col-sm-12">
              <label class="col-sm-12">
                Federação
                <select name="federation" class="form-control">
                  <optgroup label="Federação"></optgroup>
                  @foreach(\App\Federation::all() as $federation)
                    <option value="{{$federation->id}}">{{$federation->name}}</option>
                  @endforeach
                </select>
                @if ($errors->has("federation"))
                  <label class="control-label" for="federation"><i class="fa fa-times-circle-o"></i> <span>{!! $errors->first("federation") !!}</span></label><br>
                @else
                  <label class="control-label displayNone" for="federation"><i class="fa fa-times-circle-o"></i> <span></span></label><br>
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
    </div><!-- /box -->
  </div><!-- /col-lg-12 -->
</div><!-- /row -->
@endsection
