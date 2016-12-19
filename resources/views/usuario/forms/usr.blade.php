	<div class="form-group">
		{!!Form::label('Nombre')!!}
		{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre del usuario'])!!}
	</div>

	<div class="form-group">
		{!!Form::label('Correo')!!}
		{!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingresa el email'])!!}
	</div>	

	<div class="form-group">
		{!!Form::label('Password')!!}
		{!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa la contraseña'])!!}
	</div>
