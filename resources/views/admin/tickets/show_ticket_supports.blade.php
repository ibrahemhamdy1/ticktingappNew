@extends('admin.main')
@section('content')




    @inject('role','App\Role')

    <?php
    $roles = $role->all();
    ?>
    <div class="card invoices-card">

        <div class="card-content">


            <div class="col s12 m7 l9">
                <div class="mailbox-view">
                    <div class="mailbox-view-header">
                        <div class="left">
                            <div class="left">

                                <span><i class="fa fa-eye"></i>{{$m->views}} Views</span>
                                <br>
                                <p style="color:black; ">client Name: {!!  $m->client->name !!} </p>
                                <p style="color:black; ">client ID: {!!  $m->client->id!!} </p>
                                <p style="color:black; ">client Email: {!!  $m->client->email !!}</p>
                                <p style="color:black; "> UCID: {!!  $m->client->account !!}</p>
                                <p style="color:black; ">client phone:  {!!  $m->client->phone !!}</p>
                                <p style="color:black; ">client Name: {!!  $m->client->mobile!!} </p>
                                <p style="color:black; ">client Address: {!!  $m->client->address !!}</p>
                                <p style="color:black; ">client packet : {!!  $m->client->packet->name !!}</p>
                                <p style="color:black; ">client ISP : {!!  $m->client->network->name !!}</p>
                                <p style="color:black; ">client sales Date: {!!  $m->client->start_date !!}</p>


                            </div>
                        </div>
                    </div>
                    <div class="divider mailbox-divider"></div>
                    <div class="mailbox-text">

                        <span><p style="color:#0a91ff; ">Ticket Id  :</p> <p>{!!  $m->id !!}</p></span>
                        <span><p style="color:#0a91ff; ">title :</p> <p>{!!  $m->title !!}</p></span>
                        <span><p style="color:#0a91ff; ">subject :</p> <p>{!!  $m->body !!}</p></span>
                            @if($m->employee)
                                <span><p style="color:#0a91ff; ">Employee :</p> <p>{!!  $m->employee->name !!}</p></span>
                            @endif
                            <span><p style="color:#0a91ff; ">Department :</p> <p>{{$m->type_name}}</p></span>
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
                                <span><p style="color:#0a91ff; ">close Date :</p><p>{{date("F jS",strtotime($m->closed_date))}}</p></span>
                            @endif
                        {{--==============================================--}}

                            <div class="divider mailbox-divider"></div>
                            <h4 style="color:#0a91ff; ">Comments</h4>
                            <div class="divider mailbox-divider"></div>
                        <div class="mailbox-text">

                            <div class="col-xs-12 col-sm-8">
                                {{--<form class="col s12">--}}
                                @foreach($m->comments as $item)

                                    <div><span>{{$item->user->name}} ({{$item->user->roles()->first()->display_name}}) :</span> {{$item->comment}}   </div>
                                    <span><i class="fa fa-clock-o"></i>{{$item->created_at}}</span>
                                    {{--<span><p style="color:#0a91ff; ">comment:</p> <p>{{$item->comment}}</p></span>--}}
                                    {{--<span><p style="color:#0a91ff; ">user:</p> <p>{{$item->user->name}}</p></span>--}}
                                    <div class="divider mailbox-divider"></div>
                                @endforeach


                                @if($m->employee_id==auth()->user()->id)
                                    @if($m->status==0 or $m->status==1)
                                {!! Form::open(array(
                                    'url'=>'controll/save-ticket',
                                    'role'=>'form',
                                    'method'=>'POST',
                                    'class'=>"col s12",
                                    'files'=>true
                                    ))!!}


                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="comment" placeholder="Placeholder" id="comment" type="text"
                                               class="validate">
                                        <label class="active" for="comment">comment</label>
                                    </div>

                                </div>

                                <input type="hidden" name="ticket_id" value="{{$m->id}}">

                                {{--<input type="hidden" name="status" value="2">--}}
                                {{--<p>--}}
                                {{--<input name="group1" id="test1" type="radio">--}}
                                {{--<label for="test1">solved</label>--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                {{--<input name="group1" id="test2" type="radio">--}}
                                {{--<label for="test2">un sloved</label>--}}
                                {{--</p>--}}

                                {{--<br><br>--}}



                                {{--<span><p style="color:#0a91ff; ">periorty</p></span>--}}
                                {{--<p>--}}
                                {{--<input id="test6" type="checkbox">--}}
                                {{--<label for="test5">yes</label>--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                {{--<input id="test9" checked="checked" type="checkbox">--}}
                                {{--<label for="test6">no</label>--}}
                                {{--</p>--}}



                                {{--<div class="input-field col s12">--}}


                                {{--<span><p style="color:#0a91ff; ">Role</p></span>--}}

                                {{--<select class="initialized">--}}
                                {{--@foreach($roles as $role)--}}
                                {{--<option value="" disabled="" selected="">Choose your option</option>--}}
                                {{--<option value="1">{{$role->roles->premission_role}}</option>--}}

                                {{--@endforeach--}}
                                {{--</select>--}}
                                {{--</div>--}}


                                <button class="btn waves-effect waves-light" type="submit" name="action">comment
                                    <i class="material-icons right">send</i>
                                </button>
                                {{--</form>--}}

                                {!! Form::close()!!}
                                <br>
                                <br>
{{--                                @if($m->status ==0  or $m->status==1 )--}}
                                {!!Form::open(array('method'=>'post','url'=>'controll/change-status'))!!}
                                <input name="status" value="2" type="hidden">
                                <input name="ticket_id" value="{{$m->id}}" type="hidden">
                                {!!Form::submit(('Solve ticket'),array('class'=>'btn waves-effect waves-light'))!!}
                                {!!Form::close()!!}

                                    @endif

                                @endif
                            </div>


                            {{--========================--}}


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
