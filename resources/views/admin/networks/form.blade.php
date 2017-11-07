<div class="panel-body">
    

                {{--======================name===================--}}
                
@if(Session::has('flash_message'))
        <div class="alert alert-danger text-center"><em> {!! session('flash_message') !!}</em></div>
    @endif

           <div class="form-group">
                        <label class="control-label col-md-3">NetWork Name</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        <span class="input-group-addon">
                                            <span class="icon"><i class="fa fa-user"></i></span>
                                        </span>
                    {!!Form::text('name', null,array('class'=>'validate form-control','id'=>'name'))!!}

                                    </div>
                                </section>
                            </div>
            </div>
<div class="col-md-12 text-center" >
{!! Form::submit($submitButton, array('class'=>'btn btn-success text-center','id' => 'submit')) !!}
</div>
</div>