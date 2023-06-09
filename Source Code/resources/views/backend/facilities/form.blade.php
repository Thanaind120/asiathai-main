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
            
          <form action="{{url('backend/facilities/save')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            @if(!isset($user))
                <input type="hidden" name="type" value="1">
            @else
            <input type="hidden" name="id" value="{{$user->id}}">
                <input type="hidden" name="type" value="2">
            @endif
            <div class="form-group row ml-4 mt-5">           
                <label for="firstname" class="col-md-2 col-form-label">Facilities Type:</label>
                <div class="col-md-8">
                    <input class="form-control" type="text" value="" name="facilities" required>
                </div>
            </div>
            <br><hr>
                            <div class="container">
                                <div class="row mt-4 ml-4 " >                                  
                                        <label>Icon :</label> 
                                </div>
                                <div class="row mt-4 ml-4  item1" >  
                                    <div class="col-4">
                                         <input type="file" accept=".png, .jpg, .jpeg" class="form-control" name="icon_img[]" required> 
                                  
                                        </div> 
                                    <div class="col-4">
                                    <input type="text"  class="form-control" name="icon_name[]"  placeholder="icon name" required> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <button class="btn btn-sm btn-primary item_add1" type="button"><i class="fa fa-plus"></i> Add </button>
                                        <button class="btn btn-sm btn-danger item_remove1" type="button"><i class="fa fa-trash"></i> Delete </button> 
                                    </div>                               
                                    
                                </div>  
                            </div>
        
<hr>
       
            

            <div class="form-group mb-0 row">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="{{ url()->previous() }}">
                      <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-success btn-sm waves-effect">
                      <i class="fa fa-save font-size-16 align-middle mr-1"></i> @if(!isset($user))Save @else Update @endif
                    </button>
                </div>
            </div><br>
        </form>
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
  <script>
    $(document).ready(function() {
    $('.select_search').select2();
});
  function success_alert(){
    Swal.fire(
  'Success!',
  'Data is save!',
  'success'
)
  }
  </script>
<script>
 $(document).on('click','.item_add1',function(){ 
 var div = $(this).closest('.item1').clone();
 $(this).closest('.item1').after(div);

});

$(document).on('click','.item_remove1',function(){
   
 
    var num = 0;
    $('.item1').each(function(){
    num++;
    })
    if(num!=1){
    var div = $(this).closest('.item1').remove();
    }else{
    swal.fire({
    icon: 'error',
    title:'Warning',
    text:"Cannot Delete",
    // timer:3000,
    type:'warning'
    }).then((value) => {
    }).catch(swal.noop);
    }

    });
</script>
</body>
</html>
