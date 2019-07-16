@extends('plantillas.layout')
@section('content')
<div class="row">
    <div class="col s12 center-align">
        <h4 class="align-center">CREAR TIPO</h4>
    </div>
</div>

<div class="row">
    <div class="col s4 offset-s4">
      <div class="card">
        <div class="card-content">
            <form action="{{ route('tipos.store') }}" method='POST'>
            @csrf
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <input required id="nombre" name="nombre" autofocus type="text" class="validate">
                        <label for="last_name">Nombre del nuevo tipo</label>
                    </div>
                    <div class="input-field col s5 offset-s1">
                        <select required id="lados" name="lados" onchange="{{ route('tipos.store') }}">
                            <option value="" disabled selected>Seleccione</option>
                            <option value="3">3 lados</option>
                            <option value="4">4 lados</option>
                        </select>
                        <label>Número de lados</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s10 offset-s1">
                        <textarea required id="descripcion" name="descripcion" class="materialize-textarea"></textarea>
                        <label for="descripcion">Descipción</label>
                        </div>
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