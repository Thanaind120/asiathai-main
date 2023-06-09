<!DOCTYPE html>
<html lang="en">
<head>
  @include('Partner.layout.style')
  {{-- <link rel="stylesheet" href="{{asset('assets_frontend\css\style.css')}}"> --}}
  <style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
      height: 100%;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    #map {
      height: 500px;
      width: 800px;
    }
    .file-upload {
  background-color: #ffffff;
  width: 100%;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #1fb264;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #15824b;
  transition: all 0.2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #1aa059;
  color: #ffffff;
  transition: all 0.2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all 0.2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}
.image-upload-wrap {
  border: 2px dashed #a7a7a7;
  position: relative;
  border-radius: 10px;
  padding: 74px 65px;
}
.image-dropping,
.image-upload-wrap:hover {
  background-color: #f1f1f1;
}
.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #15824b;
  padding: 60px 0;
}
.file-upload-image {
  height: auto;
  width: 100%;
  /* margin: auto; */
  padding-top: 10px;
}
.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all 0.2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}
.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all 0.2s ease;
  cursor: pointer;
}
.remove-image:active {
  border: 0;
  transition: all 0.2s ease;
}
div #file-container {
  margin-top: 10px;
  padding: 10px;
}

#fileList {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

#fileList li {
  margin: 3px 3px 3px 0;
  text-align: center;
  position: relative;
}

#fileList li {
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
}

#fileList li img {
  width: 100%;
}

#fileList li div.removeBtn {
  position: absolute;
  top: 2px;
  right: 2px;
  width:20px;
  height: 20px;
text-align: center;
  background-color: #c93241;
  color: #ffffff;
  font-size: 12px;
  -webkit-border-radius: 20px;
  -moz-border-radius: 20px;
  border-radius: 20px;
    padding: 1px;
}
div.ood {
  float: left;
  display: block;
  text-align: center;
  font-size: 12px;
}
#fileRemove {
  color: red;
  font-size: 13px;
  padding: 0 0 0 5px;
  border-left: 1px solid rgba(0, 0, 0, 0.11);
}
textarea {
    font-size: 0.8rem;
    letter-spacing: 1px;
}

