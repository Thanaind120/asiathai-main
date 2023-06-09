<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.style')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
  textarea {
  width: 300px;
  height: 100px;
}
</style>
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
        <h1>Add - Edit Q&A Poolvilla</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card " >             
  
          <div class="card-body ">
            
          <form action="{{url('backend/hotel/save')}}" method="POST">
            @csrf
           <div class="row">
             <div class="col-2 mt-2">Question:</div>             
          
             <textarea class="form-control" style="height:100%"> How to find out more about a room Accommodation services and facilities</textarea>            
            </div>     <br>
            <div class="row">
             <div class="col-2 mt-2">Answer:</div>             

             <textarea class="form-control"  style="height:100%"> You can check the accommodation information on the booking confirmation received or on the accommodation information page on our platform. For more information You can also contact the property directly.</textarea>            
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
          </div> <br><hr>
          <div class="form-group mb-0 row">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="{{ url("backend/admin/Q&A/5") }}">
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
