

@inject('client','App\Client')

<?php

//$clientsss = $client->pluck('name', 'id');
$clientsss = $client->get();

 foreach ($clientsss as $client)    {
     $clients[$client->id]=$client->phone .'  |  '. $client->name;
//     $clients[$client->id]=$client->name .'|'. $client->name;
 }
 if (isset($validator)){
    $errors = $validator->errors();
 
}

?>
<div class="panel-body">  


            <div class="form-group">
                        <label class="control-label col-md-3">title</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        <span class="input-group-addon">
                                            <span class="icon"><i class="fa fa-user"></i></span>
                                        </span>
                                        {!!Form::text('title', null,
                                                 array('class'=>'materialize-textarea form-control','id'=>'title'))!!}
                                        <label class="error">{{ $errors->first('title') }}</label>

                                    </div>
                                </section>
                            </div>
            </div>
            <div class="form-group">
                        <label class="control-label col-md-3">body</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                                        
                                        {!!Form::textarea('body', null,
                                                 array('class'=>'materialize-textarea form-control','data-live-search'=>'true','id'=>'body'))!!}

                                        
    
                                    </div>
                                </section>
                            </div>
            </div>
             {{--========department type===================--}}
            <?php
                $type = [
                        0 => 'sales',
                        1 => "supports",
                ];
            ?>


            <div class="form-group">
                        <label class="control-label col-md-3">type</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
                    {{  Form::select('type', $type, null, ['placeholder' => 'Department','class'=>'form-control ','id'=>'type',])}}
                                    </div>
                                </section>
                            </div>
            </div>

             {{--========department type===================--}}

            <div class="form-group">
                        <label class="control-label col-md-3">cient</label>
                            <div class="col-md-6">
                                <section class="form-group-vertical">
                                    <div class="input-group input-group-icon">
{{--                                         {{  Form::select('client_id', $clients, null,
                                                  ['placeholder' => 'client','class'=>'form-control ','id'=>'client_id',])}}
 --}}                                                                 {{--  {!! Form::text('search_text', null, array('placeholder' => 'Search Text','class' => 'form-control','id'=>'search_text')) !!} --}}

<form>
                    <div class="form-group">
                        <label for="tag_list">Tags:</label>
                        <select id="search_text" name="client_id" class="form-control" ></select>
                    </div>
                </form>

                                    </div>
                                </section>
                            </div>
            </div>


            
                
               
<div  class="text-center"> 
        {!! Form::submit($submitButton, array('class'=>'btn btn-primary text-center','id' => 'submit')) !!}
</div>
</div>


