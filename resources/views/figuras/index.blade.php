@extends('plantillas.layout')
@section('content')
<div class="row">
    <div class="col s12 center-align">
        <h4 class="align-center">LISTA DE FIGURAS GEOMÉTRICAS</h4>
    </div>

</div>


@if(Session::has('message'))
<span><script>
var mensaje='{{Session::get("message")}}';
    M.toast({html:mensaje,classes:'green'});
</script></span>
@endif
@if(Session::has('message_negativo'))
<span><script>
var mensaje='{{Session::get("message_negativo")}}';
    M.toast({html:mensaje,classes:'red'});
</script></span>
@endif


<div class="row">
    <div class="col s6 offset-s3">
        <table class="highlight ">
                <thead >
                <tr >
                    <th class="center-align">Nombre</th>
                    <th class="center-align">Tipo</th>
                    <th class="center-align">Subtipo</th>
                    <th class="center-align">Perímetro</th>
                    <th class="center-align">Color</th>
                    <th class="center-align">Descripción</th>
                    <th colspan="2" class="center-align">Acciones</th>
                </tr>
                </thead>

                <tbody >
                @foreach($figuras as $figura)
                <tr>
                    <td class="center-align">{{$figura->nombre}}</td>
                    <td class="center-align">{{$figura->tipo}}</td>
                    <td class="center-align">{{$figura->subtipo}}</td>
                    <td class="center-align">{{$figura->perimetro}}</td>
                    <td class="center-align">{{$figura->color}}</td>
                    <td class="center-align">{{$figura->descripcion}}</td>
                    <td class="center-align">
                        <a href="{{ route('figuras.edit', $figura->id) }}" class="btn-floating btn-small waves-effect waves-light green tooltipped" data-position="left" data-tooltip="Editar "><i class="material-icons">edit</i></a>
                    </td>
                    <td class="center-align">
                    <form action="{{ route('figuras.destroy', $figura->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                        <button type="submit" href="{{ route('figuras.destroy', $figura->id) }}" class="btn-floating btn-small waves-effect waves-light red tooltipped" data-position="right" data-tooltip="Eliminar"><i class="material-icons">delete</i></button>
                    </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
    </div>
    <div style="margin-top:20px " class="col s12  center-align">
        <a href="{{route ('figuras.create') }}" class="waves-effect waves-light btn green hoverable pulse"><i class="material-icons right">add</i>Crear nueva figura geométrica</a>
    </div>
</div>


@endsection