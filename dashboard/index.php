<?php  session_start();require '../koneksi/csrf.php';CSRF::init();
if(isset($_SESSION['limit']))
{
	$limit = $_SESSION['limit'];
	if (time() < $limit){		
	}else{
		die("<script>alert('Silahkan Login Ulang!') 
		window.location = '../'</script>");
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
  <link href="../content/css/bootstrap.min.css" rel="stylesheet">
  <link href="../content/css/font-awesome.min.css" rel="stylesheet">
  <link href="../content/css/animate.min.css" rel="stylesheet">
  <!-- Custom styling plus plugins -->
  <link href="../content/css/custom.css" rel="stylesheet">  
  <link href="../content/css/site.css" rel="stylesheet">  
  <script src="../content/js/jquery.min.js"></script>
  <script src="../content/js/nprogress.js" type="text/javascript"></script>
  </head>
<body class="nav-md">

  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="../dashboard" class="site_title"><i class="fa fa-paw"></i> <span>Bimbel Wisdom</span></a>
          </div>
            <div class="clearfix"></div>
          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="../content/img/user.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $_SESSION['admin'];?></h2>
            </div>
          </div>
          <!-- /menu prile quick info -->
          <br />
          
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                 <br> <div class="clearfix"></div>
              <ul class="nav side-menu">
                <li><a href="../dashboard"><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
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
                <li><a><i class="fa fa-bar-chart-o"></i> Materi Belajar <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                      <li><a href="../dashboard/materi/">Data Materi Belajar</a>
                    </li>
                  </ul>
                </li>
				<li><a><i class="fa fa-user"></i> User Management <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                      <li><a href="../dashboard/user/">Data Akun User</a>
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
                  <img src="../content/img/user.jpg" alt=""><?php echo $_SESSION['admin'];?> <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a data-toggle="modal" data-target=".edit">  Ganti Password</a>
                  </li>
                  <li>
                      <form action="../koneksi/logout.php" method="post" style="width: auto;">                      
                          <input id="logout" type="submit" name="logout" value="Log Out">
                           <?php print CSRF::tokenInput(); ?> 
                      </form>
                  </li>
                </ul>
              </li>
				<div class="animated bounceInUp modal fade edit" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span>
                        </button>
                        <h4 class="modal-title" id="">Ganti Password Administrator</h4>
                      </div>
                      <div class="modal-body">
						<form method="POST" action="../koneksi/edit.php" class="form-horizontal form-label-left">
						<input type="hidden" name="nama" value="<?php echo $_SESSION['admin'];?>">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Password Baru:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input type="password" name="password" class="form-control" placeholder="Masukan Password Baru" required maxlength="8" minlength="6" autofocus>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Password Konfirmasi:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input type="password" name="konfirm" class="form-control" placeholder="Masukan Password Sama" required maxlength="8" minlength="6">
							</div>						
						</div>
						<?php print CSRF::tokenInput(); ?>
                      </div>
						<div class="modal-footer">
						<input id="module" type="hidden" name="module" value="admin"> 
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin:0px;">Keluar</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
						</div>
                      </form>
                    </div>
                  </div>
                </div>
            </ul>
          </nav>
        </div><!-- nav menu -->
      </div><!-- top navigation -->   
    <div class="right_col" role="main">
         
        <!-- Total Dashboard -->
       <div class="row tile_count">
	   <?php
			include '../koneksi/konek.php';
			$selek_data = mysqli_query($koneksi, "SELECT COUNT(murid.bimbel_id) AS total_murid, bimbel.nama FROM `murid` 
												JOIN bimbel ON bimbel.bimbel_id = murid.bimbel_id
												GROUP BY murid.bimbel_id ORDER BY total_murid DESC");
			while($data = mysqli_fetch_array($selek_data)){
			?> 
          <div class="animated bounceInLeft col-md-3 col-sm-6 col-xs-6 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-user"></i> Total Murid</span>
              <div class="count green"><?php echo $data['total_murid']?></div>
              <span class="count_bottom"><?php echo $data['nama']?></span>
            </div>
          </div>
         <?php
		}
		?>	
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
				<?php
				include '../koneksi/konek.php';
				$selek_data = mysqli_query($koneksi, "SELECT COUNT(murid.sekolah_id) AS total_sekolah, sekolah.nama FROM `murid` 
												JOIN sekolah ON sekolah.sekolah_id = murid.sekolah_id
												GROUP BY murid.sekolah_id ORDER BY total_sekolah DESC
                                                LIMIT 5");
				while($data = mysqli_fetch_array($selek_data)){
				?> 
				<div class="col-md-12 col-sm-12 col-xs-6">
                  <div>
                    <p><?php echo $data['nama']?></p>
                    <div class="">
                      <div class="progress progress_lg" style="width: 100%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $data['total_sekolah']?>"><strong><?php echo $data['total_sekolah']?></strong></div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
				}
				?>
                </div>
              <div class="clearfix"></div>
            </div><!-- dashboard graph -->
          </div>
        </div><!-- row -->
         <br />      
        <!-- footer content -->
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
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous" type="text/javascript"></script>
	<script src="../content/js/bootstrap-progressbar.min.js" type="text/javascript"></script>
	<script src="../content/js/moment.min.js" type="text/javascript"></script>
	<script src="../content/js/custom.js" type="text/javascript"></script>
	<script src="../content/js/jquery.nicescroll.min.js" type="text/javascript"></script>
	<script src="../content/js/echarts-all.js" type="text/javascript"></script>
	<script src="../content/js/theme-echart.js" type="text/javascript"></script>
    <script type="text/javascript">
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
            name: 'Rata-rata'
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
            name: 'Rata-rata'
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
            name: 'Rata-rata'
          }]
        }
      }]//series
    });//setOption
  </script>
</body>
</html>
