<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.style')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
        <h1>Add - Edit Facilities</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-8" >             
  
          <div class="card-body p-0">
            
          <!-- <form action="{{url('backend/facilities/update')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            @if(!isset($user))
                <input type="hidden" name="type" value="1">
            @else
            <input type="hidden" name="id" value="{{$user->id}}">
                <input type="hidden" name="type" value="2">
            @endif -->
         
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">Facilities Type:</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="{{$facilities->facilities}}" name="facilities" readonly>
                </div>
                <div class="col-2 mt-1">
                <button class="btn btn-warning" type="button" data-target="#edit_facilities" data-toggle="modal">Edit</button>
                </div>
            </div>
            <br><hr>
                            <div class="container">
                                <div class="row mt-4 ml-4 " >                                  
                                        <button class="btn btn-success" data-target="#add_icon" data-toggle="modal"><i class="fa fa-plus"></i>Add Icon</button>
                                </div>
                                @foreach($icon as $key=>$i)
                                <div class="row mt-4 ml-4  item1" >  
                                    <div class="col-4">
                                      <img src="{{asset('frontend_assets/icon/'.$i->icon_img)}}" alt="" with="50px" height="50px">
                                  
                                        </div> 
                                    <div class="col-4">
                                    <input type="text"  class="form-control" value="{{$i->icon_name}}"  placeholder="icon name" readonly> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <button class="btn  btn-warning " data-target="#edit_icon" data-toggle="modal" type="button" onclick="(edit_icon('{{$i->id}}','{{$i->icon_name}}'))"><i class="fa fa-pencil"></i> Edit </button>
                                        <button class="btn  btn-danger " type="button" onclick="(delete_icon('{{$i->id}}'))"> Delete </button> 
                                    </div>                               
                                    
                                </div>  
                                @endforeach
                            </div>
        
<hr>
       
            

            <div class="form-group mb-0 row">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="{{ url('backend/admin/facilities') }}">
                      <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <!-- <button type="submit" class="btn btn-success btn-sm waves-effect">
                      <i class="fa fa-save font-size-16 align-middle mr-1"></i> @if(!isset($user))Save @else Update @endif
                    </button> -->
                </div>
            </div><br>
        <!-- </form> -->
          </div>
        </div>
        </div>
      </div>
    </section>
  </div>
      @include('layout.footer')
    </div>
  </div>
<!-- start edit facilities -->
<div class="modal fade" id="edit_facilities" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form class="was-validated" method="POST" action="{{ url('backend/facilities/update') }}"  enctype="multipart/form-data">
                   @csrf
            <div class="modal-header">
            <h3 class="modal-title">Edit Facilities</h3>
                <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
            </div>
            <div class="modal-body">
            
               <input type="hidden" name="id" class="edit_id" value="{{$facilities->id}}">
                <input type="text" class="form-control" name="facilities"  value={{$facilities->facilities}} placeholder="Facilities type">
  
        
            </div>



            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
            </div>
           </form>
        </div>
    </div>
</div>
<!-- end edit facilities -->
<!-- start edit icon -->
<div class="modal fade" id="edit_icon" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form class="was-validated" method="POST" action="{{ url('backend/icon/update') }}"  enctype="multipart/form-data">
                   @csrf
            <div class="modal-header">
            <h3 class="modal-title">Edit Icon</h3>
                <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
            </div>
            <div class="modal-body">
            
               <input type="hidden" name="id" id="edit_icon_id" value="">
               <input type="file" accept=".png, .jpg, .jpeg" class="form-control" name="icon_img" ><br> 
               <input type="text"  class="form-control" id="icon_name" name="icon_name" placeholder="Icon Name" required> 
        
            </div>



            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
            </div>
           </form>
        </div>
    </div>
</div>
<!-- end edit icon -->

<!-- start add icon -->
<div class="modal fade" id="add_icon" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form class="was-validated" method="POST" action="{{ url('backend/icon/save') }}"  enctype="multipart/form-data">
                   @csrf
            <div class="modal-header">
            <h3 class="modal-title">Add Icon</h3>
                <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
            </div>
            <div class="modal-body">
            
               <input type="hidden" name="facilities_id"  value="{{$facilities->id}}">
               <input type="file" accept=".png, .jpg, .jpeg" class="form-control" name="icon_img"  required><br> 
               <input type="text"  class="form-control" id="icon_name" name="icon_name" placeholder="Icon Name" required> 
        
            </div>



            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
            </div>
           </form>
        </div>
    </div>
</div>
<!-- end add icon -->
<!-- form deleted -->
<form action="{{url('backend/icon/delete')}}" method="POST" id="delete_form">
@csrf
  <input type="hidden" name="id" id="delete_id">
</form>

  @include('layout.script')
  <script>
    $(document).ready(function() {
    $('.select_search').select2();
});
  function delete_icon(id){
    swal.fire({
    icon: 'error',
    title:'Warning',
    text:"Are you sure Delete",
    showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Confirm'

    }).then((result) => {
      if (result.isConfirmed) {
      $('#delete_id').val(id);
      $('#delete_form').submit();
      }
    }).catch(swal.noop);
    
  }

  </script>
<script>
  function edit_icon(id,icon_name){
    $('#edit_icon_id').val(id);
    $('#icon_name').val(icon_name);
  }
 $(document).on('click','.item_add1',function(){ 
 var div = $(this).closest('.item1').clone();
 $(this).closest('.item1').after(div);

});

// $(document).on('click','.item_remove1',function(){
   
 
//     var num = 0;
//     $('.item1').each(function(){
//     num++;
//     })
//     if(num!=1){
//     var div = $(this).closest('.item1').remove();
//     }else{
//     swal.fire({
//     icon: 'error',
//     title:'Warning',
//     text:"Cannot Delete",
//     // timer:3000,
//     type:'warning'
//     }).then((value) => {
//     }).catch(swal.noop);
//     }

//     });
</script>
</body>
</html>
