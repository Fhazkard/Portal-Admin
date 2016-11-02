<?php include "../header.php";?>     
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">          
                  <h2>Tabel Data Pengajar</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <a href="#" class="btn btn-success btn-xs" style="padding:4px;" data-toggle="modal" data-target=".tambah"><i class="fa fa-plus-square" ></i> Tambah Pengajar Baru</a>
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>                       
                        <th>Nama </th>
                        <th>Umur </th>
                        <th>Jenis Kelamin </th>
                        <th>Alamat </th>
						<th>Telepon </th>
                        <th>Action</th>
                      </tr>
                    </thead>
					<tbody>
					<?php
						include '../../koneksi/konek.php';

						$selek_data = mysqli_query($koneksi, "SELECT * FROM pengajar");
						while($data = mysqli_fetch_array($selek_data)){
							?>                  
                      <tr class=" ">
                        <td class=" "><?php echo $data['nama']; ?></td>
                        <td class=" "><?php echo $data['umur']; ?></td>
						<td class=" "><?php echo $data['jk']; ?></td>
                        <td class=" "><?php echo $data['alamat']; ?></td>
                        <td class="a-right a-right "><?php echo $data['tlp']; ?></td>
                        <td class=" last">
							<a id="edit_link" href="#" class="btn btn-info btn-xs last" data-toggle="modal" data-target=".edit" 
							data-pengajar_id="<?php echo $data['pengajar_id']; ?>"
							data-nama="<?php echo $data['nama']; ?>"
							data-umur="<?php echo $data['umur']; ?>"
							data-jk="<?php echo $data['jk']; ?>"
							data-alamat="<?php echo $data['alamat']; ?>"
							data-tlp="<?php echo $data['tlp']; ?>"><i class="fa fa-pencil"></i> Edit</a>
							<form method="post" action="../../koneksi/delete.php" style="width:auto;float:right;">
								<input type="hidden" name="delete_id" value="<?php echo $data['pengajar_id']; ?>">
								<input id="module" type="hidden" name="module" value="pengajar">
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
                        <h4 class="modal-title" id="">Tambah Data Pengajar</h4>
                      </div>
                      <div class="modal-body">
						<form method="POST" action="../../koneksi/tambah.php" class="form-horizontal form-label-left">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Nama Pengajar:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input type="text" name="nama" class="form-control" placeholder="Masukan Nama Pengajar" required autofocus>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Umur:</label>
							<div class="col-md-5 col-sm-5 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input type="text" name="umur" class="form-control" data-mask="99" placeholder="Masukan Umur Pengajar" required>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Jenis Kelamin:</label>
							<div class="col-md-5 col-sm-5 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<select name="jk" class="form-control">
								<option value="Laki-laki">Laki-laki</option>
								<option value="perempuan">perempuan</option>
							</select>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Alamat Pengajar:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<textarea name="alamat" class="form-control" rows="3" style="max-width:426px;max-height:150px;" required></textarea>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Telepon Pengajar:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input type="text" name="tlp" class="form-control" placeholder="Masukan Telepon Pengajar" required>
							</div>						
						</div>
						<?php print CSRF::tokenInput(); ?>
                      </div>
						<div class="modal-footer">
						<input id="module" type="hidden" name="module" value="pengajar"> 
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
                        <h4 class="modal-title" id="">Edit Data Pengajar</h4>
                      </div>
                      <div class="modal-body">
						<form method="POST" action="../../koneksi/edit.php" class="form-horizontal form-label-left">
						<input id="pengajar_id" type="hidden" name="pengajar_id"> 
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Nama Pengajar:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input id="nama" type="text" name="nama" class="form-control" placeholder="Masukan Nama Pengajar" required autofocus>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Umur:</label>
							<div class="col-md-5 col-sm-5 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input id="umur" type="text" name="umur" class="form-control" data-mask="99" placeholder="Masukan Umur Pengajar" required>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Jenis Kelamin:</label>
							<div class="col-md-5 col-sm-5 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<select id="jk" name="jk" class="form-control">
								<option value="Laki-laki">Laki-laki</option>
								<option value="perempuan">perempuan</option>
							</select>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Alamat Pengajar:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<textarea id="alamat" name="alamat" class="form-control" rows="3" style="max-width:426px;max-height:150px;" required></textarea>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Telepon Pengajar:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input id="tlp" type="text" name="tlp" class="form-control" placeholder="Masukan Telepon Pengajar" required>
							</div>						
						</div>
						<?php print CSRF::tokenInput(); ?>
                      </div>
						<div class="modal-footer">
						<input id="module" type="hidden" name="module" value="pengajar"> 
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin:0px;">Keluar</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
						</div>
                      </form>
                    </div>
                  </div>
                </div>				
				<script>
				$(document).on("click", "#edit_link", function () {
					var pengajar_id = $(this).data('pengajar_id');
					$(".modal-body #pengajar_id").val( pengajar_id );
					var nama = $(this).data('nama');
					$(".modal-body #nama").val( nama );
					var umur = $(this).data('umur');
					$(".modal-body #umur").val( umur );
					var jk = $(this).data('jk');
					$(".modal-body #jk").val( jk );
					var alamat = $(this).data('alamat');
					$(".modal-body #alamat").val( alamat );
					var tlp = $(this).data('tlp');
					$(".modal-body #tlp").val( tlp );
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