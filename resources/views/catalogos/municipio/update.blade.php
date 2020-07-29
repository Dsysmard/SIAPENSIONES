@extends('layouts.menu')

@section('content')
<div class="container-fluid">
<div class="big-padding text-center blue-grey white-text section-padding">
<h1>EDITOR DE CATALOGOS DE MUNICIPIOS RESPONSABLES</h1><hr/>
</div>
  <div class="row jumbotron" style="padding-top: 20px;border-top-width: 20px;margin-top: 30px;">
    <div class="col-md-10 col-md-offset-1"style="margin: 2% 50px 75px 100px;">
      {!! Form::model($municipio, ['method' => 'PATCH', 'action' => ['MunicipiosController@update', $municipio->id]]) !!}
            
                {!! Form::hidden('id', $municipio->id) !!}

                  <div class="form-group">
                      {!! Form::label('MUNICIPIO RESPONSABLE:', 'MUNICIPIO RESPONSABLE:') !!}
                      {!! Form::text('mun_res', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'INGRESAR EL MUNICIPIO RESPONSABLE']) !!}
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