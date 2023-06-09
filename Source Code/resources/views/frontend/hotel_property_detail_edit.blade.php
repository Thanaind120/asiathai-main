<!doctype html>
<html lang="th">

<head>
    <title>หน้าแรก</title>
    <?php require('inc_header.php'); ?>
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <script src="js/owl.carousel.min.js"></script>
</head>

<body>
    <?php require('inc_navbar_hotel.php'); ?>
    <div class="bg-orange">
        <?php require('inc_menu_bar_hotel.php'); ?>
    </div>
    <div class="bg-grey">
        <div class="container">
            <div class="clearfix">
                <div class="float-start">
                    <a href="hotel_property.php"><i class="fas fa-chevron-circle-left me-2"></i>Back</a>
                </div>
                <div class="float-end">

                </div>
            </div>
            <div class="box-hotel-p">
                <div class="title-booking-detail mb-4">PROPERTY INFORMATION</div>
                <div class="vl-booking-detail">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <div class="text-tiny text-bold">Property Name</div>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="Poolvilla3">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <div class="text-tiny text-bold">Number of Rooms</div>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="3">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <div class="text-tiny text-bold">Website</div>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <div class="text-tiny text-bold">Star Rating</div>
                                </div>
                                <div class="col-sm-8">

                                    <div class="dropdown">
                                        <button class="btn-star-hotel dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            5 stars
                                        </button>
                                        <ul class="dropdown-menu hotel" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <div class="row">
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <div class="star-rating text-tiny text-grey">( 5 stars )</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <div class="row">
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <div class="star-rating text-tiny text-grey">( 4 stars )</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <div class="row">
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <div class="star-rating text-tiny text-grey">( 3 stars )</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <div class="row">
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <div class="star-rating text-tiny text-grey">( 2 stars )</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <div class="row">
                                                        <div class="star-rating">
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <div class="star-rating text-tiny text-grey">( 1 stars )</div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <div class="text-tiny text-bold">Property Address</div>
                                </div>
                                <div class="col-sm-8">
                                    <textarea class="form-control" type="text" placeholder="Address detail"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="title-booking-detail mb-4">PROPERTY DETAIL</div>
                <div class="d-flex f-m align-items-start">
                    <div class="nav flex-column col-sm-3 nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link hotel active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Master Bedroom<br><span class="text-tiny text-light-grey">0 beds</span>
                            <br>Status<div class="form-check form-switch">
                                <label></label>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Open</label>
                            </div></button>
                        <button class="nav-link hotel" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Second Bedroom<br><span class="text-tiny text-light-grey">0 beds</span>
                            <br>Status<div class="form-check form-switch">
                                <label></label>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Close</label></button></button>
                        <button class="btn-clear mt-5"><i class="fas fa-plus-circle me-2"></i>Add more bedroom</button>
                    </div>
                    <div class="tab-content col-xl-9 cols-m-85" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="row">
                                <div class="text-filter2 text-red text-bold mb-2">Master Bedroom</div>
                                <div class="vl-booking-detail mt-3">
                                    <div class="col-sm-6">
                                        <div class="row mb-3">
                                            <div class="col-sm-4">
                                                <div class="text-tiny text-bold">Price per night</div>
                                            </div>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" placeholder="THB 3,000">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row mb-3">
                                            <div class="col-sm-4">
                                                <div class="text-tiny text-bold">Special price</div>
                                            </div>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" placeholder="THB 2,500">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-tiny text-bold">Beds</div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input class="form-control mb-3" type="text" placeholder="Twin bed(s) : 2">
                                        </div>
                                        <div class="col-sm-12">
                                            <input class="form-control mb-3" type="text" placeholder="Full bed(s) : 2">
                                        </div>
                                        <div class="col-sm-12">
                                            <input class="form-control mb-3" type="text" placeholder="Queen bed(s) : 2">
                                        </div>
                                        <div class="col-sm-12">
                                            <input class="form-control mb-3" type="text" placeholder="king bed(s) : 1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm-12">
                                        <div class="text-filter text-bold mb-2">Bathroom (Room)</div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input class="form-control mb-3" type="text" placeholder="3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="text-tiny text-bold">Maximum guest</div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input class="form-control mb-3" type="text" placeholder="4">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="text-tiny text-bold">Villa size (square meters) </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input class="form-control mb-3" type="text" placeholder="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <div class="title-booking mb-5">PROPERTY FACILITIES</div>
                                    <div class="vl-booking-detail">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="">
                                                    <div class="row mb-1">
                                                        <div class="col-sm-4">
                                                            <div class="text-tiny text-bold">General</div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">Free WIFI</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">Airport Transfer</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">Breakfast</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">Smorking Are</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">Electric vehicle charging station</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="">
                                                    <div class="row mb-1">
                                                        <div class="col-sm-4">
                                                            <div class="text-tiny text-bold">Bathroom and toiletries</div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">Hair dryer</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">Bathtub</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">Towels</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">Toiletries</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">Shower</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vl-booking-detail">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="">
                                                    <div class="row mb-1">
                                                        <div class="col-sm-4">
                                                            <div class="text-tiny text-bold">Entertainment</div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">TV</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">Karaoke</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="">
                                                    <div class="row mb-1">
                                                        <div class="col-sm-4">
                                                            <div class="text-tiny text-bold">Comforts</div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">Air conditioner</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">Alarm clock</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vl-booking-detail">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="">
                                                    <div class="row mb-1">
                                                        <div class="col-sm-4">
                                                            <div class="text-tiny text-bold">Comforts</div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">Air conditioner</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">Alarm clock</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="">
                                                    <div class="row mb-1">
                                                        <div class="col-sm-4">
                                                            <div class="text-tiny text-bold">Dining,drinking and snacking</div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">Free bottle water</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">Refrigerator</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">Complimentary tea</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">Kitchen</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vl-booking-detail">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="">
                                                    <div class="row mb-1">
                                                        <div class="col-sm-4">
                                                            <div class="text-tiny text-bold">Layout and furnishings</div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">Desk</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">Seating area
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="">
                                                    <div class="row mb-1">
                                                        <div class="col-sm-4">
                                                            <div class="text-tiny text-bold">Safety and security feathers</div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">In-rooms safe box</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                <label class="form-check-label" for="flexCheckDefault">Firts-aid kit
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="file-upload" style="min-width: 200px;">
                                        <div>
                                            <div class="text-medium text-grey text-bold mt-3">Upload a picture of the room</div>
                                            <div class="drag-text image-upload-wrap mt-2">
                                                <i class="far fa-image text-img text-light-grey"></i><br>
                                                <label class="text-medium" for="upFile">BROWSE FILE HERE </label>
                                            </div>
                                            <input id="upFile" type="file" multiple hidden>
                                        </div>
                                        <div id="file-container">
                                            <ul id="fileList" class="row">
                                            </ul>
                                        </div>
                                        <input type="hidden" id="fileArray">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="">
                                <div class="row">
                                    <div class="text-filter2 text-red text-bold mb-2">Second Bedroom</div>
                                    <div class="vl-booking-detail mt-3">
                                        <div class="col-sm-6">
                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <div class="text-tiny text-bold">Price per night</div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" placeholder="THB 3,000">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <div class="text-tiny text-bold">Special price</div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" placeholder="THB 2,500">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                        <div class="text-tiny text-bold">Beds</div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input class="form-control mb-3" type="text" placeholder="Twin bed(s) : 2">
                                            </div>
                                            <div class="col-sm-12">
                                                <input class="form-control mb-3" type="text" placeholder="Full bed(s) : 2">
                                            </div>
                                            <div class="col-sm-12">
                                                <input class="form-control mb-3" type="text" placeholder="Queen bed(s) : 2">
                                            </div>
                                            <div class="col-sm-12">
                                                <input class="form-control mb-3" type="text" placeholder="king bed(s) : 1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12">
                                            <div class="text-filter text-bold mb-2">Bathroom (Room)</div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input class="form-control mb-3" type="text" placeholder="3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="text-tiny text-bold">Maximum guest</div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input class="form-control mb-3" type="text" placeholder="4">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="text-tiny text-bold">Villa size (square meters) </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input class="form-control mb-3" type="text" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                        <div class="title-booking mb-5">PROPERTY FACILITIES</div>
                                        <div class="vl-booking-detail">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="">
                                                        <div class="row mb-1">
                                                            <div class="col-sm-4">
                                                                <div class="text-tiny text-bold">General</div>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">Free WIFI</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">Airport Transfer</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">Breakfast</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault">Smorking Are</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">Electric vehicle charging station</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="">
                                                        <div class="row mb-1">
                                                            <div class="col-sm-4">
                                                                <div class="text-tiny text-bold">Bathroom and toiletries</div>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">Hair dryer</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">Bathtub</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault">Towels</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">Toiletries</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">Shower</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vl-booking-detail">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="">
                                                        <div class="row mb-1">
                                                            <div class="col-sm-4">
                                                                <div class="text-tiny text-bold">Entertainment</div>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">TV</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">Karaoke</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="">
                                                        <div class="row mb-1">
                                                            <div class="col-sm-4">
                                                                <div class="text-tiny text-bold">Comforts</div>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">Air conditioner</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault">Alarm clock</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vl-booking-detail">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="">
                                                        <div class="row mb-1">
                                                            <div class="col-sm-4">
                                                                <div class="text-tiny text-bold">Comforts</div>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">Air conditioner</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault">Alarm clock</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="">
                                                        <div class="row mb-1">
                                                            <div class="col-sm-4">
                                                                <div class="text-tiny text-bold">Dining,drinking and snacking</div>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">Free bottle water</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">Refrigerator</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">Complimentary tea</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">Kitchen</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vl-booking-detail">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="">
                                                        <div class="row mb-1">
                                                            <div class="col-sm-4">
                                                                <div class="text-tiny text-bold">Layout and furnishings</div>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">Desk</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">Seating area
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="">
                                                        <div class="row mb-1">
                                                            <div class="col-sm-4">
                                                                <div class="text-tiny text-bold">Safety and security feathers</div>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">In-rooms safe box</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                                                    <label class="form-check-label" for="flexCheckDefault">Firts-aid kit
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="file-upload" style="min-width: 200px;">
                                            <div>
                                                <div class="text-medium text-grey text-bold mt-3">Upload a picture of the room</div>
                                                <div class="drag-text image-upload-wrap mt-2">
                                                    <i class="far fa-image text-img text-light-grey"></i><br>
                                                    <label class="text-medium" for="upFile">BROWSE FILE HERE </label>
                                                </div>
                                                <input id="upFile" type="file" multiple hidden>
                                            </div>
                                            <div id="file-container">
                                                <ul id="fileList" class="row">
                                                </ul>
                                            </div>
                                            <input type="hidden" id="fileArray">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>


                <div class="vl-booking-detail">
                    <div class="col-sm-12">
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <div class="text-tiny text-bold">More about villas <br>(English language)</div>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <textarea rows="3" class="form-control mb-3" type="text" placeholder="Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <div class="text-tiny text-bold">More about villas <br>(Thai language)</div>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <textarea rows="3" class="form-control mb-3" type="text" placeholder="Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vl-booking-detail">
                    <div class="col-sm-12">
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <div class="text-tiny text-bold">Frequently asked questions <br>(English language)</div>
                            </div>
                            <div class="col-sm-10">
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <div class="text-tiny text-bold">Questions</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-tiny text-bold">Answer</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input class="form-control mb-3" type="text" placeholder="Questions#1">
                                    </div>
                                    <div class="col-sm-6">
                                        <textarea rows="3" class="form-control mb-3" type="text" placeholder="Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input class="form-control mb-3" type="text" placeholder="Questions#2">
                                    </div>
                                    <div class="col-sm-6">
                                        <textarea rows="3" class="form-control mb-3" type="text" placeholder="Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input class="form-control mb-3" type="text" placeholder="Questions#3">
                                    </div>
                                    <div class="col-sm-6">
                                        <textarea rows="3" class="form-control mb-3" type="text" placeholder="Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."></textarea>
                                    </div>
                                </div>
                                <button class="btn-clear mt-5"><i class="fas fa-plus-circle me-2"></i>Add more</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vl-booking-detail">
                    <div class="col-sm-12">
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <div class="text-tiny text-bold">Frequently asked questions <br>(Thai language)</div>
                            </div>
                            <div class="col-sm-10">
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <div class="text-tiny text-bold">Questions</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-tiny text-bold">Answer</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input class="form-control mb-3" type="text" placeholder="Questions#1">
                                    </div>
                                    <div class="col-sm-6">
                                        <textarea rows="3" class="form-control mb-3" type="text" placeholder="Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input class="form-control mb-3" type="text" placeholder="Questions#2">
                                    </div>
                                    <div class="col-sm-6">
                                        <textarea rows="3" class="form-control mb-3" type="text" placeholder="Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input class="form-control mb-3" type="text" placeholder="Questions#3">
                                    </div>
                                    <div class="col-sm-6">
                                        <textarea rows="3" class="form-control mb-3" type="text" placeholder="Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."></textarea>
                                    </div>
                                </div>
                                <button class="btn-clear mt-5"><i class="fas fa-plus-circle me-2"></i>Add more</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="title-booking-detail mb-5">OTHER</div>
                <div class="vl-booking-detail">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <div class="text-tiny text-bold">languages your staff speak</div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">Thai</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">English
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">Chinese
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">French
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">German
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <div class="text-tiny text-bold">HOUSE RULES</div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-tiny text-grey">Smoking allowed</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-tiny text-grey">Pets allowed</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-tiny text-grey">Children allowed</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-tiny text-grey">Parties/events allowed</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <div class="text-tiny text-bold">GUEST PAYMENT OPTIONS</div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-tiny text-grey">Credit cards</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-tiny text-grey">Paypal</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-tiny text-grey">Bank transfer</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vl-booking-detail">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <div class="text-tiny text-bold">Checkin</div>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="3">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <div class="text-tiny text-bold">Checkout</div>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vl-booking-detail">
                    <div class="text-tiny text-bold">Picture</div>
                    <div class="file-upload" style="min-width: 200px;">
                        <div>
                            <div class="drag-text image-upload-wrap">
                                <i class="far fa-image text-img text-light-grey"></i><br>
                                <label class="text-medium" for="upFile">BROWSE FILE HERE </label>
                            </div>
                            <input id="upFile" type="file" multiple hidden>
                        </div>
                        <div id="file-container">
                            <ul id="fileList" class="row">
                            </ul>
                        </div>
                        <input type="hidden" id="fileArray">
                    </div>
                </div>

                <div class="row justify-content-center mt-5">
                    <div class="col-sm-4 ">
                        <a href="hotel_property_detail.php">
                            <div class="btn-grey mt-3">Cancel</div>
                        </a>
                    </div>
                    <div class="col-sm-4 ">
                        <a href="hotel_property_detail.php">
                            <div class="btn-orange mt-3">Submit</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-footer"></div>
    </div>
    <?php require('inc_footer_hotel.php'); ?>
</body>

</html>
<script>
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
</script>
<script>
    $(function() {
        $('[data-decrease]').click(decrease);
        $('[data-increase]').click(increase);
        $('[data-value]').change(valueChange);
    });

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