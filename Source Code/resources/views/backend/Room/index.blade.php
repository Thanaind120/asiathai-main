
<!DOCTYPE html>
<html lang="en">
<head>

  @include('Partner.layout.style')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
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
          <h1>{{$list1->name_en}} Room List</h1>
        </div>

        <div class="section-body">
        
          <div class="card ">             
            <div class="card-header">
              <!-- add user button -->
          <div class="text-right">
            <a href="{{url('Partner/Poolvilla/'.$list1->id.'/CreateRoom')}}" class="btn btn-success "><i class="fa fa-plus"></i> Create</a>
          </div><br>
            </div>
            <div class="card-body ">
              <div class="table-responsive ">
                <table id="install_datatable" class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th >#</th>
                    <th scope="col"> Name</th>
                    <th scope="col"> Price</th>
                    <th scope="col"> Size</th>
                    <th scope="col"> Adult</th>
                    <th scope="col"> Kids</th>
                    <th scope="col"> Status</th>
                    <th scope="col"> Tools</th>
                  </tr>
                </thead>
                <tbody>
              
                    @foreach($list2 as $key=>$l2)
                  <tr>
                  <td >{{$key+1}}</td>
                  <td>{{@$l2->name}}</td>
                    <td>{{@$l2->price}}</td>
                    <td>{{@$l2->size}}</td>
                    <td>{{@$l2->adult}}</td>
                    <td>{{@$l2->kids}}</td>
                  
                    <td>
                    <div class="custom-control custom-switch">
                      
                      <input type="checkbox" class="custom-control-input" id="customSwitch{{$l2->id}}" name="status" value="{{$l2->status}}" {{$l2->status==1 ? 'checked' : null }} " onchange="changeStatus({{$l2->id}})">
                  
                      <label class="custom-control-label" for="customSwitch{{$l2->id}}"> Active / Deactive</label>
                  </div>
                    </td>
                    {{-- <td>
                      <button class="btn btn-primary" onclick="confirm_reset('{{$l1->id}}')">Reset</button>
                    </td> --}}
                    <td>
                  <a class="btn btn-primary text-white" href="{{url('Partner/Room/'.$l2->id.'/Discount')}}"> Discount</a> 
                    <a class="btn btn-warning text-white" href="{{url('Partner/Room/'.$l2->id.'/Edit')}}"><i class="fa fa-pencil-square-o"></i> Edit</a>
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
     function changeStatus(id) {
           
           $.ajax({
               type: "POST",
               url:  "{{ url('/change_status_room') }}",
               headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
               data: {
                   id:id,
                   
               },
               success: function(data) {
           //  alert(data)
               },
               error: function(err){
                
                   // return alert('เกิดข้อผิดพลาด');
               }
           });
   }
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


