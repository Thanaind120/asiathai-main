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
        <h1>Reserv Time: Family Rooms</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card " >             
  
          <div class="card-body p-0">
            
          <form action="{{url('backend/member_profile/save')}}" method="POST">
            @csrf
          
            
            <div class="row mt-5 ">
              <div class="col-1 ml-2 mt-2">
               Hourse:
              </div>
              <div class="col-1">
                <select name="" id="" class="form-control">
                  @for($i=0;$i<49;$i++)
                  @if($i==6)
                  <option value="{{$i}}" selected>{{$i}}</option>
                  @else
                <option value="{{$i}}">{{$i}}</option>
                @endif
                  @endfor
                </select>                
              </div>
              <div class="col-1 ml-2 mt-2">
                Minute:
               </div>
               <div class="col-1">
                 <select name="" id="" class="form-control">
                   @for($i=0;$i<60;$i++)
                   @if($i==30)
                   <option value="{{$i}}" selected>{{$i}}</option>
                   @else
                 <option value="{{$i}}">{{$i}}</option>
                    @endif
                   @endfor
                 </select>
            </div>
          </div><br>

            <div class="form-group mb-0 row p-3">
                <div class="col-md-6 text-left">
                    <a class="btn btn-secondary btn-sm waves-effect" href="{{ url()->previous() }}">
                      <i class="fa fa-reply font-size-16 align-middle mr-1"></i> Return
                    </a>
                </div>
                <div class="col-md-6 text-right ">
                    <button type="button" class="btn btn-success btn-sm waves-effect" onclick="success_alert()">
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