textarea {
    padding: 10px;
    max-width: 100%;
    line-height: 5.0;
    min-height:200px;
    min-width:200px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-shadow: 1px 1px 1px #999;
}
  </style>
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
        <h1>More About Poolvilla</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-12" >             
  
          <div class="card-body p-5">
            
          <form action="{{url('Partner/Poolvilla/Form2/save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(!isset($list1))
                <input type="hidden" name="type" value="1">
            @else
            <input type="hidden" name="id" value="{{$list1->id}}">
                <input type="hidden" name="type" value="2">
            @endif
            <div class="">
              <div class="row">
                <div class="col-sm-6">
                  <div class="text-medium text-grey text-bold mt-3">More about villas (English language)</div>
                  <div class="col-12 mt-3">
                    <textarea rows="10" class="form-control mb-3"id="textAreaExample1" type="text" name="more_about_en">{{@$list1->more_about_en}}</textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="text-medium text-grey text-bold mt-3">More about villas (Thai language)</div>
                  <div class="col-12 mt-3">
                    <textarea rows="10" class="form-control mb-3" type="text" name="more_about_th" >{{@$list1->more_about_th}}</textarea>
                  </div>
                </div>
    
              </div>
            </div>
            <div class="mb-3">
              <div class="text-medium text-grey text-bold mt-3">Frequently asked questions</div>
              <div class="col-12 mt-3">
                {{-- @if(isset($)) --}}
                <div class="row mb-3" id="add_quest">
                  @if(!isset($list2))
                  <div class="col-sm-5 quest0" >                   
                    <div class="text-tiny text-bold"> <input type="checkbox" id="check_del0" value="1"> Questions (English language)</div>
                    <input class="form-control mb-3" type="text" name="quest_en[]" >
                  </div>
                  <div class="col-sm-5 quest0">
                    <div class="text-tiny text-bold">Questions (Thai language)</div>
                    <input class="form-control mb-3" type="text" name="quest_th[]">
                  </div>
               
                  <div class="col-sm-5 quest0">
                    <div class="text-tiny text-bold">Answer (English language)</div>
                    <textarea rows="10" class="form-control mb-3" type="text" name="ans_en[]"></textarea>
                  </div>
                  <div class="col-sm-5 quest0">
                    <div class="text-tiny text-bold">Answer (Thai language)</div>
                    <textarea rows="10" class="form-control mb-3" type="text" name="ans_th[]"></textarea>
                  </div>
                  @else
                  {{-- {{dd($list2)}} --}}
                    @foreach($list2 as $item2 =>$l2)
                    <div class="col-sm-5 quest{{$item2}}" >                   
                      <div class="text-tiny text-bold"> <input type="checkbox" id="check_del{{$item2}}" value="{{$item2}}"> Questions (English language)</div>
                      <input class="form-control mb-3" type="text" name="quest_en[]" value="{{@$l2->question_en}}">
                    </div>
                    <div class="col-sm-5 quest{{$item2}}">
                      <div class="text-tiny text-bold">Questions (Thai language)</div>
                      <input class="form-control mb-3" type="text" name="quest_th[]" value="{{@$l2->question_th}}">
                    </div>
                 
                    <div class="col-sm-5 quest{{$item2}}">
                      <div class="text-tiny text-bold">Answer (English language)</div>
                      <textarea rows="10" class="form-control mb-3" type="text" name="ans_en[]">{{@$l2->ans_en}}</textarea>
                    </div>
                    <div class="col-sm-5 quest{{$item2}}">
                      <div class="text-tiny text-bold">Answer (Thai language)</div>
                      <textarea rows="10" class="form-control mb-3" type="text" name="ans_th[]">{{@$l2->ans_th}}</textarea>
                    </div>
                    @endforeach
                  @endif
                </div>
                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-2"> <button type="button" class="btn btn-outline-success" onclick="add_quest1()"><i class="fas fa-plus-circle me-2"></i> Add</button></div>
                <div class="col-sm-2"><button type="button" class="btn btn-outline-danger" onclick="delete_quest()"><i class="fas fa-trash me-2"></i> Del </button></div>
                </div>
                {{-- <div class="col-12 mt-2"><hr></div>
              <div class="col-12"><h5>PROPERTY FACILITIES Poolvilla</h5></div>
              <?php $fal=DB::select("select * FROM db_facilities where status='1' "); ?>
              <div class="vl-filter-hotel  row">
                  @foreach($fal as $key=>$f)
                  <div class="col-2">
                  <?php $icon=DB::select("select * FROM db_icon where facilities_id='$f->id' "); ?>
                  
                  <div class="text-medium text-grey text-bold mt-3">{{$f->facilities}}</div>
                      @foreach($icon as $item=>$i)
                      <?php 
                      // $room_id=$select_room[0]->id;
                      // $icon_check=DB::select("select * FROM db_icon_room where room_id='$room_id' and icon_id='$i->id' "); 
                      ?>
                      <div class="form-check ">
                          <input class="form-check-input" type="checkbox" value="{{$i->id}}" name="icon[]" id="flexCheckDefault" @if(isset($icon_check[0]))checked @endif>
                          <label class="form-check-label" for="flexCheckDefault">{{$i->icon_name}}</label>
                      </div>
                      @endforeach
                    </div>
                  @endforeach
              </div> --}}
              <div class="col-12 mt-2"><hr></div>
              <h5 class="text-filter text-grey text-start text-bold">BREAKFAST DETAIL</h5>
              <div class="vl-filter-hotel ml-3">
                  <div class="text-filter text-grey text-bold mt-3">Do you serve guests breakfast?</div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="breakfast" value="1" id="flexRadioDefault1" @if($list1->breakfast==1) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault1">
                     Yes
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="breakfast" value="0" id="flexRadioDefault2" @if($list1->breakfast==0) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault2">
                      No
                    </label>
                  </div>
              </div>
              <div class="col-12 mt-2"><hr></div>
              <h5 class="text-filter text-grey text-start text-bold">TELL US ABOUT THE PARKING SITUATION AT YOUR VILLA</h5>
              <div class="vl-filter-hotel ml-3">
                  <div class="text-filter text-grey text-bold mt-3">Is parking available to guests?</div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="parking" value="1" @if($list1->parking==1) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault1">
                     Yes, free
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="parking" value="2" id="flexRadioDefault2" @if($list1->parking==2) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault2">
                      yes, paid
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="parking" value="0" id="flexRadioDefault3" @if($list1->parking==0) checked @endif>
                    <label class="form-check-label" for="flexRadioDefault3">
                      No
                    </label>
                  </div>
              </div>
              <div class="col-12 mt-2"><hr></div>
              <h5 class="text-filter text-grey text-start text-bold">What languages do you or your staff speak?</h5>
              <div class="vl-filter-hotel">
                  <div class="text-filter text-grey text-bold mt-3">Select languages</div>
                  <div class="form-check">
                    <?php $lang=DB::select("select * FROM db_staff_languages where language='1' and poolvilla_id='$poolvilla_id' "); ?>
                    <input class="form-check-input" type="checkbox" value="1" name="languages[]" @if(@$lang[0]->language==1) checked @endif>
                    <label class="form-check-label" for="flexCheckDefault">Thai</label>
                  </div>
                  <div class="form-check">
                    <?php $lang2=DB::select("select * FROM db_staff_languages where language='2' and poolvilla_id='$poolvilla_id' "); ?>
                    <input class="form-check-input" type="checkbox" value="2" name="languages[]" @if(@$lang2[0]->language==2) checked @endif>
                    <label class="form-check-label" for="flexCheckDefault">English</label>
                  </div>
                  <div class="form-check">
                    <?php $lang3=DB::select("select * FROM db_staff_languages where language='3' and poolvilla_id='$poolvilla_id' "); ?>
                    <input class="form-check-input" type="checkbox" value="3" name="languages[]" @if(@$lang3[0]->language==3) checked @endif>
                    <label class="form-check-label" for="flexCheckDefault">Chinese</label>
                  </div>
                  <div class="form-check">
                    <?php $lang4=DB::select("select * FROM db_staff_languages where language='4' and poolvilla_id='$poolvilla_id' "); ?>
                    <input class="form-check-input" type="checkbox" value="4" name="languages[]" @if(@$lang4[0]->language==4) checked @endif>
                    <label class="form-check-label" for="flexCheckDefault">French</label>
                  </div>
                  <div class="form-check">
                    <?php $lang5=DB::select("select * FROM db_staff_languages where language='5'  and poolvilla_id='$poolvilla_id'"); ?>
                    <input class="form-check-input" type="checkbox" value="5" name="languages[]" @if(@$lang5[0]->language==5) checked @endif>
                    <label class="form-check-label" for="flexCheckDefault">German</label>
                  </div>
                  {{-- <h5 class="">WHAT DOES YOUR PLACE LOOK LIKE</div>
                    <div class="container">
                      <div class="box-hotel">
                  <div class="mt-3">
                    <div class="file-upload" style="min-width: 200px;">
                      <div>
                      
                     
                        <div class="drag-text image-upload-wrap">
                          <i class="far fa-image text-img text-light-grey"></i><br>
                          <label class="text-medium" for="upFile">BROWSE FILE HERE </label>
                        </div>
                        <input id="upFile" type="file" name="image[]" multiple hidden>
                      </div>
                      <div id="file-container">
                        <ul id="fileList" class="row">
                        </ul>
                      </div>
                      <input type="hidden" id="fileArray">
                    </div>
                  </div>
       
                </div>
              </div> --}}

            <div class="container p-5">
                <div class="row">
                  <div class="col text-center">
                    <a class="btn btn-secondary" type="button" href="{{url('Partner/Poolvilla/'.$list1->id.'/Edit')}}">Back</a> 
                    <button class="btn btn-warning" type="submit">Next</button>
                  </div>
                </div>
              </div>
        </form>
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
  <script>
    $(document).ready(function() {
    $('.select-show').select2();
    });

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

  (function hide() {
    $(this).hide();
  })(jQuery);

  $(document).ready(function() {
    //Setto la data-value come oggetto vuoto {}
    $('#fileArray').val(JSON.stringify({}));

    $('#upFile').change(function(e) {
      var files = e.target.files;
      var obj = {};
      for (var i = 0; i <= files.length; i++) {

        var file = files[i];
        var reader = new FileReader();
        // when i == files.length reorder and break
        if (i == files.length) {
          // need timeout to reorder beacuse prepend is not done
          if ('0' != files.length) {
            setTimeout(function() {
              updateArray(obj);
            }, 100);
          }
          break;
        }

        reader.onload = (function(file, i) {
          return function(event) {
            obj[i] = event.target.result;
            $('#fileList').prepend('<div class="col-sm-4 col-6"><li data-id="' + file.lastModified + '"><div class="file-upload-image"><img class="w-100" src="' + event.target.result + '" onerror="hide()"  /><div class="removeBtn">X</div><div class="separator"><div class="ood">' + file.name + ' </div><div class="clear-both"></div></div> </div></li></div>');
          };
        })(file, i);

        reader.readAsDataURL(file);
      } // end for;

    });


    $('#fileList').on('click', '.removeBtn', function() {
      var src = $(this).parents('.block').children('img').attr('src');
      $(this).parents('li').remove();
      removeItem(src);
    });


    function removeItem(items) {
      var obj = $('#fileArray').val();
      obj = JSON.parse(obj);

      var y = [];
      if (typeof items != "object") {
        $.each(obj, function(chiave, valore) {
          if (valore == items) {
            delete obj[chiave];
            // esce alla chiave 2
            return false;
          }

        });


        $('#fileArray').val(JSON.stringify(obj));

        return false;

        var arr = $('#fileArray').val();

        $.each(JSON.parse(arr), function(c, v) {

        });

      }


      $.each(obj, function(c, v) {

        y.push(v);

      });

      $.each(items, function(c, v) {

        if ($.inArray(v, y) != -1) {

          return true;
        }
        y.push(v);



      });

      obj = $.extend({}, y);

      return obj;

    }

    function updateArray(items) {

      var newArray = removeItem(items);

      $('#fileArray').val(JSON.stringify(newArray));

      var arr = $('#fileArray').val();

      $.each(JSON.parse(arr), function(c, v) {

      });


    }


  });
  $('#textAreaExample1').autoResize();
  </script>

</body>
</html>
