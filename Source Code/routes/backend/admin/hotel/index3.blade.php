
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
          <h1>House Manage</h1>
        </div>

        <div class="section-body">
        
          <div class="card">             
            <div class="card-header">
              <!-- add user button -->
          <div class="text-right">
            <a  class="btn btn-success " href="{{url('backend/admin/add_house/'.$id)}}"><i class="fa fa-plus"></i> add</a>
          </div><br>
            </div>
            <div class="card-body ">
              <div class="table-responsive">
                <table id="simpletable" class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col"><i class="fa fa-hotel"></i> House Name</th>
                    <th scope="col"><i class="fa fa-home"></i> Max Rooms</th>
                    <!-- <th scope="col"><i class="fa fa-home"></i> Empty Rooms</th> -->
                    <th scope="col"><i class="fa fa-hotel"></i> Price</th>
                    <th scope="col"><i class="fa fa-check"></i> Status</th>               

                    <th scope="col"><i class="fa fa-home"></i> Manage House</th>
                  </tr>
                </thead>
                <tbody>
              
                    @foreach($house as $key=>$h)
                  <tr>
                  <td class="text-center">{{$key+1}}</td>
                  <td class="text-center">{{$h->name}}</td>
                    <!-- <td>15</td> -->
                    <td class="text-center">{{$h->max_rooms}}</td>
                    <td class="text-center">{{$h->room_price}}$</td>
                    <td class="text-center">
                      @if($h->status==1)
                        <span class="text-success">Active</span>
                      @else
                      <span class="text-danger">Deactive</span>
                      @endif
                    </td>                  
                    {{-- <td class="text-center">
                    <a class="btn btn-primary text-white" href="{{url('backend/admin/manage_image_hotel/'.$h->id)}}"><i class="fa fa-image"></i> Edit</a>
                    <a class="btn btn-warning text-white" href="{{url('backend/admin/manage_description_hotel/'.$h->id)}}"><i class="fa fa-hotel"></i> Edit</a>
                    </td>--}}
                    <td class="text-center">
                      <form method="post" action="{{url('backend/manage_rooms_pages')}}">
                        @csrf
                      
                        <input type="hidden" name="id" value="{{$h->id}}">
                          <div class="row">
                            <div class="col-8">
                            <select name="poovilla_manage_type" class="form-control">
                                <option disabled selected>Select</option>              
                                <option value="1">Manage Image</option>
                                <option value="2">Manage Description(EN)</option>
                                <option value="6">Manage Description(TH)</option>
                                <option value="3">Discount Price</option>
                                <option value="4">ระยะเวลาในการล็อคห้อง</option>
                              </select>
                            </div>
                            <div class="col">
                              <button type="submit" class="btn btn-secondary">Go</button>
                            </div>                          
                          </div>                          
                      </form>                     
  
                    {{-- <a class="btn btn-info text-white" href="{{url('backend/admin/add_edit_room/1')}}"><i class="fa fa-pencil-square-o"></i> Edit</a> --}}
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


