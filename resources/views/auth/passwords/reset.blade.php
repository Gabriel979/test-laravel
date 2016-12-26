@extends('layouts.principal')

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
    
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
         <div class="contact-form">
             {!!Form::open(['url'=>'/password/reset', 'method'=>'post'])!!}

                 <div class="col-md-6 contact-left">

                    <input type="text" id="email" name="email" value="{{old('email')}}" placeholder="E-mail" required/>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                      {!!Form::hidden('token',$token,null)!!}

                      <label for="password" class="col-md-4 control-label">Password</label>
                      <input type="password" id="password" class="form-control" name="password">

                      <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>
                      <input type="password" id="password-confirm" class="form-control" name="password_confirmation">
                  </div>

                  <div class="col-md-6 contact-right">
                     <input type="submit" value="Restablecer Password"/>
                 </div>
                 <div class="clearfix"></div>
             {!!Form::close()!!}
         </div>
</div>

@endsection
