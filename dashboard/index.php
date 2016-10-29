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
            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="../content/img/user.jpg" alt="">Fhazkard
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="javascript:;">  Ganti Password</a>
                  </li>
                  <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
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
          <div class="animated bounceInLeft col-md-6 col-sm-6 col-xs-6 tile_stats_count pull-left " align="center">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count">2500</div>
              <span class="count_bottom"><i class="green">4% </i> From last Week</span>  
          </div>
          <div class="animated bounceInRight col-md-6 col-sm-6 col-xs-6 tile_stats_count pull-right" align="center">     
              <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
              <div class="count">123.50</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>       
          </div>        
        </div> <!-- /top tiles -->
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
<script src="../content/js/icheck.min.js"></script>
<script src="../content/js/moment.min.js"></script>
<script src="../content/js/custom.js"></script>
</body>
</html>

