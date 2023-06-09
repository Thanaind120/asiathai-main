<!doctype html>
<html lang="th">

<head>
  <title>หน้าแรก</title>
  @include('frontend/inc_header')
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <script src="js/owl.carousel.min.js"></script>
</head>

<body>
  @include('frontend/inc_navbar_hotel')
  <div class="bg-orange">
    @include('frontend/inc_menu_bar_hotel')
  </div>
  <div class="bg-grey">
    <div class="container">
      <div class="text-head-d text-grey  mt-3 mb-2 text-bold">Property</div>
      <div class="box-hotel-p">
        <div class="">
          <div class="text-filter text-grey my-2 text-bold"> Property  </div>
          <div class="scroll-bar-wrap mt-5">
            <div class="scroll-box">
              <table class="table hotel">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Location</th> 
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($poolvilla as $key=>$p)
                  <tr>
                
                    <td scope="row">{{$p->name_en}}</td>
                    <td>
                    {{$p->address_en}}
                    </td>
                    <td> <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                      <label class="form-check-label" for="flexSwitchCheckChecked">open</label>
                    </div>
                  </td>
                    <td>
                      <a href="" class="btn btn-warning tex-white">Discout</a>
                      {{-- <a href=""><i class="fas fa-trash-alt text-red "></i></a> --}}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="box-hotel-p">
        <div class="">
          <div class="text-filter text-grey my-2 text-bold">Property (3) </div>
          <div class="col-sm-4 mt-3">
            <input class="form-control" type="text" placeholder="Search" aria-label="default input example">
          </div>
          <div class="scroll-bar-wrap mt-5">
            <div class="scroll-box">
              <table class="table hotel">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date posted</th>
                    <th scope="col">Price</th>
                    <th scope="col">Special Price</th>
                    <th scope="col">hold booking duration</th>
                    <th scope="col">nights</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    {{-- <td scope="row">000000</td>
                    <td>Poolvilla3</td>
                    <td>Thai</td>
                    <td>
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">open</label>
                      </div>
                    </td>
                    <td class="tc">DD/MM/YYYY</td>
                    <td class="tc">10,000 THB</td>
                    <td class="tc">8,000 THB</td>
                    <td class="tc">3 Days</td>
                    <td class="tc">2</td>
                    <td class="tc"><a href="hotel_property_detail.php"><i class="fas fa-chevron-circle-right"></i></a></td>
                  </tr>
                  <tr>
                    <td scope="row">000000</td>
                    <td>Poolvilla4</td>
                    <td>Thai</td>
                    <td>
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Close</label>
                      </div>
                    </td>
                    <td class="tc">DD/MM/YYYY</td>
                    <td class="tc">10,000 THB</td>
                    <td class="tc">8,000 THB</td>
                    <td class="tc">3 Days</td>
                    <td class="tc">2</td>
                    <td class="tc"><a href="hotel_property_detail.php"><i class="fas fa-chevron-circle-right"></i></a></td>
                  </tr>
                  <tr>
                    <td scope="row">000000</td>
                    <td>Poolvilla5</td>
                    <td>Thai</td>
                    <td>
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">open</label>
                      </div>
                    </td>
                    <td class="tc">DD/MM/YYYY</td>
                    <td class="tc">10,000 THB</td>
                    <td class="tc">8,000 THB</td>
                    <td class="tc">3 Days</td>
                    <td class="tc">2</td>
                    <td class="tc"><a href="hotel_property_detail.php"><i class="fas fa-chevron-circle-right"></i></a></td> 
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
    <div class="space-footer"></div>
  </div>
  @include('frontend/inc_footer_hotel')
</body>

</html>