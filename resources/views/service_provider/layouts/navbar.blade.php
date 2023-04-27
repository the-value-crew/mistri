<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons visible-on-sidebar-mini">view_list</i>
            </button>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"> Dashboard </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">dashboard</i>
                        <p class="hidden-lg hidden-md">Dashboard</p>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">notifications</i>
                        @php
                            $count = auth()->user()->unReadNotifications->count();
                        @endphp
                        @if($count>0)<span class="notification">{{$count}}</span>@endif
                        <p class="hidden-lg hidden-md">
                            Notifications
                            <b class="caret"></b>
                        </p>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach(auth()->user()->unReadNotifications as $notification)
                            @php
                                $service = \App\Order::find($notification->data['order_id'])->service->name;
                            @endphp
                        <li>
                            <a href="{{route('mark.read',['id'=>$notification->id,'order_id'=>$notification->data['order_id']])}}">{{$notification->data['message']}} for  <span class="notification-style"> {{$service}} </span>  by  <span class="notification-style">{{$notification->data['name']}}</span> </a>
                        </li>
                        @endforeach

                    </ul>
                </li>
                <li>
                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">logout</i>
                        <p class="hidden-lg hidden-md">Profile</p>
                    </a>
                    <ul class="dropdown-menu">
                        <li>


                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <li class="separator hidden-lg hidden-md"></li>
            </ul>
            {{--<form class="navbar-form navbar-right" role="search">--}}
            {{--<div class="form-group form-search is-empty">--}}
            {{--<input type="text" class="form-control" placeholder="Search">--}}
            {{--<span class="material-input"></span>--}}
            {{--</div>--}}
            {{--<button type="submit" class="btn btn-white btn-round btn-just-icon">--}}
            {{--<i class="material-icons">search</i>--}}
            {{--<div class="ripple-container"></div>--}}
            {{--</button>--}}
            {{--</form>--}}
        </div>
    </div>
</nav>
