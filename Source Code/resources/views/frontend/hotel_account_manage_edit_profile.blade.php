
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
                    <form action="{{url('partner/editing_profile')}}" method="POST">
                        @csrf
                    <div class="clearfix">
                        <div class="float-start">
                             <div class="text-filter text-grey mb-2 text-bold">Edit Profile</div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label text-grey">First Name</label>
                          <input type="text" class="form-control" name="firstname" id="firstname" value="{{@$partner[0]->firstname}}" placeholder="First Name"  maxlength="255" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlInput2" class="form-label  text-grey">Last Name</label>
                          <input type="text" class="form-control" name="lastname" id="lastname" value="{{@$partner[0]->lastname}}" placeholder="Last Name"  maxlength="255" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlInput3" class="form-label  text-grey">Email</label>
                          <input type="email" class="form-control" name="email" value="{{@$partner[0]->email}}" placeholder="Email"  maxlength="255" onblur="check_email(this)" required>
                        </div>
                        <div class=" mb-3">
                          <label for="exampleFormControlInput3" class="form-label  text-grey">Phone</label>
                          <input type="text" class="form-control" name="phone" id="phone" value="{{@$partner[0]->phone}}" placeholder="Phone"  maxlength="255" onblur="check_phone(this)" required>
                        </div>
                        <div class="">
                          <label for="exampleFormControlInput3" class="form-label  text-grey">Address</label>
                          <input type="text" class="form-control" name="address" value="{{@$partner[0]->address}}"  maxlength="255" placeholder="...." required>
                        </div>
                {{-- <div class="row">
                    <div class="col-sm-4">
                        <div class="text-tiny text-grey text-start mt-3"></div>
                        <label for="exampleDataList" class="form-label  text-grey">Country</label>
                        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                        <datalist id="datalistOptions">
                            <option value="location">
                            <option value="location">
                            <option value="location">
                            <option value="location">
                            <option value="location">
                        </datalist>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-tiny text-grey text-start mt-3"></div>
                        <label for="exampleDataList" class="form-label  text-grey">City</label>
                        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                        <datalist id="datalistOptions">
                            <option value="location">
                            <option value="location">
                            <option value="location">
                            <option value="location">
                            <option value="location">
                        </datalist>
                    </div>
                     <div class="col-sm-4">
                        <div class="text-tiny text-grey text-start mt-3"></div>
                        <label for="exampleDataList" class="form-label  text-grey">Postal Code</label>
                        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                        <datalist id="datalistOptions">
                            <option value="location">
                            <option value="location">
                            <option value="location">
                            <option value="location">
                            <option value="location">
                        </datalist>
                    </div>
                </div> --}}
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
<script>
     $('#firstname').on('keypress', function (event) {
			var regex = new RegExp("^[ก-ฮๆไำะัี๊ฯุูึโ้็่๋าแิื์a-zA-Z]+$");
			var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
				if (!regex.test(key)) {
					event.preventDefault();
					return false;
				}
		});
        $('#lastname').on('keypress', function (event) {
			var regex = new RegExp("^[ก-ฮๆไำะัี๊ฯุูึโ้็่๋าแิื์a-zA-Z]+$");
			var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
				if (!regex.test(key)) {
					event.preventDefault();
					return false;
				}
		});
        function check_phone(inputtxt) {
            var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
            if(inputtxt.value.match(phoneno)) {
                return true;
            }
            else {
                alert('You have entered an incorrect phone number! Example xxx-xxx-0011');
                return false;
            }
        }
        $('#phone').on('keypress', function (event) {
			var regex = new RegExp("^[0-9-]+$");
			var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
				if (!regex.test(key)) {
					event.preventDefault();
					return false;
				}
		});
</script>

