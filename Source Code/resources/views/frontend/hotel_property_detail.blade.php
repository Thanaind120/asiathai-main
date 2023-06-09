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
                    <a href="hotel_property_detail_edit.php">
                        <div class="text-tiny text-red mb-2"><i class="fas fa-pencil-alt me-2"></i>Edit</div>
                    </a>
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
                                    <input class="form-control" type="text" placeholder="Poolvilla3" disabled readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <div class="text-tiny text-bold">Number of Rooms</div>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="3" disabled readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <div class="text-tiny text-bold">Website</div>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="" disabled readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <div class="text-tiny text-bold">Star Rating</div>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="5 stars" disabled readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <div class="text-tiny text-bold">Property Address</div>
                                </div>
                                <div class="col-sm-8">
                                    <textarea class="form-control" type="text" placeholder="Address detail" disabled readonly></textarea>
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
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked disabled>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Open</label>
                            </div>
                        </button>
                        <button class="nav-link hotel" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Second Bedroom<br><span class="text-tiny text-light-grey">0 beds</span>
                            <br>Status<div class="form-check form-switch">
                                <label></label>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" disabled>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Close</label></button>
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
                                                <input class="form-control" type="text" placeholder="THB 3,000" disabled readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row mb-3">
                                            <div class="col-sm-4">
                                                <div class="text-tiny text-bold">Special price</div>
                                            </div>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" placeholder="THB 2,500" disabled readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-tiny text-bold">Beds</div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input class="form-control mb-3" type="text" placeholder="Twin bed(s) : 2" disabled readonly>
                                        </div>
                                        <div class="col-sm-12">
                                            <input class="form-control mb-3" type="text" placeholder="Full bed(s) : 2" disabled readonly>
                                        </div>
                                        <div class="col-sm-12">
                                            <input class="form-control mb-3" type="text" placeholder="Queen bed(s) : 2" disabled readonly>
                                        </div>
                                        <div class="col-sm-12">
                                            <input class="form-control mb-3" type="text" placeholder="king bed(s) : 1" disabled readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-sm-12">
                                        <div class="text-filter text-bold mb-2">Bathroom (Room)</div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input class="form-control mb-3" type="text" placeholder="3" disabled readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="text-tiny text-bold">Maximum guest</div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input class="form-control mb-3" type="text" placeholder="4" disabled readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="text-tiny text-bold">Villa size (square meters) </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input class="form-control mb-3" type="text" placeholder="" disabled readonly>
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
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                <label class="form-check-label" for="flexCheckDefault">Free WIFI</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                <label class="form-check-label" for="flexCheckDefault">Airport Transfer</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                <label class="form-check-label" for="flexCheckDefault">Breakfast</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
                                                                <label class="form-check-label" for="flexCheckDefault">Smorking Are</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
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
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                <label class="form-check-label" for="flexCheckDefault">Hair dryer</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                <label class="form-check-label" for="flexCheckDefault">Bathtub</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
                                                                <label class="form-check-label" for="flexCheckDefault">Towels</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                <label class="form-check-label" for="flexCheckDefault">Toiletries</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
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
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                <label class="form-check-label" for="flexCheckDefault">TV</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
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
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                <label class="form-check-label" for="flexCheckDefault">Air conditioner</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
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
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                <label class="form-check-label" for="flexCheckDefault">Air conditioner</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
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
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                <label class="form-check-label" for="flexCheckDefault">Free bottle water</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                <label class="form-check-label" for="flexCheckDefault">Refrigerator</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                <label class="form-check-label" for="flexCheckDefault">Complimentary tea</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
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
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                <label class="form-check-label" for="flexCheckDefault">Desk</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
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
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                <label class="form-check-label" for="flexCheckDefault">In-rooms safe box</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                <label class="form-check-label" for="flexCheckDefault">Firts-aid kit
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vl-booking-detail">
                                        <div class="text-tiny text-bold">Picture</div>
                                        <div class="row g-1">
                                            <div class="col-sm-2 col-4">
                                                <div class="img-a">
                                                    <img src="images/cities%20(1).jpg" style="width:100%" data-bs-toggle="modal" data-bs-target="#popup-img-head">
                                                </div>
                                            </div>
                                            <div class="col-sm-2 col-4">
                                                <div class="img-a">
                                                    <img src="images/cities%20(2).jpg" style="width:100%" data-bs-toggle="modal" data-bs-target="#popup-img-head">
                                                </div>
                                            </div>
                                            <div class="col-sm-2 col-4">
                                                <div class="img-a">
                                                    <img src="images/cities%20(3).jpg" style="width:100%" data-bs-toggle="modal" data-bs-target="#popup-img-head">
                                                </div>
                                            </div>
                                        </div>
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
                                                    <input class="form-control" type="text" placeholder="THB 3,000" disabled readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <div class="text-tiny text-bold">Special price</div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" placeholder="THB 2,500" disabled readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                        <div class="text-tiny text-bold">Beds</div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input class="form-control mb-3" type="text" placeholder="Twin bed(s) : 2" disabled readonly>
                                            </div>
                                            <div class="col-sm-12">
                                                <input class="form-control mb-3" type="text" placeholder="Full bed(s) : 2" disabled readonly>
                                            </div>
                                            <div class="col-sm-12">
                                                <input class="form-control mb-3" type="text" placeholder="Queen bed(s) : 2" disabled readonly>
                                            </div>
                                            <div class="col-sm-12">
                                                <input class="form-control mb-3" type="text" placeholder="king bed(s) : 1" disabled readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-sm-12">
                                            <div class="text-filter text-bold mb-2">Bathroom (Room)</div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input class="form-control mb-3" type="text" placeholder="3" disabled readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="text-tiny text-bold">Maximum guest</div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input class="form-control mb-3" type="text" placeholder="4" disabled readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="text-tiny text-bold">Villa size (square meters) </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input class="form-control mb-3" type="text" placeholder="" disabled readonly>
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
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                    <label class="form-check-label" for="flexCheckDefault">Free WIFI</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                    <label class="form-check-label" for="flexCheckDefault">Airport Transfer</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                    <label class="form-check-label" for="flexCheckDefault">Breakfast</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
                                                                    <label class="form-check-label" for="flexCheckDefault">Smorking Are</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
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
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                    <label class="form-check-label" for="flexCheckDefault">Hair dryer</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                    <label class="form-check-label" for="flexCheckDefault">Bathtub</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
                                                                    <label class="form-check-label" for="flexCheckDefault">Towels</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                    <label class="form-check-label" for="flexCheckDefault">Toiletries</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
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
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                    <label class="form-check-label" for="flexCheckDefault">TV</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
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
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                    <label class="form-check-label" for="flexCheckDefault">Air conditioner</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
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
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                    <label class="form-check-label" for="flexCheckDefault">Air conditioner</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
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
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                    <label class="form-check-label" for="flexCheckDefault">Free bottle water</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                    <label class="form-check-label" for="flexCheckDefault">Refrigerator</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                    <label class="form-check-label" for="flexCheckDefault">Complimentary tea</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
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
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                    <label class="form-check-label" for="flexCheckDefault">Desk</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
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
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                    <label class="form-check-label" for="flexCheckDefault">In-rooms safe box</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                                                    <label class="form-check-label" for="flexCheckDefault">Firts-aid kit
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vl-booking-detail">
                                            <div class="text-tiny text-bold">Picture</div>
                                            <div class="row g-1">
                                                <div class="col-sm-2 col-4">
                                                    <div class="img-a">
                                                        <img src="images/cities%20(1).jpg" style="width:100%" data-bs-toggle="modal" data-bs-target="#popup-img-head">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-4">
                                                    <div class="img-a">
                                                        <img src="images/cities%20(2).jpg" style="width:100%" data-bs-toggle="modal" data-bs-target="#popup-img-head">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-4">
                                                    <div class="img-a">
                                                        <img src="images/cities%20(3).jpg" style="width:100%" data-bs-toggle="modal" data-bs-target="#popup-img-head">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="vl-booking-detail mt-5">
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <div class="text-tiny text-bold">More about villas (English language)</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-sm-12">
                                    <textarea rows="4" class="form-control mb-3" type="text" placeholder="Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book." disabled readonly></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-tiny text-bold">More about villas (Thai language)</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-sm-12">
                                    <textarea rows="4" class="form-control mb-3" type="text" placeholder="Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book." disabled readonly></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vl-booking-detail">
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="text-tiny text-bold">Frequently asked questions (English language)</div>
                        </div>
                        <div class="col-sm-1">

                        </div>
                        <div class="col-sm-7 mt-4">
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
                                    <input class="form-control mb-3" type="text" placeholder="Questions#1" disabled readonly>
                                </div>
                                <div class="col-sm-6">
                                    <textarea rows="3" class="form-control mb-3" type="text" placeholder="Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book." disabled readonly></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input class="form-control mb-3" type="text" placeholder="Questions#2" disabled readonly>
                                </div>
                                <div class="col-sm-6">
                                    <textarea rows="3" class="form-control mb-3" type="text" placeholder="Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book." disabled readonly></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input class="form-control mb-3" type="text" placeholder="Questions#3" disabled readonly>
                                </div>
                                <div class="col-sm-6">
                                    <textarea rows="3" class="form-control mb-3" type="text" placeholder="Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book." disabled readonly></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vl-booking-detail">
                    <div class="row mb-3">

                        <div class="col-sm-12">
                            <div class="text-tiny text-bold">Frequently asked questions (Thai language)</div>
                        </div>
                        <div class="col-sm-1">

                        </div>
                        <div class="col-sm-7 mt-4">
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
                                    <input class="form-control mb-3" type="text" placeholder="Questions#1" disabled readonly>
                                </div>
                                <div class="col-sm-6">
                                    <textarea rows="3" class="form-control mb-3" type="text" placeholder="Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book." disabled readonly></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input class="form-control mb-3" type="text" placeholder="Questions#2" disabled readonly>
                                </div>
                                <div class="col-sm-6">
                                    <textarea rows="3" class="form-control mb-3" type="text" placeholder="Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book." disabled readonly></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input class="form-control mb-3" type="text" placeholder="Questions#3" disabled readonly>
                                </div>
                                <div class="col-sm-6">
                                    <textarea rows="3" class="form-control mb-3" type="text" placeholder="Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book." disabled readonly></textarea>
                                </div>
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
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                        <label class="form-check-label" for="flexCheckDefault">Thai</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                        <label class="form-check-label" for="flexCheckDefault">English
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                        <label class="form-check-label" for="flexCheckDefault">Chinese
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                                        <label class="form-check-label" for="flexCheckDefault">French
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
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
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-tiny text-grey">Pets allowed</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-tiny text-grey">Children allowed</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-tiny text-grey">Parties/events allowed</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked disabled>
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
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-tiny text-grey">Paypal</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-tiny text-grey">Bank transfer</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked disabled>
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
                                    <input class="form-control" type="text" placeholder="3" disabled readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <div class="text-tiny text-bold">Checkout</div>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="3" disabled readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vl-booking-detail">
                    <div class="text-tiny text-bold">Picture</div>
                    <div class="row g-1">
                        <div class="col-sm-2 col-4">
                            <div class="img-a">
                                <img src="images/cities%20(1).jpg" style="width:100%" data-bs-toggle="modal" data-bs-target="#popup-img-head">
                            </div>
                        </div>
                        <div class="col-sm-2 col-4">
                            <div class="img-a">
                                <img src="images/cities%20(2).jpg" style="width:100%" data-bs-toggle="modal" data-bs-target="#popup-img-head">
                            </div>
                        </div>
                        <div class="col-sm-2 col-4">
                            <div class="img-a">
                                <img src="images/cities%20(3).jpg" style="width:100%" data-bs-toggle="modal" data-bs-target="#popup-img-head">
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
        </div>
        <div class="space-footer"></div>
    </div>
    <?php require('inc_footer_hotel.php'); ?>
</body>

</html>