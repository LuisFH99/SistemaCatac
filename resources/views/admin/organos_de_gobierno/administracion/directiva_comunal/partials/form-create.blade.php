<div class="form-row">
	<div class="col-md-3 col-sm-5">
		<div class="form-group">
			{{ Form::label('DNI:', null, ['class' => 'control-label']) }}
			{!! Form::select("DNI", $personas, null, ['class' => 'js-example-basic-single form-control',
													'placeholder'=>'Seleccionar...','tabindex'=>'1']) !!}
			@error('DNI')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div> 
	
	<div class="col-md-2 col-sm-4">
		<div class="form-group">
			{{ Form::label('Fecha Inicio:', null, ['class' => 'control-label']) }}
			{{ Form::date('fech_inicio', null, array_merge(['class' => 'form-control'], 
														['tabindex'=>'2'])) }}
			@error('fech_inicio')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>
	
	<div class="col-md-2 col-sm-4">
		<div class="form-group">
			{{ Form::label('Fecha Fin:', null, ['class' => 'control-label']) }}
			{{ Form::date('fech_fin', null, array_merge(['class' => 'form-control'], 
														['tabindex'=>'3'])) }}
			@error('fech_fin')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>

	<div class="col-md-3 col-sm-6">
		<div class="form-group">
			{{ Form::label('Cargo:', null, ['class' => 'control-label']) }}
			<div class="d-flex">
				{!! Form::select("cargo", $cargos, null, ['class' => 'js-example-basic-single form-control',
													'placeholder'=>'Seleccionar...','tabindex'=>'1']) !!}
				<button type="button" class="btn btn-outline-success btn-sm mr-2" onclick="activar()" id="btnLock"><i class="fas fa-plus"></i></button>
			</div>
			@error('cargo')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>
	
	<div class="col-md-2 col-sm-5">
		<div class="form-group">
			{{ Form::label('Profesión:', null, ['class' => 'control-label']) }}
			{{ Form::text('profesion', null, array_merge(['class' => 'form-control'], 
														['placeholder'=>'Ingrese Profesión'], 
														['tabindex'=>'6'])) }}
			@error('profesion')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>

	<div class="col-md-4 col-sm-8 my-3">
		<div class="form-group">
			{{ Form::label('Decripción:', null, ['class' => 'control-label']) }}
			{{ Form::textarea('perfil', null, array_merge(['class' => 'form-control'], 
														['placeholder'=>'Ingrese una pequeña descripción del perfil',
														'cols'=>'20', 'rows'=>'2','tabindex'=>'5'])) }}
			@error('perfil')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>

	<div class="col-md-3 col-sm-5 my-3">
		<div class="form-group">
			{{ Form::label('path', 'Foto (jpg, jpeg, png) * ') }}
			{{ Form::file('path', ['id' => 'path', 'accept' => 'image/jpg,image/jpeg,image/png', 'required' => '']) }}
			@error('path')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div> 
	<div class="col-md-2 col-sm-3 my-3 align-items-center justify-content-center">
		<div class="form-group justify-content-center align-items-center">
			<img src="" class="img-fluid img-thumbnail mb-2 text-center" id="imagePreview"  width="150px" alt="Imagen del Perfil">
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
    <a href="{{ route('directiva_comunal.index') }}" class="btn btn-danger">
        <i class="fas fa-fw fa-arrow-left"></i>
        Retornar
    </a>
</div>