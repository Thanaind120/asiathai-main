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
        <h1>Partner Account Manage</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-8" >             
  
          <div class="card-body p-0">
            
          <form action="{{url('backend/hotel_profile/save')}}" method="POST">
            @csrf
            @if(!isset($user))
                <input type="hidden" name="type" value="1">
            @else
            <input type="hidden" name="id" value="{{$user->id}}">
                <input type="hidden" name="type" value="2">
            @endif
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">First Name :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ @$user->firstname }}" name="firstname" required>
                </div>
            </div>
            <div class="form-group row ml-4 mt-5">           
              <label for="firstname" class="col-md-2 col-form-label">Last Name :</label>
              <div class="col-md-8">
                  <input class="form-control" type="text" value="{{ @$user->lastname }}" name="lastname" required>
              </div>
          </div>
          <div class="form-group row ml-4 mt-5">           
            <label for="firstname" class="col-md-2 col-form-label">Adress :</label>
            <div class="col-md-8">
                <input class="form-control" type="text" value="{{ @$user->address }}" name="address" required>
            </div>
        </div>
        <div class="form-group row ml-4 mt-5">           
          <label for="firstname" class="col-md-2 col-form-label">Tel. :</label>
          <div class="col-md-8">
              <input class="form-control" type="text" value="{{ @$user->phone_number }}" name="phone_number" required>
          </div>
      </div>
        

            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label">Email :</label>
                <div class="col-md-8">
                    <input class="form-control" type="email" value="{{ @$user->email }}" name="email" required>
                </div>
            </div>

            @if(!isset($user))
            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label mt-2">Bank :</label>
                <div class="col-md-8">
                    <select name="bank" class="form-control" required>
                        <option disabled selected>Choose Bank</option>
                        @foreach ($bank as $b)
                    <option  value="{{$b->name}}">{{$b->name}}</option> 
                        @endforeach
                    </select>
                </div>
            </div>
            @else
            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label mt-2">Bank :</label>
                <div class="col-md-8">
                    <select name="bank" class="form-control" required>
                        <option disabled >Choose Bank</option>
                        @foreach ($bank as $b)
                    <option  value="{{$b->name}}"{{ $b->name === $user->bank ?  'selected' : ''  }}>{{$b->name}}</option> 
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label">Account Number :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ @$user->account_number }}" name="account_number" required>
                </div>
            </div>
            <!-- form update -->
            @if(isset($user))
                <!-- อนาคตเผื่อกรณีอยากเพิ่มบัญชีตำแหน่งพนักงาน -->
            {{-- <div class="form-group row ml-4 mt-5">
              <label for="prename" class="col-md-2 col-form-label">Position :</label>
              <div class="col-md-10">
                <select name="position" class="form-control  col-md-8" required >
                  <option value="" disabled>Select</option>                
                  
                      <option value="admin"{{ ($user->position=="partner" )?'selected':'' }}>Head Partner</option>
                      <option value="hotel"{{ ($user->position=="sub_partner" )?'selected':'' }}>Sub Partner</option>
               
                   
         
                </select>
              </div>
            </div> --}}

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
                    <a class="btn btn-secondary btn-sm waves-effect" href="{{ url("backend/hotel_profile") }}">
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
</body>
</html>
