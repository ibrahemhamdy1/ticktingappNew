@extends('admin.main')
@section('content') 
<div class="row">
	@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
{!! Form::open(array('route' =>'controll.categories.store','files'=>true,'class' => 'ajax-form-request')) !!}
<div class="message" style="padding:26px; ">
</div><!-- div to display message after insert -->
@include ('admin.categories.form',['submitButton' => 'Create'])
{!! Form::close() !!}   
</div>
@endsection