<nav>
    <div class="for-destop">
        <div class="navigation non-scroll">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-4 col-2">
                        <a href="{{ url('/'.Session::get('lang')) }}">
                            <img src="{{ asset('assets_frontend/images/logo.svg') }}" class="logo">
                        </a>
                    </div>
                    <div class="col-xl-8 col-10">
                        <!-- when-login-->
                        <ul class="nav-list">
                            <li class="nav-link non-scroll"><a href="{{ url('/'.Session::get('lang')) }}">@lang('lang.home')</a>
                            </li>
                            <li class="nav-link non-scroll"><a href="{{ url(Session::get('lang').'/tourist-attraction') }}">@lang('lang.tourist_attraction')</a></li>
                            <li class="nav-link non-scroll">
                                <div class="dropdown profile">
                                    <button class="dropbtn profile"><i
                                            class="fas fa-user-circle name-text me-2 text-orange"></i>@lang('lang.welcome'),@if(Auth::guard('member')->user() != '' || Auth::guard('member')->user() != null)
                                        {{ Auth::guard('member')->user()->firstname }} @endif</button>
                                    @if(Auth::guard('member')->user() != '' || Auth::guard('member')->user() != null)
                                    <div class="dropdown-content profile">
                                        <a href="{{ url(Session::get('lang').'/profile') }}">@lang('lang.my_profile')</a>
                                        <a href="{{ url(Session::get('lang').'/mybooking') }}">@lang('lang.my_booking')</a>
                                        <a href="{{ url(Session::get('lang').'/logout') }}">@lang('lang.log_out')</a>
                                    </div>
                                    @else
                                    <div class="dropdown-content profile">
                                        <a href="{{ url(Session::get('lang').'/signin') }}">@lang('lang.sign_in')</a>
                                    </div>
                                    @endif
                                </div>
                            </li>
                            @if(Session::get('lang') == 'en')
                            <li class="nav-link non-scroll">
                                <div class="dropdown">
                                    <a class="btn btn-lang dropdown-toggle" type="button" href="{{ url('en').session()->get('prefix') }}" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset('assets_frontend/images/lang-en.png') }}" class="lang">@lang('lang.en')
                                    </a>
                                    <ul class="dropdown-menu lang" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{ url('th').session()->get('prefix') }}"><img
                                                    src="{{ asset('assets_frontend/images/090-thailand-1.png') }}"
                                                    class="lang">@lang('lang.th')</a></li>
                                    </ul>
                                </div>
                            </li>
                            @elseif(Session::get('lang') == 'th')
                            <li class="nav-link non-scroll">
                                <div class="dropdown">
                                    <a class="btn btn-lang dropdown-toggle" type="button" href="{{ url('th').session()->get('prefix') }}" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset('assets_frontend/images/090-thailand-1.png') }}" class="lang">@lang('lang.th')
                                    </a>
                                    <ul class="dropdown-menu lang" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{ url('en').session()->get('prefix') }}">
                                            <img src="{{ asset('assets_frontend/images/lang-en.png') }}" class="lang">@lang('lang.en')</a></li>
                                    </ul>
                                </div>
                            </li>
                            @endif
                        </ul>
                        <!-- when-login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="for-mobile-tablet">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <button class="btn btn-nav-mobile" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"><i
                            class="fas fa-bars text-orange"></i></button>
                </div>
                <div class="col-4">
                    <a href="{{ url('/'.Session::get('lang')) }}">
                        <img src="{{ asset('assets_frontend/images/logo.svg') }}" class="logo">
                    </a>
                </div>
            </div>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBackdrop"
                aria-labelledby="offcanvasWithBackdropLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel"></h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <!-- non-login-->
                    <!--<ul class="nav-list">
                        <li class="nav-link-"><a href="index.php"><i class="fas fa-home text-orange pe-2"></i>Home</a></li>
                        <li class="nav-link-"><a href="tourist-attraction.php"><i class="fas fa-place-of-worship text-orange pe-2"></i>Tourist Attraction</a></li>
                        <li class="nav-link-"><a href="register.php"><i class="fas fa-user-plus text-orange pe-2"></i>Register</a></li>
                        <li class="nav-link-"><a href="signin.php"><i class="fas fa-sign-in-alt text-orange pe-2"></i>Sign in</a></li>
                    </ul>-->
                    <!-- non-login-->
                    <!-- when-login-->
                    <ul class="nav-list">
                        <li class="nav-link- text-orange"> @lang('lang.welcome'),@if(Auth::guard('member')->user() != '' || Auth::guard('member')->user() != null)
                            {{ Auth::guard('member')->user()->firstname }} @endif</li>
                        <li class="nav-link-"><a href="{{ url('/'.Session::get('lang')) }}"><i
                                    class="fas fa-home text-orange pe-2"></i>@lang('lang.home')</a>
                        </li>
                        <li class="nav-link-"><a href="{{ url(Session::get('lang').'/tourist-attraction') }}"><i
                                    class="fas fa-place-of-worship text-orange pe-2"></i>@lang('lang.tourist_attraction')</a></li>
                        @if(Auth::guard('member')->user() != '' || Auth::guard('member')->user() != null)
                        <li class="nav-link-"> <a href="{{ url(Session::get('lang').'/profile') }}"><i
                                    class="far fa-id-card text-orange pe-2"></i>@lang('lang.my_profile')</a></li>
                        <li class="nav-link-"><a href="{{ url(Session::get('lang').'/mybooking') }}"><i
                                    class="fas fa-umbrella-beach text-orange pe-2"></i>@lang('lang.my_booking')</a></li>
                        <li class="nav-link-"><a href="{{ url(Session::get('lang').'/review') }}"><i class="far fa-star text-orange pe-2"></i>@lang('lang.my_reviews')</a></li>
                        <li class="nav-link-"><a href="{{ url(Session::get('lang').'/logout') }}"><i
                                    class="fas fa-door-open text-orange pe-2"></i>@lang('lang.log_out')</a>
                        </li>
                        @else
                        <li class="nav-link-"><a href="{{ url(Session::get('lang').'/signin') }}"><i
                                    class="fas fa-door-open text-orange pe-2"></i>@lang('lang.sign_in')</a>
                        @endif
                    </ul>
                    <!-- when-login-->
                </div>
            </div>
        </div>
    </div>
</nav>