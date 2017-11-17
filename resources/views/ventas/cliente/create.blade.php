@extends('layouts.admin')
@section('contenido')	
<div class="container">
<div class="row">
	<div class="col-md-6">
		@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all()as $error)

							<li>{{$error}}</li>
					@endforeach
				</ul>
				
			</div>
		@endif
	</div>
</div>

<div class="row">
	<h3>Guardar Cliente</h3>
	<div class="col-md-4">
	

{!!Form::open(array('url'=>'ventas/cliente','metod'=>'POST'))!!}

{{Form::token()}}

	<div class="form-group">
		<label>Nombre</label>
		<input type="text" name="nombre" class="form-control">

	</div>
	<div class="form-group">
		<label>Tipo De Documento</label>
		<input type="text" name="tipo_documento" class="form-control">
	</div>

	<div class="form-group">
		<label>Numero De Documento</label>
		<input type="text" name="num_documento" class="form-control">
	</div>

	<div class="form-group">
		<label>Dirección</label>
		<input type="text" name="direccion" class="form-control">
	</div>

	<div class="form-group">
		<label>Telefono</label>
		<input type="text" name="telefono" class="form-control">
	</div>

	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control">
	</div>
		
	<div class="form-group">
		<button type="submit" class="btn btn-success" >Guardar</button>
		<button title="reset" class="btn btn-warning" >Cancelar</button>
	</div>	
	

{!!Form::close()!!}
</div>
</div>
</div>
@endsection


