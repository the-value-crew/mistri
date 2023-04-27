<div class="sidebar" data-active-color="blue" data-background-color="black" data-image="{{asset('dashboard/img/sidebar-3.jpg')}}">
    <!--
    Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
    Tip 2: you can also add an image using data-image tag
    Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            A
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            {{Auth::guard('web')->user()->name}}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{asset('dashboard/img/admin1.png')}}" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>
                                {{Auth::guard('web')->user()->name}}
                                <b class="caret"></b>
                            </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        {{--<li>--}}
                            {{--<a href=" ">--}}
                                {{--<span class="sidebar-mini">MP</span>--}}
                                {{--<span class="sidebar-normal">My Profile</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="{{route('vendor.change.password')}}">
                                <span class="sidebar-mini">CP</span>
                                <span class="sidebar-normal">Change Password</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                <span class="sidebar-mini">L</span>
                                <span class="sidebar-normal">Logout</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="{{ (request()->is('service-provider/dashboard*')) ? 'active' : '' }}">
                <a href="{{route('service.provider.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="{{ (request()->is('service-provider/account-detail*')) ? 'active' : '' }}">
                <a href="{{route('account.detail')}}">
                    <i class="material-icons">perm_data_setting</i>
                    <p>Account Detail</p>
                </a>
            </li>

            <li class="{{ (request()->is('service-provider/available-on*')) ? 'active' : '' }}">
                <a href="{{route('available-on.index')}}">
                    <i class="material-icons">av_timer</i>
                    <p>Available On</p>
                </a>
            </li>


            <li class="{{ (request()->is('admin/my-service*')) ? 'active' : '' }}">
                <a data-toggle="collapse" href="#pagesExamples99">
                    <i class="material-icons">design_services</i>
                    <p>Services
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(request()->is('admin/my-service*'))in @endif" id="pagesExamples99">
                    <ul class="nav">
                        <li class="{{Request::is('admin/my-service') ? 'active':''}}">
                            <a href="{{route('my-service.index')}}">
                                <span class="sidebar-mini">MP</span>
                                <span class="sidebar-normal">Manage Services</span>
                            </a>
                        </li>
                        <li class="{{Request::is('admin/my-service/create') ? 'active':''}}">
                            <a href="{{route('my-service.create')}}">
                                <span class="sidebar-mini">AS</span>
                                <span class="sidebar-normal">Add Services</span>
                            </a>
                        </li>

                        <li class="{{Request::is('admin/my-service/create') ? 'active':''}}">
                            <a href="{{route('service.status')}}">
                                <span class="sidebar-mini">SRS</span>
                                <span class="sidebar-normal">Service Request Status</span>
                            </a>
                        </li>


                    </ul>
                </div>
            </li>

            <li class="{{ (request()->is('service-provider/service-order*')) ? 'active' : '' }}">
                <a href="{{route('service-order.index')}}">
                    <i class="material-icons">reorder</i>
                    <p>Service Order</p>
                </a>
            </li>


            <li class="{{ (request()->is('admin/subscribtion*')) ? 'active' : '' }}">
                <a data-toggle="collapse" href="#pagesExamples990">
                    <i class="material-icons">event</i>
                    <p>Subscribtion Plans
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(request()->is('service-provider/subscribtion*'))in @endif" id="pagesExamples990">
                    <ul class="nav">
                        <li class="{{Request::is('service-provider/subscribtion') ? 'active':''}}">
                            <a href="{{route('subscribtion.index')}}">
                                <span class="sidebar-mini">MP</span>
                                <span class="sidebar-normal">Subscribtion Plans</span>
                            </a>
                        </li>
                        <li class="{{Request::is('service-provider/subscribtion/my-plans') ? 'active':''}}">
                            <a href="{{route('my.plans')}}">
                                <span class="sidebar-mini">AS</span>
                                <span class="sidebar-normal">My Plans</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>
