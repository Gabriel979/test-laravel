@extends('layouts.principal')

<!-- Main Content -->
@section('content')
@include('alerts.success')


<div class="contact-content">
            <div class="top-header span_top">
                <div class="logo">
                    <a href="{{url('home', $parameters = array(), $secure = null)}}"><img src="{{asset('images/logo.png')}}" alt="" /></a>
                    <p>Movie Theater</p>
                </div>
                <div class="search v-search">
                    <form>
                        <input type="text" value="Buscar.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}"/>
                        <input type="submit" value="">
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
            <!---contact-->
<div class="main-contact">
         <h3 class="head">Restablecer Password</h3>
         <p>Ingresa tu email y te enviaremos el link</p>

         @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

         <div class="contact-form">
             {!!Form::open(['url'=>'/password/email', 'method'=>'post'])!!}
                  <div class="col-md-6 contact-left">
                      <input type="text"  name="email" placeholder="E-mail" required/>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                  </div>
                  <div class="col-md-6 contact-right">
                     <input type="submit" value="ENVIAR LINK"/>
                  </div>
                  <div class="clearfix"></div>
             {!!Form::close()!!}
         </div>
</div>

@endsection
