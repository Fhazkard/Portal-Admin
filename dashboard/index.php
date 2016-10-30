<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta, title, favicons -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- CSS --> 
  <link href="../content/css/bootstrap.min.css" rel="stylesheet">
  <link href="../content/css/font-awesome.min.css" rel="stylesheet">
  <link href="../content/css/animate.min.css" rel="stylesheet">
  <!-- Custom styling plus plugins -->
  <link href="../content/css/custom.css" rel="stylesheet">

  <link href="../content/css/site.css" rel="stylesheet">
  <script src="../content/js/jquery.min.js"></script>
  <script src="../content/js/nprogress.js"></script>
  </head>
<body class="nav-md">

  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="../dashboard/" class="site_title"><i class="fa fa-paw"></i> <span>Bimbel Wisdom</span></a>
          </div>
            <div class="clearfix"></div>
          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
                <img src="../content/img/user.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>Fhazkard</h2>
            </div>
          </div>
          <!-- /menu prile quick info -->
          <br />
          
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <br> <div class="clearfix"></div>
              <ul class="nav side-menu">
                  <li><a href="../dashboard/"><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu" style="display: none"></ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                      <li><a href="../dashboard/murid/">Data Murid</a>
                    </li>
                    <li><a href="../dashboard/bimbel/">Data Kelas Bimbel</a>
                    </li>
                    <li><a href="../dashboard/pengajar/">Data Pengajar</a>
                    </li>
                    <li><a href="../dashboard/kelas/">Data Kelas Sekolah</a>
                    </li>
                    <li><a href="../dashboard/sekolah/">Data Sekolah</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-desktop"></i> Akademik <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="../dashboard/akademik-bimbel/">Data Kelas Bimbel</a>
                    </li>
                  </ul>
                </li>                
                <li><a><i class="fa fa-bar-chart-o"></i> Materi Belajar <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                      <li><a href="../dashboard/materi/">Data Materi Belajar</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="animated bounceIn fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right ">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="../content/img/user.jpg" alt="">Fhazkard
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="javascript:;">  Ganti Password</a>
                  </li>
                  <li>
                      <form action="../koneksi/logout.php" method="post" style="width: auto;">                      
                          <input id="logout" type="submit" name="logout" value="Log Out">
                           <?php require '../koneksi/csrf.php';CSRF::init();print CSRF::tokenInput(); ?> 
                      </form>
                  </li>
                </ul>
              </li>            
            </ul>
          </nav>
        </div><!-- nav menu -->
      </div><!-- top navigation -->   
    <div class="right_col" role="main">
        <!-- Total Dashboard -->
       <div class="row tile_count">
          <div class="animated bounceInLeft col-md-3 col-sm-6 col-xs-6 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-user"></i> Total Murid</span>
              <div class="count green">50</div>
              <span class="count_bottom">Kelas Bahasa Mandarin</span>
            </div>
          </div>
          <div class="animated bounceInUp col-md-3 col-sm-6 col-xs-6 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-user"></i> Total Murid</span>
              <div class="count green">45</div>
              <span class="count_bottom">Kelas Bahasa Inggris</span>
            </div>
          </div>
          <div class="animated bounceInDown col-md-3 col-sm-6 col-xs-6 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-user"></i> Total Murid</span>
              <div class="count green">25</div>
              <span class="count_bottom">Kelas Matematika</span>
            </div>
          </div>
          <div class="animated bounceInRight col-md-3 col-sm-6 col-xs-6 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-user"></i> Total Murid</span>
              <div class="count green">30</div>
              <span class="count_bottom">Kelas Playgroup</span>
            </div>
          </div>
        </div><!-- Total Dashboard -->
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph" style="width: 100%; height:100%;">
              <div class="row x_title">
                <div class="col-md-6">
                  <h3>Grafik Data Murid<small> - Per Kelas Bimbel</small></h3>
                </div>
              </div>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <div id="mainb" style="width: 100%; height:400px;">           
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
                      <div class="progress progress_lg" style="width: 100%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"><strong>30</strong></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-6">
                  <div>
                    <p>Sekolah 2</p>
                    <div class="">
                      <div class="progress progress_lg" style="width: 100%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="22"><strong>22</strong></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-6">
                  <div>
                    <p>Sekolah 3</p>
                    <div class="">
                      <div class="progress progress_lg" style="width: 100%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="18"><strong>18</strong></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-6">
                  <div>
                    <p>Sekolah 4</p>
                    <div class="">
                      <div class="progress progress_lg" style="width: 100%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="12"><strong>12</strong></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-6">
                  <div>
                    <p>Sekolah 5</p>
                    <div class="">
                      <div class="progress progress_lg" style="width: 100%;">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="8"><strong>8</strong></div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              <div class="clearfix"></div>
            </div><!-- dashboard graph -->
          </div>
        </div><!-- row -->
         <br />      
        <!-- footer content -->
        <footer class="footer">
          <div class="copyright-info">
            <p class="pull-right">Dashboard Bimbel Wisdom Admin By <a href="https://Fhazkard.com">Fhazkard</a>  
            </p>
          </div>
        </footer>
      </div><!-- right col -->    
    </div><!-- main container -->
  </div><!-- body container -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="../content/js/bootstrap-progressbar.min.js"></script>
