@extends('layouts.menu')

@section('content')
<div class="container-fluid">
<div class="big-padding text-center blue-grey white-text section-padding">
<h1>EDITOR DE CATALOGOS DE MODALIDAD DE PENSIONES</h1><hr/>
</div>
  <div class="row jumbotron" style="padding-top: 20px;border-top-width: 20px;margin-top: 30px;">
    <div class="col-md-10 col-md-offset-1"style="margin: 2% 50px 75px 100px;">
      {!! Form::model($pension, ['method' => 'PATCH', 'action' => ['PensionController@update', $pension->id]]) !!}
            
                {!! Form::hidden('id', $pension->id) !!}

                <div class="form-group">
                      {!! Form::label('DESCRIPCION DE LA MODALIDAD DE PENSION:', 'DESCRIPCION DE LA MODALIDAD DE PENSION:') !!}
                      {!! Form::text('descripcion', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'INGRESAR LA DESCRIPCION DE LA MODALIDAD DE PENSION']) !!}
                  </div>

                  <div class="form-group">
                      {!! Form::label('CLAVE DE LA MODALIDAD DE PENSION:', 'CLAVE DE LA MODALIDAD DE PENSION:') !!}
                      {!! Form::text('clave', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'INGRESAR LA CLAVE DE LA MODALIDAD DE PENSION']) !!}
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