








@extends('admin.main')
@section('content')

@section('header')
    <link type="text/css" rel="stylesheet" 
{{--         href="{{ asset('admin-assets/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}"/>
 --}}
{{--     <link type="text/css" rel="stylesheet" 
        href="{{ asset('admin-assets/assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}"/>
 --}}        <link type="text/css" rel="stylesheet" 
        href="{{ asset('admin-assets/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}"/>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
@endsection


    @inject('role','App\Role')

    <?php
    $roles = $role->all();
    
    ?>
<div class="panel-body">
                 <section class="panel">

@if(Session::has('flash_message'))
        <div class="alert alert-success text-center"><em> {!! session('flash_message') !!}</em></div>
    @endif
                            <div class="row">
                                <div class="col-md-4">

                                    <section class="panel panel-featured panel-featured-primary  text-center">
                                        <header class="panel-heading">
                                            <div class="panel-actions">
                                                
                                            </div>

                                            <h2 class="panel-title ">client ID </h2>
 
                                        </header>
                                        <div class="panel-body">

                                            
                                            @if(isset($m->client->id))
                                               {!!  $m->client->id!!}
                                            @endif
                                                
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-4">

                                    <section class="panel panel-featured panel-featured-primary text-center">
                                        <header class="panel-heading">
                                            <div class="panel-actions">
                                                
                                            </div>
: 
                                            <h2 class="panel-title">client Name</h2>

                                        </header>
                                        <div class="panel-body">
                                            
                                           
                                            @if(isset($m->client->name))
                                               {!!  $m->client->name !!}
                                            @endif


                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-4">

                                    <section class="panel panel-featured panel-featured-primary text-center">
                                        <header class="panel-heading">
                                            <div class="panel-actions">
                                                
                                            </div>

                                            <h2 class="panel-title">client Email</h2>
                                        </header>
                                        <div class="panel-body">
                                            
                                            @if(isset($m->client->email))
                                               {!!  $m->client->email !!}
                                            @endif
                                            
                                        </div>
                                    </section>
                                </div>


                            </div>
                        </section>
                        <section class="panel">
                            <div class="row">
                                <div class="col-md-4">

                                    <section class="panel panel-featured panel-featured-primary text-center">
                                        <header class="panel-heading">
                                            <div class="panel-actions">
                                                
                                            </div>
 
                                            <h2 class="panel-title">UCID</h2>

                                        </header>
                                        <div class="panel-body">
                                            

                                            @if(isset($m->client->account))
                                               {!!  $m->client->account !!}
                                            @endif
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-4">
  
                                    <section class="panel panel-featured panel-featured-primary text-center">
                                        <header class="panel-heading">
                                            <div class="panel-actions">
                                                
                                            </div>

                                            <h2 class="panel-title">client phone</h2>

                                        </header>
                                        <div class="panel-body">
                                            
                                            @if(isset($m->client->phone))
                                                {!!  $m->client->phone !!}
                                            @endif

                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-4">
                                    <section class="panel panel-featured panel-featured-primary text-center">
                                        <header class="panel-heading">
                                            <div class="panel-actions">
                                                
                                            </div>

                                            <h2 class="panel-title">client mobile</h2>

                                        </header>
                                        <div class="panel-body">
                                            
                                            @if(isset($m->client->mobile))
                                                {!!  $m->client->mobile!!}
                                            @endif

                                        </div>
                                    </section>
                                </div>


                            </div>
                        </section>
                        <section class="panel">
                            <div class="row">
                                <div class="col-md-4">

                                    <section class="panel panel-featured panel-featured-primary text-center">
                                        <header class="panel-heading">
                                            <div class="panel-actions">
                                                
                                            </div>
 
                                            <h2 class="panel-title">client Address</h2>

                                        </header>
                                        <div class="panel-body">
                                            
                                            @if(isset($m->client->address))
                                                {!! $m->client->address !!}
                                            @endif
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-4">

                                    <section class="panel panel-featured panel-featured-primary text-center">
                                        <header class="panel-heading">
                                            <div class="panel-actions">
                                                
                            :                  </div>

                                            <h2 class="panel-title">client packet</h2>

                                        </header>
                                        <div class="panel-body">
                                           
                                           @if(isset($m->client->packet->name))
                                            {!!  $m->client->packet->name !!}
                                            @endif
                                            
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-4">

                                    <section class="panel panel-featured panel-featured-primary text-center">
                                        <header class="panel-heading">
                                            <div class="panel-actions">
                     :                             
                                            </div>

                                            <h2 class="panel-title">client ISP</h2>

                                        </header>
                                        <div class="panel-body">
                                            @if(isset($m->client->network->name))
                                            {!!  $m->client->network->name !!}
                                            @endif
                                        </div>
                                    </section>
                                </div>


                            </div>
                        </section>
                        <section class="panel">
                            <div class="row">
                                <div class="col-md-6 text-center">

                                    <section class="panel panel-featured panel-featured-primary text-center">
                                        <header class="panel-heading">
                                            <div class="panel-actions">
                                                
                                            </div>

                                            <h2 class="panel-title">client sales Date</h2>

                                        </header>
                                        <div class="panel-body">

                                           
                                            @if(isset($m->client->start_date))
                                              {!!  $m->client->start_date !!}
                                            @endif

                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-6 text-center">

                                    <section class="panel panel-featured panel-featured-primary text-center">
                                        <header class="panel-heading">
                                            <div class="panel-actions">
                                                
                                            </div>

                                            <h2 class="panel-title">client sales Date</h2>

                                        </header>
                                        <div class="panel-body">
                                             
                                            @if(isset($m->client->start_date))
                                              {!!  $m->client->start_date !!}
                                            @endif

                                        </div>
                                    </section>
                                </div>

                                


                            </div>
                        </section>
