<?php include "../header.php";?>     
<!-- CSS --> 
  <link href="../content/css/bootstrap.min.css" rel="stylesheet">
  <link href="../content/css/font-awesome.min.css" rel="stylesheet">
  <link href="../content/css/animate.min.css" rel="stylesheet">
  <!-- Custom styling plus plugins -->
  <link href="../content/css/custom.css" rel="stylesheet">
  <link href="../content/css/site.css" rel="stylesheet">
  
  <script src="../content/js/jquery.min.js"></script>
  <script src="../content/js/nprogress.js"></script>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph" style="width: 100%; height:400px;">
              <div class="row x_title">
                <div class="col-md-6">
                  <h3>Grafik Data <small> - Murid Per Sekolah</small></h3>
                </div>
              </div>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <div id="placeholder33" style="height: 100%; display: none" class="demo-placeholder"></div>
                <div style="width: 100%;">
                  <div id="canvas_dahs" class="demo-placeholder" style="width: 100%; height:100%;"></div>
                </div>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                <div class="x_title">
                  <h2>Total Murid Per Sekolah</h2>
                  <div class="clearfix"></div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-6">
                  <div>
                    <p>Sekolah 1</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <p>Sekolah 2</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 76%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-6">
                  <div>
                    <p>Sekolah 3</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 76%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <p>Sekolah 4</p>
                    <div class="">
                      <div class="progress progress_sm" style="width: 76%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              <div class="clearfix"></div>
            </div><!-- dashboard graph -->
          </div>
        </div><!-- row -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="../content/js/icheck.min.js"></script>
<script src="../content/js/moment.min.js"></script>
<script src="../content/js/custom.js"></script>
<?php include "../footer.php";?>

