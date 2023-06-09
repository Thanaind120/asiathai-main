
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
          <h1>Room Images List</h1>
        </div>

        <div class="section-body">
        
          <div class="card ">             
            <div class="card-header">
              <!-- add user button -->
          <div class="text-right">
            <a  class="btn btn-success text-white"  data-toggle="modal" data-target="#add_image"><i class="fa fa-plus"></i> Add</a>
          </div><br>
            </div>
            <div class="card-body ">
              <div class="table-responsive ">
                <table id="install_datatable" class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th >#</th>
                    <th scope="col"> Image</th>
                    {{-- <th scope="col">Rooms</th>
                    <th scope="col"> Website</th>
                    <th scope="col"> Star Rate</th>
                    <th scope="col"> Address</th>
                    <th scope="col"> Status</th> --}}
                    <th scope="col"> Tools</th>
                  </tr>
                </thead>
                <tbody>
              
                    @foreach(@$list2 as $key=>$l2)
                  <tr>
                  <td >{{$key+1}}</td>
                  <td><img src="{{asset($l2->image)}}" width="200px" height="100px"></td>
                  
                    <td>
                    <a class="btn btn-warning text-white"  data-toggle="modal" data-target="#edit_image" onclick="set_image_id('{{$l2->id}}')"><i class="fa fa-pencil-square-o"></i> Edit</a>
                    <a class="btn btn-danger text-white"  onclick="confirm_delete('{{$list1->id}}','{{$l2->id}}')"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                  </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            </div>

            <div class="container p-5">
              <div class="row">
                <div class="col text-center">
                  <a class="btn btn-secondary" type="button" href="{{url('Partner/Poolvilla/'.@$list1->id.'/Rule')}}">Back</a>
                  <a class="btn btn-warning text-white" href="{{url('Partner/Poolvilla/'.@$list1->poolvilla_id.'/Rooms')}}">Finish</a>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </section>
    </div>
    {{-- model zone --}}
    <!-- Modal -->
<div class="modal fade" id="add_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
 
      <div class="modal-content">
        <form action="{{url('Partner/Room/Image/Update')}}" enctype="multipart/form-data" method="POST">
          @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Images</h5>
     
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
  
        <input type="hidden"  name="id" value="{{$list1->id}}">
        <input type="hidden"  name="type" value="1">
        <input type="file" name="image" class="form-control" accept="image/*" required>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
        <button  class="btn btn-warning" type="submit">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="edit_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
     
          <div class="modal-content">
            <form action="{{url('Partner/Room/Image/Update')}}" enctype="multipart/form-data" method="POST">
              @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Images</h5>
         
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          
      
            <input type="hidden"  name="id" value="{{$list1->id}}">
            <input type="hidden"  name="type" value="2">
            <input type="hidden"  name="id_image" id="id_image">
            <input type="file" name="image" class="form-control" accept="image/*" required>
    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
            <button  class="btn btn-warning" type="submit">Save</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    {{-- modeal zone --}}
      @include('Partner.layout.footer')
    </div>
  </div>
<input type="hidden" name="url_to_del" id="url_to_del" value="{{url('Partner/Room/Image/Delete/')}}">
  @include('Partner.layout.script')
  <!-- form to reset password -->
<form action="{{url('/backend/member_reset')}}" method="POST" id="reset_password">
  @csrf
  <input type="hidden" name="id" id="id_reset">
</form>
  <script>
    $('#install_datatable').dataTable();

    function confirm_delete(poolvilla_id,image_id){
      Swal.fire({
  title: 'Are you sure to Delte?',
  text: "Please confirm to delete it!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Confirm'
}).then((result) => {
  if (result.isConfirmed) {

   var url=$('#url_to_del').val();
  
    window.location = url+'/'+poolvilla_id+'/'+image_id;
  }
});
    }

    function set_image_id(id){
    $('#id_image').val(id);
    }
  </script>
</body>
</html>


