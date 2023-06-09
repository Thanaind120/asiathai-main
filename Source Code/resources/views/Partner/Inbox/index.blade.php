
<!DOCTYPE html>
<html lang="en">
<head>

  @include('Partner.layout.style')

</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('Partner.layout.nav')
      @include('Partner.layout.menu')

    <!-- Main Content -->
    <div class="main-content">
      <section class="section">
        <div class="section-header">
          <h1>Messages List</h1>
        </div>

        <div class="section-body">
        
          <div class="card ">             
            <div class="card-header">
              <!-- add user button -->
          <div class="text-right">
            <a href="{{url('Partner/Inbox/Create')}}" class="btn btn-success "><i class="fa fa-plus"></i> New Message</a>
          </div><br>
            </div>
            <div class="card-body ">
              <div class="table-responsive ">
                <table id="install_datatable" class="table table-striped text-center">
                <thead  >
                  <tr>
                   <th >#</th> 
                    <th scope="col"> Subject</th>
                    <th scope="col">Send Date</th>
                    <th scope="col">Update Date</th>
                    <th scope="col"> Actions</th>
                  </tr>
                </thead>
                <tbody>
        
                    @foreach($list1 as $key=>$l1)
                  <tr>
                  
                <td >{{$key+1}}</td> 
                  <td>{{$l1->title}}</td>
                    <td>{{date( "d-m-Y", strtotime($l1->created_at))}} เวลา {{date( "H:i", strtotime($l1->created_at))}} น.</td>
                    <td>{{date( "d-m-Y", strtotime($l1->updated_at))}} เวลา {{date( "H:i", strtotime($l1->updated_at))}} น.</td>
                    <td>
                      {{-- <a class="btn btn-primary text-white" href="{{url('Partner/Poolvilla/'.$l1->id.'/Rooms')}}"><i class="fa fa-pencil-square-o"></i> Room</a> --}}
                    <a class="btn btn-warning text-white" href="{{url('Partner/Inbox/'.$l1->id)}}"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
                    </td>
                  </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            </div>
          </div>
          </div>
        </div>
      </section>
    </div>
      @include('Partner.layout.footer')
    </div>
  </div>

  @include('Partner.layout.script')
  <!-- form to reset password -->
<form action="{{url('/backend/member_reset')}}" method="POST" id="reset_password">
  @csrf
  <input type="hidden" name="id" id="id_reset">
</form>
  <script>
    $('#install_datatable').dataTable();

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


