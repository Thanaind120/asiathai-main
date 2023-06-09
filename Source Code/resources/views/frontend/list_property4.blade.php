<!doctype html>
<html lang="th">

<head>
  <title>หน้าแรก</title>
  @include('frontend/inc_header')
  <link rel="stylesheet" href="{{asset('assets_frontend/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets_frontend/css/owl.theme.default.min.css')}}">
  <script src="{{asset('assets_frontend/js/owl.carousel.min.js')}}"></script>
</head>

<body>
 @include('frontend/inc_navbar_hotel')
  <div class="bg-grey">
    <div class="container">
      <div class="box-hotel">
          <form action="{{url('partner/save/list4')}}" method="POST">
            @csrf
            <input type="hidden" name="poolvilla_id" value="{{$poolvilla_id}}">
        <div class="vl-filter-hotel">
          <div class="row">
            <div class="col-sm-6">
              <div class="text-medium text-grey text-bold mt-3">More about villas (English language)</div>
              <div class="col-12 mt-3">
                <textarea rows="3" class="form-control mb-3" type="text" name="more_about_en"></textarea>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="text-medium text-grey text-bold mt-3">More about villas (Thai language)</div>
              <div class="col-12 mt-3">
                <textarea rows="3" class="form-control mb-3" type="text" name="more_about_th"></textarea>
              </div>
            </div>

          </div>
        </div>
        <div class="mb-3">
          <div class="text-medium text-grey text-bold mt-3">Frequently asked questions</div>
          <div class="col-12 mt-3">
            <div class="row mb-3" id="add_quest">
              <div class="col-sm-5 quest0" >
               
                <div class="text-tiny text-bold"> <input type="checkbox" id="check_del0" value="1"> Questions (English language)</div>
                <input class="form-control mb-3" type="text" name="quest_en[0]">
              </div>
              <div class="col-sm-5 quest0">
                <div class="text-tiny text-bold">Questions (Thai language)</div>
                <input class="form-control mb-3" type="text" name="quest_th[0]">
              </div>
           
              <div class="col-sm-5 quest0">
                <div class="text-tiny text-bold">Answer (English language)</div>
                <textarea rows="3" class="form-control mb-3" type="text" name="ans_en[0]"></textarea>
              </div>
              <div class="col-sm-5 quest0">
                <div class="text-tiny text-bold">Answer (Thai language)</div>
                <textarea rows="3" class="form-control mb-3" type="text" name="ans_th[0]"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-2"> <button type="button" class="btn-clear" onclick="add_quest1()"><i class="fas fa-plus-circle me-2"></i>Add more </button></div>
            <div class="col-sm-2"><button type="button" class="btn-clear" onclick="delete_quest()"><i class="fas fa-trash me-2"></i>Delete </button></div>
            </div>
           
            
          </div>
        </div>
        <div class="row justify-content-center mt-5">
          <div class="col-sm-4 ">
            <a href="{{url('list_property3')}}">
              <div class="btn-grey mt-3">Back</div>
            </a>
          </div>
          <div class="col-sm-4 ">
            <button type="submit" class="btn-orange mt-3">
             Next
            </button>
          </div>

        </div>
      </form>
      </div>

      <div class="space-footer"></div>
    </div>
    @include('frontend/inc_footer_hotel')
</body>

</html>

<script>
  $(function() {
    $('[data-decrease]').click(decrease);
    $('[data-increase]').click(increase);
    $('[data-value]').change(valueChange);
  });

  var count_quest=0;
  function add_quest1(){
    count_quest++;
    $( "#add_quest" ).append( ' <div class="col-sm-5 quest'+count_quest+'"><div class="text-tiny text-bold"><input type="checkbox" id="check_del'+count_quest+'" value="1"> Questions (English language)</div><input class="form-control mb-3" type="text" name="quest_en['+count_quest+']"></div><div class="col-sm-5 quest'+count_quest+'"><div class="text-tiny text-bold">Questions (Thai language)</div><input class="form-control mb-3" type="text" name="quest_th['+count_quest+']"></div>    <div class="col-sm-5 quest'+count_quest+'"><div class="text-tiny text-bold">Answer (English language)</div><textarea rows="3" class="form-control mb-3" type="text" name="ans_en['+count_quest+']"></textarea></div><div class="col-sm-5 quest'+count_quest+'"><div class="text-tiny text-bold">Answer (Thai language)</div><textarea rows="3" class="form-control mb-3" type="text" name="ans_th['+count_quest+']"></textarea></div>');
  }
  function delete_quest(){
    let text = "โปรดยืนยันการทำรายการ!";
  if (confirm(text) == true) {
    for(let i=0;i<count_quest;i++){     
     
     if($('#check_del'+i).is(':checked') ){
         console.log(i);
         $( '.quest'+i ).remove();
         // count_quest--;
     }
   }
  } else {
   
  }


  }
  function decrease() {
    var value = $(this).parent().find('[data-value]').val();
    if (value > 0) {
      value--;
      $(this).parent().find('[data-value]').val(value);
    }
  }

  function increase() {
    var value = $(this).parent().find('[data-value]').val();
    if (value < 100) {
      value++;
      $(this).parent().find('[data-value]').val(value);
    }
  }

  function valueChange() {
    var value = $(this).val();
    if (value == undefined || isNaN(value) == true || value <= 0) {
      $(this).val(1);
    } else if (value >= 101) {
      $(this).val(100);
    }
  }
</script>