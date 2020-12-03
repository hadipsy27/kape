@extends('templates.outs.auth')

@section('content')

  <div class="special-form">
      {{-- <a href="{{ route('home') }}"><img src="{{ \App\Helpers\Helpers::logoUrl()  }}" alt=""></a> --}}
      <h3 class="text-center"><b>LOGIN</b></h3>
      @if ($errors->first())
          <span class="status-msg error-msg">{{ $errors->first() }}</span>
      @endif
      <hr>
    {!! Form::open(array('action' => 'UsersController@login')) !!}
        <div class="form-group">
            <label for="nim" class="color-primary">Registration number:</label>
            {!! Form::text( 'nim', null, array('class' => 'form-control', "placeholder" => "Registration Number","autofocus" => "true" )) !!}
        </div>
        <div class="form-group">
            <label for="password" class="color-primary">Password:</label>
            {!! Form::password( 'password', array('class' => 'form-control', "placeholder" => "Password" )) !!}
        </div>
        <div class="form-group">
            {!! Form::submit( 'Login', array('class' => 'btn btn-primary btn-wide')) !!}
        </div>
    {!! Form::close() !!}
    <p>Don't have an account? <a href="{{ route('register') }}">register</a></p>
  </div>

@stop