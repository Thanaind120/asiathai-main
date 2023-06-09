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
        <h1>@if(!isset($city[0])) Add @else Edit @endif City</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-8" >             
  
          <div class="card-body p-0">
            
          <form action="{{url('backend/country/city/save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(!isset($city[0]))
                <input type="hidden" name="type" value="1">
            @else
                <input type="hidden" name="type" value="2">
                <input type="hidden" name="id" value="{{ $city[0]->city_id }}">
                <input type="hidden" name="old_image" value="{{ $city[0]->city_image }}">
            @endif
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">City Name :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ @$city[0]->city_name }}" name="city_name"  @if(!isset($city[0])) required @endif >
                </div>
            </div>
            
            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label">CIty Image :</label>
                <div class="col-md-8">
                    <input class="form-control" type="file" accept=".png, .jpg, .jpeg" name="image"  @if(!isset($city[0])) required @endif >
                </div>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-3"><img src="{{ asset('frontend_assets/city_image/'.@$city[0]->city_image) }}" height="150px" alt=""></div>
                <div class="col-3"></div>
                <div class="col-3"></div>
            </div>
            <input type="hidden" name="country_id" value="{{ $country_id }}">
            <!-- form update -->
            <div class="form-group mb-0 row mt-3">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="{{ url('backend/country/city/'.$country_id) }}">
                      <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-success btn-sm waves-effect">
                      <i class="fa fa-save font-size-16 align-middle mr-1"></i> @if(!isset($city[0])) Save @else Update @endif
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
