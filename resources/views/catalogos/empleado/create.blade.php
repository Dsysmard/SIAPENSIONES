@extends('layouts.menu')


@section('content')
<div class="container-fluid">
<div class="big-padding text-center blue-grey white-text section-padding">
<h1>REGISTRAR UN NUEVO EMPLEADO</h1><hr/>
</div>
	<div class="row jumbotron " style="padding-top: 20px;border-top-width: 20px;margin-top: 30px;">
		<div class="col-md-10 col-md-offset-1"style="margin: 2% 50px 75px 100px;">
            {!! Form::open(['route' => 'empleado.store', 'method' => 'post', 'novalidate']) !!}
            
            @if(count($errors))
			<div class="alert alert-danger">
				<strong>Whoops!</strong> Hubo algunos problemas al momento de guardar.
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

      <div class="form-group col-md-6 {{ $errors->has('clave') ? 'has-error' : '' }}">
          {!! Form::label('CLAVE:', 'CLAVE:') !!}
          {!! Form::text('clave', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
        <span class="text-danger">{{ $errors->first('clave') }}</span>
        </div>

      <div class="form-group col-md-6 {{ $errors->has('rfc') ? 'has-error' : '' }}">
          {!! Form::label('RFC:', 'RFC:') !!}
          {!! Form::text('rfc', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
          <span class="text-danger">{{ $errors->first('rfc') }}</span>
        </div>

      <div class="form-group col-md-6 {{ $errors->has('curp') ? 'has-error' : '' }}">
          {!! Form::label('CURP:', 'CURP:') !!}
          {!! Form::text('curp', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
          <span class="text-danger">{{ $errors->first('curp') }}</span>
        </div>

      <div class="form-group col-md-6 {{ $errors->has('ap_paterno') ? 'has-error' : '' }}">
          {!! Form::label('APELLIDO PATERNO:', 'APELLIDO PATERNO:') !!}
          {!! Form::text('ap_paterno', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      <span class="text-danger">{{ $errors->first('ap_paterno') }}</span>
        </div>

      <div class="form-group col-md-6 {{ $errors->has('ap_materno') ? 'has-error' : '' }}">
          {!! Form::label('APELLIDO MATERNO:', 'APELLIDO MATERNO:') !!}
          {!! Form::text('ap_materno', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      <span class="text-danger">{{ $errors->first('ap_materno') }}</span>
        </div>

      <div class="form-group col-md-6 {{ $errors->has('nombre') ? 'has-error' : '' }}">
          {!! Form::label('NOMBRE:', 'NOMBRE:') !!}
          {!! Form::text('nombre', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      <span class="text-danger">{{ $errors->first('nombre') }}</span>
        </div>

      <div class="form-group col-md-6">
          {!! Form::label('ESTADO CIVIL:', 'ESTADO CIVIL:') !!}
          <select class="form-control {{ $errors->has('edo_civil') ? 'has-error' : '' }}" id="edo_civil" name="edo_civil" >
              @foreach($ecivil as $civil)
              <option>{{$civil->edo_civil}}</option>
              @endforeach
          </select>
      <span class="text-danger">{{ $errors->first('edo_civil') }}</span>
        </div>
      
      <div class="form-group col-md-6">
          {!! Form::label('ESTATUS:', 'ESTATUS:') !!}
          <select class="form-control {{ $errors->has('estatus') ? 'has-error' : '' }}" id="estatus" name="estatus" >
              @foreach($estatus as $status)
              <option>{{$status->estatus}}</option>
              @endforeach
          </select>
      <span class="text-danger">{{ $errors->first('estatus') }}</span>
        </div>

      <div class="form-group col-md-6 ">
          {!! Form::label('ENTIDAD:', 'ENTIDAD:') !!}
          <select class="form-control {{ $errors->has('entidad') ? 'has-error' : '' }}" id="entidad" name="entidad" >
              @foreach($entidad as $entidades)
              <option>{{$entidades->entidad}}</option>
              @endforeach
          </select>
      <span class="text-danger">{{ $errors->first('entidad') }}</span>
        </div>

      <div class="form-group col-md-6 {{ $errors->has('tip_nom') ? 'has-error' : '' }}">
          {!! Form::label('TIPO DE NOMINA:', 'TIPO DE NOMINA:') !!}
          {!! Form::text('tip_nom', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      <span class="text-danger">{{ $errors->first('tip_nom') }}</span>
        </div>

      <div class="form-group col-md-6">
          {!! Form::label('ESTADO RESPONSABLE:', 'ESTADO RESPONSABLE:') !!}
          <select class="form-control {{ $errors->has('edo_res') ? 'has-error' : '' }}" id="edo_res" name="edo_res" >
              @foreach($estado as $estados)
              <option>{{$estados->edo_res}}</option>
              @endforeach
          </select>
      <span class="text-danger">{{ $errors->first('edo_res') }}</span>
        </div>

      <div class="form-group col-md-6">
          {!! Form::label('MUNICIPIO RESPONSABLE:', 'MUNICIPIO RESPONSABLE:') !!}
          <select class="form-control {{ $errors->has('mun_res') ? 'has-error' : '' }}" id="mun_res" name="mun_res" >
              @foreach($municipio as $municipios)
              <option>{{$municipios->mun_res}}</option>
              @endforeach
          </select>
      <span class="text-danger">{{ $errors->first('mun_res') }}</span>
        </div>

      <div class="form-group col-md-6">
          {!! Form::label('LOCALIDAD RESPONSABLE:', 'LOCALIDAD RESPONSABLE:') !!}
          <select class="form-control {{ $errors->has('loc_res') ? 'has-error' : '' }}" id="loc_res" name="loc_res" >
              @foreach($localidad as $localidades)
              <option>{{$localidades->loc_res}}</option>
              @endforeach
          </select>
      <span class="text-danger">{{ $errors->first('loc_res') }}</span>
        </div>

      <div class="form-group col-md-6">
          {!! Form::label('COLONIA:', 'COLONIA:') !!}
          <select class="form-control {{ $errors->has('colonia') ? 'has-error' : '' }}" id="colonia" name="colonia" >
              @foreach($colonia as $colonias)
              <option>{{$colonias->colonia}}</option>
              @endforeach
          </select>
      <span class="text-danger">{{ $errors->first('colonia') }}</span>
        </div>

      <div class="form-group col-md-6 {{ $errors->has('num_calle') ? 'has-error' : '' }}">
          {!! Form::label('NUMERO DE CALLE:', 'NUMERO DE CALLE:') !!}
          {!! Form::text('num_calle', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      <span class="text-danger">{{ $errors->first('num_calle') }}</span>
        </div>

      <div class="form-group col-md-6 fecha_alta">
          {!! Form::label('FECHA ALTA:', 'FECHA ALTA:') !!}
          {!! Form::text('fecha_alta', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      <span class="text-danger">{{ $errors->first('fecha_alta') }}</span>
        </div>
 
      <div class="form-group col-md-6 {{ $errors->has('fecha_modificacion') ? 'has-error' : '' }}">
          {!! Form::label('FECHA MODIFICACION:', 'FECHA MODIFICACION:') !!}
          {!! Form::text('fecha_modificacion', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      <span class="text-danger">{{ $errors->first('fecha_modificacion') }}</span>
        </div>

      <div class="form-group col-md-6 {{ $errors->has('fecha_baja') ? 'has-error' : '' }}">
          {!! Form::label('FECHA BAJA:', 'FECHA BAJA:') !!}
          {!! Form::text('fecha_baja', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      <span class="text-danger">{{ $errors->first('fecha_baja') }}</span>
        </div>

      <div class="form-group col-md-6">
          {!! Form::label('MOTIVO DE BAJA:', 'MOTIVO DE BAJA:') !!}
          <select class="form-control {{ $errors->has('motivo_baja') ? 'has-error' : '' }}" id="motivo_baja" name="motivo_baja" >
              @foreach($baja as $bajas)
              <option>{{$bajas->motivo_baja}}</option>
              @endforeach
          </select>
      <span class="text-danger">{{ $errors->first('motivo_baja') }}</span>
        </div>

      <div class="form-group col-md-12 {{ $errors->has('observaciones') ? 'has-error' : '' }}">
          {!! Form::label('OBSERVACIONES:', 'OBSERVACIONES:') !!}
          {!! Form::text('observaciones', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'']) !!}
      <span class="text-danger">{{ $errors->first('observaciones') }}</span>
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
           format: 'yyyy-mm-dd'
         });  
    </script> 
@endsection