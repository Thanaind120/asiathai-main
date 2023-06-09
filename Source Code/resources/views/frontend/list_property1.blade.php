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
        <div class="">
            <div class="head-text-index mt-3 text-start text-bold">List your property on Poolvilla</div>
            <div class="text-filter text-grey text-start text-bold">Give us some basic information</div>
        </div>
        <div class="box-hotel">
            <div class="text-filter text-grey text-start text-bold">How many villas are you listing?</div>
            <ul class="nav nav-pills my-3" id="pills-tab" role="tablist">
              <li class="nav-item hotel" role="presentation">
                <button class="nav-link hotel active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    <svg id="Layer_1" data-name="Layer 1" class="icon-villa" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500"><path d="M120.23,330.44c0-26.74.08-53.48-.09-80.22,0-3.95,1.29-6.38,4.35-8.77q62.81-48.91,125.38-98.15c3.45-2.72,5.44-2.56,8.78.07q62.57,49.24,125.4,98.13c3.11,2.42,4.2,5,4.19,8.85q-.17,79.93.05,159.87c0,5.13-1.25,6.52-6.44,6.44-19.52-.34-39-.28-58.56,0-4.4.05-5.59-1.15-5.56-5.53.19-29.09,0-58.17.21-87.26,0-4.8-1.19-6.25-6.13-6.22q-57.67.3-115.36,0c-5.13,0-6,1.75-6,6.37.19,28.69,0,57.39.2,86.08,0,4.87-.78,6.73-6.29,6.62q-29-.6-58,0c-5.46.11-6.33-1.72-6.29-6.59C120.34,383.54,120.23,357,120.23,330.44Z"/><path d="M282.69,385.49c0,8.57-.16,17.16.07,25.73.11,3.82-.65,5.49-5,5.42-15.78-.27-31.58-.2-47.36,0-3.45,0-4.79-.75-4.75-4.49.18-18.32.15-36.65,0-55,0-3.36,1.19-4.32,4.42-4.29,16,.12,32,.18,47.95,0,4.13-.06,4.79,1.67,4.73,5.19C282.57,367.16,282.69,376.32,282.69,385.49Z"/></svg>
                    <span class="mt-4 ms-2">One Villa</span></button>
              </li>
              <li class="nav-item hotel" role="presentation">
                <button class="nav-link hotel" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                    <svg id="Layer_1" class="icon-villa" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500"><path d="M150.76,318.13c0-20.34.06-40.68-.07-61a7.55,7.55,0,0,1,3.31-6.67q47.77-37.22,95.37-74.66c2.63-2.07,4.15-1.95,6.69.05q47.58,37.46,95.38,74.65a7.54,7.54,0,0,1,3.19,6.73q-.12,60.8,0,121.6c0,3.91-1,5-4.89,4.9-14.85-.25-29.7-.21-44.54,0-3.35,0-4.26-.88-4.23-4.21.14-22.12,0-44.25.15-66.37,0-3.65-.9-4.76-4.66-4.74q-43.87.24-87.75,0c-3.9,0-4.57,1.33-4.55,4.84.15,21.83,0,43.66.15,65.48,0,3.7-.59,5.12-4.78,5q-22-.47-44.09,0c-4.16.09-4.82-1.31-4.79-5C150.85,358.52,150.76,338.33,150.76,318.13Z"/><path d="M274.34,360c0,6.53-.12,13.05.06,19.57.08,2.91-.5,4.18-3.82,4.12-12-.19-24-.14-36,0-2.62,0-3.64-.57-3.61-3.42q.19-20.89,0-41.81c0-2.56.91-3.29,3.36-3.27,12.16.1,24.32.14,36.48,0,3.14,0,3.64,1.27,3.59,3.94C274.25,346.06,274.34,353,274.34,360Z"/><path d="M165.18,203.46c-11.89-9.11-23.72-18.32-35.38-27.74-2.65-2.14-4.24-1.8-6.67.13C108.25,187.66,93.26,199.32,78.28,211c-1,.76-1.75,2.08-3.67,1.7,0-10.36-.23-20.72.12-31.06.14-4.29-1.34-5.23-5.24-5a161.85,161.85,0,0,1-16.92,0c-3.61-.19-4.83.77-4.78,4.61.22,16.62.11,33.25.08,49.88,0,1.71.42,3.5-1.41,4.84-7.39,5.42-14.16,11.68-21.91,16.65v131c31.47,0,63-.08,94.42.09,4,0,5.17-1,5.15-5.1-.15-44.54,0-89.08-.18-133.62a9,9,0,0,1,4-8.12c12.51-9.53,24.8-19.37,37.26-29C167.47,206.14,167.57,205.29,165.18,203.46ZM84.4,347c-6.81-.12-13.64-.12-20.45,0-2.39,0-3-.9-3-3.13q.12-17.11,0-34.24c0-2.14.76-2.82,2.84-2.8q10.44.14,20.9,0c2.31,0,3.1.78,3,3.09-.12,5.78,0,11.56,0,17.34,0,5.49-.1,11,0,16.45C87.81,346.21,86.88,347,84.4,347Z"/><path d="M480.77,269c0-5.32,1.36-11.39-.73-15.76-2-4.21-7.67-6.7-11.75-9.9q-43.11-33.75-86.24-67.47c-1.46-1.14-2.6-3.12-5.18-1.06C364,185,351,195.09,337.46,205.68c13.28,10.39,26,20.56,39,30.4,3.54,2.68,4.94,5.44,4.92,9.93-.17,44.08-.05,88.16-.2,132.24,0,4.11.75,5.51,5.25,5.48,29.83-.23,59.66-.19,89.49,0,3.75,0,5-.67,4.95-4.76C480.71,342.27,480.8,305.61,480.77,269Zm-36.4,57.9c0,5.49-.1,11,0,16.46.07,2.55-.51,3.74-3.4,3.66q-10-.29-20,0c-2.88.08-3.43-1.13-3.41-3.68q.17-16.46,0-32.91c0-2.63.62-3.7,3.44-3.62,6.67.17,13.35.19,20,0,2.9-.09,3.45,1.1,3.38,3.65C444.26,315.88,444.37,321.37,444.37,326.85Z"/></svg><span class="mt-4 ms-2">Multiple Villas</span></button>
              </li>
            </ul>
            <div class="tab-content mt-5" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row mt-5">
                    <div class="col-sm-4 ">
                        <a href="{{url('register_hotel_bank_detail')}}"><div class="btn-grey mt-3">Back</div></a>
                    </div>
                    <div class="col-sm-4 ">
                        <a href="{{url('list_property1_cf_villa')}}"><div class="btn-orange mt-3">Next</div></a>
                    </div>
                </div>
                </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="text-filter text-grey text-start text-bold"><i class="fas fa-map-marker-alt me-2"></i>Are these properties at the same address or building?</div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Yes, these villas are at the same address or building.
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                       No, these villas are at different addresses or buildings.
                    </label>
                </div>
                <div class="row mt-5">
                    <div class="col-sm-4 ">
                        <a href="{{url('register_hotel_bank_detail')}}"><div class="btn-grey mt-3">Back</div></a>
                    </div>
                    <div class="col-sm-4 ">
                        <a href="{{url('list_property1_cf_villas')}}"><div class="btn-orange mt-3">Next</div></a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
        <div class="space-footer"></div>
    </div>
  @include('frontend/inc_footer_hotel')
</body>
</html>

