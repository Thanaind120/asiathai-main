<!doctype html>
<html lang="th">
<head>      
    <title>Identity Verification</title>
   @include('frontend/inc_header')
    <link rel="stylesheet" href="{{asset('assets_frontend/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets_frontend/css/owl.theme.default.min.css')}}">
<script src="{{asset('assets_frontend/js/owl.carousel.min.js')}}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body >
    @include('frontend/inc_navbar_hotel_regis')
    @include('sweetalert')
    <div class="bg-grey">
      <form action="{{url('partner/verification')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="container">
        <div class="box-sign">
            <div class="text-head-sign text-orange">Identity Verification</div>
            <div class="space-footer mb-3">
              <label for="exampleFormControlInput1" class="form-label text-orange">First Name</label>
              <input type="text" class="form-control" name="firstname" value="{{$partner->firstname}}" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput2" class="form-label text-orange">Last Name</label>
              <input type="text" class="form-control"  name="lastname" value="{{$partner->lastname}}" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput3" class="form-label text-orange">Birthday</label>
              <input  type="date" class="form-control" name="date" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput3" class="form-label text-orange">Email</label>
              <input type="email" class="form-control" name="email" value="{{$partner->email}}"  required>
            </div>
            <div class=" mb-3">
              <label for="exampleFormControlInput3" class="form-label text-orange">Phone1</label>
              <input type="text" class="form-control" name="phone" required value="{{$partner->partnerdetail->phone1}}">
            </div>
            <div class=" mb-3">
              <label for="exampleFormControlInput3" class="form-label text-orange">Phone2</label>
              <input type="text" class="form-control" name="phone2"  value="{{@$partner->partnerdetail->phone2}}">
            </div>
            <div class=" mb-3">
              <label for="exampleFormControlInput3" class="form-label text-orange">Address</label>
              <input type="text" class="form-control" name="address" required value="{{@$partner->partnerdetail->address}}">
            </div>
            <div class=" mb-3">
        
                <label for="exampleFormControlInput3" class="form-label text-orange">District</label>
                <select name="district_id" class="form-control  select2"  required>
            <option value="" selected disabled>Select District</option>
            @foreach($list2 as $item1 =>$l2)
            <option value="{{$l2->code}}"  {{ @$list1->ref_district_id == $l2->code  ? 'selected ' : null }}   >{{$l2->name_en}}</option>
            @endforeach
          </select>
        
            </div>
            <div class=" mb-3">
        
              <label for="exampleFormControlInput3" class="form-label text-orange">Province</label>
             
              <select name="province_id" class="form-control  select2"  required>
            <option value="" selected disabled>Select Province</option>
            @foreach($list3 as $item2 =>$l3)
            <option value="{{$l3->code}}" {{ @$list1->ref_province_id == $l3->code  ? 'selected ' : null }}  >{{$l3->name_en}}</option>
            @endforeach
          </select>
      
          </div>

          <div class=" mb-3">
            <label for="exampleFormControlInput3" class="form-label text-orange">Postal Code</label>
            <input type="text" class="form-control" name="postal" id="postcode" required >
          </div>
          <div class=" mb-3">
            <label for="exampleFormControlInput3" class="form-label text-orange">Bank</label>
            <select name="ref_bank_id" class="form-control">
                <option value="" disabled selected>Please Select Bank</option>
                @foreach($bank as $b)
                  <option value="{{$b->id}}"> {{$b->name}}</option>
                @endforeach
            </select>
          </div>
          <div class=" mb-3">
            <label for="exampleFormControlInput3" class="form-label text-orange">สาขา</label>
            <input type="text" class="form-control" name="branch" required value="" >
          </div>
          <div class=" mb-3">
            <label for="exampleFormControlInput3" class="form-label text-orange">Account Name</label>
            <input type="text" class="form-control" name="acct_name"  required value="" >
          </div>
          <div class=" mb-3">
            <label for="exampleFormControlInput3" class="form-label text-orange">Account Number</label>
            <input type="text" class="form-control" name="acct_no" id="postcode" required>
          </div>
          <div class=" mb-3">
            <label for="exampleFormControlInput3" class="form-label text-orange">Identification Card</label>
            <input type="file" class="form-control" name="idcard" id="idcard" required value="" >
          </div>
          <div class=" mb-3">
            <label for="exampleFormControlInput3" class="form-label text-orange">Accommodation Permit	</label>
            <input type="file" class="form-control" name="accommodation_permit" >
          </div>
            </div>

       
              </div>
            
            <button class="btn-sign" type="submit">Send</button>
            
            {{-- <div class="text-grey text-tiny text-start mt-5">Already have an account?<a href="{{url('signin_hotel')}}" class="text-orange ms-2">Sign in</a></div> --}}
             <div class="space-footer"></div>
        </div>
    </div>
  </form>
        <div class="space-footer"></div>
    </div>
    <input type="hidden" id="url_to" value="{{url('partner/city')}}">
   @include('frontend/inc_footer_hotel_regis')
   <script>
      $(document).ready(function() {
    $('.select2').select2();

   

    });
     function set_address(){
       var disctrict=$('#disctrict').val();
       var url_to=$('#url_to').val();
          // Ajax request country city and postal
            $.ajax({
              type: "POST",
                url: url_to,
                headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                data: {
                  id:disctrict,
                    
                },
            
               success:function(data) {
                // alert(data.data.province);
                $('#province').val(data.data.province);
                $('#postcode').val(data.data.postcode);
               }
            });

     }
   </script>
</body>
</html>

