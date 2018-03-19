@php($page = array("2"=>true,"201"=>true))
@extends("system.default.default")
@section("title","Configurar >> Tipos de Rating")
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
      <h4><i class="fa fa-angle-right"></i> Novo Tipo de Rating</h4>
      <form class="form-horizontal style-form" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @php(
          $fields=array(
            array("Nome","name","Novo Tipo de Rating.","text","",true)
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
