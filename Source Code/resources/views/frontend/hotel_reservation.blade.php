<!doctype html>
<html lang="th">
<head>      
    <title>หน้าแรก</title>
    <?php require('inc_header.php'); ?> 
    <link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<script src="js/owl.carousel.min.js"></script>
</head>
<body >
    <?php require('inc_navbar_hotel.php'); ?> 
    <div class="bg-orange">
         <?php require('inc_menu_bar_hotel.php'); ?> 
    </div>
    <div class="bg-grey">
        <div class="container">
             <div class="text-head-d text-grey  mt-3 mb-2  text-bold">Reservation</div>
            <div class="box-hotel-p">
                <div class="col-xl-12 mb-3">
                    <div class="row g-2">
                        <div class="col-sm-2">
                            <div class="text-detail text-bold text-grey mb-1">Sort by</div>
                            <select class="form-select" aria-label="Default select example">
                              <option selected>booking date</option>
                              <option value="1">Checkin date</option>
                              <option value="2">Checkout date</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <div class="text-detail text-bold text-grey mb-1">Property</div>
                            <select class="form-select" aria-label="Default select example">
                              <option selected>All Property</option>
                              <option value="1">Poolvilla1</option>
                              <option value="1">Poolvilla2</option>
                              <option value="1">Poolvilla3</option>
                              <option value="1">Poolvilla4</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <div class="text-detail text-bold text-grey  mb-1">From</div>
                            <input class="form-control" type="date" placeholder="Search" aria-label="default input example">
                        </div>
                        <div class="col-sm-2 ">
                            <div class="text-detail text-bold text-grey  mb-1">To</div>
                            <input class="form-control" type="date" placeholder="Search" aria-label="default input example">
                        </div>
                        
                        <div class="col-sm-2">
                            <div class="text-detail text-bold text-grey  mb-1"><br></div>
                            <button class="btn-orange resevation">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="scroll-bar-wrap mt-5">
                    <div class="scroll-box">
                    <table class="table hotel">
                    <thead>
                        <tr>
                          <th scope="col">Booking ID</th>
                          <th scope="col">Property</th>
                          <th scope="col">Customer</th>
                          <th scope="col">Checkin</th>
                          <th scope="col">Checkout</th>
                          <th scope="col">Status</th>
                          <th scope="col">Payment Amount</th>
                          <th scope="col">Commission</th>
                          <th scope="col">Booking Date</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <th scope="row"><a href="hotel_reservation_detail.php">0000000000</a></th>
                            <td>Poolvilla3</td>
                            <td>Customer Name</td>
                            <td>dd/mm/yyyy</td>
                            <td>dd/mm/yyyy</td>
                            <td>Reserve</td>
                            <td class="tc">3,500 THB</td>
                            <td class="tc">1,000 THB</td>
                            <td>dd/mm/yyyy</td>
                            <td><a href="hotel_reservation_detail.php"><i class="fas fa-chevron-circle-right"></i></a></td>
                        </tr>
                        <tr>
                            <th scope="row"><a href="hotel_reservation_detail.php">0000000000</a></th>
                            <td>Poolvilla3</td>
                            <td>Customer Name</td>
                            <td>dd/mm/yyyy</td>
                            <td>dd/mm/yyyy</td>
                            <td>Pending payment</td>
                            <td class="tc">3,500 THB</td>
                            <td class="tc">1,000 THB</td>
                            <td>dd/mm/yyyy</td>
                            <td><a href="hotel_reservation_detail.php"><i class="fas fa-chevron-circle-right"></i></a></td>
                        </tr>
                          <tr>
                            <th scope="row"><a href="hotel_reservation_detail.php">0000000000</a></th>
                            <td>Poolvilla3</td>
                            <td>Customer Name</td>
                            <td>dd/mm/yyyy</td>
                            <td>dd/mm/yyyy</td>
                            <td>Paid</td>
                            <td class="tc">3,500 THB</td>
                            <td class="tc">1,000 THB</td>
                            <td>dd/mm/yyyy</td>
                            <td><a href="hotel_reservation_detail.php"><i class="fas fa-chevron-circle-right"></i></a></td>
                        </tr>
                      </tbody>
                    </table>
                        <div class="cover-bar"></div>
                    </div>
                </div>
            </div>
        </div>
    <div class="space-footer"></div>
    </div>
    <?php require('inc_footer_hotel.php'); ?> 
</body>
</html>

