@extends('plantillas.layout')
@section('content')
<div class="row">
    <div class="col s12 center-align">
        <h4 class="align-center">LISTA DE SUBTIPOS</h4>
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
                    <th colspan="2" class="center-align">Acciones</th>
                </tr>
                </thead>

                <tbody >
                @foreach($subtipos as $subtipo)
                <tr>
                    <td class="center-align">{{$subtipo->nombre}}</td>
                    <td class="center-align">{{$subtipo->tipo}}</td>
                    <td class="center-align">
                        <a href="{{ route('subtipos.edit', $subtipo->id) }}" class="btn-floating btn-small waves-effect waves-light green tooltipped" data-position="left" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                    </td>
                    <td class="center-align">
                    <form action="{{ route('subtipos.destroy', $subtipo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                        <button type="submit" href="{{ route('subtipos.destroy', $subtipo->id) }}" class="btn-floating btn-small waves-effect waves-light red tooltipped" data-position="right" data-tooltip="Eliminar"><i class="material-icons">delete</i></button>
                    </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
    </div>
</div>


@endsection