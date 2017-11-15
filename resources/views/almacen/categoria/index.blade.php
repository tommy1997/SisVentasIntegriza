@extends('layouts.admin')
@section('contenido')

<div class="container">
<div class="row">
	<div class="col-md-12">
		<h3>Administración de categorias <a href="categoria/create"> <button class="btn btn-success ">Nuevo</button> </h3></a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		@include('almacen.categoria.search')
	</div>
</div>
<div class="row">
	<div class="col-md-12">
				{{--recorriedo la tabla categoria--}}

				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-over">

							<thead>
								<th>Id</th>
								<th>Nombre</th>
								<th>Descripción</th>
								<th>Opciones</th>
							</thead>

							@foreach ($categoria as $cat)
							<tr>
								<td> {{ $cat->idcategoria}} </td>
								<td> {{ $cat->nombre}} </td>
								<td> {{ $cat->descripcion}} </td>
								<td> 
									<a href="{{URL::action('CategoriaController@edit', $cat->idcategoria)}}">
										<button class="btn btn-primary" >Editar</button>
									</a>
									<a href="" data-target="#modal-delete-{{$cat->idcategoria}}" data-toggle="modal"> 
										<button class="btn btn-danger">Eliminar</button>
									</a>
							</td>
							</tr>
							@include('almacen.categoria.modal')
							@endforeach

						</table>
					</div>
					{{--crea fichas con las paginas de registro--}}
					{{$categoria->render()}}
				</div>
				
			

	</div>

	
</div>
</div>
@endsection
