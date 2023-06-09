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
    <div class="bg-grey">
    <div class="container">
        <div class="box-hotel">
            <div class="text-filter text-grey">Price per group size</div>
            <div class="col-xl-8">
            <div class="text-tiny text-grey">Offering lower rates for groups of less than 2 makes your property more attractive to potential guests.<br>
            The recommended discounts are based on data from properties like yours. These can be updated at any time.</div>
            <div class="mt-2">
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                  <label class="form-check-label" for="flexSwitchCheckChecked">Enabled</label>
                </div>    
            </div>
            <div class="text-tiny text-grey my-3">The recommended discounts are based on data from properties like yours. These can be updated at any time.</div>
                <div  class="">
            <div class="row mb-2">
                <div class="col-4">
                    <div class="text-tiny text-grey text-bold ">Occupancy</div>
                </div>
                <div class="col-4">
                    <div class="text-tiny text-grey text-bold ">Discount</div>
                </div>
                <div class="col-4">
                    <div class="text-tiny text-grey text-bold ">Guests pay</div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-4">
                    <div class="text-tiny text-grey">2 guests</div>
                </div>
                <div class="col-4">
                    <div class="text-tiny text-grey">0%</div>
                </div>
                <div class="col-4">
                    <div class="text-tiny text-grey">THB 1,100.00</div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-4">
                    <div class="text-tiny text-grey">1 guests</div>
                </div>
                <div class="col-4">
                    <div class="col-sm-6 col-12">
                   <div class="input-group">
                       <input type="number" class="form-control text-r " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="10"><span class="input-group-text hotel" id="inputGroup-sizing-default">%</span>
                    </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="text-tiny text-grey">THB 1,100.00</div>
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

