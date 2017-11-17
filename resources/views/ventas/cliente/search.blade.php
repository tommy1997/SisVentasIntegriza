{!!Form::open(array('url'=>'ventas/cliente','method'=>'get','role'=>'search'))!!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" class="form-control" name="searchText" placeholder="Nombre....">

			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary">Buscar</button>
			</span>
		</div>
	</div>
{!!Form::close()!!}