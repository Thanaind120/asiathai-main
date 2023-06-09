<!doctype html>
<html lang="th">
<head>      
    <title>หน้าแรก</title>
    @include('frontend/inc_header')
    <link rel="stylesheet" href="{{asset('assets_frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_frontend/css/owl.theme.default.min.css')}}">
    <script src="{{asset('assets_frontend/js/owl.carousel.min.js')}}"></script>
</head>
<body>
   @include('frontend/inc_navbar_hotel')
    <div class="bg-grey">
    <div class="container">
        <div class="box-hotel">
            <div class="text-filter text-grey">Set up a weekly rate</div>
            <div class="col-sm-8">
                <div class="vl-filter-hotel">
                <div class="text-tiny text-grey mt-3">In addition to the standard rate plan you created for your property, you can add a weekly rate plan.</div>
                <div class="text-tiny text-grey mt-3">For this, you set a discounted price and use the same cancellation policy as the standard rate plan. Guests who stay for at least a week are interested in discounts since they’ll be spending more on their overall booking.

</div>
                <div class="mt-4">
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                  <label class="form-check-label" for="flexSwitchCheckChecked">Set up a weekly rate plan</label>
                </div>    
                </div>
                </div>
                <div class="text-tiny text-grey text-bold mt-3 mb-1">How much cheaper than the standard rate do you want to make this rate plan?</div>
                <div class="input-group">
                    <input type="number" class="form-control text-r " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="10"><span class="input-group-text hotel" id="inputGroup-sizing-default">%</span>
                </div>
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

