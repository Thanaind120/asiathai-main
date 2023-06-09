<div class="bg-footer">
    <div class="row justify-content-between">
        <div class="col-sm-5">
           <img src="{{ asset('assets_frontend/images/logo.svg') }}" class="logo-footer">
            <!--<p class="textft text-orange mt-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
            <div class="row g-1 mt-2">
                <div class="col-auto">
                    <i class="fas fa-phone text-orange"></i>
                </div>
                <div class="col-auto">
                    <p class="textft text-orange">+66 00-000-0000</p>
                </div>
            </div>
            <div class="row g-1">
                <div class="col-auto">
                    <i class="fas fa-envelope text-orange"></i>
                </div>
                <div class="col-auto">
                    <p class="textft text-orange">info@poolvilla.com</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="col-8">
                    <ul class="">
                        <li class="nav-link non-scroll"><a href="{{ url('/'.Session::get('lang')) }}">@lang('lang.home')</a></li>
                        <li class="nav-link non-scroll"><a href="{{ url(Session::get('lang').'/tourist_attraction') }}">@lang('lang.tourist_attraction')</a></li>
                        <li class="nav-link non-scroll"><a href="{{ url(Session::get('lang').'/signin_hotel') }}">@lang('lang.for_partner')</a></li>
                       <!-- when non-login-->
                         <!-- <li class="nav-link non-scroll"><a href="signin.php">Sign in</a></li> -->
                       <!-- when non-login-->
                       <!-- when login
                        <li class="nav-link non-scroll"><a href="profile.php">My Profile</a></li>
                        <li class="nav-link non-scroll"><a href="mybooking.php">My Booking</a></li>
                         when login-->
                    </ul>
                </div>
                <!-- <div class="col-6">
                    <ul class="">
                         <li class="nav-link non-scroll"><a href="signin_hotel.php">For Hotel</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
        <div class="col-sm-3 col-6">
            <div class="row g-0 justify-content-end">
                <div class="col-sm-2 col-3">
                    <a href="#">
                        <img src="{{ asset('assets_frontend/images/icon_fb_footer.svg') }}" class="text-orange iconft">
                    </a>
                </div>
                <div class="col-sm-2 col-3">
                    <a  href="#">
                        <img src="{{ asset('assets_frontend/images/icon_line_white.svg') }}" class="text-orange iconft">
                    </a>
                </div>
                <div class="col-sm-2 col-3">
                    <a href="#">
                        <img src="{{ asset('assets_frontend/images/icon_twitter_white.svg') }}" class="text-orange iconft">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="line-orange">
        <div class="float-end">
            <p class="textft text-orange">@lang('lang.copyright')<i class="far fa-copyright mx-1"></i>@lang('lang.poolvilla').2021</p>   
        </div>
    </div>
</div>