<nav>
    <div class="for-destop">
        <div class="navigation non-scroll">
        <div class="container">
            <ul class="nav-list hotel">
                <li class="nav-link-hotel"><a href="{{url('hotel')}}">Dashboard</a></li>
                <li class="nav-link-hotel"><a href="{{url('hotel_reservation')}}">Resevation</a></li>
                 <li class="nav-link-hotel"><a href="{{url('hotel_property')}}">Property</a></li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn btn-nav-link-hotel">Finace<i class="fas fa-chevron-down ms-2"></i></button>
                        <div class="dropdown-content profile hotel">
                            <a href="{{url('hotel_finace_invoice')}}">Invoice</a>
                            <a href="{{url('hotel_finace_reciept')}}">Reciept</a>
                        </div>
                    </div>
                </li>
                <li class="nav-link-hotel"><a href="{{url('hotel_inbox')}}">Inbox</a></li>
                <li class="nav-link-hotel"><a href="{{url('hotel_guest_review')}}">Review</a></li>
            </ul>
        </div>
        </div>
    </div>
        <div class="for-mobile-tablet">
            <div class="container">
        <div class="row">
                <div class="col-4">
                    <button class="btn btn-nav-mobile" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"><i class="fas fa-bars text-white"></i></button>
                </div>
                <div class="col-4">
                        <a href="{{url('index')}}">
                            <img src="{{asset('assets_frontend/images/logo.svg')}}" class="logo">
                        </a>
                </div>
            </div>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel"></h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                    <!-- non-login-->
                    <!--<ul class="nav-list">
                        <li class="nav-link-"><a href="index.php"><i class="fas fa-home text-orange pe-2"></i>Home</a></li>
                        <li class="nav-link-"><a href="tourist_attraction.php"><i class="fas fa-place-of-worship text-orange pe-2"></i>Tourist Attraction</a></li>
                        <li class="nav-link-"><a href="register.php"><i class="fas fa-user-plus text-orange pe-2"></i>Register</a></li>
                        <li class="nav-link-"><a href="signin.php"><i class="fas fa-sign-in-alt text-orange pe-2"></i>Sign in</a></li>
                    </ul>-->
                <!-- non-login-->
                <!-- when-login-->
                    <ul class="nav-list">
                        <li class="nav-link-mhotel"><a href="{{url('hotel')}}">Dashboard</a></li>
                        <li class="nav-link-mhotel"><a href="{{url('hotel_reservation')}}">Resevation</a></li>
                        <li class="nav-link-mhotel"><a href="{{url('hotel_property')}}">Property</a></li>
                        <li class="nav-link-mhotel"><a href="{{url('hotel_inbox')}}">Inbox</a></li>
                        <li class="nav-link-mhotel"><a href="{{url('hotel_guest_review')}}">Review</a></li>
                        <div class=" bg-fi">
                        <li class="nav-link-mhotel text-bold text-orange">Finance</li>
                        </div>
                        <li class="nav-link-mhotel"> <a href="{{url('hotel_finace_invoice')}}">Invoice</a></li>
                        <li class="nav-link-mhotel"><a href="{{url('hotel_finace_reciept')}}">Reciept</a></li>
                    </ul>
                <!-- when-login-->
              </div>
            </div>
    </div>
        </div>

</nav>