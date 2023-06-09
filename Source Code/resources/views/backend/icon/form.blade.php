<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.style')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('layout.nav')
      @include('layout.menu')
   <!-- Main Content -->
   <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Add - Edit Description Hotel</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-8" >             
  
          <div class="card-body p-0">
            
          <form action="{{url('backend/member_profile/save')}}" method="POST">
            @csrf
            @if(!isset($user))
                <input type="hidden" name="type" value="1">
            @else
            <input type="hidden" name="id" value="{{$user->id}}">
                <input type="hidden" name="type" value="2">
            @endif
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">Hotel Name :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="Orange Hotel1" name="name" required>
                </div>
            </div>
            <div class="form-group row ml-4 mt-5">           
              <label for="firstname" class="col-md-2 col-form-label">Google Maps :</label>
              <div class="col-md-8">
                  <input class="form-control" type="text" value="https://www.google.com/maps" name="name" required>
              </div>
            </div>
            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label">Country :</label>
                <div class="col-md-8">
                  <select class="form-control" id="">
                    <option value="" disabled >Select Country</option>
                    <option value="1" selected>Thailand</option>
                  </select>
                </div>
            </div>
            <div class="form-group row ml-4 mt-5">
              <label for="firstname" class="col-md-2 col-form-label">City :</label>
              <div class="col-md-8">
                <select class="form-control" >
                  <option value="" disabled >Select City</option>
                  <option value="1" selected>Bangkok</option>
                </select>
              </div>
          </div>
          <hr>
          <h5 class="ml-2">Space & Rooms</h5>
          <div class="form-group row ml-4 mt-5">           
            <label for="firstname" class="col-md-2 col-form-label">Max Guest :</label>
            <div class="col-md-8">
                <input class="form-control" type="text" value="Max 4 guest" name="name" required>
            </div>
        </div>
        <div class="form-group row ml-4 mt-5">           
          <label for="firstname" class="col-md-2 col-form-label">Bedrooms :</label>
          <div class="col-md-8">
              <input class="form-control" type="text" value="3 Bedrooms" name="name" required>
          </div>
        </div>
        <div class="form-group row ml-4 mt-5">           
          <label for="firstname" class="col-md-2 col-form-label">Bathrooms :</label>
          <div class="col-md-8">
              <input class="form-control" type="text" value="2 Bathrooms" name="name" required>
          </div>
      </div>
      <hr>
      <div class="mt-3 ml-3">
        <div class="row g-1">
            <div class="col-sm-2 col-4 ">
                <div class="box-facilities">
                    <div class="text-orange icon-box-facilities"><i class="fas fa-wifi"></i> </div>
                    <div class="text-orange text-box-facilities">Free WIFI </div>
                    <div><input type="checkbox" name="" id="" checked></div>
                </div>
            </div>
            <div class="col-sm-2 col-4 ">
                <div class="box-facilities">
                    <div class="text-orange icon-box-facilities"><i class="fas fa-shuttle-van"></i></div>
                    <div class="text-orange text-box-facilities">Airport Transfer </div>
                    <div><input type="checkbox" name="" id=""></div>
                </div>
            </div>
            <div class="col-sm-2 col-4 ">
                <div class="box-facilities">
                    <div class="text-orange icon-box-facilities"><i class="fas fa-swimming-pool"></i></div>
                    <div class="text-orange text-box-facilities">Private Pool </div>
                    <div><input type="checkbox" name="" id="" checked></div>
                </div>
            </div>
            <div class="col-sm-2 col-4 ">
                <div class="box-facilities">
                    <div class="text-orange icon-box-facilities"><i class="fas fa-smoking"></i></div>
                    <div class="text-orange text-box-facilities">Smorking Area </div>
                    <div><input type="checkbox" name="" id=""></div>
                </div>
            </div>
            <div class="col-sm-2 col-4 ">
                <div class="box-facilities">
                    <div class="text-orange icon-box-facilities"><i class="fas fa-car"></i></div>
                    <div class="text-orange text-box-facilities">Car Park </div>
                    <div><input type="checkbox" name="" id="" checked></div>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
