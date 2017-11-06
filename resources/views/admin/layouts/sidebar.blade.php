


@inject('user','App\User')
<?php
        $users=auth()->user();

        ?>
here is  a sidebar


<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">

				    <div class="sidebar-header">
				        <div class="sidebar-title">
				            Navigation
				        </div>
				        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
				        </div>
				    </div>

				    <div class="nano">
				        <div class="nano-content">
				            <nav id="menu" class="nav-main" role="navigation">

				                <ul class="nav nav-main">
				                    <li>
				                        <a href="{{ url('/controll/dashboard') }}">
				                            <i class="fa fa-home" aria-hidden="true"></i>
				                            <span>Dashboard</span>
				                        </a>
				                    </li>
					             {{-- Users --}}
				                 @role(['admin','salesManager','supportManager'])

				                    <li class="nav-parent  ">
				                        <a >
				                            <i class="fa fa-user" aria-hidden="true"></i>
				                            <span>Users</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a href="{{ url('controll/users')}}">
				                                    Show All
				                                </a>
				                            </li>
				                            <li>

				                                <a href="{{ url('controll/users/create')}}">
				                                   Add User
				                                </a>
				                            </li>

				                        </ul>
				                    </li>
				                 @endrole
					            {{-- Users --}}

				                  {{-- Clients --}}
				                    @role(['sales','admin','salesManager'])
				                    <li>
				                        <a href="{{ url('controll/clients') }}">
				                            <i class="fa fa-user-circle"></i>
				                            <span>Clients</span>
				                        </a>

				                    </li>
				                   @endrole



				                  {{-- Clients --}}
				                  {{-- ISP --}}

				                  @role(['admin'])
				                    <li>
				                        <a href="{{ url('controll/networks') }}">
				                            <i class="fa fa-podcast"></i>
				                            <span>ISP</span>
				                        </a>

				                    </li>
				                  @endrole
				                  {{-- ISP --}}

									{{--  --}}

								{{-- category &&Packet --}}
								@role('admin')
									<li class="nav-parent">
				                        <a >
				                            <i class="fa fa-tag" aria-hidden="true"></i>
				                            <span>Category</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a href="{{ url('controll/categories') }}">
				                                   category
				                                </a>
				                            </li>
				                            <li >
				                                <a href="{{ url('controll/packets') }}">
													Packets
												</a>

				                            </li>

				                        </ul>
				                    </li>
	            				@endrole

								{{-- category &&Packet --}}
  {{-- Ticket --}}
				                    <li class="nav-parent">
				                        <a >
				                            <i class="fa  fa-ticket" aria-hidden="true"></i>
				                            <span>Ticket</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a href="{{ url('controll/tickets') }}">
				                                    All Tickets
				                                </a>
				                            </li>
										{{-- My Tickets  --}}
										  @role(['sales','salesManager','supportManager'])
				                            <li>
				                                <a href="{{url('controll/my-ticket')}}">
				                                   My Tickets
				                                </a>

				                            </li>
                                          @endrole

				                        </ul>
				                    </li>
				    		       {{-- Ticket --}}
				                	</ul>
				                </li>
				             </ul>
				          </li>

				     </ul>
			  </nav>



				        <script>
				            // Maintain Scroll Position
				            if (typeof localStorage !== 'undefined') {
				                if (localStorage.getItem('sidebar-left-position') !== null) {
				                    var initialPosition = localStorage.getItem('sidebar-left-position'),
				                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');

				                    sidebarLeft.scrollTop = initialPosition;
				                }
				            }
				        </script>


				    </div>

				</aside>
				<!-- end: sidebar -->
