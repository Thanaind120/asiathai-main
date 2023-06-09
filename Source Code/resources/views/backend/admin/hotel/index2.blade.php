
<!DOCTYPE html>
<html lang="en">
<head>
  @include('sweetalert')
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
          <h1>Manage Image Poolvilla</h1>
        </div>

        <div class="section-body">
        
          <div class="card">             
            <div class="card-header">
              <!-- add user button -->
          <div class="text-right">
            <button data-target="#upload" data-toggle="modal" class="btn btn-success "><i class="fa fa-image"></i> add</button>
          </div><br>
            </div>
            <div class="card-body ">
              <div class="table-responsive">
                <table id="simpletable" class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="text-center"><i class="fa fa-user "></i> Image</th>
                    <th scope="col" class="text-center"><i class="fa fa-cog "></i> Tools</th>
                  </tr>
                </thead>
                <tbody>
              
                    @foreach($image_poolvilla as $key=>$img)
                  <tr>
                  <td class="text-center">{{$key+1}}</td>
                  <td class="text-center"><img src="{{asset($img->image)}}" width="250px" height="150px"></td>
                  
                    <td class="text-center">
                    <button class="btn btn-warning" onclick="update_image('{{$img->id}}')">Edit</button>
                    <button class="btn btn-danger" onclick="confirm_delete('{{$img->id}}')">Delete</button>
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
<!-- start add image -->
<div class="modal fade" id="upload" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="was-validated" method="POST" action="{{ url('backend/image_poolvilla/save') }}"  enctype="multipart/form-data">
                 @csrf
          <div class="modal-header">
          <h3 class="modal-title"><i class="image"></i>Upload Image</h3>
              <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="type" value="1">
          <input type="hidden" name="poolvilla_id" value="{{$user}}">
          <input type="file" accept="image/png, image/gif, image/jpeg" class="form-control" name="image_poolvilla" required>      
          </div>



          <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary waves-effect waves-light" >Save</button>
          </div>
         </form>
      </div>
  </div>
</div>
<!-- end add image -->
<!-- start update image -->
<div class="modal fade" id="update" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="was-validated" method="POST" action="{{ url('backend/image_poolvilla/save') }}"  enctype="multipart/form-data">
                 @csrf
          <div class="modal-header">
          <h3 class="modal-title"><i class="image"></i>Upload Image</h3>
              <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="type" value="2">
          <input type="hidden" name="poolvilla_id" value="{{$user}}">
          <input type="hidden" name="id"  id="update_id">
          <input type="file" accept="image/png, image/gif, image/jpeg" class="form-control" name="image_poolvilla" required>      
          </div>



          <div class="modal-footer">
              <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary waves-effect waves-light" >Save</button>
          </div>
         </form>
      </div>
  </div>
</div>
<!-- end update image -->
  @include('layout.script')
  <!-- form to reset password -->
<form action="{{url('/backend/image_poolvilla/delete')}}" method="POST" id="delete_image">
  @csrf
  <input type="hidden" name="id" id="id_delete">
  <input type="hidden" name="poolvilla_id" value="{{$user}}">
</form>
  <script>
    // $('#simpletable').dataTable();

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
      $('#delete_image').submit();
  }
});
    }

    function update_image(id){
    $('#update_id').val(id);
    $('#update').modal();
    }
  </script>
</body>
</html>


