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




@endsection
