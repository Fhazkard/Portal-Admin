<?php include "../header.php";?>  
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_title">          
          <h2>Tabel Data Materi</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <a href="#" class="btn btn-success btn-xs" style="padding:4px;" data-toggle="modal" data-target=".tambah"><i class="fa fa-plus-square" ></i> Tambah Data Materi</a>
          <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>                       
                <th>Judul Materi</th>
                <th>Bimbel</th>
                <th>Kelas</th>
				<th>Sekolah</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
                include '../../koneksi/konek.php';			
                $selek_data = mysqli_query($koneksi, "SELECT materi.materi_id, materi.sekolah_id, materi.kelas_id, materi.bimbel_id, 
														materi.judul, materi.keterangan, materi.tgl_terbit, materi.file_location,
														sekolah.nama AS sekolah, kelas.nama AS kelas, bimbel.nama AS bimbel FROM materi
														JOIN sekolah ON sekolah.sekolah_id = materi.sekolah_id
														JOIN kelas ON kelas.kelas_id = materi.kelas_id
														JOIN bimbel ON bimbel.bimbel_id = materi.bimbel_id");
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
                    data-bimbel_id="<?php echo $data['bimbel_id']; ?>"
                    data-kelas_id="<?php echo $data['kelas_id']; ?>"
					data-sekolah_id="<?php echo $data['sekolah_id']; ?>"
                    data-judul="<?php echo $data['judul']; ?>"
                    data-keterangan="<?php echo $data['keterangan']; ?>"
                    data-file_location="<?php echo $data['file_location']; ?>"
                    data-tgl_terbit="<?php echo $data['tgl_terbit']; ?>"><i class="fa fa-pencil"></i> Edit</a>
                    <form method="post" action="../../koneksi/delete.php" style="width:auto;float:right;">
                        <input type="hidden" name="delete_id" value="<?php echo $data['materi_id']; ?>">
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
        
        <div class="modal fade tambah" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span>
                  </button>
                  <h4 class="modal-title" id="">Upload Data Materi</h4>
                </div>
                <div class="modal-body">
                   <form method="POST" action="../../koneksi/tambah.php" class="form-horizontal form-label-left">
                    <input type="hidden" name="tgl_terbit" id="tgl_terbit" />
					<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Nama Materi:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input type="text" name="judul" class="form-control" placeholder="Masukan Nama Materi" required autofocus>
							</div>						
					</div>
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
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Tanggal Terbit:</label>
							<div class="col-md-5 col-sm-5 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input type="date" name="tgl_terbit" class="form-control" placeholder="Masukan Tanggal Terbit" required>
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

        <div class="modal fade edit" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title" id="">Edit Upload Materi</h4>
              </div>
              <div class="modal-body">
                    <form method="POST" action="../../koneksi/edit.php" class="form-horizontal form-label-left">
                    <input type="hidden" name="materi_id" id="materi_id"> 
                    <input type="hidden" name="tgl_terbit" id="tgl_terbit" />
                    <input type="hidden" name="file_location" id="file_location" />
					<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Nama Materi:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input id="judul" type="text" name="judul" class="form-control" placeholder="Masukan Nama Materi" required autofocus>
							</div>						
					</div>
					<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Bimbel:</label>
							<div class="col-md-5 col-sm-5 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<select id="bimbel_id" name="bimbel_id" class="form-control">
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
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Keterangan:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
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
                    <button type="submit" class="btn btn-success">Simpan</button>
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
            var kelas_id = $(this).data('kelas_id');
            $(".modal-body #kelas_id").val( kelas_id );
            var judul = $(this).data('judul');
            $(".modal-body #judul").val( judul );
            var keterangan = $(this).data('keterangan');
            $(".modal-body #keterangan").text( keterangan );
            var tgl_terbit = $(this).data('tgl_terbit');
            $(".modal-body #tgl_terbit").val( tgl_terbit );
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