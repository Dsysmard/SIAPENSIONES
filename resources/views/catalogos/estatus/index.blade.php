@extends('layouts.menu')

@section('content')
<div class="container-fluid">
<div class="big-padding text-center blue-grey white-text section-padding">
<h1>ADMINISTRADOR DE ESTATUS DE TRABAJADORES / EMPLEADOS</h1><hr/>
</div>
  <div class="row jumbotron big-padding text-center blue-grey">
    {!! Form::open(['route' => 'estatus/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
          <div class="form-group">
            <label for="exampleInputName2">Buscar</label>
            <input type="text" class="form-control" name = "motivo_baja" placeholder='Ingresa dato para buscar'>
          </div>
          <button type="submit" class="btn btn-primary">Buscar</button>
        <a href="{{ route('estatus.index') }}" class="btn btn-info">Mostrar Todos</a>
         <a href="{{ route('estatus.create') }}" class="btn btn-success">Crear</a>
        {!! Form::close() !!}
  <br>
    <table class="table table-condensed table-striped table-bordered ">
            <thead class="nav nav-tabs white-text">
                <tr>
                  <th>ID</th>
                  <th>ESTATUS</th>
                  <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="jumbotron">
                @foreach($estatus as $estatuses)
                <tr>
                    <td>{{ $estatuses->id }}</td>
                    <td>{{ $estatuses->estatus }}</td>
                    <td>
                         <a class="btn btn-primary " href="{{ url('catalogos/estatus/' .$estatus->id .'/edit')}}" >Editar</a>
                         <a class="btn btn-danger " href="{{ route('estatus/destroy',['id' => $estatus->id] )}}" >Eliminar</a> 
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
</div>
<div class="floating">
    <a href="{{route('bajas.create')}}" class="btn btn-primary btn-fab">
      <i class="material-icons">add</i>
    </a>
  </div>
@endsection