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
    <div class="bg-grey">
    <div class="container">
        <div class="box-hotel">
            <div class="text-filter text-grey">Set up a non-refundable rate plan</div>
            <div class="col-sm-8">
                <div class="vl-filter-hotel">
                <div class="text-tiny text-grey mt-3">In addition to the standard rate plan you created for your property, you can add a non-refundable rate plan.</div>
                <div class="text-tiny text-grey mt-3">With this, you set a discounted price but your revenue for these bookings is guaranteed because guests won't receive a refund if they cancel or no-show.</div>
                <div class="mt-4">
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                  <label class="form-check-label" for="flexSwitchCheckChecked">Set up a non-refundable rate plan</label>
                </div>    
                </div>
                </div>
                <div class="text-tiny text-grey text-bold mt-3 mb-1">Discount for guests that book with this rate plan:</div>
                <div class="input-group">
                    <input type="number" class="form-control text-r " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="10"><span class="input-group-text hotel" id="inputGroup-sizing-default">%</span>
                </div>
                <div class="mt-4">
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <div class="text-tiny text-light-grey text-bold mt-3">THB 1,000.00</div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-tiny text-grey  mt-3">Base price</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <div class="text-tiny text-light-grey text-bold mt-3">20%</div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-tiny text-grey  mt-3">Discount when guests book the non-refundable option</div>
                        </div>
                    </div>
                    <div class="box-green">
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <div class="text-tiny text-light-grey text-bold mt-3">THB 880.00</div>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-tiny text-grey  mt-3">Non-refundable price</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-4 ">
                     <a href="hotel_policy_refund.php"><div class="btn-grey mt-3">cancel</div></a>
                </div>
                <div class="col-sm-4 ">
                    <a href="hotel_policy_refund.php"><div class="btn-orange mt-3">Save</div></a>
                </div>
            </div>
        </div>
    </div>
    <div class="space-footer"></div>
    </div>
    <?php require('inc_footer_hotel.php'); ?> 
</body>
</html>

