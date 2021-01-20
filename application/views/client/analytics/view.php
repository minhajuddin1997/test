  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1>Marketing Analytics</h1>
            <br>
            <div class="d-flex justify-content-center align-items-center container">
                <form action="<?php echo base_url('client/analytics'); ?>" method="post" class='form-inline'>
                    <select id="analytics_year" name="analytics_year" class="form-control">
                        <option value="2019" <?php if(date("Y") == '2019') { echo 'selected'; } ?>>2019</option>
                        <option value="2020" <?php if(date("Y") == '2020') { echo 'selected'; } ?>>2020</option>
                        <option value="2021" <?php if(date("Y") == '2021') { echo 'selected'; } ?>>2021</option>
                    </select>
                    &nbsp;
                    <input type='submit' name='submit' class='btn btn-info' value='Filter By Year'>
                </form>
            </div>
          </div>



        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <!-- /.card-header -->
            <div class="col-md-12">
               
            <div class="card card-primary">
                  <div class="card-header" style="background:#333;">
                    <h3 class="card-title"><center>All Leads</center></h3>
    
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                    <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas id="donutChart" style="min-height: 250px; height: 400px; max-height: 400px; max-width: 100%; display: block; width: 406px;" width="507" height="312" class="chartjs-render-monitor"></canvas>
                    </div>
                  <!-- /.card-body -->
            </div>     
              <!-- /.card-body -->

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

        <div class="row">
          <div class="col">
              <!-- /.card-header -->

            <div class="card card-primary">
                  <div class="card-header" style="background:#333;">
                    <h3 class="card-title"><center>Logo Leads By Month</center></h3>
    
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                    <div class="card-body">
                        
                        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="myChart" width="560" height="400"></canvas>
                        </div>
                    </div>
                  <!-- /.card-body -->
            </div>   
            </div>
              <!-- /.card-body -->
            <div class="col">
               
            <div class="card card-primary">
                  <div class="card-header" style="background:#333;" >
                    <h3 class="card-title"><center>Web Leads By Month</center></h3>
    
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                    <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="myChart2" width="560" height="400"></canvas>

                    </div>
                  <!-- /.card-body -->
            </div>     
              <!-- /.card-body -->

              </div>
              <!-- /.card-body -->
        </div>
            <!-- /.card -->

          <!-- /.col -->
        </div>
        
        <!-- /.row -->
     
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>

$( document ).ready(function() {
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"],
    datasets: [{
      label: '# of Leads',
      data: [<?php echo count($records2['logo']['01']); ?>, <?php echo count($records2['logo']['02']); ?>, <?php echo count($records2['logo']['03']); ?>, 
      <?php echo count($records2['logo']['04']); ?>, <?php echo count($records2['logo']['05']); ?>, <?php echo count($records2['logo']['06']); ?>, 
      <?php echo count($records2['logo']['07']); ?>, <?php echo count($records2['logo']['08']); ?>, <?php echo count($records2['logo']['09']); ?>, 
      <?php echo count($records2['logo']['10']); ?>, <?php echo count($records2['logo']['11']); ?>, <?php echo count($records2['logo']['12']); ?>],
      backgroundColor: [
        '#333',
        '#333',
        '#333',
        '#333',
        'rgba(153, 102, 255)',
        'rgba(255, 159, 64)',
        'rgba(255, 99, 132)',
        'rgba(54, 162, 235)',
        'rgba(255, 206, 86)',
        'rgba(75, 192, 192)',
        'rgba(153, 102, 255)',
        'rgba(255, 159, 64)'
      ],
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    scales: {
      xAxes: [{
        ticks: {
          maxRotation: 90,
          minRotation: 80
        },
          gridLines: {
          offsetGridLines: true // à rajouter
        }
      },
   ],
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});
var ctx2 = document.getElementById("myChart2");
var myChart = new Chart(ctx2, {
  type: 'bar',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"],
    datasets: [{
      label: '# of Leads',
      data: [<?php echo count($records2['web']['01']); ?>, <?php echo count($records2['web']['02']); ?>, <?php echo count($records2['web']['03']); ?>, 
      <?php echo count($records2['web']['04']); ?>, <?php echo count($records2['web']['05']); ?>, <?php echo count($records2['web']['06']); ?>, 
      <?php echo count($records2['web']['07']); ?>, <?php echo count($records2['web']['08']); ?>, <?php echo count($records2['web']['09']); ?>, 
      <?php echo count($records2['web']['10']); ?>, <?php echo count($records2['web']['11']); ?>, <?php echo count($records2['web']['12']); ?>],
      backgroundColor: [
        'rgba(255, 99, 132)',
        'rgba(54, 162, 235)',
        'rgba(255, 206, 86)',
        'rgba(75, 192, 192)',
        'rgba(153, 102, 255)',
        'rgba(255, 159, 64)',
        'rgba(255, 99, 132)',
        'rgba(54, 162, 235)',
        'rgba(255, 206, 86)',
        '#333',
        '#333',
        '#333'
      ],
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    scales: {
      xAxes: [{
        ticks: {
          maxRotation: 90,
          minRotation: 80
        },
          gridLines: {
          offsetGridLines: true // à rajouter
        }
      },
   ],
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Flyers',
          'Logo Leads',
          'Creative Content Leads',
          'Web',
      ],
      datasets: [
        {
          data: [<?php echo $records['flyer']['count']; ?>,<?php echo $records['logo']['count']; ?>,<?php echo $records['creative']['count']; ?>,<?php echo $records['web']['count']; ?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
 

});
  </script>