<script src="../content/js/moment.min.js"></script>
<script src="../content/js/chart.min.js"></script>
<script src="../content/js/custom.js"></script>
<script src="../content/js/jquery.nicescroll.min.js"></script>
<script src="../content/js/echarts-all.js"></script>
<script src="../content/js/green.js"></script>
  <script>
    var myChart9 = echarts.init(document.getElementById('mainb'), theme);
    myChart9.setOption({
      title: {
        text: 'Kelas Bimbel',
        //subtext: 'Graph Sub-text'
      },
      //theme : theme,
      tooltip: {
        trigger: 'axis'
      },
      legend: {
        data: ['B. Mandarin', 'B. Inggris', 'Matematika', 'Playgroup']
      },
      toolbox: {
        show: false
      },
      calculable: false,
      xAxis: [{
        type: 'category',
        data: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
      }],
      yAxis: [{
        type: 'value'
      }],
      series: [{
        name: 'B. Mandarin',
        type: 'bar',
        data: [10.0, 12.0, 16.0, 24.0, 30.0, 32.0, 40.0, 50.0, 32.0, 28.0, 28.0, 32.0],
        markPoint: {
          data: [{
            type: 'max',
            name: 'Murid'
          }, {
            type: 'min',
            name: 'Murid'
          }]
        },
        markLine: {
          data: [{
            type: 'average',
            name: 'Murid'
          }]
        }
      }, {
        name: 'B. Inggris',
        type: 'bar',
        data: [10.0, 14.0, 18.0, 24.0, 30.0, 32.0, 42.0, 45.0, 38.0, 28.0, 24.0, 36.0],
        markPoint: {
          data: [{
            type: 'max',
            name: 'Murid'
          }, {
            type: 'min',
            name: 'Murid'
          }]
        },
        markLine: {
          data: [{
            type: 'average',
            name: '???'
          }]
        }
      },
        {
        name: 'Matematika',
        type: 'bar',
        data: [4.0, 8.0, 12.0, 20.0, 28.0, 32.0, 30.0, 36.0, 40.0, 32.0, 21.0, 28.0],
        markPoint: {
          data: [{
            type: 'max',
            name: 'Murid'
          }, {
            type: 'min',
            name: 'Murid'
          }]
        },
        markLine: {
          data: [{
            type: 'average',
            name: '???'
          }]
        }
      },
        {
        name: 'Playgroup',
        type: 'bar',
        data: [12.0, 16.0, 20.0, 24.0, 28.0, 35.0, 40.0, 42.0, 48.0, 54.0, 44.0, 38.0],
        markPoint: {
          data: [{
            type: 'max',
            name: 'Murid'
          }, {
            type: 'min',
            name: 'Murid'
          }]
        },
        markLine: {
          data: [{
            type: 'average',
            name: '???'
          }]
        }
      }]//series
    });//setOption
  </script>
</body>
</html>

