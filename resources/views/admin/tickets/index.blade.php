@extends('admin.main')
@section('content')

@section('header')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 --}}
<link type="text/css" rel="stylesheet" 
    href="{{ asset('admin-assets/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}"/>


    <link type="text/css" rel="stylesheet" 
    href="{{ asset('admin-assets/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}"/>
    
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
 --}}

@endsection
<!-- start: page -->
 


                        <section class="panel">
                            <header class="panel-heading">
                                <div class="panel-actions">
                                @role(['admin','sales','salesManager'])

                                    <a   href="{{ url('controll/tickets/create')}}"> 
                                        <button class="btn btn-success" >Add New</button> 
                                   </a>
                                @endrole 
                                </div>
                        
                                <h2 class="panel-title">Tickets</h2>
                            </header>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered" id="datatable-default">
                                        <thead>
                                            <tr>
                                                <th data-field="id">ID</th>

                                                <th data-field="company">title</th>
                                                <th data-field="company">status</th>
                                                <th data-field="company">Department</th>

                                                @role(['admin'])
                                                <th data-field="progress">Action</th>
                                                @endrole
                                            </tr>
                                        </thead>                                    
                                        <tbody>
                                            @include('admin.tickets.loop')

                                        
                                        </tbody>
                                </table>
                                   {!! $rows->render() !!}

                            </div>
                        </section>

@endsection

@section('script')

   

    
    <script 
        src="{{ asset('admin-assets/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}">
    </script>
    <script src="{{ asset('admin-assets/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/javascripts/tables/examples.datatables.default.js')}}"></script>
    <script src="{{asset('admin-assets/assets/javascripts/tables/examples.datatables.row.with.details.js')}}"></script>
    <script src="{{ asset('admin-assets/assets/javascripts/tables/examples.datatables.tabletools.js')}}"></script>
    {{-- NEW  SCRIPT --}}
    <script src="{{asset('admin-assets/assets/vendor/jqueryui-touch-punch/jqueryui-touch-punch.js')}}"></script>
    <script src="{{asset('admin-assets/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
    <script src="{{asset('admin-assets/assets/vendor/jquery-maskedinput/jquery.maskedinput.js')}}"></script>
    <script src="{{asset('admin-assets/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('admin-assets/assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
    <script src="{{asset('admin-assets/assets/javascripts/forms/examples.advanced.form.js')}}"></script>
    {{-- done  SCRIPT --}}

@endsection
