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
   <div class="main-content" >
    <section class="section"  >
      <div class="section-header" >
        <h1>Edit Banner</h1>
      </div>
    
      <div class="section-body"  >      
        <div class="card col-8"  >             
  
          <div class="card-body p-0" >
            
          <form action="{{url('backend/banner/update')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$banner->id}}">
            <div class="form-group row ml-4 mt-5"> 
            <img src="{{asset('frontend_assets/banner/'.$banner->banner_image)}}" width="300px" height="200px" class="mt-1">
            </div>
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">Image:</label>
                <div class="col-md-8">
                <input type="file" accept=".png, .jpg, .jpeg" class="form-control" name="banner_image"  >
                </div>
            </div>
            <div class="form-group row ml-4 mt-5">           
              <label for="firstname" class="col-md-2 col-form-label">Promotion name(EN):</label>
              <div class="col-md-8">
                  <input class="form-control" type="text" value="{{@$banner->head_en}}" name="head_en" required>
              </div>
          </div>
          <div class="form-group row ml-4 mt-5">           
            <label for="firstname" class="col-md-2 col-form-label" >Description (EN):</label>
            <div class="col-md-8">
                <textarea class="form-control" type="text"  name="detail_en"rows="10" style="height:100%" required>{{@$banner->detail_en}}</textarea>
            </div>
        </div>
       <br>
       <hr>
       <br>
       <div class="form-group row ml-4 mt-5">           
              <label for="firstname" class="col-md-2 col-form-label">Promotion name(TH):</label>
              <div class="col-md-8">
                  <input class="form-control" type="text" value="{{@$banner->head_th}}" name="head_th" required>
              </div>
          </div>
          <div class="form-group row ml-4 mt-5">           
            <label for="firstname" class="col-md-2 col-form-label">Description (TH):</label>
            <div class="col-md-8">
                <textarea class="form-control" type="text" value="" name="detail_th" required rows="10" style="height:100%">{{@$banner->detail_th}}</textarea>
            </div>
        </div>

 </div>

<hr>



            <!-- form update -->
            {{-- @if(isset($user))
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

            @endif--}}
            

            <div class="form-group mb-0 row">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="{{ url()->previous() }}">
                      <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-success btn-sm waves-effect">
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
