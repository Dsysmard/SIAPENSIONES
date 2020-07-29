@extends('layouts.menu')

@section('content')
<div class="container-fluid">
<div class="big-padding text-center blue-grey white-text section-padding">
<h1>EDITOR DE CATALOGOS DE PENSIONADOS</h1><hr/>
</div>
  <div class="row jumbotron" style="padding-top: 20px;border-top-width: 20px;margin-top: 30px;">
    <div class="col-md-10 col-md-offset-1"style="margin: 2% 50px 75px 100px;">
      {!! Form::model($pensionado, ['method' => 'PATCH', 'action' => ['PensionadosController@update', $pensionado->id]]) !!}
            
        {!! Form::hidden('id', $pensionado->id) !!}

      <div class="form-group">
          {!! Form::label('CLAVE:', 'CLAVE:') !!}
          {!! Form::text('clave', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('RFC:', 'RFC:') !!}
          {!! Form::text('rfc', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('CURP:', 'CURP:') !!}
          {!! Form::text('curp', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('APELLIDO PATERNO:', 'APELLIDO PATERNO:') !!}
          {!! Form::text('ap_paterno', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('APELLIDO MATERNO:', 'APELLIDO MATERNO:') !!}
          {!! Form::text('ap_meterno', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('NOMBRE:', 'NOMBRE:') !!}
          {!! Form::text('nombre', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('ESTADO CIVIL:', 'ESTADO CIVIL:') !!}
          <select class="form-control" id="edo_civil" name="edo_civil" >
              @foreach($ecivil as $civil)
              <option>{{$civil->edo_civil}}</option>
              @endforeach
          </select>
      </div>
      
      <div class="form-group">
          {!! Form::label('ESTATUS:', 'ESTATUS:') !!}
          <select class="form-control" id="estatus" name="estatus" >
              @foreach($estatus as $status)
              <option>{{$status->estatus}}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group">
          {!! Form::label('TIPO DE NOMINA:', 'TIPO DE NOMINA:') !!}
          {!! Form::text('tip_nom', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('ESTADO RESPONSABLE:', 'ESTADO RESPONSABLE:') !!}
          <select class="form-control" id="edo_res" name="edo_res" >
              @foreach($estado as $estados)
              <option>{{$estados->edo_res}}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group">
          {!! Form::label('MUNICIPIO RESPONSABLE:', 'MUNICIPIO RESPONSABLE:') !!}
          <select class="form-control" id="mun_res" name="mun_res" >
              @foreach($municipio as $municipios)
              <option>{{$municipios->mun_res}}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group">
          {!! Form::label('LOCALIDAD RESPONSABLE:', 'LOCALIDAD RESPONSABLE:') !!}
          <select class="form-control" id="loc_res" name="loc_res" >
              @foreach($localidad as $localidades)
              <option>{{$localidades->loc_res}}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group">
          {!! Form::label('COLONIA:', 'COLONIA:') !!}
          <select class="form-control" id="colonia" name="colonia" >
              @foreach($colonia as $colonias)
              <option>{{$colonias->colonia}}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group">
          {!! Form::label('NUMERO DE CALLE:', 'NUMERO DE CALLE:') !!}
          {!! Form::text('calle_num', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('FECHA FINAL LABORADA:', 'FECHA FINAL LABORADA:') !!}
          {!! Form::text('Fecha_final_lab', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

     

      <div class="form-group">
          {!! Form::label('FECHA MODIFICACION:', 'FECHA MODIFICACION:') !!}
          {!! Form::text('fecha_modificacion', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('FECHA BAJA:', 'FECHA BAJA:') !!}
          {!! Form::text('fecha_baja', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('MODO DE PENSION:', 'MODO DE PENSION:') !!}
          <select class="form-control" id="modo_pension" name="modo_pension" >
              @foreach($pension as $modpension)
              <option>{{$modpension->descripcion}}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group">
          {!! Form::label('OBSERVACIONES:', 'OBSERVACIONES:') !!}
          {!! Form::text('observaciones', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      </div>

                <div class="form-group">
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