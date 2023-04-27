<style>
    footer {
        padding-top: 2em;
    }

    .footer {
        background-color: #1b4484 !important;
        color: #f4f4f4 !important;
    }
</style>
@php
    $data = \App\Website::find(1);
@endphp
<footer class="footer">
    <div class="section-rule">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="brand logo">
                    <img src="https://gggservices.com/dashboard/img/1671640947logo.webp" alt="" loading="lazy"
                        class="img-fluid">
                </div>
                <ul class="links-list">
                    <li>
                        Director: <a href="mailto:brad@gggservices.com"><i
                                class="material-icons">mail</i>brad@gggservices.com</a>
                    </li>
                    <li>
                        Sales: <a href="mailto:sales@gggservices.com"><i
                                class="material-icons">mail</i>sales@gggservices.com</a>
                    </li>
                    <li>
                        Support: <a href="mailto:support@gggservices.com"><i
                                class="material-icons">mail</i>support@gggservices.com</a>
                    </li>
                    <li>
                        Dubai Direct: <a href="telto:+971543713132"><i class="material-icons">phone</i>+971543713132</a>
                    </li>
                </ul>
                <ul class="social">

                    @if ($data->fb_url != null)
                        <li><a target="_blank" href="{{ $data->fb_url }}" class="fa fa-facebook"></a></li>
                    @endif
                    @if ($data->twitter_url != null)
                        <li><a target="_blank" href="{{ $data->twitter_url }}" class="fa fa-twitter"></a></li>
                    @endif
                    @if ($data->youtube_url != null)
                        <li><a target="_blank" href="{{ $data->youtube_url }}" class="fa fa-youtube-square"></a></li>
                    @endif
                    @if ($data->instagram_url != null)
                        <li><a target="_blank" href="{{ $data->instagram_url }}" class="fa fa-instagram"></a></li>
                    @endif
                    <li><a href="skype:gggplatforms?chat" class="fa fa-skype"></a></li>
                    <li><a target="_blank" href="https://wa.me/971507575789" class="fa fa-whatsapp"></a></li>
                </ul>
                <ul class="social">

                    {{-- <li><a target="_blank" href="#!"><img src="./gallery/google.png" alt=""></a> --}}
                    {{-- <a target="_blank" href="#!"><img src="./gallery/ios.png" alt=""></a> --}}
                    {{-- </li> --}}


                    <li>
                        <a target="_blank" href="{{ $data->appstore_url }}"><img src="{{ asset('gallery/ios.png') }}"
                                alt=""></a>
                        <a target="_blank" href="{{ $data->playstore_url }}"><img
                                src="{{ asset('gallery/google.png') }}" alt=""></a>

                    </li>

                </ul>

            </div>
            <div class="col-lg-2 col-sm-6">
                <p class="title--small">Customers</p>
                <ul class="links-list">
                    {{-- <li><a href="/service-request">My service requests</a></li> --}}
                    <li><a href="{{ route('work') }}">How it works?</a></li>
                    <li><a href="/service/special-request">Custom Job</a></li>
                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-6">
                <p class="title--small">About Service On Us</p>
                <ul class="links-list">
                    <li><a href="{{ route('aboutus') }}">About Us</a></li>
                    <li><a href="{{ route('contactus') }}">Contact Us</a></li>
                    {{-- <li><a href="./testimonials-page.php">Testimonials</a></li> --}}
                    <li><a href="{{ route('privacy') }}">Our Policies</a></li>
                    <li><a href="{{ route('terms') }}">Terms & Conditons</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-6">
                <p class="title--small">Most Popular Service</p>
                @php
                    $trendings = \App\Service::latest()
                        ->where('trending', 'on')
                        ->limit('6')
                        ->get();
                @endphp
                <ul class="links-list">
                    @if (count($trendings) > 0)

                        @foreach ($trendings as $trending)
                            <li><a
                                    href="{{ route('book.service', ['slug' => $trending->slug, 'category_id' => $trending->service_category_id]) }}">{{ $trending->name }}</a>
                            </li>
                        @endforeach

                    @endif


                </ul>
            </div>

            <hr class="line">

            <div class="col-md-12">
                <div class="row footer__last">
                    <p>Copyright © 2020 <a href="{{ url('/') }}">GGGSERVICES</a>. All Rights Reserved. design: <a
                            href="www.121merchant.com" target="_blank">121Merchant </a> & <a
                            href="https://www.thesunbi.com/" target="_blank">SunBi</a></p>
                    <ul class="social">
                        <li><img src="{{ asset('frontend/gallery/001-discover.svg') }}"
                                alt="payment_via_discover_card"></li>
                        <li><img src="{{ asset('frontend/gallery/002-master-card.svg') }}"
                                alt="payment_via_discover_card"></li>
                        <li><img src="{{ asset('frontend/gallery/003-paypal.svg') }}" alt="payment_via_discover_card">
                        </li>
                        <li><img src="{{ asset('frontend/gallery/005-visa.svg') }}" alt="payment_via_discover_card">
                        </li>
                        <li><img src="{{ asset('frontend/gallery/006-amex.svg') }}" alt="payment_via_discover_card">
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>
