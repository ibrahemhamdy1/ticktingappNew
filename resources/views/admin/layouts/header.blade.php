<!doctype html>
<html class="fixed sidebar-light js flexbox flexboxlegacy no-touch csstransforms csstransforms3d no-overflowscrolling webkit chrome win js no-mobile-device custom-scroll sidebar-left-collapsed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">
                <script src="{{ asset('admin-assets/assets/vendor/jquery/jquery.js')}}"></script>
{{--         <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.css" rel="stylesheet">
 --}}

<link type="text/css" rel="stylesheet" 
              href="{{ asset('admin-assets/assets/stylesheets/Autocompletecustom.CSS')}}"/>
              {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}

           <script
                  src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
                  integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
                  crossorigin="anonymous">
              </script>
        <title>Layouts | Porto Admin - Responsive HTML5 Template 1.7.0</title>
        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="Porto Admin - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link 
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link type="text/css" rel="stylesheet" 
              href="{{ asset('admin-assets/assets/vendor/bootstrap/css/bootstrap.css')}}"/>


        <link type="text/css" rel="stylesheet" 
                     href="{{ asset('admin-assets/assets/vendor/font-awesome/css/font-awesome.css')}}"/>

        <link type="text/css" rel="stylesheet" 
            href="{{ asset('admin-assets/assets/vendor/magnific-popup/magnific-popup.css')}}"/>

        <link type="text/css" rel="stylesheet"
             href="{{ asset('admin-assets/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}"/>
     


        <!-- Specific Page Vendor CSS -->
       <link type="text/css" rel="stylesheet" 
                href="{{ asset('admin-assets/assets/vendor/owl.carousel/assets/owl.carousel.css')}}"/>
        <link type="text/css" rel="stylesheet" 
              href="{{ asset('admin-assets/assets/vendor/owl.carousel/assets/owl.theme.default.css')}}"/>

        <!-- Theme CSS -->
        <link type="text/css" rel="stylesheet" 
              href="{{ asset('admin-assets/assets/stylesheets/theme.css')}}"/>

        <!-- Skin CSS -->
        <link type="text/css" rel="stylesheet" 
              href="{{ asset('admin-assets/assets/stylesheets/skins/default.css')}}"/>

        <!-- Theme Custom CSS -->
        <link type="text/css" rel="stylesheet" 
              href="{{ asset('admin-assets/assets/stylesheets/theme-custom.css')}}"/>

        <!-- Head Libs -->
        <script src="{{ asset('admin-assets/assets/vendor/modernizr/modernizr.js')}}"></script>
        <!-- MY custom css -->
        <link type="text/css" rel="stylesheet" 
              href="{{ asset('admin-assets/assets/stylesheets/custom.css')}}"/>

    @yield('header')
    </head>

<body>        

<section class="body">

            <!-- start: header -->
            <header class="header">
                <div class="logo-container">
                    <a href="../1.7.0" class="logo">
                        <span>TICKETING</span>
                    </a>
                    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>
            
                <!-- start: search & user box -->
                <div class="header-right">
            
                {{-- the notification part --}}

                    <?php $unseen = App\Notification::
                                                       where('seen', 0)->
                                                       where('user_id',auth()->user()->id)->
                                                       orderBy('created_at', 'desc')->
                                                       get(); ?>

                    <span class="separator"></span>
            
                    <ul class="notifications">
                        
                       
                        <li>
                            <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>
                                <span class="badge">{{ count($unseen) }}</span>
                            </a>
            
                            <div class="dropdown-menu notification-menu">
                                <div class="notification-title">
                                    <span class="pull-right label label-default">{{ count($unseen) }}</span>
                                    Alerts
                                </div>
            
                                <div class="content">
                                    <ul>

                                       @foreach($unseen as $mes)
                                            <li >
                                                <a href="{{ url('controll/tickets/'.$mes->ticket_id)}}" class="clearfix">
                                                    <div class="image ">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>    
                                                        <span class="title">{{ $mes->message }}</span>
                                                          <span class="message">{{ date('d M,Y',strtotime($mes->created_at))}}
                                                        </span>

                                                        
                                                </a>
                                            </li>
                                        @endforeach
                

                                    </ul>
            
                                    <hr />
                {{-- the notification part --}}

                                    
                                </div>
                            </div>
                        </li>
                    </ul>
                     
                    <span class="separator"></span>

            {{-- start  of  the  user DropDown --}}
            @inject('user','App\User')
                <?php
                        $users=auth()->user();

                        ?>
                    <div id="userbox" class="userbox">
                        <a href="#" data-toggle="dropdown">
                            <figure class="profile-picture">
                                <img src="assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                            </figure>
                            <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                                <span class="name">{{Auth::user()->name}}</span>
                                <span class="role">{{Auth::user()->email}}</span>
                            </div>
            
                            <i class="fa custom-caret"></i>
                        </a>
            
                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="divider"></li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="{{ url('controll/contact_us')}}">
                                        <i class="fa fa-envelope"></i> All Messages
                                    </a>
                                </li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="{{url('controll/users/'.$users->id.'/edit')}}">
                                        <i class="fa fa-user"></i> My Profile
                                    </a>
                                </li>
                                
                                <li>
                                    <a role="menuitem" tabindex="-1" href="{{url('logout')}}"><i class="fa fa-power-off"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            {{-- start  of  the  user DropDown --}}
            