</div>
{{-- Tickit --}}
<hr>
<div class="panel-body">

             <section class="panel">
                            <div class="text-center"> <h1 class="text-info">Tickit</h1></div>
                            <div class="row">
                                <div class="col-md-6 text-center">

                                    <section class="panel panel-featured panel-featured-primary text-center">
                                        <header class="panel-heading">
                                            <div class="panel-actions">
                                                
                                            </div>

                                            <h2 class="panel-title">Ticket Id</h2>

                                        </header>
                                        <div class="panel-body">

                                             
                                            @if(isset($m->id))
                                              {!!  $m->id !!}
                                            @endif                                             
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-6 text-center">

                                    <section class="panel panel-featured panel-featured-primary text-center">
                                        <header class="panel-heading">
                                            <div class="panel-actions">
                                                
                                            </div>
                                            <h2 class="panel-title">title</h2>

                                        </header>
                                        <div class="panel-body">
                                             
                                            @if(isset($m->title))
                                              {!!  $m->title !!}
                                            @endif                                             

                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-12 text-center">

                                    <section class="panel panel-featured panel-featured-primary text-center">
                                        <header class="panel-heading">
                                            <div class="panel-actions">
                                                
                                            </div>

                                            <h2 class="panel-title">subject</h2>

                                        </header>
                                        <div class="panel-body">
                                            
                                             @if(isset($m->body))
                                               {!!  $m->body !!}
                                            @endif                                             

                                        </div>
                                    </section>
                                </div>
                                
                                


                            </div>
                        </section>
</div>
   
                            @if($m->employee)
                            <span><p style="color:#0a91ff; ">Employee :</p> <p>{!!  $m->employee->name !!}</p></span>
                             @endif

                        @if($m->openemployee)
                            <span><p style="color:#0a91ff; ">Open Employee :</p> <p>{!!  $m->openemployee->name !!}</p></span>
                        @endif
                        @if(!is_null($m->open_date))
                            <span><p style="color:#0a91ff; ">Open Date
                                    :</p><p>{{date("F jS",strtotime($m->open_date))}}</p></span>
                        @endif

                        @if($m->closeemployee)
                            <span><p style="color:#0a91ff; ">Close Employee :</p> <p>{!!  $m->closeemployee->name !!}</p></span>
                        @endif

                        @if(!is_null($m->closed_date))
                            <span><p style="color:#0a91ff; ">close Date
                                    :</p><p>{{date("F jS",strtotime($m->closed_date))}}</p></span>
                        @endif

                        {{--====================== Comment========================--}}
            <div class="text-center">
                            <div class="divider mailbox-divider"></div>
                            <h4 class="text-info">Comments</h4>
                            <div class="divider mailbox-divider"></div>
                            <div class="mailbox-text">

                        <div class="col-xs-12 col-sm-12">
                            {{--<form class="col s12">--}}


                            @foreach($m->comments as $item)

                                <div class="panel-body">
                                    <span>@if($item->user){{$item->user->name}} ({{$item->user->roles()->first()->display_name}}) 
                                        @else unknown
                                        @endif:
                                    </span> 
                                    {{$item->comment}}   
                                
                                    <span><i class="fa fa-clock-o"></i>{{$item->created_at}}</span>
                                    <div class="divider mailbox-divider"></div>
                                </div>
                                <hr>
                            @endforeach






                            {!! Form::open(array(
                                'url'=>'controll/save-ticket',
                                'role'=>'form',
                                'method'=>'POST',
                                'class'=>"col s12",
                                'files'=>true
                                ))!!}



                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea name="comment"  placeholder="Placeholder" id="comment" type="text" class="validate form-control"> </textarea>
                                    </div>

                                </div>

                            <input type="hidden" name="ticket_id" value="{{$m->id}}">
                            


                            <button class="btn btn-success" type="submit" name="action">comment
                                <i class="material-icons right">send</i>
                            </button>
                            {{--</form>--}}

                            {!! Form::close()!!}

                            <br>
                            <br>
                            @if($m->status ==2  )
                                {!!Form::open(array('method'=>'post','url'=>'controll/change-status'))!!}
                                <input name="status" value="3" type="hidden">
                                <input name="ticket_id" value="{{$m->id}}" type="hidden">
                                {!!Form::submit(('close ticket'),array('class'=>'btn waves-effect waves-light'))!!}
                                {!!Form::close()!!}

                            @endif


                        </div>


                        {{--========================--}}


            </div>

 
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


{{-- NEW  SCRIPT --}}
<script src="{{asset('admin-assets/assets/vendor/jqueryui-touch-punch/jqueryui-touch-punch.js')}}"></script>
<script src="{{asset('admin-assets/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>


<script src="{{asset('admin-assets/assets/vendor/jquery-maskedinput/jquery.maskedinput.js')}}"></script>
<script src="{{asset('admin-assets/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>

<script src="{{asset('admin-assets/assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
<script src="{{asset('admin-assets/assets/javascripts/forms/examples.advanced.form.js')}}"></script>


{{-- done  SCRIPT --}}

<script> 
$('.selectpicker').selectpicker({
  style: 'btn-info',
  size: 4
});
 </script>
@endsection
