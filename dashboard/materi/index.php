<?php include "../header.php";?>  
<?php include '../../koneksi/konek.php';?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_title">          
          <h2>Tabel Data Materi</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <a href="#" class="btn btn-success btn-xs" style="padding:4px;" data-toggle="modal" data-target=".tambah"><i class="fa fa-plus-square" ></i> Upload Materi</a>
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
				<th>Judul</th>			  
                <th>Bimbel</th>
                <th>Sekolah</th>
                <th>Kelas </th>             
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
                $query = "SELECT m.materi_id, m.bimbel_id, m.kelas_id, m.sekolah_id, m.judul, "
                        . "m.keterangan,m.tgl_terbit, m.file_location, k.nama as kelas, "
                        . "s.nama as sekolah, b.nama as bimbel "
                        . "FROM materi m "
                        . "INNER JOIN kelas k on k.kelas_id = m.kelas_id "
                        . "INNER JOIN sekolah s on s.sekolah_id = m.sekolah_id "
                        . "INNER JOIN bimbel b on b.bimbel_id = m.bimbel_id";
                $selek_data = mysqli_query($koneksi, $query);
                while($data = mysqli_fetch_array($selek_data)){
            ?>                  
              <tr class=" ">
				<td class=" "><?php echo $data['judul']; ?></td>
                <td class=" "><?php echo $data['bimbel']; ?></td>
				<td class=" "><?php echo $data['kelas']; ?></td>
                <td class=" "><?php echo $data['sekolah']; ?></td>
                <td class=" "><?php echo $data['keterangan']; ?></td>
                <td class=" "><?php echo $data['tgl_terbit']; ?></td>
                <td class=" last">
                    <a id="edit_link" href="#" class="btn btn-info btn-xs last" data-toggle="modal" data-target=".edit" 
                    data-materi_id="<?php echo $data['materi_id'];?>"
                    data-sekolah_id="<?php echo $data['sekolah_id'];?>"
                    data-kelas_id="<?php echo $data['kelas_id']; ?>"
                    data-bimbel_id="<?php echo $data['bimbel_id']; ?>"
					data-judul="<?php echo $data['judul']; ?>"                              
                    data-keterangan="<?php echo $data['keterangan']; ?>"
                    data-file_location="<?php echo $data['file_location']; ?>"><i class="fa fa-pencil"></i> Edit</a>
					<form method="post" action="../../koneksi/delete.php" style="width:auto;float:right;">
						<input type="hidden" name="delete_id" value="<?php echo $data['materi_id']; ?>">
						<input type="hidden" name="file_location" value="<?php echo $data['file_location']; ?>">
						<input id="module" type="hidden" name="module" value="materi">
						<?php print CSRF::tokenInput(); ?>
						<button type="submit" class="btn btn-danger btn-xs last" onclick="return konfirmasi()"><i class="fa fa-trash-o"></i> Delete</button>
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

        <!--Modal Dialog Tambah Materi-->
        <div class="modal fade tambah" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span>
                  </button>
                  <h4 class="modal-title" id="">Upload Data Materi</h4>
                </div>
                <div class="modal-body">
					<form method="POST" action="../../koneksi/tambah.php" enctype="multipart/form-data" class="form-horizontal form-label-left">					
						<div class="form-group">
 							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Bimbel:</label>
 							<div class="col-md-5 col-sm-5 col-xs-12"  style="padding-left:0px;padding-right:0px;">
 							<select name="bimbel_id" class="form-control">
 							<?php 
 								include '../../koneksi/konek.php';
 								$selek_data = mysqli_query($koneksi, "SELECT * FROM bimbel");
 								while($data = mysqli_fetch_array($selek_data)){
 							?>
 								<option value="<?php echo $data['bimbel_id'];?>"><?php echo $data['nama'];?></option>
 							<?php
							}
							?>
 							</select>
 							</div>						
						</div>
						<div class="form-group">
 							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Kelas:</label>
 							<div class="col-md-5 col-sm-5 col-xs-12"  style="padding-left:0px;padding-right:0px;">
 							<select name="kelas_id" class="form-control">
 							<?php 
 								include '../../koneksi/konek.php';
 								$selek_data = mysqli_query($koneksi, "SELECT * FROM kelas");
 								while($data = mysqli_fetch_array($selek_data)){
 							?>
 								<option value="<?php echo $data['kelas_id'];?>"><?php echo $data['nama'];?></option>
 							<?php
 							}
 							?>
 							</select>
 							</div>						
						</div>
						<div class="form-group">
 							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Sekolah:</label>
 							<div class="col-md-5 col-sm-5 col-xs-12"  style="padding-left:0px;padding-right:0px;">
 							<select name="sekolah_id" class="form-control">
 							<?php 
 								include '../../koneksi/konek.php';
 								$selek_data = mysqli_query($koneksi, "SELECT * FROM sekolah");
 								while($data = mysqli_fetch_array($selek_data)){
 							?>
 								<option value="<?php echo $data['sekolah_id'];?>"><?php echo $data['nama'];?></option>
							<?php
 							}
 							?>
 							</select>
							</div>						
						</div>
						<div class="form-group">
 							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Nama Materi:</label>
 							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input type="text" name="judul" class="form-control" placeholder="Masukan Nama Materi" required autofocus>
 							</div>						
						</div>
						<div class="form-group">
 							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Keterangan:</label>
 							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
 							<textarea name="keterangan" class="form-control" rows="3" style="max-width:426px;max-height:150px;" required></textarea>
 							</div>						
 						</div>
						<div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">File Materi:</label>
                           <div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
                               <input type="file" name="data_upload" class="form-control" style="line-height:0px; margin:0px;"/>
                            </div>
						</div>
                    <?php print CSRF::tokenInput(); ?>
                </div>
                <div class="modal-footer">
                    <input id="module" type="hidden" name="module" value="materi"> 
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin:0px;">Keluar</button>
                    <button type="submit" class="btn btn-success" name="Save">Tambah</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!--Modal Dialog Edit Materi-->
        <div class="modal fade edit" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title" id="">Edit Upload Materi</h4>
              </div>
              <div class="modal-body">
                    <form method="POST" action="../../koneksi/edit.php" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    <input type="hidden" name="materi_id" id="materi_id">
					<input type="hidden" name="file_location" id="file_location">	
					<input type="hidden" name="judul" id="judul_hidden">					
					<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Bimbel:</label>
							<div class="col-md-5 col-sm-5 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<select id="bimbel_id" name="bimbel_id" class="form-control" disabled="true">
							<?php 
								include '../../koneksi/konek.php';
								$selek_data = mysqli_query($koneksi, "SELECT * FROM bimbel");
								while($data = mysqli_fetch_array($selek_data)){
							?>
								<option value="<?php echo $data['bimbel_id'];?>"><?php echo $data['nama'];?></option>
							<?php
							}
							?>
							</select>
							</div>						
					</div>
					<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Kelas:</label>
							<div class="col-md-5 col-sm-5 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<select id="kelas_id" name="kelas_id" class="form-control">
							<?php 
								include '../../koneksi/konek.php';
								$selek_data = mysqli_query($koneksi, "SELECT * FROM kelas");
								while($data = mysqli_fetch_array($selek_data)){
							?>
								<option value="<?php echo $data['kelas_id'];?>"><?php echo $data['nama'];?></option>
							<?php
							}
							?>
 							</select>
							</div>						
					</div>
					<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Sekolah:</label>
							<div class="col-md-5 col-sm-5 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<select id="sekolah_id" name="sekolah_id" class="form-control">
							<?php 
								include '../../koneksi/konek.php';
								$selek_data = mysqli_query($koneksi, "SELECT * FROM sekolah");
								while($data = mysqli_fetch_array($selek_data)){
							?>
								<option value="<?php echo $data['sekolah_id'];?>"><?php echo $data['nama'];?></option>
							<?php
							}
							?>
							</select>
							</div>						
					</div>
					<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Nama Materi:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input id="judul" type="text"  class="form-control" placeholder="Masukan Nama Materi" required autofocus disabled="true">
							</div>						
					</div>
					<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Keterangan:</label>							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<textarea id="keterangan" name="keterangan" class="form-control" rows="3" style="max-width:426px;max-height:150px;" required></textarea>
							</div>						
						</div>
                      <div class="form-group">
					  <label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">File Materi:</label>
                          <div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
                              <input type="file" name="data_upload" class="form-control" style="line-height:0px; margin:0px;"/>
                            </div>
                      </div>
                    <?php print CSRF::tokenInput(); ?>
                </div>
                <div class="modal-footer">
                    <input id="module" type="hidden" name="module" value="materi"> 
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin:0px;">Keluar</button>
                    <button type="submit" class="btn btn-success" name="Edit">Simpan</button>
                </div>
                </form>
            </div>
          </div>
        </div>	
        <script>
        $(document).on("click", "#edit_link", function () {
            var materi_id = $(this).data('materi_id');
            $(".modal-body #materi_id").val( materi_id );          
            var bimbel_id = $(this).data('bimbel_id');
            $(".modal-body #bimbel_id").val( bimbel_id );          
            var sekolah_id = $(this).data('sekolah_id');
            $(".modal-body #sekolah_id").val( sekolah_id );           
            var kelas_id = $(this).data('kelas_id');
            $(".modal-body #kelas_id").val( kelas_id );         
            var judul = $(this).data('judul');
            $(".modal-body #judul").val( judul );
			$(".modal-body #judul_hidden").val( judul );
            var keterangan = $(this).data('keterangan');
            $(".modal-body #keterangan").text( keterangan );
            var file_location = $(this).data('file_location');
            $(".modal-body #file_location").val( file_location );
        });
        </script>
        <script type="text/javascript">
            function konfirmasi(){
                    if(confirm("Apakah Anda Yakin Hapus Data ini?")){
                            return true;
                    }else{
                            return false;
                    }
            }
        </script>
    </div>
</div>
<?php include "../footer.php";?>