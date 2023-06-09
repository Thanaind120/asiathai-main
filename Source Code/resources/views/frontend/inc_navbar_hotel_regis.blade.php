<nav>
    <div class="">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6">
                    <a href="{{ url('/'.Session::get('lang')) }}">
                        <img src="{{ asset('assets_frontend/images/logo.svg') }}" class="logo footer">
                    </a>
                </div>
                <div class="col-sm-6">
                    @if (Session::get('lang') == 'en')
                    <ul class="nav-list-hotel-nav">
                        <li class="nav-link-hotel-nav">
                            <?php
                            $currenturl = url()->current();
                            ?>
                            @if ($currenturl != 'https://korn2.orangeworkshop.info/Poolvilla/en/signin_hotel')
                            <a href="{{ url(Session::get('lang').'/signin') }}">
                                <button class="dropbtn profile"><i
                                        class="fas fa-user text-nav-hotel text-orange"></i><br><span
                                        class="text-tiny">@lang('lang.sign_in')</span>
                                </button>
                            </a>
                            @elseif ($currenturl == 'https://korn2.orangeworkshop.info/Poolvilla/en/signin_hotel')
                            <a href="{{ url(Session::get('lang').'/signin_hotel') }}">
                                <button class="dropbtn profile"><i
                                        class="fas fa-user text-nav-hotel text-orange"></i><br><span
                                        class="text-tiny">@lang('lang.sign_in')</span>
                                </button>
                            </a>
                            @endif
                            <div class="dropdown-content profile hotel"></div>
                        </li>
                        <li class="nav-link-hotel-nav"><a href="#"><img src="{{ asset('assets_frontend/images/lang-en.png') }}" class="lang-hotel"></a>
                        </li>
                    </ul>
                    @elseif (Session::get('lang') == 'th')
                    <ul class="nav-list-hotel-nav">
                        <li class="nav-link-hotel-nav">
                            <?php
                            $currenturl = url()->current();
                            ?>
                            @if ($currenturl != 'https://korn2.orangeworkshop.info/Poolvilla/th/signin_hotel')
                            <a href="{{ url(Session::get('lang').'/signin') }}">
                                <button class="dropbtn profile"><i
                                        class="fas fa-user text-nav-hotel text-orange"></i><br><span
                                        class="text-tiny">@lang('lang.sign_in')</span>
                                </button>
                            </a>
                            @elseif ($currenturl == 'https://korn2.orangeworkshop.info/Poolvilla/th/signin_hotel')
                            <a href="{{ url(Session::get('lang').'/signin_hotel') }}">
                                <button class="dropbtn profile"><i
                                        class="fas fa-user text-nav-hotel text-orange"></i><br><span
                                        class="text-tiny">@lang('lang.sign_in')</span>
                                </button>
                            </a>
                            @endif
                            <div class="dropdown-content profile hotel">
                            </div>
                        </li>
                        <li class="nav-link-hotel-nav"><a href="#"><img src="{{ asset('assets_frontend/images/090-thailand-1.png') }}" class="lang-hotel"></a>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
