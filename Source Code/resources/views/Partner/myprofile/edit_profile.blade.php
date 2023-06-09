<!DOCTYPE html>
<html lang="en">
<head>
  @include('Partner/layout.style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('Partner/layout.nav')
      @include('Partner/layout.menu')
   <!-- Main Content -->
   <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Edit Profile</h1>
      </div>
    
      <div class="section-body ">      
        <div class="card col-12" >             
  
          <div class="card-body p-0">
            <form action="{{url('Partner/update/myprofile')}}" method="post">
              @csrf
          <div class="col-sm-8">
                        <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label text-grey">First Name</label>
                          <input type="text" class="form-control" name="firstname" id="firstname" value="{{@$partner->firstname}}" placeholder="First Name"  maxlength="255" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlInput2" class="form-label  text-grey">Last Name</label>
                          <input type="text" class="form-control" name="lastname" id="lastname" value="{{@$partner->lastname}}" placeholder="Last Name"  maxlength="255" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlInput3" class="form-label  text-grey">Email</label>
                          <input type="email" class="form-control" name="email" value="{{@$partner->email}}" placeholder="Email"  maxlength="255" onblur="check_email(this)" required>
                        </div>
                        <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label text-orange">Birthday</label>
                        <input  type="date" class="form-control" name="date" value="{{@$partner->partnerdetail->birthday}}" required>
                      </div>
                        <div class=" mb-3">
                          <label for="exampleFormControlInput3" class="form-label  text-grey">Phone1</label>
                          <input type="text" class="form-control" name="phone1" id="phone" value="{{@$partner->partnerdetail->phone1}}" placeholder="Phone"  maxlength="255" onblur="check_phone(this)" required>
                        </div>
                        <div class=" mb-3">
                          <label for="exampleFormControlInput3" class="form-label  text-grey">Phone2</label>
                          <input type="text" class="form-control" name="phone2" id="phone" value="{{@$partner->partnerdetail->phone2}}" placeholder="Phone"  maxlength="255" onblur="check_phone(this)" >
                        </div>
                        <div class="">
                          <label for="exampleFormControlInput3" class="form-label  text-grey">Address</label>
                          <input type="text" class="form-control" name="address" value="{{@$partner->partnerdetail->address}}"  maxlength="255" placeholder="...." required>
                        </div>
                       
        
  
      </div>
      <div class="row">
      <div class="col-4">
      <div class="text-tiny text-grey text-start mt-3">District</div>
      <select name="district" class="form-control  select2"  required>
        <option value="" selected disabled>Select District</option>
        @foreach($list2 as $item1 =>$l2)
        <option value="{{$l2->code}}"  {{ @$partner->partnerdetail->district_id == $l2->code  ? 'selected ' : null }}   >{{$l2->name_en}}</option>
        @endforeach
      </select>
    </div>

    <div class="col-4">
      <div class="text-tiny text-grey text-start mt-3">Province</div>
      <select name="province" class="form-control  select2"  required>
        <option value="" selected disabled>Select Province</option>
        @foreach($list3 as $item2 =>$l3)
        <option value="{{$l3->code}}" {{ @$partner->partnerdetail->province_id == $l3->code  ? 'selected ' : null }}  >{{$l3->name_en}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-4">
      <div class="text-tiny text-grey text-start mt-3">Postal Code</div>
      <input class="form-control " type="text" name="postal" placeholder="Please input postal code" value="{{@$partner->partnerdetail->postal}}" required>
    </div>
    </div>  

            <div class="container p-5">
              <div class="row">
                <div class="col text-center">
                  <button class="btn btn-success">บันทึก</button>
                </div>
              </div>
            </div>
        </form>
          </div>
        </div>
        </div>
      </div>
    </section>
  </div>
      @include('Partner/layout.footer')
    </div>
  </div>

  @include('Partner/layout.script')
</body>
</html>
