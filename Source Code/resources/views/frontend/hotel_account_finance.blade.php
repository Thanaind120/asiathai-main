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
    <div class="bg-orange">
        @include('frontend/inc_menu_bar_hotel')
    </div>
    <div class="bg-grey">
        <div class="container">
            <div class="text-head-d text-grey  mt-3 mb-2 text-bold">Bank detail</div>
            <div class="box-hotel-p">
                <div class="vl-filter-hotel">
                    <div class="clearfix">
                        <div class="float-start">
                             <div class="text-filter text-grey mb-2 text-bold"><i class="fas fa-money-check-alt text-orange me-2"></i>Receiving Payouts from Poolvilla</div>
                        </div>
                         
                    </div>
                    <div class="mt-2">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="text-tiny  text-bold text-grey">Fiscal Name/Bank Account Owner :</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-tiny  text-grey">Bank</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="text-tiny  text-bold text-grey">Branch :</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-tiny  text-grey">branch</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="text-tiny text-bold text-grey">Property Fiscal Number :</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-tiny  text-grey">0000000000000</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="text-tiny text-bold text-grey">Account Holder Name :</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-tiny  text-grey">Name</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="text-tiny text-bold text-grey">Currency :</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-tiny  text-grey">THAI BAHT</div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <div class="row justify-content-end">
                                <div class="col-sm-4">
                                <button type="button" class="btn-orange" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Update bank details
                                </button>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <div class="text-icon-re text-orange"><i class="fas fa-headphones-alt"></i></div>
                                <div class="text-filter mt-2 text-center text-bold">Please contact staff for assistance<br>via +66-000-0000</div>
                                <div class="space-footer mb-3"></div>
                                <button type="button" class="btn-orange" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="space-footer"></div>
    </div>
   @include('frontend/inc_footer_hotel')
</body>
</html>

