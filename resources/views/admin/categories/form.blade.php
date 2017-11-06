<div class="panel-body">  


            <div class="form-group">
                        <label class="control-label col-md-3">Name</label>
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


                {{--======================name===================--}}
                

                <?php
                $has = [
                        0 => 'Active',
                        1 => "disActive",
                ];
                ?>

                <div class="form-group">
                        <label class="control-label col-md-3">status</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                    {{  Form::select('status', $has, null, ['placeholder' => 'status','class'=>'form-control','id'=>'status',])}}

                                    </div>
                                </section>
                            </div>
                </div>
{{--=======================================status=======================--}}
                
<div class="col-md-12 text-center">
{!! Form::submit($submitButton, array('class'=>'btn btn-success text-center','id' => 'submit')) !!}
</div>
</div>
