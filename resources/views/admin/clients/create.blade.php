@extends('admin.main')
@section('content')
    <div class="row">
    {{-- if There is any error --}}
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
    {{-- if There is any error --}}
        {!! Form::open(array('route' =>'controll.clients.store', 'files'=>'true','class' => 'ajax-form-request','method'=>'POST')) !!}
        <div class="message" style="padding:26px; ">
        </div><!-- div to display message after insert -->
        @include ('admin.clients.form',['submitButton' => 'Create'])
        {!! Form::close() !!}
    </div>
@endsection