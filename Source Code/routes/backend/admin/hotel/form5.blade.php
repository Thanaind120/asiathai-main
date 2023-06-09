
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
          <h5>Edit Reserve</h5>
        </div>

        <div class="section-body">
        
          <div class="card">             
            <div class="card-header">
              <!-- add user button -->
          
            </div>
            <div class="card-body ">
              <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">Reserve :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="3492TH" name="name" readonly>
                </div>
            </div>
              <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">Name :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="Korn Pakorn" name="name" required>
                </div>
            </div>
            
              <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">Email :</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="pakorn@ots.co.th" name="name" required>
                </div>   
            </div>

            <div class="form-group row ml-4 mt-5">           
              <label for="firstname" class="col-md-2 col-form-label">Phone :</label>
              <div class="col-md-8">
                  <input class="form-control" type="text" value="0648106281" name="name" required>
              </div>   
          </div>

          <div class="form-group row ml-4 mt-5">           
            <label for="firstname" class="col-md-2 col-form-label">Reserve Date :</label>
            <div class="col-md-8">
                <input class="form-control" type="date" value="2021-12-28" name="name" required>
            </div>   
        </div>

        {{-- <div class="form-group row ml-4 mt-5">           
          <label for="firstname" class="col-md-2 col-form-label">Status :</label>
          <div class="col-md-8">
              <input class="form-control" type="text" value="Paid" name="name" readonly>
          </div>   
      </div> --}}
      {{-- <div class="form-group row ml-4 mt-5">           
        <label for="firstname" class="col-md-2 col-form-label">payment date :</label>
        <div class="col-md-8">
            <input class="form-control" type="datetime" value="2021-12-2021 12:30" name="name" readonly>
        </div>   
    </div> --}}
    <div class="form-group row ml-4 mt-5">           
      <label for="firstname" class="col-md-2 col-form-label">Amount :</label>
      <div class="col-md-8">
          <input class="form-control" type="number" value="3500" name="name" required>
      </div>   <span class="mt-2">$</span>
  </div>
    <div class="form-group row ml-4 mt-5">           
      <label for="firstname" class="col-md-2 col-form-label">Check In :</label>
      <div class="col-md-8">
          <input class="form-control" type="datetime" value="2021-12-2021 12:30" name="name" required>
      </div>   
  </div>
    {{--<div class="form-group row ml-5 mt-5 text-center">           
   <label for="firstname" class="col-md-2 col-form-label">payment date :</label> 
    <div class="col-md-6 ">
        <button class="btn btn-success"  >Check Out</button>
    
      <button class="btn btn-danger"  >Cancle Reserve</button>
  </div>    
</div>--}}
<hr>
<div class="form-group mb-0 row">
  <div class="col-md-6">
      <a class="btn btn-secondary btn-sm waves-effect" href="{{ url("backend/admin/reserve/5") }}">
        <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
      </a>
  </div>
  <div class="col-md-6 text-right">
      <button type="button" class="btn btn-success btn-sm waves-effect" onclick="success_alert()">
        <i class="fa fa-save font-size-16 align-middle mr-1"></i> @if(!isset($user))Save @else Update @endif
      </button>
  </div>
</div><br>
          </div>
          </div>
        </div>
      </section>
    </div>
      @include('layout.footer')
    </div>
  </div>
<!-- start edit user -->
<div class="modal fade" id="upload" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="was-validated" method="POST" action="{{ url('director/managing-user') }}"  enctype="multipart/form-data">
                 @csrf
          <div class="modal-header">
          <h3 class="modal-title"><i class="image"></i>Upload Image</h3>
              <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
          </div>
          <div class="modal-body">
          <input type="file" accept="image/png, image/gif, image/jpeg" class="form-control">      
          </div>



          
         </form>
      </div>
  </div>
</div>
<!-- end edit user -->
  @include('layout.script')
  <!-- form to reset password -->
<form action="{{url('/backend/member_reset')}}" method="POST" id="reset_password">
  @csrf
  <input type="hidden" name="id" id="id_reset">
</form>
  <script>
    // $('#simpletable').dataTable();

    function confirm_delete(){
      Swal.fire({
  title: 'Are you sure to delete?',
  // text: "Reset password:m123456",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Confirm'
}).then((result) => {
  if (result.isConfirmed) {

    // $('#id_reset').val(id);
    //   $('#reset_password').submit();
  }
});
    }
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


