<div class="form-row">
	<div class="col-md-3 col-sm-6 my-3">
		<div class="form-group">
			{{ Form::label('Tipo de Instrumento:', null, ['class' => 'control-label']) }}
			{!! Form::select("tipo", $tiposInstrumentos, $instrumento->tipo_instrumento_id, ['class' => 'js-example-basic-single form-control',
													'placeholder'=>'Seleccionar...','tabindex'=>'1']) !!}
			@error('tipo')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div> 
	<div class="col-md-3 col-sm-6 my-3">
		<div class="form-group">
			{{ Form::label('Fecha:', null, ['class' => 'control-label']) }}
			{{ Form::date('fecha',date("Y-m-d", strtotime($modificatoria->fecha)) , array_merge(['class' => 'form-control'], 
														['tabindex'=>'2'])) }}
			{{ Form::hidden('bdr','2') }}
			@error('fecha')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>
	
	<div class="col-md-3 col-sm-6 my-3">
		<div class="form-group">
			{{ Form::label('filePath', 'Archivo (pdf) * ') }}
    		{{ Form::file('filePath', ['id' => 'filePath', 'accept' => 'application/pdf', 'required']) }}
			@error('filePath')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div> 
</div>
<hr>
<div class="form-group">
	{{ Form::button('<i class="fa fa-save"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
    <a href="{{ route('instrumento_de_gestion.index') }}" class="btn btn-danger">
        <i class="fas fa-fw fa-arrow-left"></i>
        Retornar
    </a>
</div>