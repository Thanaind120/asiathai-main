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
        <h1>Change Password</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-8" >             
  
          <div class="card-body p-0">
            
          <form action="{{url('backend/password/update')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
             {{-- @if(!isset($user))
               <input type="hidden" name="type" value="1">
            @else

                <input type="hidden" name="type" value="2">
            @endif --}}
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">Password :</label>
                <div class="col-md-8">
                    <input class="form-control" type="password" value="" name="password" required>
                </div>
            </div>

            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label">New Password :</label>
                <div class="col-md-8">
                    <input class="form-control" type="password" value="" name="new_password" required>
                </div>
            </div>
            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label">Confirm Password :</label>
                <div class="col-md-8">
                    <input class="form-control" type="password" value="" name="confirm_password" required>
                </div>
            </div>
      
            

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
</body>
</html>
