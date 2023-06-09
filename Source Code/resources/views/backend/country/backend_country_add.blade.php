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
            
          <form action="{{url('backend/country/save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(!isset($country[0]))
                <input type="hidden" name="type" value="1">
            @else
                <input type="hidden" name="type" value="2">
                <input type="hidden" name="id" value="{{ $country[0]->country_id }}">
                <input type="hidden" name="old_image" value="{{ $country[0]->country_image }}">
            @endif
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">Country Name :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ @$country[0]->country_name }}" name="country_name"  @if(!isset($country[0])) required @endif >
                </div>
            </div>
            
            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label">Country Image :</label>
                <div class="col-md-8">
                    <input class="form-control" type="file" accept=".png, .jpg, .jpeg" name="image"  @if(!isset($country[0])) required @endif >
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-3"><img src="{{ asset('frontend_assets/country_image/'.@$country[0]->country_image) }}" height="150px" alt=""></div>
                <div class="col-3"></div>
                <div class="col-3"></div>
                
            </div>
           
            <!-- form update -->
            <div class="form-group mb-0 row mt-3">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="{{ url("backend/country") }}">
                      <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-success btn-sm waves-effect">
                      <i class="fa fa-save font-size-16 align-middle mr-1"></i> @if(!isset($country[0])) Save @else Update @endif
                    </button>
                </div>
            </div>
            <br>
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
