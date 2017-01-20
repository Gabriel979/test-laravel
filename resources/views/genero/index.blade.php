@extends('layouts.admin')

	@include('genero.modal')
	
	@section('content')

		<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display: none;" ><button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>¡Genero actualizado correctamente!</strong>
		</div>
		<div id="msj-del-success" class="alert alert-success alert-dismissible" role="alert" style="display: none;" ><button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>¡Genero eliminado correctamente!</strong>
		</div>
		<div id="msj-error" class="alert alert-danger alert-dismissible" role="alert" style="display: none;" ><button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>¡No se puede eliminar este genero, ya que se encuentra en uso!</strong>
		</div>

		<div class="genres" >
			<table class="table">
				<thead>
					<th>Nombre</th>
					<th>Operaciones</th>
				</thead>
				<tbody id="datos">
				</tbody>
			</table>
		</div>
		<input id="current-page" type="hidden" value="1"/> 
			{{ $genres->links() }}
	@endsection


	@section('scripts')
		{!!Html::script('js/script2.js')!!}
		{!!Html::script('js/pagination-genre.js')!!}
	@endsection

	