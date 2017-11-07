@extends('admin.main')
@section('content') 
<div class="row">
	@if(Session::has('flash_message'))
    	<div class="alert alert-danger text-center"><em> {!! session('flash_message') !!}</em></div>
	@endif
     {!! Form:: model($row,array('method' => 'PATCH','action' => ['TicketController@update',$row->id], 'files'=>true,'class' => 'ajax-form-request')) !!}
    <div class="message" style="padding:26px; ">
    </div><!-- div to display message after insert -->
    @include ('admin.tickets.form',['submitButton' => "Update"])
    {!! Form::close() !!} 
</div>
@endsection