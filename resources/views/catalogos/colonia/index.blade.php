@extends('layouts.menu')

@section('content')
<div class="container-fluid">
<div class="big-padding text-center blue-grey white-text section-padding">
<h1>ADMINISTRADOR DE CATALOGO DE COLONIAS</h1><hr/>
</div>
  <div class="row jumbotron big-padding text-center blue-grey">
    {!! Form::open(['route' => 'colonia/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
          <div class="form-group">
            <label for="exampleInputName2">Buscar</label>
            <input type="text" class="form-control" name = "colonia" placeholder='Ingresa dato para buscar'>
          </div>
          <button type="submit" class="btn btn-primary">Buscar</button>
        <a href="{{ route('colonia.index') }}" class="btn btn-info">Mostrar Todos</a>
         <a href="{{ route('colonia.create') }}" class="btn btn-success">Crear</a>
        {!! Form::close() !!}
  <br>
    <table class="table table-condensed table-striped table-bordered ">
            <thead class="nav nav-tabs white-text">
                <tr>
                  <th>ID</th>
                  <th>COLONIA RESPONSABLE   </th>
                  <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="jumbotron">
                @foreach($colonia as $colonias)
                <tr>
                    <td>{{ $colonias->id }}</td>
                    <td>{{ $colonias->colonia }}</td>
                    <td>
                         <a class="btn btn-primary " href="{{ url('catalogos/colonia/' .$colonias->id .'/edit')}}" >Editar</a>
                         <a class="btn btn-danger " href="{{ route('colonia/destroy',['id' => $colonias->id] )}}" >Eliminar</a> 
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
</div>
<div class="floating">
    <a href="{{route('colonia.create')}}" class="btn btn-primary btn-fab">
      <i class="material-icons">add</i>
    </a>
  </div>
@endsection