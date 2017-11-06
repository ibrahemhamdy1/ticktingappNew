@inject('category','App\Category')

<?php

$categories = $category->pluck('name', 'id');


?>

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

            <div class="form-group">
                        <label class="control-label col-md-3">price</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        <span class="input-group-addon">
                                            <span class="icon"><i class="fa fa-dollar"></i></span>
                                        </span>
                                            {!!Form::text('price', null,array('class'=>'validate form-control','id'=>'price'))!!}

                                    </div>
                                </section>
                            </div>
            </div>
            <div class="form-group">
                        <label class="control-label col-md-3">type</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        <span class="input-group-addon">
                                            <span class="icon"><i class="fa fa-th-large"></i></span>
                                        </span>
                    {!!Form::text('type', null,array('class'=>'validate form-control','id'=>'type'))!!}

                                    </div>
                                </section>
                            </div>
            </div>



                <?php
                        $has = [
                                0 => 'sale',
                                1 => "no sale",
                        ];
                ?>
            <div class="form-group">
                        <label class="control-label col-md-3">sale</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        
                    {{  Form::select('sale', $has, null, ['placeholder' => 'sale','class'=>'form-control form-control','id'=>'sale',])}}

                                    </div>
                                </section>
                            </div>
            </div>            


                    <div class="form-group">
                        <label class="control-label col-md-3">categories</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        {{  Form::select('cat_id', $categories, null, ['placeholder' => 'category','class'=>'form-control','id'=>'cat_id',])}}

                                    </div>
                                </section>
                            </div>
                    </div>            
                <?php
                $limit = [
                        0 => 'limited',
                        1 => "un limited",
                ];
                ?>


                    <div class="form-group">
                        <label class="control-label col-md-3">type</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        {{  Form::select('limited', $limit, null, ['placeholder' => 'type','class'=>'form-control','id'=>'limited',])}}

                                    </div>
                                </section>
                            </div>
                    </div>            
        <div class="text-center">
            {!! Form::submit($submitButton, array('class'=>'btn btn-primary text-center','id' => 'submit')) !!}
            
        </div>
</div>
