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

                <div class="mt-2">
                    <div class="mt-3">

                        <div class="col-xl-6 mx-auto">
                            <div class="text-filter text-grey text-start text-bold">RATE PLANS</div>
                            <div class="text-filter text-grey text-bold mt-3">Standard rate plan</div>
                            <div class="vl-filter-hotel">
                                <div class="mt-3">
                                    <div class="clearfix">
                                        <div class="float-start">
                                            <div class="text-tiny text-grey text-bold">Price per group size</div>
                                        </div>
                                        <div class="float-end">
                                            <a href="{{url('edit_property11-1')}}">
                                                <div class="text-tiny text-red text-bold"><i class="fas fa-pencil-alt me-2"></i>Edit</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  mt-4">
                                    <div class="text-medium text-grey text-bold text-red">Master Bedroom</div>
                                    <div class="col-sm-4">
                                        <div class="text-tiny text-grey text-bold ">Occupancy</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-tiny text-grey text-bold">Guests pay</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="text-Medium text-grey mt-2"><i class="far fa-user me-2"></i>X 2</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-Medium text-grey mt-2">THB 1,100.00</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="text-Medium text-grey mt-2"><i class="far fa-user me-2"></i>X 1</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-Medium text-grey mt-2">THB 990.00</div>
                                    </div>
                                </div>
                                <div class="row  mt-4">
                                    <div class="text-medium text-grey text-bold text-red">Second Bedroom</div>
                                    <div class="col-sm-4">
                                        <div class="text-tiny text-grey text-bold ">Occupancy</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-tiny text-grey text-bold">Guests pay</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="text-Medium text-grey mt-2"><i class="far fa-user me-2"></i>X 2</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-Medium text-grey mt-2">THB 1,100.00</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="text-Medium text-grey mt-2"><i class="far fa-user me-2"></i>X 1</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-Medium text-grey mt-2">THB 990.00</div>
                                    </div>
                                </div>
                                <div class="row  mt-4">
                                    <div class="text-medium text-grey text-bold text-red">Third Bedroom</div>
                                    <div class="col-sm-4">
                                        <div class="text-tiny text-grey text-bold ">Occupancy</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-tiny text-grey text-bold">Guests pay</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="text-Medium text-grey mt-2"><i class="far fa-user me-2"></i>X 2</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-Medium text-grey mt-2">THB 1,100.00</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="text-Medium text-grey mt-2"><i class="far fa-user me-2"></i>X 1</div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-Medium text-grey mt-2">THB 990.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="vl-filter-hotel">
                                <div class="mt-3">
                                    <div class="clearfix">
                                        <div class="float-start">
                                            <div class="text-tiny text-grey text-bold">Cancellation policy</div>
                                        </div>
                                        <div class="float-end">
                                            <a href="{{url('edit_property11-2')}}">
                                                <div class="text-tiny text-red text-bold"><i class="fas fa-pencil-alt me-2"></i>Edit</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mt-3">
                                    <div class="text-tiny text-grey"><i class="far fa-check-circle me-2"></i>Guests can cancel their bookings for free up to 1 day before their arriva</div>
                                    <div class="text-tiny text-grey"><i class="far fa-check-circle me-2"></i>Guests who cancel within 24 hours will have their cancellation fee waived</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="col-xl-6 mx-auto">
                            <div class="text-filter text-grey text-bold mt-3">Non-refundable rate plan</div>
                            <div class="vl-filter-hotel">
                                <div class="mt-3">
                                    <div class="clearfix">
                                        <div class="float-start">
                                            <div class="text-tiny text-grey text-bold">Price and cancellation policy</div>
                                        </div>
                                        <div class="float-end">
                                            <a href="{{url('edit_property11-3')}}">
                                                <div class="text-tiny text-red text-bold"><i class="fas fa-pencil-alt me-2"></i>Edit</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" mt-3">
                                <div class="text-tiny text-grey"><i class="far fa-check-circle me-2"></i>Guests will pay 10% less Set up a weekly ratethan the standard rate for a non-refundable rate</div>
                                <div class="text-tiny text-grey"><i class="far fa-check-circle me-2"></i>Guests can't cancel their bookings for free anytime</div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="col-xl-6 mx-auto">
                            <div class="text-filter text-grey text-bold mt-3">Weekly rate plan</div>
                            <div class="vl-filter-hotel">
                                <div class="mt-3">
                                    <div class="clearfix">
                                        <div class="float-start">
                                            <div class="text-tiny text-grey text-bold">Price and cancellation policy</div>
                                        </div>
                                        <div class="float-end">
                                            <a href="{{url('edit_property11-4')}}">
                                                <div class="text-tiny text-red text-bold"><i class="fas fa-pencil-alt me-2"></i>Edit</div>
                                            </a>
                                        </div>
                                    </div>Set up a weekly rate
                                </div>
                                <div class=" mt-3">
                                    <div class="text-tiny text-grey"><i class="far fa-check-circle me-2"></i>Guests will pay 15% less than the standard rate when they book for at least 7 nights</div>
                                    <div class="text-tiny text-grey"><i class="far fa-check-circle me-2"></i>Guests can cancel their bookings for free up to 1 day before arrival (based on the standard rate cancellation policy)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-sm-4 ">
                        <a href="{{url('list_property10')}}">
                            <div class="btn-grey mt-3">Back</div>
                        </a>
                    </div>
                    <div class="col-sm-4 ">
                        <a href="{{url('list_property12')}}">
                            <div class="btn-orange mt-3">Next</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-footer"></div>
    </div>
   @include('frontend/inc_footer_hotel')
</body>

</html>