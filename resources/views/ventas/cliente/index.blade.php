@extends('layouts.admin')
@section('contenido')

<div class="container">
<div class="row">
	<div class="col-md-12">
		<h3>Administración de clientes <a href="cliente/create"> <button class="btn btn-success ">Nuevo</button> </h3></a>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		@include('ventas.cliente.search')
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
								<th>Tipo De Documento</th>
								<th>Numero De Documento</th>
								<th>Dirección</th>
								<th>Telefono</th>
								<th>Email</th>
							</thead>

							@foreach ($persona as $per)
							<tr>
								<td> {{ $per->idpersona}} </td>
								<td> {{ $per->nombre}} </td>
								<td> {{ $per->tipo_documento}} </td>
								<td> {{ $per->num_documento}} </td>
								<td> {{ $per->direccion}} </td>
								<td> {{ $per->telefono}} </td>
								<td> {{ $per->email}} </td>
								<td> 
									<a href="{{URL::action('PersonaController@edit', $per->idpersona)}}">
										<button class="btn btn-primary" >Editar</button>
									</a>
									<a href="" data-target="#modal-delete-{{$per->idpersona}}" data-toggle="modal"> 
										<button class="btn btn-danger">Eliminar</button>
									</a>
							</td>
							</tr>
							@include('ventas.cliente.modal')
							@endforeach

						</table>
					</div>
					{{--crea fichas con las paginas de registro--}}
					{{$persona->render()}}
				</div>
				
			

	</div>

	
</div>
</div>
@endsection
