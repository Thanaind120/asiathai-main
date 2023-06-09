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
        <h1>Add - Edit Bank</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-8" >             
  
          <div class="card-body p-0">
            
          <form action="{{url('backend/banking/save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(!isset($bank))
                <input type="hidden" name="type" value="1">
            @else
            <input type="hidden" name="id" value="{{@$bank[0]->id}}">
                <input type="hidden" name="type" value="2">
                <input type="hidden" name="old_image" value="{{@$bank[0]->logo}}">
            @endif
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">Bank Name :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="{{ @$bank[0]->name }}" name="name" required>
                </div>
            </div>      
        

            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label">Bank Logo :</label>
                <div class="col-md-8">
                <input type="file" accept="image/png, image/gif, image/jpeg" class="form-control" name="logo" id="logo" > 
                </div>
            </div>
            @if(isset($bank))
            <div class="form-group row ml-4 mt-5">
                <label for="firstname" class="col-md-2 col-form-label">Logo Image:</label>
                <div class="col-md-8">
                <img src="{{asset(@$bank[0]->logo)}}" width="250px" height="250px">
                </div>
            </div>
            @endif
            <!-- form update -->
             @if(isset($bank))         


            <div class="form-group row ml-4 mt-5">
              <label class="col-md-2 col-form-label">Status :</label>
              <div class="col-md-10 mt-2">
                <div class="custom-control custom-switch">
                  @if( empty(@$bank[0]->status) )
                    <input type="checkbox" class="custom-control-input" id="customSwitch" name="status" value="1"  >
                  @else
                    <input type="checkbox" class="custom-control-input" id="customSwitch" name="status" value="1" {{ ( @$bank[0]->status=='1')?'checked':'' }}>
                  @endif
                    <label class="custom-control-label" for="customSwitch"> Active / Deactive</label>
                </div>
              </div>
          </div> 

            @endif
            

            <div class="form-group mb-0 row">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="{{ url("backend/admin/banking") }}">
                      <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-success btn-sm waves-effect">
                      <i class="fa fa-save font-size-16 align-middle mr-1"></i> @if(!isset($bank))Save @else Update @endif
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
