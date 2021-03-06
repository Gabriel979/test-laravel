@extends('layouts.admin')

	@section('content')

			<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display: none;" ><button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>¡Genero agregado correctamente!</strong>
			</div>

			<div id="msj-error" class="alert alert-danger alert-dismissible" role="alert" style="display: none;" ><button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong id="msj"></strong>
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}" id="token" />

			@include('genero.form.genero')

			{!!link_to('#', $title='Registrar', $attributes=['id'=>'registro', 'class'=>'btn btn-primary'], $secure=null)!!}
	@endsection


	@section('scripts')
		{!!Html::script('js/algo-script.js')!!}
	@endsection