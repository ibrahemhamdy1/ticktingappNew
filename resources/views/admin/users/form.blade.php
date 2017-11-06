@inject('role','App\Role')

<?php
$roles = $role->pluck('display_name', 'id');
$role2 = auth()->user()->roles()->first()->name;

?>

<div class="panel-body">
    <div class="row">
        <div class="form-group">
            <label class="control-label col-md-3">User Email</label>
                <div class="col-md-6">
                    <section class="form-group-vertical">
                        <div class="input-group input-group-icon">
                            <span class="input-group-addon">
                                <span class="icon"><i class="fa fa-envelope"></i></span>
                            </span>
                                {!!Form::email('email', null,array('class'=>'validate form-control','id'=>'email'))!!}
                                 <label class="error">{{ $errors->first('email') }}</label>

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
                            {!!Form::text('name', null,array('class'=>'validate form-control','id'=>'name'))!!}
                        </div>
                    </section>
                </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">Role</label>
                <div class="col-md-6">
                    <section class="form-group-vertical">
                        <div class="input-group input-group-icon">
                            <span class="input-group-addon">
                                
                            </span>
                            @if($role2=="admin")
                            <div class="input-field col s12">
                                {{  Form::select('role[]', $roles, null, ['placeholder' => 'Role','class'=>'form-control',])}}

       
                            </div>
                            @elseif($role2=="salesManager")
                                <input type="hidden" name="role[]" value="2">
                            @elseif($role2=="supportManager")

                                <input type="hidden" name="role[]" value="4">
                            @endif

                        </div>
                    </section>
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">password</label>
                <div class="col-md-6">
                    <section class="form-group-vertical">
                        <div class="input-group input-group-icon">
                            <span class="input-group-addon">
                                <span class="icon"><i class="fa fa-key"></i></span>
                            </span>
                            <input class="validate form-control" type="password" placeholder="Password" name="password" id="password">
                            <label class="error">{{ $errors->first('password') }}</label>


                        </div>
                    </section>
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Password Confirmation</label>
                <div class="col-md-6">
                    <section class="form-group-vertical">
                        <div class="input-group input-group-icon">
                            <span class="input-group-addon">
                                <span class="icon"><i class="fa fa-key"></i></span>
                            </span>
                            <input class="validate form-control" type="password" placeholder="Password Confirmation" id="password_confirmation" name="password_confirmation">
                            <label class="error">{{ $errors->first('password_confirmation') }}</label>

                        </div>
                    </section>
                </div>
        </div>
    </div>
<div class="text-center">
    {!! Form::submit($submitButton, array('class'=>'btn btn-success text-center','id' => 'submit','style'=>'margin:30px')) !!}
</div>
</div>  

