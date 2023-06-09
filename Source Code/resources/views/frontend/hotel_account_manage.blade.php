
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
    <?php
    session_start();
    $user_id=$_SESSION["partner_login"];
    $partner=DB::select("select * from db_partner where id='$user_id' ");
    ?>
    <div class="bg-orange">
         @include('frontend/inc_menu_bar_hotel')
    </div>
    <div class="bg-grey">
        <div class="container">
            <div class="text-head-d text-grey  mt-3 mb-2 text-bold">Account Management</div>
            <div class="box-hotel-p">
                <div class="vl-filter-hotel">
                    <div class="clearfix">
                        <div class="float-start">
                             <div class="text-filter text-grey mb-2 text-bold"><i class="far fa-address-card  text-orange me-2"></i>Profile</div>
                        </div>
                         <div class="float-end">
                            <a href="{{url('hotel_account_manage_edit_profile')}}">
                                <div class="text-tiny text-red mb-2"><i class="fas fa-pencil-alt me-2"></i>Edit</div>
                            </a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="text-tiny  text-bold text-grey">First Name :</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-tiny  text-grey"> {{$partner[0]->firstname}}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="text-tiny text-bold text-grey">Last Name : </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-tiny  text-grey"> {{$partner[0]->lastname}}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="text-tiny text-bold text-grey">Address :</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-tiny  text-grey"> {{$partner[0]->address}}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="text-tiny text-bold text-grey">Email :</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-tiny  text-grey"> {{$partner[0]->email}}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="text-tiny text-bold text-grey">Phone :</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-tiny  text-grey"> {{$partner[0]->phone}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vl-filter-hotel">
                    <div class="clearfix">
                        <div class="float-start">
                             <div class="text-filter text-grey mb-2 text-bold"><i class="far fa-comment-dots  text-orange me-2"></i>Contacts</div>
                        </div>
                         <div class="float-end">
                            <a href="{{url('hotel_account_manage_edit_contact')}}">
                                <div class="text-tiny text-red mb-2"><i class="fas fa-pencil-alt me-2"></i>Edit</div>
                            </a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="text-tiny  text-bold text-grey">Contact :</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-tiny  text-grey"> {{$partner[0]->contact}}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="text-tiny  text-bold text-grey">Email :</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-tiny  text-grey"> {{$partner[0]->contact_email}}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="text-tiny text-bold text-grey">Phone :</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-tiny  text-grey"> {{$partner[0]->contact_phone}}</div>
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

