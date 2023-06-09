
<!DOCTYPE html>
<html lang="en">
<head>

  @include('Partner.layout.style')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
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
          <h1>Poolvilla List</h1>
        </div>

        <div class="section-body">
        
          <div class="card ">             
            <div class="card-header">
              <!-- add user button -->
          <div class="text-right">
            <a href="{{url('Partner/Poolvilla/Create')}}" class="btn btn-success "><i class="fa fa-plus"></i> Create</a>
          </div><br>
            </div>
            <div class="card-body ">
              <div class="table-responsive ">
                <table id="install_datatable" class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th >#</th>
                    <th scope="col"> Name</th>
                    <th scope="col">Rooms</th>
                    <th scope="col"> Website</th>
                    <th scope="col"> Star Rate</th>
                    <th scope="col"> Address</th>
                    <th scope="col"> Status</th>
                    <th scope="col"> Tools</th>
                  </tr>
                </thead>
                <tbody>
              
                    @foreach($list1 as $key=>$l1)
                  <tr>
                  <td >{{$key+1}}</td>
                  <td>{{$l1->name_en}}</td>
                    <td>{{$l1->rooms}}</td>
                    <td>{{$l1->website}}</td>
                    <td>{{$l1->address_en}}</td>
                    <td>{{$l1->star_rating}} Stars</td>
                    <td>
                      <div class="custom-control custom-switch">
                      
                          <input type="checkbox" class="custom-control-input" id="customSwitch{{$l1->id}}" name="status" value="{{$l1->status}}" {{$l1->status==1 ? 'checked' : null }} " onchange="changeStatus({{$l1->id}})">
                      
                          <label class="custom-control-label" for="customSwitch{{$l1->id}}"> Active / Deactive</label>
                      </div>
                    </td>
                    {{-- <td>
                      <button class="btn btn-primary" onclick="confirm_reset('{{$l1->id}}')">Reset</button>
                    </td> --}}
                    <td>
                      <a class="btn btn-primary text-white" href="{{url('Partner/Poolvilla/'.$l1->id.'/Rooms')}}"><i class="fa fa-pencil-square-o"></i> Room</a>
                    <a class="btn btn-warning text-white" href="{{url('Partner/Poolvilla/'.$l1->id.'/Edit')}}"><i class="fa fa-pencil-square-o"></i> Edit</a>
                    <button class="btn btn-danger" onclick="confirm_delete('{{$l1->id}}')">	<i class="fas fa-trash-alt" ></i> Delete</button>
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
  <!-- form to delete -->
  <form action="{{url('/poolvilla/delete')}}" method="POST" id="form_delete">
  @csrf
  <input type="hidden" name="id" id="id_delete">
</form>

  <script>
     function changeStatus(id) {
           
            $.ajax({
                type: "POST",
                url:  "{{ url('/change_status_poolvilla') }}",
                headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                data: {
                    id:id,
                    
                },
                success: function(data) {
                  if(data==2){
                    $( '#customSwitch'+id ).prop( "checked", false );
                    Swal.fire({
  icon: 'error',
  title: 'ขออภัย...',
  text: 'โปรดกรอกข้อมูลPoolvillaให้ครบถ้วนก่อนทำการเผยแพร่!',
  // footer: '<a href="">Why do I have this issue?</a>'
})
                  }
                },
                error: function(err){
                 
                    // return alert('เกิดข้อผิดพลาด');
                }
            });
    }
        
    $('#install_datatable').dataTable();

    function confirm_delete(id){
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

    $('#id_delete').val(id);
      $('#form_delete').submit();
  }
});
    }
  </script>
</body>
</html>


