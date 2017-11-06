@inject('network','App\Network')

<?php

$networks = $network->pluck('name', 'id');


?>


@inject('packet','App\Packet')

<?php

$packets = $packet->pluck('name', 'id');


?>

<div class="panel-body">

            <div class="form-group">
                        <label class="control-label col-md-3">Client Name</label>
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
            <div class="form-group">
                        <label class="control-label col-md-3">User Name</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        <span class="input-group-addon">
                                            <span class="icon"><i class="fa fa-user"></i></span>
                                        </span>
                                            {!!Form::text('user_name', null,array('class'=>'validate form-control','id'=>'user_name'))!!}

                                    </div>
                                </section>
                            </div>
            </div>            
        
            <div class="form-group">
                        <label class="control-label col-md-3">Client Email</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        <span class="input-group-addon">
                                            <span class="icon"><i class=" glyphicon  glyphicon-envelope"></i></span>
                                        </span>
                                            {!!Form::email('email', null,array('class'=>'validate form-control','id'=>'email'))!!}
                                            <label class="error">{{ $errors->first('email') }}</label>

                                    </div>
                                </section>
                            </div>
            </div>

        
        <div class="form-group">
                        <label class="control-label col-md-3">Phone</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        <span class="input-group-addon">
                                            <span class="icon"><i class="glyphicon  glyphicon-phone-alt"></i></span>
                                        </span>
                                        {!!Form::text('phone', null,array('class'=>'validate form-control','id'=>'phone'))!!}

                                    </div>
                                </section>
                            </div>
        </div>

        <div class="form-group">
                        <label class="control-label col-md-3">mobile</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        <span class="input-group-addon">
                                            <span class="icon"><i class="fa fa-phone"></i></span>
                                        </span>
                                        
                                        {!!Form::text('mobile', null,array('class'=>'validate form-control','id'=>'mobile'))!!}

                                    </div>
                                </section>
                            </div>
        </div>
        <div class="form-group">
                        <label class="control-label col-md-3">Address</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        <span class="input-group-addon">
                                            <span class="icon"><i class="fa fa-home"></i></span>
                                        </span>
                                        
                                       
                                    {!!Form::text('address', null,array('class'=>'validate form-control','id'=>'address'))!!}

                                    </div>
                                </section>
                            </div>
        </div>        
        


                <div class="form-group">
                        <label class="control-label col-md-3">UCID</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        <span class="input-group-addon">
                                            <span class="icon"><i class="fa fa-server"></i></span>
                                        </span>
                                        
                                       
                                  
                            {!!Form::text('account', null,array('class'=>'validate form-control','id'=>'account'))!!}

                                    </div>
                                </section>
                            </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-md-3">Sales Date</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        <span class="input-group-addon">
                                            <span class="icon"><i class="fa fa-calendar"></i></span>
                                        </span>
                                        
                                       
                                                  
                                        {!!Form::text('start_date', null,array('class'=>'validate form-control','id'=>'start_date'))!!}
                                        <label class="error">{{ $errors->first('start_date') }}</label>

                                    </div>
                                </section>
                            </div>
                </div>        
        
                <div class="form-group">
                        <label class="control-label col-md-3">order status</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        <span class="input-group-addon">
                                            <span class="icon"><i class="fa fa-reorder"></i></span>
                                        </span>
                                        
                                       
                                                  
                                        
                                        {!!Form::text('order_status', null,array('class'=>'validate form-control','id'=>'order_status'))!!}
                                        <label class="error">{{ $errors->first('order_status') }}</label>

                                    </div>
                                </section>
                            </div>
                </div>        
                <div class="form-group">
                        <label class="control-label col-md-3">Customer ID</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        <span class="input-group-addon">
                                            <span class="icon"><i class="fa fa-id-badge"></i></span>
                                        </span>
                                        
                                       
                                                  
                                        
                                   
                                        {!!Form::text('customer_id', null,array('class'=>'validate form-control','id'=>'customer_id'))!!}
                                        <label class="error">{{ $errors->first('customer_id') }}</label>
                                
                                    </div>
                                </section>
                            </div>
                </div>
        
                <div class="form-group">
                        <label class="control-label col-md-3">ISP</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        
                                        
                                       
                                                  
                                        
                                   
                                      
                                            {{  Form::select('network_id', $networks, null, ['placeholder' => 'Select ISP','class'=>'form-control','id'=>'network_id',])}}

                                    </div>
                                </section>
                            </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-md-3">package</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        
                                        
                                       
                                                  
                                        
                                   
                                      
                                      
                                         
            {{  Form::select('packet_id', $packets, null, ['placeholder' => 'Select package','class'=>'form-control','id'=>'packet_id',])}}

                                    </div>
                                </section>
                            </div>
                </div>

        

       


        {!! Form::submit($submitButton, array('class'=>'btn btn-primary text-center','id' => 'submit')) !!}
</div>