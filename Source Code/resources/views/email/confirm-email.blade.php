<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body >
    <div class="row "style=";">
        <div class="col-sm-0 col-md-4"></div>
        <div class="col-sm-12 col-md-4">
            <div class="col-12 boder border-warning" style="border:4px;border-style:solid;" >
                <img src="{{url('image/email/header_logo.jpg')}}" alt="">
            </div><hr>
            <div class="col-12 mt-0 ">
            <h2>Poolvilla :: Verify Email Address</h2><br>
            <p>
                        
                Click this link to activate your account: <a href="{{url('/verify/'.$code)}}">{{url('/verify/'.$code)}}</a></p>
        </div>
        <hr>
        <div class="col-12">
            <p>+66 00-000-0000</p>
            <p> info@poolvilla.com</p>
           
        </div>
        </div>
        
        <div class="col-sm-0 col-md-4"></div>

    </div>
</body>
</html>