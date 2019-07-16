@extends('plantillas.layout')
@section('content')
<div class="row">
    <div class="col s12 center-align">
        <h4 class="align-center">CREAR SUBTIPO</h4>
    </div>
</div>

<div class="row">
    <div class="col s4 offset-s4">
      <div class="card">
        <div class="card-content">
            <form action="{{ route('subtipos.store') }}" method='POST'>
                @csrf
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <input required id="nombre" name="nombre" autofocus type="text" class="validate">
                        <label for="last_name">Nombre del nuevo subtipo</label>
                    </div>
                    <div class="input-field col s5 offset-s1">
                        <select required id="tipo" name="tipo">
                            <option value="" disabled selected>Seleccione</option>
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

    M.AutoInit();

  });
  
  </script>

@endsection