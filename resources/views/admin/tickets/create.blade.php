@extends('admin.main')
@section('header')
{{-- <script src="http://demo.expertphp.in/js/jquery.js"></script>
 --}}
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
 --}}

@endsection
@section('content') 
<div class="row">
{!! Form::open(array('route' =>'controll.tickets.store','files'=>true,'class' => 'ajax-form-request')) !!}
<div class="message" style="padding:26px; ">
</div><!-- div to display message after insert -->
@include ('admin.tickets.form',['submitButton' => 'Create'])
{!! Form::close() !!}   
</div>
@endsection


   