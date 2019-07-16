<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Figuras geométricas</title>
</head>
<body>
<ul id="dropdown1" class="dropdown-content">
  <li><a href="{{route ('tipos.index',compact('respuesta')) }}">Lista de tipos</a></li>
  <li><a href="{{route ('tipos.create') }}">Crear tipo</a></li>
</ul>
<ul id="dropdown2" class="dropdown-content">
  <li><a href="{{route ('subtipos.index',compact('respuesta')) }}">Lista de Subtipos</a></li>
  <li><a href="{{route ('subtipos.create') }}">Crear Subtipo</a></li>
</ul>
<ul id="dropdown3" class="dropdown-content">
  <li><a href="{{route ('figuras.index',compact('respuesta')) }}">Lista de Figuras geométricas</a></li>
  <li><a href="{{route ('figuras.create') }}">Crear Figura Geométrica</a></li>
</ul>
<nav>
    <div class="nav-wrapper green">
      <a href="#" class="brand-logo">Prueba técnica | John Quintero</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown3">CRUD - Figuras geométricas<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">CRUD - Tipos Figuras<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">CRUD - Subtipos Figuras<i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
    </div>
  </nav>
        
@yield('content')
</body>

<script>
  $(document).ready(function(){
    M.AutoInit();
  });
 
</script>
</html>