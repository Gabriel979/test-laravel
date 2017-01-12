@extends('layouts.admin')

	@include('genero.modal')
	
	@section('content')

		<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display: none;" ><button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>¡Genero actualizado correctamente!</strong>
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
			{{ $genres->links() }}
	@endsection


	@section('scripts')
		{!!Html::script('js/script2.js')!!}
		{!!Html::script('js/pagination-genre.js')!!}
	@endsection

	