@if(!isset($states))
  <option value="">Selecione um país primeiramente.</option>
@else
  @if(count($states) == 0)
    <option value="">Não há estados cadastrados.</option>
  @else
    <option value="">--- Selecione ---</option>
    @foreach($states as $state)
      <option value="{{$state->id}}">{{$state->abbr}}-{{$state->name}}</option>
    @endforeach
  @endif
@endif
