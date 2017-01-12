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
				@foreach($genres as $genre)
					<tbody id="datos">
						<td>{{$genre->genre}}</td>
						<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="Mostrar(this);" value="{{$genre->id}}" >
						  Editar
						</button>
						&nbsp;
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" onclick="Eliminar(this);" value="{{$genre->id}}" >
						  Eliminar
						</button></td>
						
					</tbody>
				@endforeach
			</table>
		</div>
		{{ $genres->links() }}
	@endsection


	@section('scripts')
		{!!Html::script('js/script2.js')!!}
	@endsection

	@section('scripts')
		{!!Html::script('js/pagination-genre.js')!!}
	@endsection