<div class="box-sidebaraccount mt-5">
    <a href="{{ url(Session::get('lang').'/mybooking') }}" class="menu-account">
        <div class="text-menu-account <?php echo (isset($active[0]))?$active[0]:'';?>">
            <div class="row">
                <div class="col-2"><i class="far fa-calendar"></i></div>
                <div class="col-10">@lang('lang.my_booking')</div>
            </div>
        </div>
    </a>
    <a href="{{ url(Session::get('lang').'/review') }}" class="menu-account">
        <div class="text-menu-account <?php echo (isset($active[1]))?$active[1]:'';?>">
            <div class="row">
                <div class="col-2"><i class="far fa-star"></i></div>
                <div class="col-10">@lang('lang.my_review')</div>
            </div>
        </div>
    </a>
    <a href="{{ url(Session::get('lang').'/profile') }}" class="menu-account">
        <div class="text-menu-account <?php echo (isset($active[2]))?$active[2]:'';?>">
            <div class="row">
                <div class="col-2"><i class="far fa-user"></i></div>
                <div class="col-10">@lang('lang.profile')</div>
            </div>
        </div>
    </a>
</div>
