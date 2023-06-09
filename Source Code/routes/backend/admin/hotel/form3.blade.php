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
        <h1>Discount {{$house->name}}</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card " >             
  
          <div class="card-body p-0">
            
          <form action="{{url('backend/discount/save')}}" method="POST">
            @csrf
            <input type="hidden" name="house_id" value="{{$house->id}}">
            <div class="row mt-5 ">
              <div class="col-2 ml-2 mt-2">
                House Price:
              </div>
              <div class="col-4">
                <input type="number" class="form-control" value="{{@$house->room_price}}" readonly>
              </div><span class="mt-2">฿</span>
            </div><hr><br>
            <h4 class="ml-3">Discount</h4>
            <div class="row mt-5 ">
              <div class="col-2 ml-2 mt-2">
                Start Discount Date:
              </div>
              <div class="col-4">
                <input type="date" class="form-control" name="start_date" value="{{@$dis->start_date}}" required>
              </div>
            </div>
            <div class="row mt-5 ">
              <div class="col-2 ml-2 mt-2">
                End Discount Data:
              </div>
              <div class="col-4">
                <input type="date" class="form-control" name="end_date" value="{{@$dis->start_date}}" required>
              </div>
            </div>

            <div class="row mt-5 ">
              <div class="col-12">
                  <p>Please select your type:</p>
              </div>
              <div class="col-12">
                  <input type="radio" class="type " name="type" value="1" @if(@$dis->type==1) checked @endif >
                  <label for="age1">Discount with price</label>
              </div>
              <div class="col-12">
                  <input type="radio" class="type " name="type" value="2"@if(@$dis->type==2) checked @endif>
                  <label for="age1">Discount with percent</label>
              </div>
              <input type="hidden" name="js_type" value="{{@$dis->type}}" id="js_type">
            </div>
           
            <div class="row mt-5 " id="discount_display">
              <div class="col-2 ml-2 mt-2">
                Discount :
              </div>
              <div class="col-4">
                <input type="number" name="discount" class="form-control" value="{{@$dis->discount}}" >
              </div><span class="mt-2" id="change_icon">฿</span>
            </div>
            <br><br>
            <div class="form-group mb-0 row">
                <div class="col-md-6">
                    <a class="btn btn-secondary btn-sm waves-effect" href="{{ url()->previous() }}">
                      <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-success btn-sm waves-effect" >
                      <i class="fa fa-save font-size-16 align-middle mr-1"></i> @if(!isset($dis))Save @else Update @endif
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
  var js_type=$('#js_type').val();

   if(js_type!=null){
   
    if(js_type==1){
        $('#change_icon').text('฿');
        $('#discount_display').show();
      }
    else if(js_type==2){
        $('#change_icon').text('%');
        $('#discount_display').show();
      }
    }
  else{
      $('#discount_display').hide();
    }
  
});

$( 'input[type=radio][name=type]' ).change(function() {

  
      if(this.value==1){
        $('#change_icon').text('฿');
        $('#discount_display').show();
      }
      else if(this.value==2){
        $('#change_icon').text('%');
        $('#discount_display').show();
      }
  
});

  function success_alert(){
    Swal.fire(
  'Success!',
  'Data is save!',
  'success'
)
  }

  function adult1(){

    var adult=$('#adult').val();
    if(adult>40){
      Swal.fire(
  'Warning!',
  'Limited 40 Person',
  'Warning'
)
$('#adult').val(40);
  }
  
    if(adult<0){
      Swal.fire(
  'Warning!',
  'Minimum 0 Person',
  'Warning'
)
$('#adult').val(0);
  }
    }

    
  function adult22(){
    
    var adult=$('#adult2').val();
    if(adult>10){
      Swal.fire(
  'Warning!',
  'Adult Limited 10 Person',
  'Warning'
)
$('#adult2').val(10);
  }
  
    if(adult<0){
      Swal.fire(
  'Warning!',
  'Minimum 0 Person',
  'Warning'
)
$('#adult2').val(0);
  }
    }

    function child1(){
    var child=$('#child').val();
    if(child>10){
      Swal.fire(
  'Warning!',
  'Children Limited 10 Person',
  'Warning'
)
$('#child').val(10);
  }
  
    if(child<0){
      Swal.fire(
  'Warning!',
  'Minimum 0 Person',
  'Warning'
)
$('#adult').val(0);
  }
    }
  </script>

</body>
</html>
