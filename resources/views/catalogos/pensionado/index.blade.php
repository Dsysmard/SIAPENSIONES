@extends('layouts.menu')

@section('content')
<div class="container-fluid">
<div class="big-padding text-center blue-grey white-text section-padding">
<h1>ADMINISTRADOR DE CATALOGO DE PENSIONADOS</h1><hr/>
</div>
  <div class="row jumbotron big-padding text-center blue-grey">
    {!! Form::open(['route' => 'pensionado/search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
          <div class="form-group">
            <label for="exampleInputName2">Buscar</label>
            <input type="text" class="form-control" name = "clave" placeholder='Ingresa dato para buscar'>
          </div>
          <button type="submit" class="btn btn-primary">Buscar</button>
        <a href="{{ route('pensionado.index') }}" class="btn btn-info">Mostrar Todos</a>
         <a href="{{ route('pensionado.create') }}" class="btn btn-success">Crear</a>
        {!! Form::close() !!}
  <br>
    <table class="table table-condensed table-striped table-bordered ">
            <thead class="nav nav-tabs white-text">
                <tr>
                  <th>ID</th>
                  <th>CLAVE</th>
                  <th>RFC</th>
                  <th>CURP</th>
                  <th>AP. PATERNO</th>
                  <th>AP. MATERNO</th>
                  <th>NOMBRE</th>
                  <th>EDO. CIVIL</th>
                  <th>ESTATUS</th>
                  <th>TIP. NOM.</th>
                  <th>EDO. RES.</th>
                  <th>NUM. RES.</th>
                  <th>LOC. RES.</th>
                  <th>COLONIA</th>
                  <th>NUM. CALLE</th>
                  <th>FECHA FINAL LABORADA</th>
                  <th>FECHA MODIFICACION</th>
                  <th>FECHA BAJA</th>
                  <th>MODO PENSION</th>
                  <th>OBSERVACIONES</th>
                  <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="jumbotron">
                @foreach($pensionado as $pensionados)
                <tr>
                    <td>{{ $pensionados->id }}</td>
                    <td>{{ $pensionados->clave }}</td>
                    <td>{{ $pensionados->rfc }}</td>
                    <td>{{ $pensionados->curp }}</td>
                    <td>{{ $pensionados->ap_paterno }}</td>
                    <td>{{ $pensionados->ap_meterno }}</td>
                    <td>{{ $pensionados->nombre }}</td>
                    <td>{{ $pensionados->edo_civil }}</td>
                    <td>{{ $pensionados->estatus }}</td>
                    <td>{{ $pensionados->tip_nom }}</td>
                    <td>{{ $pensionados->edo_res }}</td>
                    <td>{{ $pensionados->Mun_res }}</td>
                    <td>{{ $pensionados->loc_res }}</td>
                    <td>{{ $pensionados->colonia }}</td>
                    <td>{{ $pensionados->calle_num }}</td>
                    <td>{{ $pensionados->Fecha_final_lab }}</td>
                    <td>{{ $pensionados->fecha_modificacion }}</td>
                    <td>{{ $pensionados->fecha_baja }}</td>
                    <td>{{ $pensionados->modo_pension }}</td>
                    <td>{{ $pensionados->observaciones }}</td>
                    <td>
                         <a class="btn btn-primary " href="{{ url('catalogos/pensionado/' .$pensionados->id .'/edit')}}" >Editar</a>
                         <a class="btn btn-danger " href="{{ route('pensionado/destroy',['id' => $pensionados->id] )}}" >Eliminar</a> 
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
</div>
<div class="floating">
    <a href="{{route('pensionado.create')}}" class="btn btn-primary btn-fab">
      <i class="material-icons">add</i>
    </a>
  </div>
@endsection