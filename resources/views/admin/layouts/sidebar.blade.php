<div class="sidebar" data-active-color="blue" data-background-color="black" data-image="{{asset('dashboard/img/sidebar-3.jpg')}}">
    <!--
    Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
    Tip 2: you can also add an image using data-image tag
    Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
    <div class="logo">
        <a href="{{route('admin.dashboard')}}" class="simple-text logo-mini">
            SA
        </a>
        <a href="{{route('admin.dashboard')}}" class="simple-text logo-normal">
            {{Auth::guard('admin')->user()->name}}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{asset('dashboard/img/'.auth()->guard()->user()->image)}}" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>
                                {{Auth::guard('admin')->user()->name}}
                                <b class="caret"></b>
                            </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        {{--<li>--}}
                            {{--<a href="{{route('admin.edit.profile')}}">--}}
                                {{--<span class="sidebar-mini">MP</span>--}}
                                {{--<span class="sidebar-normal">My Profile</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="{{route('admin.change.password')}}">
                                <span class="sidebar-mini">CP</span>
                                <span class="sidebar-normal">Change Password</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.logout')}}">
                                <span class="sidebar-mini">L</span>
                                <span class="sidebar-normal">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="{{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
                <a href="{{route('admin.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="{{ (request()->is('admin/setting*')) || request()->is('admin/slider*') ||request()->is('admin/our-mission*')? 'active' : '' }}">
                <a data-toggle="collapse" href="#pagesExamples-setting">
                    <i class="material-icons">perm_data_setting</i>
                    <p>Setting
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(request()->is('admin/setting*') ||(request()->is('admin/slider*')) ||request()->is('admin/our-mission*'))in @endif" id="pagesExamples-setting">
                    <ul class="nav">
                        <li class="{{(request()->is('admin/setting*')) ? 'active':''}}">
                            <a href="{{route('setting.index')}}">
                                <span class="sidebar-mini">MP</span>
                                <span class="sidebar-normal">Manage Website</span>
                            </a>
                        </li>
                        <li class="{{(request()->is('admin/slider*')) ? 'active':''}}">
                            <a href="{{route('slider.index')}}">
                                <span class="sidebar-mini">P</span>
                                <span class="sidebar-normal">Slider</span>
                            </a>
                        </li>

                        <li class="{{(request()->is('admin/our-mission*')) ? 'active':''}}">
                            <a href="{{route('our-mission.index')}}">
                                <span class="sidebar-mini">0M</span>
                                <span class="sidebar-normal">Our Mission</span>
                            </a>
                        </li>

                        {{--<li class="{{ (request()->is('admin/our-mission*')) ? 'active' : '' }}">--}}
                            {{--<a href="{{route('our-mission.index')}}">--}}
                                {{--<i class="material-icons">games</i>--}}
                                {{--<p>Our Mission</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}


                    </ul>
                </div>
            </li>



            <li>
                <a href="{{route('city.index')}}">
                    <i class="material-icons">location_on</i>
                    <p>City</p>
                </a>
            </li>


            <li class="{{ (request()->is('admin/service-provider*')) ? 'active' : '' }}">
                <a href="{{route('service-provider.index')}}">
                    <i class="material-icons">supervised_user_circle</i>
                    <p>Service Providers</p>
                </a>
            </li>

            <li class="{{ (request()->is('admin/customer*')) ? 'active' : '' }}">
                <a href="{{route('customer.index')}}">
                    <i class="material-icons">supervised_user_circle</i>
                    <p>Customers</p>
                </a>
            </li>

            <li class="{{ (request()->is('admin/page*')) ? 'active' : '' }}">
                <a data-toggle="collapse" href="#pagesExamples">
                    <i class="material-icons">library_books</i>
                    <p>Pages
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(request()->is('admin/page*'))in @endif" id="pagesExamples">
                    <ul class="nav">
                        <li class="{{Request::is('admin/page') ? 'active':''}}">
                            <a href="{{route('page.index')}}">
                                <span class="sidebar-mini">MP</span>
                                <span class="sidebar-normal">Manage Page</span>
                            </a>
                        </li>
                        <li class="{{Request::is('admin/page/create') ? 'active':''}}">
                            <a href="{{route('page.create')}}">
                                <span class="sidebar-mini">P</span>
                                <span class="sidebar-normal">Add Page</span>
                            </a>
                        </li>


                    </ul>
                </div>
            </li>




            <li class="{{ (request()->is('admin/service-category*')) ? 'active' : '' }}">
                <a data-toggle="collapse" href="#componentsExamples">
                    <i class="material-icons">bento</i>
                    <p>Service Category
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(request()->is('admin/service-category*'))in @endif" id="componentsExamples">
                    <ul class="nav">
                        <li class="{{Request::is('admin/service-category') ? 'active':''}}">
                            <a href="{{route('service-category.index')}}">
                                <span class="sidebar-mini">MSC</span>
                                <span class="sidebar-normal">Manage Service Category</span>
                            </a>
                        </li>
                        <li class="{{Request::is('admin/service-category/create') ? 'active':''}}">
                            <a href="{{route('service-category.create')}}">
                                <span class="sidebar-mini">SC</span>
                                <span class="sidebar-normal">Add Service Category</span>
                            </a>
                        </li>

                        <li class="{{Request::is('admin/service-sub-category') ? 'active':''}}">
                            <a href="{{route('createSubCategory')}}">
                                <span class="sidebar-mini">SC</span>
                                <span class="sidebar-normal">Add Service Subcategory</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="{{ (request()->is('admin/service*')) ? 'active' : '' }}">
                <a data-toggle="collapse" href="#pagesExamples99">
                    <i class="material-icons">design_services</i>
                    <p>Services
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(request()->is('admin/service*'))in @endif" id="pagesExamples99">
                    <ul class="nav">
                        <li class="{{Request::is('admin/service') ? 'active':''}}">
                            <a href="{{route('service.index')}}">
                                <span class="sidebar-mini">MP</span>
                                <span class="sidebar-normal">Manage Services</span>
                            </a>
                        </li>
                        <li class="{{Request::is('admin/service/create') ? 'active':''}}">
                            <a href="{{route('service.create')}}">
                                <span class="sidebar-mini">P</span>
                                <span class="sidebar-normal">Add Services</span>
                            </a>
                        </li>


                    </ul>
                </div>
            </li>

            <li class="{{ (request()->is('admin/service-request*')) ? 'active' : '' }}">
                <a href="{{route('admin.service-request')}}">
                    <i class="material-icons">addchart</i>
                    <p>Service Request</p>
                </a>
            </li>


            <li class="{{ (request()->is('admin/order*')) ? 'active' : '' }}">
                <a href="{{route('order.index')}}">
                    <i class="material-icons">add_shopping_cart</i>
                    <p>Orders</p>
                </a>
            </li>



            <li class="{{ (request()->is('admin/subscription-plan*')) ? 'active' : '' }}">
                <a data-toggle="collapse" href="#pagesExamples12">
                    <i class="material-icons">event</i>
                    <p>Subscribtion Plan
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(request()->is('admin/subscription-plan*'))in @endif" id="pagesExamples12">
                    <ul class="nav">
                        <li class="{{Request::is('admin/subscription-plan') ? 'active':''}}">
                            <a href="{{route('subscription-plan.index')}}">
                                <span class="sidebar-mini">MT</span>
                                <span class="sidebar-normal">Plan</span>
                            </a>
                        </li>
                        <li class="{{Request::is('admin/subscription-plan/subscribed-users') ? 'active':''}}">
                            <a href="{{route('subscribed.user')}}">
                                <span class="sidebar-mini">T</span>
                                <span class="sidebar-normal">Subscribed User</span>
                            </a>
                        </li>


                    </ul>
                </div>
            </li>

            {{--<li class="{{ (request()->is('admin/service-field*')) ? 'active' : '' }}">--}}
                {{--<a data-toggle="collapse" href="#pagesExamples123">--}}
                    {{--<i class="material-icons">addchart</i>--}}
                    {{--<p>Service Field--}}
                        {{--<b class="caret"></b>--}}
                    {{--</p>--}}
                {{--</a>--}}
                {{--<div class="collapse @if(request()->is('admin/service-field*'))in @endif" id="pagesExamples123">--}}
                    {{--<ul class="nav">--}}
                        {{--<li class="{{Request::is('admin/service-field') ? 'active':''}}">--}}
                            {{--<a href="{{route('service-field.index')}}">--}}
                                {{--<span class="sidebar-mini">MT</span>--}}
                                {{--<span class="sidebar-normal">Manage Service Field</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="{{Request::is('admin/service-field/create') ? 'active':''}}">--}}
                            {{--<a href="{{route('service-field.create')}}">--}}
                                {{--<span class="sidebar-mini">T</span>--}}
                                {{--<span class="sidebar-normal">Add Service Field</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}


                    {{--</ul>--}}
                {{--</div>--}}
            {{--</li>--}}


            <li class="{{ (request()->is('admin/testimonial*')) ? 'active' : '' }}">
                <a data-toggle="collapse" href="#pagesExamples12">
                    <i class="material-icons">grading</i>
                    <p>Testimonial
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(request()->is('admin/testimonial*'))in @endif" id="pagesExamples12">
                    <ul class="nav">
                        <li class="{{Request::is('admin/testimonial') ? 'active':''}}">
                            <a href="{{route('testimonial.index')}}">
                                <span class="sidebar-mini">MT</span>
                                <span class="sidebar-normal">Manage Testimonial</span>
                            </a>
                        </li>
                        <li class="{{Request::is('admin/testimonial/create') ? 'active':''}}">
                            <a href="{{route('testimonial.create')}}">
                                <span class="sidebar-mini">T</span>
                                <span class="sidebar-normal">Add Testimonial</span>
                            </a>
                        </li>


                    </ul>
                </div>
            </li>

            <li class="{{ (request()->is('admin/page*')) ? 'active' : '' }}">
                <a data-toggle="collapse" href="#pagesExamples56">
                    <i class="material-icons">post_add</i>
                    <p>FAQ
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @if(request()->is('admin/faq*'))in @endif" id="pagesExamples56">
                    <ul class="nav">
                        <li class="{{Request::is('admin/faq') ? 'active':''}}">
                            <a href="{{route('faq.index')}}">
                                <span class="sidebar-mini">MP</span>
                                <span class="sidebar-normal">Manage FAQ</span>
                            </a>
                        </li>
                        <li class="{{Request::is('admin/faq/create') ? 'active':''}}">
                            <a href="{{route('faq.create')}}">
                                <span class="sidebar-mini">P</span>
                                <span class="sidebar-normal">Add FAQ</span>
                            </a>
                        </li>


                    </ul>
                </div>
            </li>

            <li class="{{ (request()->is('admin/logo*')) ? 'active' : '' }}">
                <a href="{{route('logo.index')}}">
                    <i class="material-icons">add_photo_alternate</i>
                    <p>Logos</p>
                </a>
            </li>


            <li class="{{ (request()->is('admin/how-it-work*')) ? 'active' : '' }}">
                <a href="{{route('how-it-work.index')}}">
                    <i class="material-icons">fact_check</i>
                    <p>How It work</p>
                </a>
            </li>

            <li class="{{ (request()->is('admin/general-enquiry*')) ? 'active' : '' }}">
                <a href="{{route('general-enquiry.index')}}">
                    <i class="material-icons">message</i>
                    <p>General Enquiry</p>
                </a>
            </li>

            <li class="{{ (request()->is('admin/service-enquiry*')) ? 'active' : '' }}">
                <a href="{{route('service-enquiry.index')}}">
                    <i class="material-icons">forum</i>
                    <p>Service Enquiry</p>
                </a>
            </li>
        </ul>
    </div>
</div>
