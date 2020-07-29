@extends('layouts.menu')

@section('content')
<div class="container-fluid">
<div class="big-padding text-center blue-grey white-text section-padding">
<h1>EDITOR DE CATALOGOS DE EMPLEADOS</h1><hr/>
</div>
  <div class="row jumbotron" style="padding-top: 20px;border-top-width: 20px;margin-top: 30px;">
    <div class="col-md-10 col-md-offset-1"style="margin: 2% 50px 75px 100px;">
      {!! Form::model($empleado, ['method' => 'PATCH', 'action' => ['EmpleadosController@update', $empleado->id]]) !!}
            
        {!! Form::hidden('id', $empleado->id) !!}

        <div class="form-group col-md-6">
          {!! Form::label('CLAVE:', 'CLAVE:') !!}
          {!! Form::text('clave', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group col-md-6">
          {!! Form::label('RFC:', 'RFC:') !!}
          {!! Form::text('rfc', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group col-md-6">
          {!! Form::label('CURP:', 'CURP:') !!}
          {!! Form::text('curp', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group col-md-6">
          {!! Form::label('APELLIDO PATERNO:', 'APELLIDO PATERNO:') !!}
          {!! Form::text('ap_paterno', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group col-md-6">
          {!! Form::label('APELLIDO MATERNO:', 'APELLIDO MATERNO:') !!}
          {!! Form::text('ap_materno', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group col-md-6">
          {!! Form::label('NOMBRE:', 'NOMBRE:') !!}
          {!! Form::text('nombre', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group col-md-6">
          {!! Form::label('ESTADO CIVIL:', 'ESTADO CIVIL:') !!}
          <select class="form-control" id="edo_civil" name="edo_civil" >
              @foreach($ecivil as $civil)
              <option>{{$civil->edo_civil}}</option>
              @endforeach
          </select>
      </div>
      
      <div class="form-group col-md-6">
          {!! Form::label('ESTATUS:', 'ESTATUS:') !!}
          <select class="form-control" id="estatus" name="estatus" >
              @foreach($estatus as $status)
              <option>{{$status->estatus}}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group col-md-6">
          {!! Form::label('ENTIDAD:', 'ENTIDAD:') !!}
          <select class="form-control" id="entidad" name="entidad" >
              @foreach($entidad as $entidades)
              <option>{{$entidades->entidad}}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group col-md-6">
          {!! Form::label('TIPO DE NOMINA:', 'TIPO DE NOMINA:') !!}
          {!! Form::text('tip_nom', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group col-md-6">
          {!! Form::label('ESTADO RESPONSABLE:', 'ESTADO RESPONSABLE:') !!}
          <select class="form-control" id="edo_res" name="edo_res" >
              @foreach($estado as $estados)
              <option>{{$estados->edo_res}}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group col-md-6">
          {!! Form::label('MUNICIPIO RESPONSABLE:', 'MUNICIPIO RESPONSABLE:') !!}
          <select class="form-control" id="mun_res" name="mun_res" >
              @foreach($municipio as $municipios)
              <option>{{$municipios->mun_res}}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group col-md-6">
          {!! Form::label('LOCALIDAD RESPONSABLE:', 'LOCALIDAD RESPONSABLE:') !!}
          <select class="form-control" id="loc_res" name="loc_res" >
              @foreach($localidad as $localidades)
              <option>{{$localidades->loc_res}}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group col-md-6">
          {!! Form::label('COLONIA:', 'COLONIA:') !!}
          <select class="form-control" id="colonia" name="colonia" >
              @foreach($colonia as $colonias)
              <option>{{$colonias->colonia}}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group col-md-6">
          {!! Form::label('NUMERO DE CALLE:', 'NUMERO DE CALLE:') !!}
          {!! Form::text('num_calle', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group col-md-6">
          {!! Form::label('FECHA ALTA:', 'FECHA ALTA:') !!}
          {!! Form::text('fecha_alta', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>
 
      <div class="form-group col-md-6">
          {!! Form::label('FECHA MODIFICACION:', 'FECHA MODIFICACION:') !!}
          {!! Form::text('fecha_modificacion', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group col-md-6">
          {!! Form::label('FECHA BAJA:', 'FECHA BAJA:') !!}
          {!! Form::text('fecha_baja', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group col-md-6">
          {!! Form::label('MOTIVO DE BAJA:', 'MOTIVO DE BAJA:') !!}
          <select class="form-control" id="motivo_baja" name="motivo_baja" >
              @foreach($baja as $bajas)
              <option>{{$bajas->motivo_baja}}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group col-md-12">
          {!! Form::label('OBSERVACIONES:', 'OBSERVACIONES:') !!}
          {!! Form::text('observaciones', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

    <div class="form-group col-md-12">
            {!! Form::submit('Enviar', ['class' => 'btn btn-success ' ] ) !!}
    </div>
            {!! Form::close() !!}
    </div>
  </div>
</div>
<script type="text/javascript">  
        $('.date').datepicker({  
           format: 'mm-dd-yyyy',
           language: "es"
         });  
    </script> 
@endsection