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
                <div class="">
                    <form action="{{url('partner/edit_contact')}}" method="POST">
                        @csrf
                    <div class="clearfix">
                        <div class="float-start">
                             <div class="text-filter text-grey mb-2 text-bold">Edit Contact</div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label text-grey">Contact</label>
                          <input type="text" class="form-control" name="contact" value="{{@$partner[0]->contact}}"  maxlength="255" placeholder="Firstname - Lastname" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlInput3" class="form-label  text-grey">Email</label>
                          <input type="email" class="form-control" name="contact_email" value="{{@$partner[0]->contact_email}}"  maxlength="255" placeholder="E-Mail Adress">
                        </div>
                        <div class=" mb-3">
                          <label for="exampleFormControlInput3" class="form-label  text-grey">Phone</label>
                          <input type="text" class="form-control" name="contact_phone" value=" {{@$partner[0]->contact_phone}}"  maxlength="255" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="row justify-content-center mt-5">
                        <div class="col-sm-4">
                             <a href="{{url('hotel_account_manage')}}"><div class="btn-grey mt-3">Cancel</div></a>
                        </div>
                        <div class="col-sm-4">
                             <button type="submit"class="btn-orange mt-3">Save</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <div class="space-footer"></div>
    </div>
    @include('frontend/inc_footer_hotel'); ?> 
</body>
</html>

