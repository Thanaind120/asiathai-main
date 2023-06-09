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
    @include('sweetalert')
    <div class="bg-orange">
    @include('frontend/inc_menu_bar_hotel')
    </div>
    <div class="bg-grey">
        <div class="">
            <div class="row g-2">
                <div class="col-xl-2 col-sm-3">
                    <div class="bg-orange-light-bar">
                        <a href="hotel.php">
                            <div class="dashboard-property active text-black text-bold">All Property</div>
                        </a>
                        <a href="hotel_A.php">
                            <div class="dashboard-property text-black text-bold">PropertyA</div>
                        </a>
                        <a href="">
                            <div class="dashboard-property text-black text-bold">PropertyB</div>
                        </a>
                        <a href="">
                            <div class="dashboard-property text-black text-bold">PropertyC</div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-10 col-sm-9">
                    <div class="container">
                        <div class="text-filter text-grey mb-3 text-bold">Analytics Dashboard</div>
                     <div class="row mb-3">
                    <div class="col-sm-4 mb-sm-0 mb-2">
                        <div class="box-dashboard text-green" style="border: 2px solid;">
                            <div class="text-head-d text-bold">VISITOR</div>
                            <div class="text-title text-end mt-2">0</div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-sm-0 mb-2">
                        <div class="box-dashboard text-blue" style="border: 2px solid;">
                            <div class="text-head-d text-bold">ROOM NIGHTS</div>
                            <div class="text-title text-end mt-2">0</div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-sm-0 mb-2">
                        <div class="box-dashboard  text-red" style="border: 2px solid;">
                            <div class="text-head-d text-bold">ROOM REVENUE</div>
                            <div class="text-title text-end mt-2">0</div>
                        </div>
                    </div>
                </div>
                        <div class="row mb-3">
                    <div class="col-sm-6 mb-sm-0 mb-2">
                        <div class="box-dashboard">
                            <div style="height:300px;">graph</div>                    
                        </div>
                    </div>
                    <div class="col-sm-6 mb-sm-0 mb-2">
                        <div class="box-dashboard">
                            <div style="height:300px;">graph</div>                    
                        </div>
                    </div>
                </div>
                        <div class="row ">
                    <div class="col-sm-4 mb-3">
                        <div class="box-dashboard text-grey">
                            <div class="text-head-d text-bold ">Title</div>
                            <div class="clearfix">
                                <div class="float-start"><div class="text-detail">Detail</div></div>
                                <div class="float-end"><div class="text-detail">0</div></div>
                            </div>
                            <div class="clearfix">
                                <div class="float-start"><div class="text-detail">Detail</div></div>
                                <div class="float-end"><div class="text-detail">0</div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <div class="box-dashboard text-grey">
                            <div class="text-head-d text-bold ">Title</div>
                            <div class="clearfix">
                                <div class="float-start"><div class="text-detail">Detail</div></div>
                                <div class="float-end"><div class="text-detail">0</div></div>
                            </div>
                            <div class="clearfix">
                                <div class="float-start"><div class="text-detail">Detail</div></div>
                                <div class="float-end"><div class="text-detail">0</div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <div class="box-dashboard text-grey">
                            <div class="text-head-d text-bold ">Title</div>
                            <div class="clearfix">
                                <div class="float-start"><div class="text-detail">Detail</div></div>
                                <div class="float-end"><div class="text-detail">0</div></div>
                            </div>
                            <div class="clearfix">
                                <div class="float-start"><div class="text-detail">Detail</div></div>
                                <div class="float-end"><div class="text-detail">0</div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <div class="box-dashboard text-grey">
                            <div class="text-head-d text-bold ">Title</div>
                            <div class="clearfix">
                                <div class="float-start"><div class="text-detail">Detail</div></div>
                                <div class="float-end"><div class="text-detail">0</div></div>
                            </div>
                            <div class="clearfix">
                                <div class="float-start"><div class="text-detail">Detail</div></div>
                                <div class="float-end"><div class="text-detail">0</div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <div class="box-dashboard text-grey">
                            <div class="text-head-d text-bold ">Title</div>
                            <div class="clearfix">
                                <div class="float-start"><div class="text-detail">Detail</div></div>
                                <div class="float-end"><div class="text-detail">0</div></div>
                            </div>
                            <div class="clearfix">
                                <div class="float-start"><div class="text-detail">Detail</div></div>
                                <div class="float-end"><div class="text-detail">0</div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <div class="box-dashboard text-grey">
                            <div class="text-head-d text-bold ">Title</div>
                            <div class="clearfix">
                                <div class="float-start"><div class="text-detail">Detail</div></div>
                                <div class="float-end"><div class="text-detail">0</div></div>
                            </div>
                            <div class="clearfix">
                                <div class="float-start"><div class="text-detail">Detail</div></div>
                                <div class="float-end"><div class="text-detail">0</div></div>
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

