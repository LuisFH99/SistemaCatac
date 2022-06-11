<div class="form-row">
	<div class="col-md-3 col-sm-6">
		<div class="form-group">
			{{ Form::label('DNI:', null, ['class' => 'control-label']) }}
			{{ Form::text('DNI', $funcionario->DNI, array_merge(['class' => 'form-control'], 
													['placeholder'=>'Ingrese el N° DNI',
													'maxlength'=>'8',
													'onkeypress'=>'return SoloNumeros(event)',
													'tabindex'=>'1'])) }}
			@error('DNI')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div> 
	
	<div class="col-md-3 col-sm-6">
		<div class="form-group">
			{{ Form::label('Apellido Paterno:', null, ['class' => 'control-label']) }}
			{{ Form::text('apell_pat', $funcionario->apell_pat, array_merge(['class' => 'form-control'], 
															['placeholder'=>'Ingrese Apellido Paterno'], 
															['tabindex'=>'2'])) }}
			@error('apell_pat')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>
	
	<div class="col-md-3 col-sm-6">
		<div class="form-group">
			{{ Form::label('Apellido Materno:', null, ['class' => 'control-label']) }}
			{{ Form::text('apell_mat', $funcionario->apell_mat, array_merge(['class' => 'form-control'], 
														['placeholder'=>'Ingrese Apellido Materno'], 
														['tabindex'=>'3'])) }}
			@error('apell_mat')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>
	
	<div class="col-md-3 col-sm-6">
		<div class="form-group">
			{{ Form::label('Nombres:', null, ['class' => 'control-label']) }}
			{{ Form::text('nombre', $funcionario->nombre, array_merge(['class' => 'form-control'], 
														['placeholder'=>'Ingrese Nombres'], 
														['tabindex'=>'4'])) }}
			@error('nombre')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>
	
	<div class="col-md-3 col-sm-6 my-3">
		<div class="form-group">
			{{ Form::label('Celular:', null, ['class' => 'control-label']) }}
			{{ Form::text('telefono', $funcionario->telefono, array_merge(['class' => 'form-control'], 
														['placeholder'=>'Ingrese el N° Celular','maxlength'=>'9',
														'onkeypress'=>'return SoloNumeros(event)','tabindex'=>'5'])) }}
			@error('telefono')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>
	<div class="col-md-2 col-sm-5 my-3">
		<div class="form-group">
			{{ Form::label('Correo:', null, ['class' => 'control-label']) }}
			{{ Form::email('email', $funcionario->email, array_merge(['class' => 'form-control'], 
														['placeholder'=>'correo@ejemplo.com','tabindex'=>'6'])) }}
		
			@error('email')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>
	<div class="col-md-2 col-sm-4 my-3">
		<div class="form-group">
			{{ Form::label('Fecha Inicio:', null, ['class' => 'control-label']) }}
			{{ Form::date('fech_inicio', $funcionario->fech_inicio, array_merge(['class' => 'form-control'], 
														['tabindex'=>'2'])) }}
			@error('fech_inicio')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>
	
	<div class="col-md-2 col-sm-4 my-3">
		<div class="form-group">
			{{ Form::label('Fecha Fin:', null, ['class' => 'control-label']) }}
			{{ Form::date('fech_fin', $funcionario->fech_fin --, array_merge(['class' => 'form-control'], 
														['tabindex'=>'3'])) }}
			@error('fech_fin')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>

	<div class="col-md-3 col-sm-6 my-3">
		<div class="form-group">
			{{ Form::label('Cargo:', null, ['class' => 'control-label']) }}
			<div class="d-flex">
				{!! Form::select("cargo", $cargos, $funcionario->cargo, ['class' => 'js-example-basic-single form-control',
													'placeholder'=>'Seleccionar...','tabindex'=>'1']) !!}
				<button type="button" class="btn btn-outline-success btn-sm mr-2" onclick="activar()" id="btnLock"><i class="fas fa-plus"></i></button>
			</div>
			@error('cargo')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>

	<div class="col-md-2 col-sm-5 my-3">
		<div class="form-group">
			{{ Form::label('Profesión:', null, ['class' => 'control-label']) }}
			{{ Form::text('profesion', $funcionario->posicion, array_merge(['class' => 'form-control'], 
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
			{{ Form::textarea('perfil', $funcionario->perfil, array_merge(['class' => 'form-control'], 
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
			<img src="{{ '/'.$funcionario->url_imagen }}" class="img-fluid img-thumbnail mb-2 text-center" id="imagePreview"  width="150px" alt="Imagen del Perfil">
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
    <a href="{{ route('empresarial.index') }}" class="btn btn-danger">
        <i class="fas fa-fw fa-arrow-left"></i>
        Retornar
    </a>
</div>