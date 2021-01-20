<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard Beta</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard Beta</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Projects</span>
                <span class="info-box-number">
                    <?php
                        $i=0;
                        foreach($records as $row):
                                $i++;
                                $total[] = $i;
                        endforeach;
                        echo count($total);
                    ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Current Projects</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pending Projects</span>
                <span class="info-box-number">
                    <?php
                        $i=0;
                        foreach($records as $row):
                            if($row['complete_status'] == 'pending'):
                                $i++;
                                $pend[] = $i;
                            endif;
                        endforeach;
                        echo count($pend);
                    ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1" ><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Completed Projects</span>
                <span class="info-box-number">
                    <?php
                        $i=0;
                        foreach($records as $row):
                            if($row['complete_status'] == 'completed'):
                                $i++;
                                $comp[] = $i;
                            endif;
                        endforeach;
                        echo count($comp);
                    ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->



        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Projects By Year</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="d-md-flex">
                  <div class="p-1 flex-fill" style="overflow: hidden">
                    <!-- Map will be created here -->
                    <div id="world-map-markers" >
                    <div style="width: 100%;">
                		<canvas id="canvas"></canvas>
                		<progress id="animationProgress" max="1" value="0" style="width: 100%; background-color:#E6B86A;"></progress>
	                </div>
	<br>
	<br>
	<button id="randomizeData">Randomize Data</button>
	<script>
		var progress = document.getElementById('animationProgress');
		var config = {
			type: 'line',
			data: {
				labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July','Aug','Sep','Oct','Nov','Dec'],
				datasets: [{
					label: 'Project',
					fill: false,
					borderColor: window.chartColors.yellow,
					backgroundColor: window.chartColors.yellow,
					data: [
						2,
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor()
					]
				}, {
					label: 'My Second dataset ',
					fill: false,
					borderColor: window.chartColors.black,
					backgroundColor: window.chartColors.black,
					data: [
						444,
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor()
					]
				}]
			},
			options: {
				title: {
					display: true,
					text: ''
				},
				animation: {
					duration: 2000,
					onProgress: function(animation) {
						progress.value = animation.currentStep / animation.numSteps;
					},
					onComplete: function() {
						window.setTimeout(function() {
							progress.value = 0;
						}, 2000);
					}
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myLine.update();
		});
	</script>
                    </div>
                  </div>
                </div><!-- /.d-md-flex -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3" style="padding:2rem;background:url('https://image.freepik.com/free-photo/abstract-yellow-brush-stroke-white-background_23-2147835995.jpg');background-position: -400px 10px;" >
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>
              <div class="info-box-content" style="font-size:25px;">
                <span class="info-box-text">Comments</span>
                <span class="info-box-number">5,200</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3" style="padding:2rem;background:url('https://image.freepik.com/free-photo/abstract-yellow-brush-stroke-white-background_23-2147835995.jpg');background-position: -400px 10px;">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content" style="font-size:25px;">
                <span class="info-box-text">Circles</span>
                <span class="info-box-number">92,050</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3" style="padding:2rem;background:url('https://image.freepik.com/free-photo/abstract-yellow-brush-stroke-white-background_23-2147835995.jpg');background-position: -400px 10px;">
              <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

              <div class="info-box-content" style="font-size:25px;">
                <span class="info-box-text">Files</span>
                <span class="info-box-number">114,381</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3" style="padding:2rem;background:url('https://image.freepik.com/free-photo/abstract-yellow-brush-stroke-white-background_23-2147835995.jpg');background-position: -400px 10px;">
              <span class="info-box-icon"><i class="far fa-comment"></i></span>

              <div class="info-box-content" style="font-size:25px;">
                <span class="info-box-text">Direct Messages</span>
                <span class="info-box-number">163,921</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
 
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>