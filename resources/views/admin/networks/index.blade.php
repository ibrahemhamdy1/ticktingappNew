@extends('admin.main')
@section('content')

@section('header')
<link type="text/css" rel="stylesheet" 
    href="{{ asset('admin-assets/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

@endsection
<!-- start: page -->
  



                        <section class="panel">
                            <header class="panel-heading">
                                <div class="panel-actions">
                                        <div class="fixed-action-btn">
                                            <a class="btn-floating btn-large red"  href="{{ url('controll/networks/create')}}">
                                                <i class="btn btn-success" >add</i>
                                            </a>
                                        </div>
                                </div>
                        
                                <h2 class="panel-title">ISP</h2>
                            </header>
                            <div class="panel-body">
                                <table class="table table-bordered table-striped mb-none" id="datatable-default">
                                    <thead>
                                        <tr>
                                            <th data-field="id">ID</th>
                                            <th data-field="company">Name</th>

                                            <th data-field="progress">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @include('admin.networks.loop')

                                        
                                    </tbody>
                                </table>
                                   {!! $rows->render() !!}

                            </div>
                        </section>

@endsection

@section('script')



<script src="{{ asset('admin-assets/assets/vendor/select2/js/select2.js')}}"></script>

 <script src="{{ asset('admin-assets/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
    
<script src="{{ asset('admin-assets/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}
"></script>
        
                <script src="{{ asset('admin-assets/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}
"></script>




<script src="{{ asset('admin-assets/assets/javascripts/tables/examples.datatables.default.js')}}"></script>

<script src="{{asset('admin-assets/assets/javascripts/tables/examples.datatables.row.with.details.js')}}"></script>
<script src="{{ asset('admin-assets/assets/javascripts/tables/examples.datatables.tabletools.js')}}"></script>
@endsection
