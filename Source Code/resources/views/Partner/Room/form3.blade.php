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
        <h1>Rule</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-12" >             
  
          <div class="card-body p-5">
            
          <form action="{{url('Partner/Poolvilla/Form3/save')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(!isset($list1))
                <input type="hidden" name="type" value="1">
            @else
            <input type="hidden" name="id" value="{{$list1->id}}">
                <input type="hidden" name="type" value="2">
            @endif
            <h5 class="text-filter text-grey text-start text-bold">HOUSE RULES</h5>
            <div class="vl-filter-hotel mt-3">
                <div class="row">
                    <div class="col-sm-6 col-8">
                        <div class="text-tiny text-grey">Smoking allowed</div>
                    </div>
                    <div class="col-sm-6 col-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" value="1" name="smoke" {{@$list1->smoke==1 ? 'checked ' : null}}>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-8">
                        <div class="text-tiny text-grey">Pets allowed</div>
                    </div>
                    <div class="col-sm-6 col-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox"value="1" name="pet"id="flexSwitchCheckDefault"{{@$list1->pet==1 ? 'checked ' : null}}>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-8">
                        <div class="text-tiny text-grey">Children allowed</div>
                    </div>
                    <div class="col-sm-6 col-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox"value="1" name="child" id="flexSwitchCheckDefault"{{@$list1->child==1 ? 'checked ' : null}}>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-8">
                        <div class="text-tiny text-grey">Parties/events allowed</div>
                    </div>
                    <div class="col-sm-6 col-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox"value="1" name="party" id="flexSwitchCheckDefault"@if(@$poolvilla[0]->party==1) checked @endif>
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-12 mt-2"><hr></div>
              <div class="vl-filter-hotel mt-2">
                <h5 class="text-tiny text-bold text-grey">Check-in</h5>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-tiny text-bold text-grey">From</div>
                            <select class="form-select form-control" aria-label="Default select example" name="check_in_from" required>
                              @if(!isset($list1->check_in_from))
                              <option selected>select</option>
                              @else
                              <option value="{{$list1->check_in_from}}" selected>{{$list1->check_in_from}}</option>
                              @endif
                              <option value="00">00</option>
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-tiny text-bold text-grey">Unit</div>
                            <select class="form-select form-control" aria-label="Default select example" name="check_in_unit" required>
                                @if(!isset($list1->check_in_unit))
                                <option selected>select</option>
                                @else
                                <option value="{{$list1->check_in_unit}}" selected>{{$list1->check_in_unit}}</option>
                                @endif
                              @for($i=0;$i<60;$i++)
                              <option value="{{$i}}">@if($i<10)0{{$i}}@else {{$i}} @endif</option>
                      
                              @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <h5 class="text-tiny text-bold text-grey mt-4">Check-out</h5>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-tiny text-bold text-grey">From</div>
                            <select class="form-select form-control" aria-label="Default select example" name="check_out_from" required>
                                @if(!isset($list1->check_out_from))
                                <option selected>select</option>
                                @else
                                <option value="{{$list1->check_out_from}}" selected>{{$list1->check_out_from}}</option>
                                @endif
                              <option value="00">00</option>
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-tiny text-bold text-grey">Unit</div>
                            <select class="form-select form-control" aria-label="Default select example" name="check_out_unit">
                                @if(!isset($list1->check_out_unit))
                                <option selected>select</option>
                                @else
                                <option value="{{$list1->check_out_unit}}" selected>{{$list1->check_out_unit}}</option>
                                @endif
                              @for($i=0;$i<60;$i++)
                              <option value="{{$i}}">@if($i<10)0{{$i}}@else {{$i}} @endif</option>
                      
                              @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-12 mt-2"><hr></div>
              <h5 class="text-filter text-grey text-start text-bold">GUEST PAYMENT OPTIONS</h5>
            <div class="mt-2 ml-3">
                <div class="row">
                    <div class="col-sm-6 col-8">
                        <div class="text-tiny text-grey">Credit cards</div>
                    </div>
                    <div class="col-sm-6 col-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" value="1" {{@$list1->credit==1 ? 'checked ' : null}} name="credit" id="flexSwitchCheckDefault">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-8">
                        <div class="text-tiny text-grey">Paypal</div>
                    </div>
                    <div class="col-sm-6 col-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" value="1" {{@$list1->paypal==1 ? 'checked ' : null}} name="paypal" id="flexSwitchCheckDefault">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-8">
                        <div class="text-tiny text-grey">Bank transfer</div>
                    </div>
                    <div class="col-sm-6 col-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" value="1" name="bank" {{@$list1->bank==1 ? 'checked ' : null}} id="flexSwitchCheckDefault">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-2"><hr></div>
            <h5 class="text-filter text-grey text-start text-bold">Distance to Center</h5>
            <div class="mt-2 ml-3">
                <div class="row">
                    <div class="col-sm-6 col-8">
                        <div class="text-tiny text-grey"> <i class="fa fa-map-pin" aria-hidden="true"></i> Inside City Center</div>
                    </div>
                    <div class="col-sm-6 col-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="radio" value="1" name="distance"{{@$list1->distance==1 ? 'checked ' : null}} id="flexSwitchCheckDefault">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-8">
                        <div class="text-tiny text-grey"><i class="fa fa-map-pin" aria-hidden="true"></i> <2 km to Center</div>
                    </div>
                    <div class="col-sm-6 col-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="radio" value="2" name="distance" {{@$list1->distance==2 ? 'checked ' : null}} id="flexSwitchCheckDefault">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-8">
                        <div class="text-tiny text-grey"><i class="fa fa-map-pin" aria-hidden="true"></i> 2 - 5 km to Center</div>
                    </div>
                    <div class="col-sm-6 col-4">
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="radio" value="3" name="distance"{{@$list1->distance==3 ? 'checked ' : null}} id="flexSwitchCheckDefault">
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-8">
                      <div class="text-tiny text-grey"><i class="fa fa-map-pin" aria-hidden="true"></i> 5 - 10 km to Center</div>
                  </div>
                  <div class="col-sm-6 col-4">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="radio" value="4" name="distance" {{@$list1->distance==4 ? 'checked ' : null}}id="flexSwitchCheckDefault">
                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-8">
                    <div class="text-tiny text-grey"><i class="fa fa-map-pin" aria-hidden="true"></i> >5 km to Center</div>
                </div>
                <div class="col-sm-6 col-4">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="radio" value="5" name="distance" {{@$list1->distance==5 ? 'checked ' : null}}id="flexSwitchCheckDefault">
                    </div>
                </div>
            </div>
            </div>
            <div class="col-12 mt-2"><hr></div>
            <div class="container p-5">
                <div class="row">
                  <div class="col text-center">
                    <a class="btn btn-secondary" type="button" href="{{url('Partner/Poolvilla/'.$list1->id.'/MoreAbout')}}">Back</a>
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
