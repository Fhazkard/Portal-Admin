<?php include "../header.php";?>     
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">          
                  <h2>Tabel Data Bimbel</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <a href="#" class="btn btn-success btn-xs" style="padding:4px;" data-toggle="modal" data-target=".tambah"><i class="fa fa-plus-square" ></i> Tambah Bimbel Baru</a>
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>                       
                        <th>Nama </th>
						<th>pengajar </th>
                        <th>Action</th>
                      </tr>
                    </thead>
					<tbody>
					<?php
						include '../../koneksi/konek.php';

						$selek_data = mysqli_query($koneksi, "SELECT murid.murid_id,murid.sekolah_id,murid.kelas_id,murid.bimbel_id,murid.nama, 
								murid.tgl_lahir, murid.jk, murid.alamat, murid.nama_ortu, murid.tlp,
								sekolah.nama AS sekolah, kelas.nama AS kelas, bimbel.nama AS bimbel FROM murid 
								JOIN sekolah ON sekolah.sekolah_id = murid.sekolah_id
								JOIN kelas ON kelas.kelas_id =  murid.kelas_id
								JOIN bimbel ON bimbel.bimbel_id = murid.bimbel_id");
						while($data = mysqli_fetch_array($selek_data)){
							?>                  
                      <tr class=" ">
                        <td class=" "><?php echo $data['nama']; ?></td>
						<td class=" "><?php echo $data['pengajar']; ?></td>
                        <td class=" last">
							<a id="edit_link" href="#" class="btn btn-info btn-xs last" data-toggle="modal" data-target=".edit" 
							data-bimbel_id="<?php echo $data['bimbel_id']; ?>"
							data-nama="<?php echo $data['nama'];?>"
							data-pengajar_id="<?php echo $data['pengajar_id'];?>"><i class="fa fa-pencil"></i> Edit</a>
							<form method="post" action="../../koneksi/delete.php" style="width:auto;float:right;">
								<input type="hidden" name="delete_id" value="<?php echo $data['bimbel_id']; ?>">
								<input id="module" type="hidden" name="module" value="bimbel">
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
                        <h4 class="modal-title" id="">Tambah Data Bimbel</h4>
                      </div>
                      <div class="modal-body">
						<form method="POST" action="../../koneksi/tambah.php" class="form-horizontal form-label-left">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Nama Bimbel:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input type="text" name="nama" class="form-control" placeholder="Masukan Nama Kelas" required autofocus>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Nama Pengajar:</label>
							<div class="col-md-5 col-sm-5 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<select id="pengajar" name="pengajar" class="form-control">
							<?php 
								include '../../koneksi/konek.php';

								$selek_data = mysqli_query($koneksi, "SELECT * FROM pengajar");
								while($data = mysqli_fetch_array($selek_data)){
							?>
								<option value="<?php echo $data['pengajar_id'];?>"><?php echo $data['nama'];?></option>
							<?php
								}
							?>
							</select>
							</div>						
						</div>
						<?php print CSRF::tokenInput(); ?>
                      </div>
						<div class="modal-footer">
						<input id="module" type="hidden" name="module" value="bimbel"> 
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin:0px;">Keluar</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
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
                        <h4 class="modal-title" id="">Edit Data Bimbel</h4>
                      </div>
                      <div class="modal-body">
						<form method="POST" action="../../koneksi/edit.php" class="form-horizontal form-label-left">
						<input id="bimbel_id" type="hidden" name="bimbel_id"> 
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Nama Bimbel:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input id="nama" type="text" name="nama" class="form-control" placeholder="Masukan Nama Bimbel" required autofocus>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Nama Pengajar:</label>
							<div class="col-md-5 col-sm-5 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<select id="pengajar" name="pengajar" class="form-control">
							<?php 
								include '../../koneksi/konek.php';

								$selek_data = mysqli_query($koneksi, "SELECT * FROM pengajar");
								while($data = mysqli_fetch_array($selek_data)){
							?>
								<option value="<?php echo $data['pengajar_id'];?>"><?php echo $data['nama'];?></option>
							<?php
								}
							?>
							</select>
							</div>						
						</div>
						<?php print CSRF::tokenInput(); ?>
                      </div>
						<div class="modal-footer">
						<input id="module" type="hidden" name="module" value="bimbel"> 
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin:0px;">Keluar</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
						</div>
                      </form>
                    </div>
                  </div>
                </div>				
				<script>
				$(document).on("click", "#edit_link", function () {
					var bimbel_id = $(this).data('bimbel_id');
					$(".modal-body #bimbel_id").val( bimbel_id );
					var nama = $(this).data('nama');
					$(".modal-body #nama").val( nama );
					var pengajar_id = $(this).data('pengajar_id');
					$(".modal-body #pengajar").val( pengajar_id );
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