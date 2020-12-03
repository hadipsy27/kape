
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whooops!</strong>There ware some problems with your input. <br><br>
        <ul>
            @foreach ($errors as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismis="alert">x</button>
    <strong>{{ $message }}</strong>
</div>

    <img src="/images/{{Session::get('path')}}">    
  
@endif
{!! Form::open(array('route' => 'fileUpload','enctype' => 'multipart/form-data')) !!}
<div class="container" style="margin-top: 4%">
	<div class="row cancel">
		<div class="col-md-4">
            {!! Form::file('image', array('class' => 'image')) !!}
            <span style="font-size: 10px">image|zip|pdf| max:2 mb</span>
		</div>
		<div class="col-md-4">
            <button type="submit" class="btn btn-info" style="background-color: #26b2ad;">Upload</button>
            <button type="button" target="_blank" class="btn btn-info"><a href="/images/{{Session::get('path')}}" download="/images/{{Session::get('path')}}" style="color: white"> Download</a></button>
		</div>
        
    </div>
</div>
{!! Form::close() !!}