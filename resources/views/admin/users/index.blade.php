@extends('admin.main')
@section('content')

@section('header')
<link type="text/css" rel="stylesheet"
    href="{{ asset('admin-assets/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}"/>

@endsection
<!-- start: page -->
                        <section class="panel">
                            <header class="panel-heading">
                                <div class="panel-actions">
                                </div>

                                <h2 class="panel-title">Users</h2>
                            </header>
                            <div class="panel-body">
                                <table class="table table-bordered table-striped mb-none" id="datatable-default">
                                    <thead>
                                        <tr>
                                            <th data-field="id">ID</th>
                                            <th data-field="company">Name</th>
                                            <th data-field="company">Email</th>
                                            @role(['admin','salesManager','supportManager'])
                                            <th data-field="progress">Action</th>
                                            @endrole
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @include('admin.users.loop')


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
