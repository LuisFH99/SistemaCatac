<div class="form-row">
	<div class="col-md-3 col-sm-6">
		<div class="form-group">
			{{ Form::label('DNI:', null, ['class' => 'control-label']) }}
			{{ Form::text('DNI', $comunero->DNI, array_merge(['class' => 'form-control'], 
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
			{{ Form::text('apell_pat', $comunero->apell_pat, array_merge(['class' => 'form-control'], 
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
			{{ Form::text('apell_mat', $comunero->apell_mat, array_merge(['class' => 'form-control'], 
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
			{{ Form::text('nombre', $comunero->nombre, array_merge(['class' => 'form-control'], 
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
			{{ Form::text('telefono', $comunero->telefono, array_merge(['class' => 'form-control'], 
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
			{{ Form::email('email', $comunero->email, array_merge(['class' => 'form-control'], 
														['placeholder'=>'correo@ejemplo.com','tabindex'=>'6'])) }}
		
			@error('email')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>
	<div class="col-md-2 col-sm-5 my-3">
		<div class="form-group">
			{{ Form::label('Código:', null, ['class' => 'control-label']) }}
			{{ Form::text('codigo', $comunero->codigo, array_merge(['class' => 'form-control'], 
													['placeholder'=>'Ingrese el Código',
													'maxlength'=>'15',
													'tabindex'=>'6'])) }}
			@error('codigo')
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
</div>
<hr>
<div class="form-group">
	{{ Form::button('<i class="fa fa-save"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
    <a href="{{ route('asamblea_general.index') }}" class="btn btn-danger">
        <i class="fas fa-fw fa-arrow-left"></i>
        Retornar
    </a>
</div>