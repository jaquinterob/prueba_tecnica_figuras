@extends('plantillas.layout')
@section('content')
<div class="row">
    <div class="col s12 center-align">
        <h4 class="align-center">EDITAR SUBTIPO</h4>
    </div>
</div>

<div class="row">
    <div class="col s4 offset-s4">
      <div class="card">
        <div class="card-content">
       <form action="{{ route('subtipos.update',$subtipo->id) }}" method='POST'>
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <input required id="nombre" value="{{$subtipo->nombre}}" name="nombre" autofocus type="text" class="validate">
                        <label for="nombre">Nombre del nuevo tipo</label>
                    </div>
                    <div class="input-field col s5 offset-s1">
                        <select required id="tipo" name="tipo" value="{{$subtipo->tipo}}">
                            <option value="" disabled >Seleccione</option>
                                @foreach($tipos as $tipo)
                                    <option value="{{$tipo->nombre}}">{{$tipo->nombre}}</option>
                                @endforeach
                        </select>
                        <label>Tipo al que pertenece</label>
                    </div>
                </div>
                <button type="submit" class="btn-floating halfway-fab waves-effect btn-large waves-light green hoverable"><i class="material-icons">save</i></button>
            </form>
        </div>
      </div>
    </div>
  </div>
  <script>
  $(document).ready(function(){
    $("#tipo").val($("#tipo").attr('value'));
    $('select').formSelect();
  });
  
  </script>

@endsection