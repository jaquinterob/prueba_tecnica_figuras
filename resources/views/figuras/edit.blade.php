@extends('plantillas.layout')
@section('content')
<div class="row">
    <div class="col s12 center-align">
        <h4 class="align-center">CREAR FIGURA GEOMÉTRICA</h4>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</div>

<div class="row">
    <div class="col s8 offset-s2">
      <div class="card">
        <div class="card-content">
            <form id="formulario_envio" action="{{ route('figuras.update',$figura->id) }}" method='POST'>
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="input-field col s6">
                        <input required id="nombre" name="nombre" autofocus type="text" value="{{$figura->nombre}}" class="validate validacion_manual">
                        <label for="nombre">Nombre de la nueva figura geométrica</label>
                    </div>
                    <div class="input-field col s2">
                        <select  id="tipo" name="tipo" onchange="seleccion_subtipo()" value="{{$figura->tipo}}" class="validacion_manual">
                            <option value="" disabled selected>Seleccione</option>
                                @foreach($tipos as $tipo)
                                <option value="{{$tipo->nombre}}">{{$tipo->nombre}}</option>
                                @endforeach
                        </select>
                        <label for="tipo">Tipo </label>
                    </div>
                    <div class="input-field col s2 ">
                        <select required id="subtipo" name="subtipo" value="{{$figura->subtipo}}" class="validacion_manual">
                            
                        </select>
                        <label for="subtipo">Subtipo</label>
                    </div>
                    <div class="input-field col s2">
                        <select required id="color" name="color" value="{{$figura->color}}" class="validacion_manual">
                            <option value="" disabled selected>Seleccione</option>
                            <option value="Amarillo">Amarillo</option>
                            <option value="Azul">Azul</option>
                            <option value="Rojo">Rojo</option>
                            <option value="Verde">Verde</option>
                        </select>
                        <label for="color">Color</label>
                    </div>
                    <div class="input-field col s10 offset-s1">
                        <textarea required id="descripcion" name="descripcion"  class="validacion_manual materialize-textarea">{{$figura->descripcion}}</textarea>
                        <label for="descripcion">Descripción</label>
                    </div>
                    <div id="contenedor_lados" class="row">
                       
                    </div>
                </div>
                <div class="row">
                    <div  class="input-field col s2 offset-s5">
                        <input required  id="perimetro" readonly name="perimetro" value="{{$figura->perimetro}}"  type="text" class="validate ">
                         <label for="perimetro">Perímetro</label>
                    </div>
                </div>
                <button type="submit" class="btn-floating halfway-fab waves-effect btn-large waves-light green hoverable"><i class="material-icons">save</i></button>
            </form>
        </div>
      </div>
    </div>
  </div>
  <script>
  $.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
});

  $(document).ready(function(){
    $("#tipo").val($("#tipo").attr('value'));
    $("#color").val($("#color").attr('value'));
    setTimeout(()=>{
        $("#subtipo").val($("#subtipo").attr('value'));
        $('select').formSelect();
    },1000);
    $('select').trigger('change');
        $('select').formSelect();
    
  });



  function validar_formulario_manual(){
      var v=0;
      if ($("#nombre").val()=="") {
       v++;
       $("#nombre").addClass('invaid');
      } else {
        $("#nombre").removeClass('invaid');
      }
      if ($("#descripcion").val()=="") {
       v++;
       $("#descripcion").addClass('invaid');
      } else {
        $("#descripcion").removeClass('invaid');
      }
      if ($("#perimetro").val()=="") {
       v++;
       $("#perimetro").addClass('invaid');
      } else {
        $("#perimetro").removeClass('invaid');
      }
     
      if ($("#tipo").val()==null) {
       v++;
       $("#tipo").addClass('invaid');
      } else {
        $("#tipo").removeClass('invaid');
      }
      if ($("#subtipo").val()==null) {
       v++;
       $("#subtipo").addClass('invaid');
      } else {
        $("#subtipo").removeClass('invaid');
      }
      if ($("#color").val()==null) {
       v++;
       $("#color").addClass('invaid');
      } else {
        $("#color").removeClass('invaid');
      }
     
      if (v==0) {
          return true;
      } else {
          return false;
      }
  }

  function seleccion_subtipo(){
    calcular_numero_lados();
      $.post('http://127.0.0.1:8000/figuras/getRequest',"seleccion_subtipo=1&tipo="+$("#tipo").val(),function(data){
          if (data.length!=0) {
            $("#subtipo").html('<option value="" disabled selected>Seleccione</option>');
            data.forEach((item)=>{
                $("#subtipo").append('<option value="'+item.nombre+'" >'+item.nombre+'</option>');
            });
          } else {
              $("#subtipo").html('');
              M.toast({html:'No existen subtipos para este tipo, vaya al menú subtipos/crear para agregar uno',classes:'red'});
          }
          $('select').formSelect();
      });
  }

  function calcular_numero_lados(){
    $.post('http://127.0.0.1:8000/figuras/calcular_numero_lados',"nombre_tipo="+$("#tipo").val(),function(data){
          if (data.length!=0) {
              $("#contenedor_lados").html('');
            console.log(data[0].lados);
            for (let index = 0; index <= (parseInt(data[0].lados)-1); index++) {
               var columnas = 4;
               if(data[0].lados==4){
                columnas = 3;
               }
                $("#contenedor_lados").append(' <div  class="input-field col s'+columnas+'"><input  id="lado'+(index+1)+'" name="lado'+(index+1)+'"  type="number" class="validate  lado validacion_manual"><label for="lado'+(index+1)+'">Lado '+(index+1)+'</label></div>');
                M.updateTextFields();
            }
            $('.lado').blur(()=>{
                cacular_perimetro(data[0].lados);
            });
          } 
          $('select').formSelect();
          M.updateTextFields();
      });
  }

  function cacular_perimetro(numero_inputs){
    var perimetro=0;
    for (let index = 1; index <= numero_inputs; index++) {
        console.log(perimetro+=parseInt($("#lado"+index).val()));
    }
    if (!isNaN(perimetro)) {
        $("#perimetro").val(perimetro);
        M.updateTextFields();
        }
    }


  
  </script>

@endsection