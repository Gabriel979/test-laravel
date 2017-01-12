<div class="genres2" >
	<table class="table">
		<thead>
			<th>Generos disponibles</th>
			<th>Operación</th>
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