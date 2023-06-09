
<!DOCTYPE html>
<html lang="en">
<head>

  <?php echo $__env->make('Partner.layout.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <?php echo $__env->make('Partner.layout.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('Partner.layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Main Content -->
    <div class="main-content">
      <section class="section">
      <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
            
                  <form action="<?php echo e(url('Partner/Dashboard')); ?>" method="get">
                    <?php echo csrf_field(); ?>
                  <div class="card-stats-title">Statistics -
                    <div class="dropdown d-inline">
                      <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="<?php echo e(url('Partner/Dashboard/'.$year)); ?>" id="orders-month"><?php echo e($year); ?></a>
                      <ul class="dropdown-menu dropdown-menu-sm">
                        <li class="dropdown-title" >Select Year</li>
                        <?php for($i=2021;$i<=$this_year;$i++): ?>
                        <li><a href="<?php echo e(url('Partner/Dashboard/'.$i)); ?>" class="dropdown-item <?php if($year==$i): ?> active <?php endif; ?>"><?php echo e($i); ?></a></li>   
                        <?php endfor; ?>
                      </ul>
                    </div>
                  </div>
                  </form>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count"><?php echo e(number_format($gross_income->price)); ?> THB</div>
                      <div class="card-stats-item-label">รายได้ก่อนหักค่าใช้จ่าย</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count"><?php echo e(number_format($comission_price)); ?> THB</div>
                      <div class="card-stats-item-label">หักค่าคอมมิชชั่น <?php echo e(Auth::guard('partner')->user()->comission); ?>%</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count"><?php echo e(number_format($total_income)); ?> THB</div>
                      <div class="card-stats-item-label">รายได้หลังหักค่าใช้จ่ายแล้ว</div>
                    </div>
                  </div>
                </div>
                
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>ยอดจองทั้งหมด</h4>
                  </div>
                  <div class="card-body">
                      <?php echo e($total_booking->total); ?> รายการ
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-chart">
                  <canvas id="balance-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-success">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>ยอดที่ชำระแล้ว</h4>
                  </div>
                  <div class="card-body">
                    <?php echo e($total_booking_paid->total); ?> รายการ
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-chart">
                  <canvas id="sales-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-danger">
                  <i class="fas fa-times"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>รายการยกเลิก</h4>
                  </div>
                  <div class="card-body">
                  <?php echo e($total_booking_cancle->total); ?> รายการ
                  </div>
                </div>
              </div>
            </div>
          </div>

        <div class="section-body">
        
          <div class="card ">             
            <div class="card-header">
              <!-- add user button -->
          <div class="text-right">
            <!-- <a href="<?php echo e(url('')); ?>" class="btn btn-success "><i class="fa fa-plus"></i> Create</a> -->
          </div><br>
            </div>
            <div class="card-body ">
       
            <div id=""> <canvas id="myChart"  style="height:40vh; width:100%"></canvas></div>
            
            <script>
 const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
        datasets: [{
            label: 'รายการจอง',
            data: [
              <?php for($x=1;$x<=12;$x++): ?>
                <?php ($check=0); ?>
                  <?php $__currentLoopData = $poolvilla; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($p->month == $x): ?>
                      <?php echo e($p->room); ?>,<?php ($check=1); ?>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($check==0): ?>
                  0,
                <?php endif; ?>  
              <?php endfor; ?>
              ], 
            backgroundColor: [
                'rgba(70, 0, 255, 0.8)',
                // 'rgba(99, 50, 235, 0.2)',
                // 'rgba(255, 50, 200, 0.2)',
                // 'rgba(75, 50, 192, 0.2)',
                // 'rgba(50, 202, 255, 0.2)',
                // 'rgba(55, 255, 64, 0.2)'
            ],
            borderColor: [
                // 'rgba(5, 99, 132, 1)',
                // 'rgba(99, 50, 235, 1)',
                // 'rgba(255, 50, 200, 1)',
                // 'rgba(75, 50, 192, 1)',
                // 'rgba(50, 202, 255, 1)',
                // 'rgba(55, 255, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
      
        scales: {
          x: {
        stacked: true,
      },
      y: {
        beginAtZero: true,
        stacked: true
      }
            
        }
    }
});

</script>

            </div>
          </div>
          </div>
        </div>
      </section>
    </div>
      <?php echo $__env->make('Partner.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>

  <?php echo $__env->make('Partner.layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




</body>
</html>


<?php /**PATH /home/zkorn2/domains/korn2.orangeworkshop.info/public_html/Poolvilla/resources/views/Partner/Dashboard/index.blade.php ENDPATH**/ ?>