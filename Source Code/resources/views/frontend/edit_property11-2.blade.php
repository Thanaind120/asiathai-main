<!doctype html>
<html lang="th">
<head>      
    <title>หน้าแรก</title>
    @include('frontend/inc_header')
    <link rel="stylesheet" href="{{asset('assets_frontend/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets_frontend/css/owl.theme.default.min.css')}}">
<script src="{{asset('assets_frontend/js/owl.carousel.min.js')}}"></script>
</head>
<body >
   @include('frontend/inc_navbar_hotel')
    <div class="bg-grey">
    <div class="container">
        <div class="box-hotel">
            <div class="text-filter text-grey">Cancellation policies</div>
            <div class="col-xl-8">
                <div class="row g-2 mt-sm-3 mt-1">
                    <div class="col-3">
                        <div class="but-cancel-date">
                            1 day
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="but-cancel-date active">
                            5 days
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="but-cancel-date">
                            14 days
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="but-cancel-date">
                            30 days
                        </div>
                    </div>
                </div>
                <div class="text-tiny text-grey">How many days before arrival can guests cancel their booking for free?</div>
                <div class="mt-4">
                 <div class="text-tiny text-bold text-grey"> <div class="text-tiny text-grey">Protection against accidental bookings</div></div>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                  <label class="form-check-label" for="flexSwitchCheckChecked">On</label>
                </div>    
            </div>
                <div class="text-small text-grey">To avoid having to deal with accidental bookings, we automatically waive cancellation fees for guests who cancel within 24 hours of booking.</div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-4 ">
                     <a href="{{url('list_property11')}}"><div class="btn-grey mt-3">cancel</div></a>
                </div>
                <div class="col-sm-4 ">
                    <a href="{{url('list_property11')}}"><div class="btn-orange mt-3">Save</div></a>
                </div>
            </div>
        </div>
    </div>
    <div class="space-footer"></div>
    </div>
    @include('frontend/inc_footer_hotel')
    </body>
</html>

