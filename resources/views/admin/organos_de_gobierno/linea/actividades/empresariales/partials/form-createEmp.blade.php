<div class="form-row">
	
	<div class="col-md-3 col-sm-6 my-3">
		<div class="form-group">
			{{ Form::label('Nombre:', null, ['class' => 'control-label']) }}
			{{ Form::text('nombre', null, array_merge(['class' => 'form-control'], 
														['placeholder'=>'Ingrese Nombres'], 
														['tabindex'=>'1'])) }}
			@error('nombre')
				<small class="text-danger">{{$message}}</small>
			@enderror
		</div>
	</div>

	<div class="col-md-4 col-sm-8 my-3">
		<div class="form-group">
			{{ Form::label('Decripción:', null, ['class' => 'control-label']) }}
			{{ Form::textarea('descripcion', null, array_merge(['class' => 'form-control'], 
														['placeholder'=>'Ingrese una pequeña descripción',
														'cols'=>'20', 'rows'=>'2','tabindex'=>'2'])) }}
			@error('descripcion')
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