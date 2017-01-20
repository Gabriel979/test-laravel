@extends('layouts.principal')



@section('content')

@include('alerts.success')

<div class="contact-content">
			<div class="top-header span_top">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" alt="" /></a>
					<p>Movie Theater</p>
				</div>
				<div class="clearfix"></div>
			</div>
			<!---contact-->
<div class="main-contact">
		 <h3 class="head">CONTACTO</h3>
		 <p>SIEMPRE ESTAMOS PARA AYUDARTE!</p>
		 <div class="contact-form">
			 {!!Form::open(['route'=>'mail.store','method'=>'POST'])!!}
				 <div class="col-md-6 contact-left">
					  <input type="text" name="name" placeholder="Nombre" required/>
					  <input type="text"  name="email" placeholder="E-mail" required/>
				  </div>
				  <div class="col-md-6 contact-right">
					 <textarea name="mensaje" placeholder="Mensaje"></textarea>
					 <input type="submit" value="ENVIAR"/>
				 </div>
				 <div class="clearfix"></div>
			 {!!Form::close()!!}
	     </div>
</div>


@stop