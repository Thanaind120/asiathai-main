<!doctype html>
<html lang="th">
<head>      
    <title>หน้าแรก</title>
    @include('frontend/inc_header') 
    <link rel="stylesheet" href="{{asset('assets_frontend/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets_frontend/css/owl.theme.default.min.css')}}">
<script src="{{asset('assets_frontend/js/owl.carousel.min.js')}}"></script>
</head>
<body >
  @include('frontend/inc_navbar_hotel')
    <div class="bg-grey">
    <div class="container">
        <div class="box-hotel">
            <div class="text-filter text-grey text-start text-bold">Availability</div>
            <div class="vl-filter-hotel mt-2">
                <div class="mt-3">
                    <div>
                        <div class="form-check form-check-inline">
                            <input  class="form-check-input" type="radio" name="colorRadio" value="A">
                            <label class="form-check-label" for="colorRadio">As soon as possible</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input  class="form-check-input" type="radio" name="colorRadio" value="B"> 
                            <label class="form-check-label" for="colorRadio">On a specific date</label>
                        </div>
                    </div>
                    <div class="A selectt"></div>
                    <div class="B selectt">
                            <div id="calender">
                                <div class="nav">
                                    <button id="prev"><i class="fas fa-angle-left"></i></button>
                                    <p><span class="text-grey text-bold" id="month"></span>
                                        <span class="text-grey text-bold" id="year"></span></p>
                                    <button id="next"><i class="fas fa-angle-right"></i></button>
                                </div>
                                <table id="cal"></table>
                            </div>
                            <div class="text-light-grey text-tiny">Guests can start booking right away, but the first available check-in date will be MONTH DD , YYYY.</div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-sm-4 ">
                     <a href="{{url('list_property11')}}"><div class="btn-grey mt-3">Back</div></a>
                </div>
                <div class="col-sm-4 ">
                    <a href="{{url('list_property13')}}"><div class="btn-orange mt-3">Next</div></a>
                </div>
            </div>
        </div>
    </div>
       
        <div class="space-footer"></div>
    </div>
   @include('frontend/inc_footer_hotel'); ?> 
</body>
</html>
  <script type="text/javascript">
            $(document).ready(function() {
                $('input[type="radio"]').click(function() {
                    var inputValue = $(this).attr("value");
                    var targetBox = $("." + inputValue);
                    $(".selectt").not(targetBox).hide();
                    $(targetBox).show();
                });
            });
        </script>
<script>
    let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

let dateObj = new Date();
let month = dateObj.getMonth();
let currMonth = dateObj.getMonth();
let year = dateObj.getFullYear();
let currYear = dateObj.getFullYear();
let table = _('cal');

_('month').innerHTML = months[month];
_('year').innerHTML = year;
_('prev').addEventListener('click', () => trackMonth('prev'));
_('next').addEventListener('click', () => trackMonth('next'));

function _(id) {
  return document.getElementById(id);
}

function trackMonth(dir) {
  if (dir == 'prev') month -= 1;
  if (dir == 'next') month += 1;
  if (month > 11) {
    month = 0;
    year += 1;
  }
  if (month < 0) {
    month = 11;
    year -= 1;
  }
  _('month').innerHTML = months[month];
  _('year').innerHTML = year;

  calender(month, year);
}

function calender(month, year) {

  let today = dateObj.getDate();
  let firstDay = new Date(year, month, 1);
  let startDay = firstDay.getDay();
  let weekDays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
  let monthLength = new Date(year, month + 1, 0).getDate();
  let html = '';

  // DAYS OF WEEK HEADER
  html += '<tr>';
  for (let i = 0; i < weekDays.length; i++) {
    html += '<td>' + weekDays[i] + '</td>';
  }
  html += '</tr>';

  // CALENDAR PART
  var count = 0;
  if (startDay !== 0) {
    html += "<tr><td colspan='" + startDay + "'></td>";
    count = startDay;
  }
  for (var day = 1; day <= monthLength; day++) {

    if (count % 7 === 0) {
      html += "<tr>";
    }

      
    if (count < today && month == currMonth && year == currYear) {
      html += "<td class='closed'>" + day + "</td>";
    } else {
      html += "<td class='normal'>" + day + "</td>";
    }

    count++;
    if (count % 7 === 0) {
      html += "</tr>";
    }
  }

  var blankCells = 7 - count % 7;
  if (blankCells < 7) {
    html += "<td colspan='" + blankCells + "'></td></tr>";
  }

  table.innerHTML = html;

}

calender(month, year);
</script>