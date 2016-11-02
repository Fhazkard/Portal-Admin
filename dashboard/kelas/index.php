<?php include "../header.php";?>     
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">          
                  <h2>Tabel Data Kelas</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <a href="#" class="btn btn-success btn-xs" style="padding:4px;" data-toggle="modal" data-target=".tambah"><i class="fa fa-plus-square" ></i> Tambah Kelas Baru</a>
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>                       
                        <th>Nama </th>
                        <th>Action</th>
                      </tr>
                    </thead>
					<tbody>
					<?php
						include '../../koneksi/konek.php';

						$selek_data = mysqli_query($koneksi, "SELECT * FROM KELAS");
						while($data = mysqli_fetch_array($selek_data)){
							?>                  
                      <tr class=" ">
                        <td class=" "><?php echo $data['nama']; ?></td>
                        <td class=" last">
							<a id="edit_link" href="#" class="btn btn-info btn-xs last" data-toggle="modal" data-target=".edit" 
							data-kelas_id="<?php echo $data['kelas_id']; ?>"
							data-nama="<?php echo $data['nama']; ?>"><i class="fa fa-pencil"></i> Edit</a>
							<form method="post" action="../../koneksi/delete.php" style="width:auto;float:right;">
								<input type="hidden" name="delete_id" value="<?php echo $data['kelas_id']; ?>">
								<input id="module" type="hidden" name="module" value="kelas">
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
                        <h4 class="modal-title" id="">Tambah Data Kelas</h4>
                      </div>
                      <div class="modal-body">
						<form method="POST" action="../../koneksi/tambah.php" class="form-horizontal form-label-left">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Nama Kelas:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input type="text" name="nama" class="form-control" placeholder="Masukan Nama Kelas" required autofocus>
							</div>						
						</div>
						<?php print CSRF::tokenInput(); ?>
                      </div>
						<div class="modal-footer">
						<input id="module" type="hidden" name="module" value="kelas"> 
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
                        <h4 class="modal-title" id="">Edit Data Kelas</h4>
                      </div>
                      <div class="modal-body">
						<form method="POST" action="../../koneksi/edit.php" class="form-horizontal form-label-left">
						<input id="kelas_id" type="hidden" name="kelas_id"> 
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Nama Kelas:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input id="nama" type="text" name="nama" class="form-control" placeholder="Masukan Nama Kelas" required autofocus>
							</div>						
						</div>
						<?php print CSRF::tokenInput(); ?>
                      </div>
						<div class="modal-footer">
						<input id="module" type="hidden" name="module" value="kelas"> 
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin:0px;">Keluar</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
						</div>
                      </form>
                    </div>
                  </div>
                </div>				
				<script>
				$(document).on("click", "#edit_link", function () {
					var kelas_id = $(this).data('kelas_id');
					$(".modal-body #kelas_id").val( kelas_id );
					var nama = $(this).data('nama');
					$(".modal-body #nama").val( nama );
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