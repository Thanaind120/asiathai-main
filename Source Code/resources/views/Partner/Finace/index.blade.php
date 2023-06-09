
<!DOCTYPE html>
<html lang="en">
<head>

  @include('Partner.layout.style')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('Partner.layout.nav')
      @include('Partner.layout.menu')

    <!-- Main Content -->
    <div class="main-content">
      <section class="section">
        <div class="section-header">
          <h1> รายการจ่ายเงิน (Example)</h1>
        </div>

        <div class="section-body">
        
          <div class="card ">             
    
         

            <div class="card-body ">
               

              <div class="table-responsive ">
                <table id="install_datatable" class="table table-bordered text-center">
                <thead>
                  <tr>
                  <th scope="col"> #</th>
                    <th scope="col"> รอบชำระเงิน</th>
                    <th scope="col"> วันที่สร้างรายการ</th>
                    <th scope="col"> สถานะ</th>
                    <th scope="col"> ยอดชำระ</th>
                    <th scope="col"> อัพเดทเมื่อ</th>
                    <th scope="col"> กำหนดชำระไม่เกินวันที่</th>
                  
                  </tr>
                </thead>
                <tbody>
                        
                      <tr>
                      <td class="text-center">1</td> 
                          <td class="text-center">05-2023</td> 
                          <td class="text-center"><p>01-05-2023</p></p></td> 
                          <td class="text-center"><span class="badge badge-warning">รอดำเนินการ</span></td> 
                          <td class="text-center">25,000 บาท</td> 
                          <td class="text-center">03-05-2023</td> 
                          <td class="text-center text-success">31-05-2023</td> 
                                                
                      </tr>
                      <tr>
                      <td class="text-center">2</td> 
                          <td class="text-center">04-2023</td> 
                          <td class="text-center"><p>01-04-2023</p></p></td> 
                          <td class="text-center"><span class="badge badge-success">โอนเงินแล้ว</span></td> 
                          <td class="text-center">23,000 บาท</td> 
                          <td class="text-center">25-04-2023</td> 
                          <td class="text-center text-success">31-04-2023</td> 
                                                
                      </tr>
                      <tr>
                      <td class="text-center">3</td> 
                          <td class="text-center">03-2023</td> 
                          <td class="text-center"><p>01-03-2023</p></p></td> 
                          <td class="text-center"><span class="badge badge-success">โอนเงินแล้ว</span></td> 
                          <td class="text-center">20,000 บาท</td> 
                          <td class="text-center">25-03-2023</td> 
                          <td class="text-center text-success">31-03-2023</td> 
                                                
                      </tr>
                      <tr>
                      <td class="text-center">4</td> 
                          <td class="text-center">02-2023</td> 
                          <td class="text-center"><p>01-02-2023</p></p></td> 
                          <td class="text-center"><span class="badge badge-success">โอนเงินแล้ว</span></td> 
                          <td class="text-center">19,500 บาท</td> 
                          <td class="text-center">25-02-2023</td> 
                          <td class="text-center text-success">31-02-2023</td> 
                                                
                      </tr>
       
                </tbody>
              </table>
            </div>
            </div>
          </div>
          </div>
        </div>
      </section>
    </div>
      @include('Partner.layout.footer')
    </div>
  </div>
<!-- Modal -->
<div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">แจ้งยกเลิกการจอง</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>  
      </div>
    <form action="{{url('Partner/Cancle/Reserve')}}" method="POST">
      @csrf
      <input type="hidden" name="id" id="id_to_report">
      <div class="modal-body">
          <div class="row">
            <p></p>
            <!-- <div class="col-12"><input type="radio" value="1" name="report"> เป็นเนื้อหาหยาบคาย</div>
            <div class="col-12"><input type="radio" value="2" name="report"> เป็นเนื้อหาทางเพศไม่เหมาะสม</div>
            <div class="col-12"><input type="radio" value="3" name="report"> เป็นการสแปมข้อความ</div>
            <div class="col-12"><input type="radio" value="4" name="report"> จงใจก่อกวนให้เกิดความเสียหาย</div>
            <div class="col-12"><input type="radio" value="5" name="report"> อื่นๆ</div> -->
            <div class="col-12 mt-2"><textarea name="comment" class="form-control" style="height: 100px"  placeholder="รายละเอียดการยกเลิก"></textarea></div>
            
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        <button type="submit" class="btn btn-primary">Confirm</button>
      </div>
    </form>
    </div>
  </div>
</div>
  @include('Partner.layout.script')
  <!-- form to reset password -->
<form action="{{url('/backend/member_reset')}}" method="POST" id="reset_password">
  @csrf
  <input type="hidden" name="id" id="id_reset">
</form>
  <script>
      function report(id){
      $('#id_to_report').val(id);
    }
    function search(){
      var startdate=$('#startdate').val();
      var enddate=$('#enddate').val();
      // var enddate=$('#enddate').val();
      var check=$('#check').val();
      var type=$('#type').val();
      var status=$('#status').val();
      window.location.href="{{url('')}}"+"/Partner/Reservation/"+startdate+"/"+enddate+"/"+check+"/"+type+"/"+status;
    }

     function changeStatus(id) {
           
           $.ajax({
               type: "POST",
               url:  "{{ url('/change_status_room') }}",
               headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
               data: {
                   id:id,
                   
               },
               success: function(data) {
           //  alert(data)
               },
               error: function(err){
                
                   // return alert('เกิดข้อผิดพลาด');
               }
           });
   }
    $('#install_datatable').dataTable();

    function confirm_reset(id){
      Swal.fire({
  title: 'Are you sure to reset?',
  text: "Reset password:m123456",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Confirm'
}).then((result) => {
  if (result.isConfirmed) {

    $('#id_reset').val(id);
      $('#reset_password').submit();
  }
});
    }
  </script>
</body>
</html>


