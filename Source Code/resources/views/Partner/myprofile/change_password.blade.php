<!DOCTYPE html>
<html lang="en">
<head>
  @include('Partner/layout.style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('Partner/layout.nav')
      @include('Partner/layout.menu')
   <!-- Main Content -->
   <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Change Password</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-12" >             
  
          <div class="card-body p-0">
            
          <form action="{{url('Partner/MyProfile/UpdatePassword')}}" method="POST">
        @csrf
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
      
            

            <div class="container p-5">
              <div class="row">
                <div class="col text-center">
                  <button class="btn btn-success">บันทึก</button>
                </div>
              </div>
            </div>
        </form>
          </div>
        </div>
        </div>
      </div>
    </section>
  </div>
      @include('Partner/layout.footer')
    </div>
  </div>

  @include('Partner/layout.script')
</body>
</html>
