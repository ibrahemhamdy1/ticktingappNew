@extends('admin.main')
@section('content')

    {{--==============================br==========================--}}
    <div class="container">
    <div class="row" >  
        <div class="col-md-12 text-center boxNumbers" >
        
         <div class="col-md-10 text-center " > 

            
            {{--<a href="{{ url('controll/downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>--}}

            {{--<a href="{{ url('controll/downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>--}}

              <div class="panel-body bg-tertiary" style="
    margin-left: 55px;
    margin-top: 50px;
">
            <div class="widget-summary">
              <div class="widget-summary-col widget-summary-col-icon">
               
              </div>
              <div class="widget-summary-col ">
                <div class="summary text-center">
                  <div class="info">
                    <a href="{{ url('controll/downloadExcel/xls') }}" style="
    margin: 10px;"><button  style="
    margin: 10px;" class="btn btn-success">Download Excel xls</button></a>
<form   action="{{url('controll/importExcel') }}"  method="post" enctype="multipart/form-data">


                {{ csrf_field() }}
                <input type="file" name="import_file" class="form-control" />

                <button class="btn btn-primary" style="
    margin: 10px;">Import File</button>

            </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
            </div>
            
    </div>
    </div>
    {{--==============================br==========================--}}

@endsection