</div>
<hr>
<h5>Area Info</h5><br>
{{-- <b>near by landmarks</b> --}}
<div class="form-group row ml-4 mt-2">           
  <label for="firstname" class="col-md-2 col-form-label">near by landmarks 1 :</label>
  <div class="col-md-4">
      <input class="form-control" type="text" value="The Victory Monument" name="name" required>
  </div>
  <div class="col-md-4">
    <input class="form-control" type="text" value="20 km" name="name" placeholder="km." required>
</div>
</div>
<div class="form-group row ml-4 mt-2">           
  <label for="firstname" class="col-md-2 col-form-label">near by landmarks 2 :</label>
  <div class="col-md-4">
    <input class="form-control" type="text" value="BTS Chong Nonsi Skywalk" name="name" required>
</div>
<div class="col-md-4">
  <input class="form-control" type="text" value="10 km." name="name" required>
</div>
</div>
<div class="form-group row ml-4 mt-2">           
  <label for="firstname" class="col-md-2 col-form-label">near by landmarks 3 :</label>
  <div class="col-md-4">
    <input class="form-control" type="text" value="Wat Arun" name="name" required>
</div>
<div class="col-md-4">
  <input class="form-control" type="text" value="5 km." name="name" required>
</div>
</div>
<br>
<div class="form-group row ml-4 mt-2">           
  <label for="firstname" class="col-md-2 col-form-label">population landmarks 1 :</label>
  <div class="col-md-4">
      <input class="form-control" type="text" value="The Victory Monument" name="name" required>
  </div>
  <div class="col-md-4">
    <input class="form-control" type="text" value="20 km" name="name" placeholder="km." required>
</div>
</div>
<div class="form-group row ml-4 mt-2">           
  <label for="firstname" class="col-md-2 col-form-label">population landmarks 2 :</label>
  <div class="col-md-4">
    <input class="form-control" type="text" value="BTS Chong Nonsi Skywalk" name="name" required>
</div>
<div class="col-md-4">
  <input class="form-control" type="text" value="10 km." name="name" required>
</div>
</div>
<div class="form-group row ml-4 mt-2">           
  <label for="firstname" class="col-md-2 col-form-label">population landmarks 3 :</label>
  <div class="col-md-4">
    <input class="form-control" type="text" value="Wat Arun" name="name" required>
</div>
<div class="col-md-4">
  <input class="form-control" type="text" value="5 km." name="name" required>
</div>
</div>
<hr>
            <!-- form update -->
            @if(isset($user))
            <div class="form-group row ml-4 mt-5">
              <label for="prename" class="col-md-2 col-form-label">Position :</label>
              <div class="col-md-10">
                <select name="position" class="form-control  col-md-8" required >
                  <option value="" disabled>Select</option>                
                  
                      <option value="admin"{{ ($user->position=="admin" )?'selected':'' }}>Admin</option>
                      <option value="hotel"{{ ($user->position=="hotel" )?'selected':'' }}>Hotel</option>
                      <option value="member"{{ ($user->position=="member" )?'selected':'' }}>Member</option>
                   
         
                </select>
              </div>
            </div>

            <div class="form-group row ml-4 mt-5">
              <label class="col-md-2 col-form-label">Status :</label>
              <div class="col-md-10 mt-2">
                <div class="custom-control custom-switch">
                  @if( empty($user) )
                    <input type="checkbox" class="custom-control-input" id="customSwitch" name="status" value="1" checked >
                  @else
                    <input type="checkbox" class="custom-control-input" id="customSwitch" name="status" value="1" {{ ( @$user->status=='1')?'checked':'' }}>
                  @endif
                    <label class="custom-control-label" for="customSwitch"> Active / Deactive</label>
                </div>
              </div>
          </div> 

            @endif
            

            <div class="form-group mb-0 row">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="{{ url()->previous() }}">
                      <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-success btn-sm waves-effect" onclick="success_alert()">
                      <i class="fa fa-save font-size-16 align-middle mr-1"></i> @if(!isset($user))Save @else Update @endif
                    </button>
                </div>
            </div><br>
        </form>
          </div>
        </div>
        </div>
      </div>
    </section>
  </div>
      @include('layout.footer')
    </div>
  </div>

  @include('layout.script')
  <script>
    $(document).ready(function() {
    $('.select_search').select2();
});
  function success_alert(){
    Swal.fire(
  'Success!',
  'Data is save!',
  'success'
)
  }
  </script>

</body>
</html>
