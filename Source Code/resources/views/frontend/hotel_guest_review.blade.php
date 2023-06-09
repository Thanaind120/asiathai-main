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
             <div class="text-head-d text-grey  mt-3 mb-2  text-bold">Guest Review</div>
            <div class="box-hotel-p">
                <div class="col-xl-12 mb-5">
                    <div class="row g-2">
                        <div class="col-sm-2">
                            <div class="text-detail text-bold text-grey mb-1">Sort by</div>
                            <select class="form-select" aria-label="Default select example">
                              <option selected>Option</option>
                              <option value="1">Option</option>
                              <option value="2">Option</option>
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
                <div class="vl-bottom">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="text-blue text-title text-bold">10</div>
                        <div class="text-grey text-tiny  "><i class="fas fa-user-edit me-2"></i>Miss A</div>
                        <div class="text-grey text-tiny "><i class="fas fa-home me-2"></i>Property ,Type</div>
                        <div class="text-grey text-tiny "><i class="fas fa-calendar me-2"></i>18 Jan 2019 - 23 Jan 2019</div>
                        <div class="row mt-3">
                            <div class="col-auto px-2">
                                <a href="hotel_inbox_write_review.php">
                                     <div class="text-orange text-tiny "><i class="fas fa-reply me-2"></i>Contact Us</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="box-grey my-2">
                           <div class="clearfix">
                               <img src="images/review.svg" class="float-end reviewpage-icon">
                            </div>
                            <div class="text-medium text-grey p-3 mt-3"> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </div>
                        </div>
                        <div class="row g-1">
                            <div class="col-sm-3 col-6">
                                <div class="img-a">
                                <img src="images/cities%20(1).jpg" style="width:100%" data-bs-toggle="modal" data-bs-target="#popup-img-head">
                                </div>
                            </div>
                            <div class="col-sm-3 col-6">
                                <div class="img-a">
                                <img src="images/cities%20(2).jpg" style="width:100%" data-bs-toggle="modal" data-bs-target="#popup-img-head">
                                </div>
                            </div>
                            <div class="col-sm-3 col-6">
                                <div class="img-a">
                                <img src="images/cities%20(3).jpg" style="width:100%" data-bs-toggle="modal" data-bs-target="#popup-img-head">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Modal -->
            <div class="modal fade" id="popup-img-head" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content popup-img">
                    <div class="modal-body">
                      <div class="clearfix mb-2">
                        <div class="float-end">
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                      </div>
                    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="images/cities%20(1).jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="images/cities%20(2).jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="images/cities%20(3).jpg" class="d-block w-100" alt="...">
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                        <div class="text-tiny text-grey text-end mt-1">รูปภาพทั้งหมด (3)</div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <div class="vl-bottom">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="text-blue text-title text-bold">8</div>
                        <div class="text-grey text-tiny  "><i class="fas fa-user-edit me-2"></i>Miss A</div>
                        <div class="text-grey text-tiny "><i class="fas fa-home me-2"></i>Property ,Type</div>
                        <div class="text-grey text-tiny "><i class="fas fa-calendar me-2"></i>18 Jan 2019 - 23 Jan 2019</div>
                        <div class="row mt-3">
                            <div class="col-auto px-2">
                                <a href="hotel_inbox_write_review.php">
                                     <div class="text-orange text-tiny "><i class="fas fa-reply me-2"></i>Contact Us</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="box-grey my-2">
                           <div class="clearfix">
                               <img src="images/review.svg" class="float-end reviewpage-icon">
                            </div>
                            <div class="text-medium text-grey p-3 mt-3"> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    <div class="space-footer"></div>
    </div>
    <?php require('inc_footer_hotel.php'); ?>  
</body>
</html>

