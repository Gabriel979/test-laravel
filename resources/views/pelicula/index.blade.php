@extends('layouts.admin')
	@include('alerts.success')
		@section('content')
		  	<table class="table">
		  		<thead>
		  			<th>Nombre</th>
		  			<th>Género</th>
		  			<th>Dirección</th>
		  			<th>Duración</th>
		  			<th>Carátula</th>
		  			<th>Operaciones</th>
		  		</thead>
		  		@foreach($movies as $movie)
		  			<tbody>
		  				<td>{{$movie->name}}</td>
		  				<td>{{$movie->genre}}</td>
		  				<td>{{$movie->direction}}</td>
		  				<td>{{$movie->duration}}</td>
		  				<td><img src="movies/{{$movie->path}}" style="width: 100px;" ></td>
		  				<td>{!! link_to_route('pelicula.edit', $title ='Editar', $parameters = $movie->id, $attributes =['class'=>'btn btn-primary']) !!}</td>
		  			</tbody>
		  		@endforeach


		  	</table>
		 @endsection	