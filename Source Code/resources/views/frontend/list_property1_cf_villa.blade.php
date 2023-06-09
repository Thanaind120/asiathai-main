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
             <div class="text-tiny text-grey text-center">You're listing</div>
             <svg id="Layer_1" data-name="Layer 1" class="icon-villa-cf" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500"><path d="M120.23,330.44c0-26.74.08-53.48-.09-80.22,0-3.95,1.29-6.38,4.35-8.77q62.81-48.91,125.38-98.15c3.45-2.72,5.44-2.56,8.78.07q62.57,49.24,125.4,98.13c3.11,2.42,4.2,5,4.19,8.85q-.17,79.93.05,159.87c0,5.13-1.25,6.52-6.44,6.44-19.52-.34-39-.28-58.56,0-4.4.05-5.59-1.15-5.56-5.53.19-29.09,0-58.17.21-87.26,0-4.8-1.19-6.25-6.13-6.22q-57.67.3-115.36,0c-5.13,0-6,1.75-6,6.37.19,28.69,0,57.39.2,86.08,0,4.87-.78,6.73-6.29,6.62q-29-.6-58,0c-5.46.11-6.33-1.72-6.29-6.59C120.34,383.54,120.23,357,120.23,330.44Z"/><path d="M282.69,385.49c0,8.57-.16,17.16.07,25.73.11,3.82-.65,5.49-5,5.42-15.78-.27-31.58-.2-47.36,0-3.45,0-4.79-.75-4.75-4.49.18-18.32.15-36.65,0-55,0-3.36,1.19-4.32,4.42-4.29,16,.12,32,.18,47.95,0,4.13-.06,4.79,1.67,4.73,5.19C282.57,367.16,282.69,376.32,282.69,385.49Z"/></svg>
            <div class="text-filter text-grey text-center text-bold">One villa <br>Where guests can book an entire place</div>
             <div class="row mt-3 justify-content-center">
                <div class="col-sm-4 ">
                    <a href="{{url('list_property2')}}"><div class="btn-orange mt-3">Next</div></a>
                    <a href="{{url('list_property1')}}"><div class="btn-grey mt-3">No, I need to make a change</div></a>
                </div>
             </div>
        </div>
    </div>
        
        <div class="space-footer"></div>
    </div> 
  @include('frontend/inc_footer_hotel')
</body>
</html>

