<?php  session_start();require '../../koneksi/csrf.php';CSRF::init();
if(isset($_SESSION['waktu']) && isset($_SESSION['murid_id']))
{
	$limit = $_SESSION['waktu'];
	$murid_id= $_SESSION['murid_id'];
	if (time() < $limit){		
	}else{
		die("<script>alert('Silahkan Login Ulang!') 
		window.location = '../../'</script>");
		unset($_SESSION['waktu']);
		session_destroy();
	}
}else{
	die("<script>alert('Error Load Page!') 
	window.location = '../../'</script>");
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
  <title>Portal Download</title>

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
<body>
  <div class="container body">
    <div class="main_container">
      <!-- top navigation -->
      <div>
        <div class="nav_menu">
          <nav class="" role="navigation">
		  <div class="nav" style="float:left;margin-left:10px; padding:10px;">
			<h2>Bimbel Wisdom Batam</h2>
          </div>
            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="../../content/img/user.jpg" alt=""><?php echo $_SESSION['login'];?> <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a  id="logout" data-toggle="modal" data-target=".edit">  Ganti Password</a>
                  </li>
                  <li>
                      <form action="../../koneksi/logout.php" method="post" style="width: auto;">                      
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
                        <h4 class="modal-title" id="">Ganti Password User Login</h4>
                      </div>
                      <div class="modal-body">
						<form method="POST" action="../../koneksi/edit.php" class="form-horizontal form-label-left">
						<input type="hidden" name="nama" value="<?php echo $_SESSION['login'];?>">
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
						<input id="module" type="hidden" name="module" value="login"> 
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
         
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">          
                <h2>List File Materi Yang Bisa Di Download</h2>
				<div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>                       
                        <th>Bimbel</th>
						<th>Judul Materi</th>
						<th>Keterangan Materi</th>
						<th>Tanggal</th>
                        <th>Action</th>
                      </tr>
                    </thead>
					<tbody>
					<?php
						include '../../koneksi/konek.php';
						$selek_data = mysqli_query($koneksi, "SELECT bimbel.nama AS bimbel, murid.nama AS murid, materi.sekolah_id, materi.kelas_id, materi.bimbel_id, 
													materi.judul AS judul, materi.keterangan AS keterangan, materi.tgl_terbit AS tgl_terbit, materi.file_location AS link_download FROM MURID 
													JOIN bimbel ON bimbel.bimbel_id = murid.bimbel_id
													JOIN materi ON materi.bimbel_id = murid.bimbel_id AND materi.kelas_id = murid.kelas_id
													WHERE murid.murid_id = '".$murid_id."'");
						while($data = mysqli_fetch_array($selek_data)){
							?>                  
                      <tr class=" ">
                        <td class=" "><?php echo $data['bimbel']; ?></td>
						<td class=" "><?php echo $data['judul']; ?></td>
						<td class=" "><?php echo $data['keterangan']; ?></td>
						<td class=" "><?php echo $data['tgl_terbit']; ?></td>
                        <td class=" last" style="width:82px;">
							<form method="post" action="../../koneksi/download.php" style="width:auto;">
								<input type="hidden" name="link_download" value="<?php echo $data['link_download']; ?>">
								<?php print CSRF::tokenInput(); ?>
								<button type="submit" class="btn btn-success btn-xs last" onclick="return konfirmasi()" style="margin:0px;"><i class="fa fa-download"></i> Download</button>
							</form>							
                        </td>
                      </tr>
					<?php
					}
					?>					  
                    </tbody>
                  </table>
                </div>
              </div>			    
            </div>
          </div>
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
	<script src="../../content/js/icheck.min.js" type="text/javascript"></script>
	<script src="../../content/js/moment.min.js" type="text/javascript"></script>
	<script src="../../content/js/custom.js" type="text/javascript"></script>
	<script src="../../content/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="../../content/js/dataTables.bootstrap.js" type="text/javascript"></script>
	<script src="../../content/js/dataTables.responsive.min.js" type="text/javascript"></script>
	<script src="../../content/js/responsive.bootstrap.min.js" type="text/javascript"></script>
	<script src="../../content/js/jquery.nicescroll.min.js" type="text/javascript"></script>
	<script src="../../content/js/jasny-bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable-responsive').DataTable();            
          });
        </script>
		<script type="text/javascript">
			function konfirmasi(link_download){
				if(confirm("Apakah Anda Yakin Ingin Download Data ini?")){
					return link_download;
				}else{
					return false;
				}
			}
		</script>
</body>
</html>
