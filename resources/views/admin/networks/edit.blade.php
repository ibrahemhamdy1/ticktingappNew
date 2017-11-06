@extends('admin.main')
@section('content') 
<div class="row">
     {!! Form:: model($row,array('method' => 'PATCH','action' => ['NetworkController@update',$row->id], 'files'=>true,'class' => 'ajax-form-request')) !!}
    <div class="message" style="padding:26px; ">
    </div><!-- div to display message after insert -->
    @include ('admin.networks.form',['submitButton' => "Update"])
    {!! Form::close() !!} 
</div>
@endsection