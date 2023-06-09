
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
          <h1>Q&A</h1>
        </div>

        <div class="section-body">
        
          <div class="card">             
            <div class="card-header">
              <!-- add user button -->
          <div class="text-right">
            <a href="{{url('backend/admin/manage_Q&A/5')}}" class="btn btn-success "><i class="fa fa-plus"></i> add</a>
          </div><br>
            </div>
            <div class="card-body ">
              <div class="table-responsive">
                <table id="simpletable" class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col"><i class="fa fa-user"></i> Question</th>
                    <th scope="col"><i class="fa fa-envelope"></i> Answer</th>
                    <th scope="col"><i class="fa fa-check"></i> Status</th>               
                    <th scope="col"><i class="fa fa-cog"></i> Tools</th>
                  </tr>
                </thead>
                <tbody>
              
                    {{-- @foreach($user as $key=>$u) --}}
                  <tr>
                  <td >1</td>
                  <td> How to find out more about a room Accommodation services and facilities</td>
                    <td> You can check the accommodation information on the booking confirmation received or on the accommodation information page on our platform. For more information You can also contact the property directly.</td>
                    <td>
                      {{-- @if($u->status==1) --}}
                        <span class="text-success">Active</span>
                      {{-- @else
                      <span class="text-danger">Deactive</span>
                      @endif --}}
                    </td>
                   
                    <td>
                    <a class="btn btn-warning text-white" href="{{url('backend/admin/manage_Q&A/5')}}"><i class="fa fa-pencil-square-o"></i>Edit</a>
                    </td>
                  </tr>

                  <tr>
                    <td >2</td>
                    <td> How can I change a booking?</td>
                      <td> Please check the activity's policy to find out if you can make a change to your booking.

                        For some activities, you can change the booking details (e.g. participation date, passenger information, special requirements, etc.) by taking these steps:
                        
                        1.Go to the Bookings page
                        2.Find the booking you want to change and select "Amend booking"
                        You will get an updated voucher once your changes are confirmed.
                        
                        Still need help to change a booking? Chat with us online. Simply go to the Bookings page, select the booking and then select the chat icon.</td>
                      <td>
                        {{-- @if($u->status==1) --}}
                          <span class="text-success">Active</span>
                        {{-- @else
                        <span class="text-danger">Deactive</span>
                        @endif --}}
                      </td>
                     
                      <td>
                      <a class="btn btn-warning text-white" href="{{url('backend/admin/manage_Q&A/5')}}"><i class="fa fa-pencil-square-o"></i>Edit</a>
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

  @include('layout.script')
  <!-- form to reset password -->
<form action="{{url('/backend/member_reset')}}" method="POST" id="reset_password">
  @csrf
  <input type="hidden" name="id" id="id_reset">
</form>
  <script>
    $('#simpletable').dataTable();

    function confirm_reset(id){
      Swal.fire({
  title: 'Are you sure to reset?',
  text: "Reset password:m123456",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Confirm'
}).then((result) => {
  if (result.isConfirmed) {

    $('#id_reset').val(id);
      $('#reset_password').submit();
  }
});
    }
  </script>
</body>
</html>


