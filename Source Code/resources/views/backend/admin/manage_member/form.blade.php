<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.style')
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
        <h1>Member Account Manage</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-8" >             
  
          <div class="card-body p-0">
            
          <form action="{{url('backend/member_profile/save')}}" method="POST">
            @csrf
            @if(!isset($member))
                <input type="hidden" name="type" value="1">
            @else
            <input type="hidden" name="id" value="{{$member->id}}">
                <input type="hidden" name="type" value="2">
            @endif
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">Firstname :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ @$member->firstname }}" name="firstname" required>
                </div>
            </div>

            <div class="form-group row ml-4 mt-5">           
              <label for="lastname" class="col-md-2 col-form-label">Lastname :</label>
              <div class="col-md-8">
                  <input class="form-control" type="text" value="{{ @$member->lastname }}" name="lastname" required>
              </div>
            </div>

            <div class="form-group row ml-4 mt-5">
                <label for="email" class="col-md-2 col-form-label">E-Mail :</label>
                <div class="col-md-8">
                    <input class="form-control" type="email" value="{{ @$member->email }}" name="email" required>
                </div>
            </div>

            <!-- form update -->
            @if(isset($member))

              <div class="form-group row ml-4 mt-5">
                <label for="phone" class="col-md-2 col-form-label">Phone Number :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ @$member->phone }}" name="phone" maxlength="10">
                </div>
              </div>

            {{-- <div class="form-group row ml-4 mt-5">
              <label for="prename" class="col-md-2 col-form-label">Position :</label>
              <div class="col-md-10">
                <select name="position" class="form-control  col-md-8" required >
                  <option value="" disabled>Select</option>                
                  
                      <option value="admin"{{ ($member->position=="admin" )?'selected':'' }}>Admin</option>
                      <option value="hotel"{{ ($member->position=="hotel" )?'selected':'' }}>Hotel</option>
                      <option value="member"{{ ($member->position=="member" )?'selected':'' }}>Member</option>
                   
         
                </select>
              </div>
            </div> --}}

              <div class="form-group row ml-4 mt-5">
                <label class="col-md-2 col-form-label">Status :</label>
                <div class="col-md-10 mt-2">
                  <div class="custom-control custom-switch">
                    @if( empty($member) )
                      <input type="checkbox" class="custom-control-input" id="customSwitch" name="status" value="1" checked>
                    @else
                      <input type="checkbox" class="custom-control-input" id="customSwitch" name="status" value="1" {{ ( @$member->status=='1')?'checked':'' }}>
                    @endif
                      <label class="custom-control-label" for="customSwitch"> Active / Deactive</label>
                  </div>
                </div>
              </div> 

            @endif
            
            <div class="form-group mb-0 row">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="{{ url("backend/member_profile") }}">
                      <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-success btn-sm waves-effect">
                      <i class="fa fa-save font-size-16 align-middle mr-1"></i> @if(!isset($member))Save @else Update @endif
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
</body>
</html>
