
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
          <h1>Reserve List</h1>
        </div>

        <div class="section-body">
        
          <div class="card">             
            <div class="card-header">
              <!-- add user button -->
          <div class="text-right">
            {{-- <button data-target="#upload" data-toggle="modal" class="btn btn-success "><i class="fa fa-image"></i> add</button> --}}
          </div><br>
            </div>
            <div class="card-body ">
              <div class="table-responsive">
                <table id="simpletable" class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="text-center"> No.</th>
                    <th scope="col" class="text-center"> Customer Name</th>
                    {{-- <th scope="col" class="text-center"> Email</th> --}}
                    {{-- <th scope="col" class="text-center"> Phone</th> --}}
                    <th scope="col" class="text-center"> Date</th>
                    <th scope="col" class="text-center"> Payment</th>
                    <th scope="col" class="text-center"> Amount($)</th>
                    <th scope="col" class="text-center"> Check In</th>
                    <th scope="col" class="text-center"> Check Out</th>
                    <th scope="col" class="text-center w-25"> Tools</th>
                  </tr>
                </thead>
                <tbody>
              
                    {{-- @foreach($user as $key=>$u) --}}
                  <tr>
                  <td class="text-center">1</td>
                  <td class="text-center">3492TH </td>  
                  <td class="text-center">Korn Pakorn </td>
                  {{-- <td class="text-center">pakorn@ots.co.th </td>    --}}
                  {{-- <td class="text-center">0648106281 </td> --}}
                  <td class="text-center">28/12/2021 - 1/01/2022 </td>
                  <td class="text-center">28/12/2021 12.00</td>  
                  <td class="text-center">3500</td>  
                  <td class="text-center">28/12/2021 12.00 </td>
                  <td class="text-center"> </td>
                      <td class="text-center">
                      
                      <a class="btn btn-primary " href="{{url('backend/admin/reserve_report/5')}}">View</a>
                        <a class="btn btn-warning " href="{{url('backend/admin/edit_reserve/5')}}">Edit</a>
  
                       
                          {{-- <form method="post" action="{{url('backend/manage_resereve')}}">
                            @csrf
                          
                            <input type="hidden" name="id" value="5">
                              <div class="row">
                                <div class="col">
                                <select name="poovilla_manage_type" class="form-control">
                                    <option disabled selected>Select</option>              
                                    <option value="1">View</option>
                                    <option value="2">Edit</option>
                                    <option value="3">Cancle Reserve</option>
                                    
                                  </select>
                                </div>
                                <div class="col">
                                  <button type="submit" class="btn btn-secondary">Go</button>
                                </div>                          
                              </div>                          
                          </form>            --}}
                      
                      </td>                
                    </tr>
             
                    {{-- @endforeach --}}
                </tbody>
              </table>
            </div>
            </div>
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



          <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary waves-effect waves-light "data-dismiss="modal">Save</button>
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
  </script>
</body>
</html>


