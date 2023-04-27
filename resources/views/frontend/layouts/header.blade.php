@php
    $data = \App\Website::find(1);
@endphp

<header>
    <section class="section-rule">
        <nav class="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand logo" href="{{ url('/') }}">
                        <img src="{{ asset('dashboard/img/' . $data->logo) }}" alt="" loading="lazy"
                            class="img-fluid">
                    </a>
                </li>
                @auth
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#navbarDropdown" data-toggle="dropdown">
                            <i class="bi bi-bell"></i>
                        </a>
                        <div class="dropdown-menu " id="navbarDropdown">
                            <ul class="notification">
                                <li>
                                    <time>May , 2020</time>
                                    <p class="para">Hello {{ Auth::user()->name }} !!</p>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link dropdown-toggle" href="#navbarDropdown1" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                        </a>
                        <div class="dropdown-menu " id="navbarDropdown1">
                            <ul class="notification">
                                <li><a href="{{ route('profile') }}">My Profile</a></li>
                                <li>
                                    <h2 class="card--title"><a href="#!"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    </h2>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    </li>
                @else
                    <li class="nav-item ">
                        <button class="login" onclick="window.location.href='{{ url('/login') }}'">Log In</button>

                        <style>
                            header.header_not_fixed .header_social_icons_wrapper {
                                display: inline-block;
                            }

                            .header_social_icons_wrapper {
                                display: inline-flex;
                                position: relative;
                                margin-top: 20px;
                            }

                            .header_social_icons_wrapper div.social_container.whatsapp_container {
                                background: linear-gradient(to bottom, #22ff74, #1cc726);
                            }

                            .header_social_icons_wrapper div.social_container {
                                position: relative;
                                float: right;
                                cursor: pointer;
                                background: #8c8c8c;
                                width: 31px;
                                height: 31px;
                                text-align: center;
                                /* margin: -1px 0 0 10px; */
                                padding: 0;
                                line-height: 11px;
                                border-radius: 12px;
                                transition: all .3s;
                            }

                            .header_social_icons_wrapper div.social_container i {
                                text-align: center;
                                line-height: 9px;
                                margin: auto;
                                padding: 10px;
                                font-size: 17px;
                                color: #fff !important;
                            }
                        </style>
                        <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
                            integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
                            crossorigin="anonymous" referrerpolicy="no-referrer" />
                        <div class="header_social_icons_wrapper col-md-1">
                            <div class="social_container whatsapp_container"
                                onclick="window.open('https://wa.me/971507575789', '_blank');">
                                <i class="fa fa-whatsapp"></i>
                            </div>
                        </div>
                    </li>
                @endauth


            </ul>
        </nav>
    </section>
</header>
<nav class="navbar navbar--secondary">
    <div class="section-rule">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">
                    Home
                </a>
            </li>
            <li class="nav-item  ">
                <a class="nav-link " href="{{ route('aboutus') }}">
                    About
                </a>
            </li>

            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#navbarDropdown" data-toggle="dropdown">
                    <i class="fa fa-chevron-down" style="margin-right: 5px"></i>Categories </a>
                <div class="dropdown-menu " id="navbarDropdown"
                    style="
    position: absolute !important;
    top: 96%;
    border: 0;
    box-shadow: 0px 5px 10px rgb(0 0 0 / 10%);
    right: 0%;
    width: 300px;
    font-size: 15px;
    padding: 10px 0px;
    left: 0;
                ">
                    <ul class="notification">
                        @forelse (serviceCategories() as $service)
                            <li style="margin: 8px 0px;">
                                <a href="{{ route('sub.categories', $service->slug) }}">{{ $service->name }}</a>
                            </li>
                        @empty
                            No Service
                        @endforelse
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="{{ route('contactus') }}">
                    Contact
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="{{ route('our.services') }}">
                    Service
                </a>
            </li>
            <li class="nav-item ml-auto">
                <a class="nav-link " href="{{ route('service.provider.register') }}">
                    <i class="bi bi-trophy-fill"></i> Become A Seller
                </a>
            </li>
            <!-- <li class="nav-item ">
                <a class="nav-link " href="#!" >
                    Page 2
                </a>
            </li> -->
        </ul>
    </div>
</nav>
