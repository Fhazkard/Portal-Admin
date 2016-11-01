<?php  session_start();require '../../koneksi/csrf.php';CSRF::init();
if(isset($_SESSION['limit']))
{
	$limit = $_SESSION['limit'];
	if (time() < $limit){		
	}else{
		die("<script>alert('Silahkan Login Ulang!') 
		window.location = '../../'</script>");
		unset($_SESSION['limit']);
		session_destroy();
	}
}else{
	die("<script>alert('Error Load Page!') 
	window.location = '../'</script>");
}
?>
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
  <link href="../../content/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../content/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../content/css/animate.min.css" rel="stylesheet">
  <!-- Custom styling plus plugins -->
  <link href="../../content/css/custom.css" rel="stylesheet">
  <link href="../../content/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="../../content/css/responsive.bootstrap.min.css" rel="stylesheet">
  
  <link href="../../content/css/site.css" rel="stylesheet">  
  <script src="../../content/js/jquery.min.js"></script>
  <script src="../../content/js/nprogress.js" type="text/javascript"></script>
  </head>
<body class="nav-md">

  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="../" class="site_title"><i class="fa fa-paw"></i> <span>Bimbel Wisdom</span></a>
          </div>
            <div class="clearfix"></div>
          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="../../content/img/user.jpg" alt="..." class="img-circle profile_img">
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
                <li><a href="../"><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                </li>
                <li><a><i class="fa fa-edit"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="../murid/">Data Murid</a>
                    </li>
                    <li><a href="../bimbel/">Data Kelas Bimbel</a>
                    </li>
                    <li><a href="../pengajar/">Data Pengajar</a>
                    </li>
                    <li><a href="../kelas/">Data Kelas Sekolah</a>
                    </li>
                    <li><a href="../sekolah/">Data Sekolah</a>
                    </li>
                  </ul>
                </li>
<!--                <li><a><i class="fa fa-desktop"></i> Akademik <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="../akademik-bimbel/">Data Kelas Bimbel</a>
                    </li>
                  </ul>
                </li>                -->
                <li><a><i class="fa fa-bar-chart-o"></i> Materi Belajar <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                      <li><a href="../materi/">Data Materi Belajar</a>
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
                <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="../../content/img/user.jpg" alt="">Fhazkard
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="javascript:;">  Ganti Password</a>
                  </li>
                  <li>
                      <form action="../../koneksi/logout.php" method="post" style="width: auto;">                      
                          <input id="logout" type="submit" name="logout" value="Log Out">
                           <?php print CSRF::tokenInput(); ?> 
                      </form>
                  </li>
                </ul>
              </li>            
            </ul>
          </nav>
        </div><!-- nav menu -->
      </div><!-- top navigation -->   
    <div class="right_col" role="main">
        