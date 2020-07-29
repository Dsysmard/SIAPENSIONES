@extends('layouts.menu')

@section('content')
<div class="container-fluid">
<div class="big-padding text-center blue-grey white-text section-padding">
<h1>ADMINISTRADOR DE CATALOGO DE ESTADO CIVIL</h1><hr/>
</div>
  <div class="row jumbotron big-padding text-center blue-grey">
    {!! Form::open(['route' => 'ecivil/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
          <div class="form-group">
            <label for="exampleInputName2">Buscar</label>
            <input type="text" class="form-control" name = "edo_civil" placeholder='Ingresa dato para buscar'>
          </div>
          <button type="submit" class="btn btn-primary">Buscar</button>
        <a href="{{ route('estadocivil.index') }}" class="btn btn-info">Mostrar Todos</a>
         <a href="{{ route('estadocivil.create') }}" class="btn btn-success">Crear</a>
        {!! Form::close() !!}
  <br>
    <table class="table table-condensed table-striped table-bordered ">
            <thead class="nav nav-tabs white-text">
                <tr>
                  <th>ID</th>
                  <th>Estado Civil</th>
                  <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="jumbotron">
                @foreach($ecivil as $civil)
                <tr>
                    <td>{{ $civil->id }}</td>
                    <td>{{ $civil->edo_civil }}</td>
                    <td>
                         <a class="btn btn-primary " href="{{ url('catalogos/estadocivil/' .$civil->id .'/edit')}}" >Editar</a>
                         <a class="btn btn-danger " href="{{ route('estadocivil/destroy',['id' => $civil->id] )}}" >Eliminar</a> 
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
</div>
<div class="floating">
    <a href="{{route('estadocivil.create')}}" class="btn btn-primary btn-fab">
      <i class="material-icons">add</i>
    </a>
  </div>
@endsection