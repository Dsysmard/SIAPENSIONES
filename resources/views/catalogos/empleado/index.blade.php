@extends('layouts.menu')

@section('content')
<div class="container-fluid">
<div class="big-padding text-center blue-grey white-text section-padding">
<h1>ADMINISTRADOR DE CATALOGO DE EMPLEADOS</h1><hr/>
</div>
  <div class="row jumbotron big-padding text-center blue-grey">
    {!! Form::open(['route' => 'empleado/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
          <div class="form-group">
            <label for="exampleInputName2">Buscar</label>
            <input type="text" class="form-control" name = "clave" placeholder='Ingresa dato para buscar'>
          </div>
          <button type="submit" class="btn btn-primary">Buscar</button>
        <a href="{{ route('empleado.index') }}" class="btn btn-info">Mostrar Todos</a>
         <a href="{{ route('empleado.create') }}" class="btn btn-success">Crear</a>
        {!! Form::close() !!}
  <br>
    <table class="table table-condensed table-striped table-bordered ">
            <thead class="nav nav-tabs white-text">
                <tr>
                  <th>ID</th>
                  <th>CLAVE</th>
                  <th>RFC</th>
                  <th>AP. PATERNO</th>
                  <th>AP. MATERNO</th>
                  <th>NOMBRE</th>
                  <th>EDO. CIVIL</th>
                  <th>ESTATUS</th>
                  <th>ENTIDAD</th>
                  <th>TIP. NOM.</th>
                  <th>EDO. RES.</th>
                  <th>NUM. RES.</th>
                  <th>LOC. RES.</th>
                  <th>COLONIA</th>
                  <th>NUM. CALLE</th>
                  <th>FECHA ALTA</th>
                  <th>FECHA MODIFICACION</th>
                  <th>FECHA BAJA</th>
                  <th>MOTIVO BAJA</th>
                  <th>OBSERVACIONES</th>
                  <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="jumbotron">
                @foreach($empleado as $empleados)
                <tr>
                    <td>{{ $empleados->clave }}</td>
                    <td>{{ $empleados->rfc }}</td>
                    <td>{{ $empleados->curp }}</td>
                    <td>{{ $empleados->ap_paterno }}</td>
                    <td>{{ $empleados->ap_materno }}</td>
                    <td>{{ $empleados->nombre }}</td>
                    <td>{{ $empleados->edo_civil }}</td>
                    <td>{{ $empleados->estatus }}</td>
                    <td>{{ $empleados->entidad }}</td>
                    <td>{{ $empleados->tip_nom }}</td>
                    <td>{{ $empleados->edo_res }}</td>
                    <td>{{ $empleados->mun_res }}</td>
                    <td>{{ $empleados->loc_res }}</td>
                    <td>{{ $empleados->colonia }}</td>
                    <td>{{ $empleados->num_calle }}</td>
                    <td>{{ $empleados->fecha_alta }}</td>
                    <td>{{ $empleados->fecha_modificacion }}</td>
                    <td>{{ $empleados->fecha_baja }}</td>
                    <td>{{ $empleados->motivo_baja }}</td>
                    <td>{{ $empleados->observaciones }}</td>
                    <td>
                         <a class="btn btn-primary " href="{{ url('catalogos/empleado/' .$empleados->id .'/edit')}}" >Editar</a>
                         <a class="btn btn-danger " href="{{ route('empleado/destroy',['id' => $empleados->id] )}}" >Eliminar</a> 
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
</div>
<div class="floating">
    <a href="{{route('empleado.create')}}" class="btn btn-primary btn-fab">
      <i class="material-icons">add</i>
    </a>
  </div>
@endsection