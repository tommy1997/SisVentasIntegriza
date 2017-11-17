
<div class="modal" role='dialog' tabindex="1" id="modal-delete-{{$per->idpersona}}" >
	
	{!!Form::Open(array('action'=>array('PersonaController@destroy',$per->idpersona),'method'=>'delete'))!!}

		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" arial-label="Close"><span aria-hidden="true">X</span>
				</div></button>
				<h4 class="modal-title">Eliminar Categoria: {{$per->nombre}}</h4>
			
			<div class="modal-body">
				<p>¿Esta seguro de eliminar la categoria?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>

				<button type="submit" class="btn btn-danger" >Elimnar</button>
			</div>
			</div>
		</div>
	{!!Form::close()!!}
	
</div>