<?php include "../header.php";?>     
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <div class="x_title">          
                  <h2>Tabel Data Murid</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <a href="#" class="btn btn-success btn-xs" style="padding:4px;" data-toggle="modal" data-target=".tambah"><i class="fa fa-plus-square" ></i> Tambah Murid Baru</a>
                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>                       
                        <th>Nama</th>
                        <th>Bimbel</th>
                        <th>Kelas</th>
                        <th>Sekolah</th>
						<th>TTL</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Orang Tua</th>
						<th>Telepon</th>
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
                        <td class=" "><?php echo $data['bimbel']; ?></td>
						<td class=" "><?php echo $data['kelas']; ?></td>
						<td class=" "><?php echo $data['sekolah']; ?></td>
						<td class=" "><?php echo $data['tgl_lahir']; ?></td>
						<td class=" "><?php echo $data['jk']; ?></td>
                        <td class=" "><?php echo $data['alamat']; ?></td>
						<td class=" "><?php echo $data['nama_ortu']; ?></td>
                        <td class="a-right a-right "><?php echo $data['tlp']; ?></td>
                        <td class=" last">
							<a id="edit_link" href="#" class="btn btn-info btn-xs last" data-toggle="modal" data-target=".edit" 
							data-murid_id="<?php echo $data['murid_id']; ?>"
							data-nama="<?php echo $data['nama']; ?>"
							data-bimbel_id="<?php echo $data['bimbel_id']; ?>"
							data-kelas_id="<?php echo $data['kelas_id']; ?>"
							data-sekolah_id="<?php echo $data['sekolah_id']; ?>"
							data-tgl_lahir="<?php echo $data['tgl_lahir']; ?>"
							data-jk="<?php echo $data['jk']; ?>"
							data-ortu="<?php echo $data['nama_ortu']; ?>"
							data-alamat="<?php echo $data['alamat']; ?>"
							data-tlp="<?php echo $data['tlp']; ?>"><i class="fa fa-pencil"></i> Edit</a>
							<form method="post" action="../../koneksi/delete.php" style="width:auto;float:right;">
								<input type="hidden" name="delete_id" value="<?php echo $data['murid_id']; ?>">
								<input id="module" type="hidden" name="module" value="murid">
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
                        <h4 class="modal-title" id="">Tambah Data Murid</h4>
                      </div>
                      <div class="modal-body">
						<form method="POST" action="../../koneksi/tambah.php" class="form-horizontal form-label-left">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Nama Murid:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input type="text" name="nama" class="form-control" placeholder="Masukan Nama Murid" required autofocus>
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
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Tanggal Lahir:</label>
							<div class="col-md-5 col-sm-5 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input type="date" name="tgl_lahir" class="form-control" placeholder="Masukan Tanggal Lahir" required>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Jenis Kelamin:</label>
							<div class="col-md-5 col-sm-5 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<select name="jk" class="form-control">
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Nama Orang Tua:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input type="text" name="ortu" class="form-control" placeholder="Masukan Nama Orang Tua" required>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Alamat Murid:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<textarea  name="alamat" class="form-control" rows="3" style="max-width:426px;max-height:150px;" required></textarea>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Telepon Murid:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input  type="text" name="tlp" class="form-control" placeholder="Masukan Telepon Murid" required>
							</div>						
						</div>
						<?php print CSRF::tokenInput(); ?>
                      </div>
						<div class="modal-footer">
						<input id="module" type="hidden" name="module" value="murid"> 
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
                        <h4 class="modal-title" id="">Edit Data Murid</h4>
                      </div>
                      <div class="modal-body">
						<form method="POST" action="../../koneksi/edit.php" class="form-horizontal form-label-left">
						<input id="murid_id" type="hidden" name="murid_id"> 
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Nama Murid:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input id="nama" type="text" name="nama" class="form-control" placeholder="Masukan Nama Murid" required autofocus>
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
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Tanggal Lahir:</label>
							<div class="col-md-5 col-sm-5 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input id="tgl_lahir" type="date" name="tgl_lahir" class="form-control" placeholder="Masukan Tanggal Lahir" required>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Jenis Kelamin:</label>
							<div class="col-md-5 col-sm-5 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<select id="jk" name="jk" class="form-control">
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Nama Orang Tua:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input id="ortu" type="text" name="ortu" class="form-control" placeholder="Masukan Nama Orang Tua" required>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Alamat Murid:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<textarea id="alamat" name="alamat" class="form-control" rows="3" style="max-width:426px;max-height:150px;" required></textarea>
							</div>						
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-left:0px;padding-right:0px;text-align:left;">Telepon Murid:</label>
							<div class="col-md-9 col-sm-9 col-xs-12"  style="padding-left:0px;padding-right:0px;">
							<input id="tlp" type="text" name="tlp" class="form-control" placeholder="Masukan Telepon Murid" required>
							</div>						
						</div>
						<?php print CSRF::tokenInput(); ?>
                      </div>
						<div class="modal-footer">
						<input id="module" type="hidden" name="module" value="murid"> 
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="margin:0px;">Keluar</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
						</div>
                      </form>
                    </div>
                  </div>
                </div>				
				<script>
				$(document).on("click", "#edit_link", function () {
					var murid_id = $(this).data('murid_id');
					$(".modal-body #murid_id").val( murid_id );
					var nama = $(this).data('nama');
					$(".modal-body #nama").val( nama );
					var bimbel_id = $(this).data('bimbel_id');
					$(".modal-body #bimbel_id").val( bimbel_id );
					var kelas_id = $(this).data('kelas_id');
					$(".modal-body #kelas_id").val( kelas_id );
					var sekolah_id = $(this).data('sekolah_id');
					$(".modal-body #sekolah_id").val( sekolah_id );
					var tgl_lahir = $(this).data('tgl_lahir');
					$(".modal-body #tgl_lahir").val( tgl_lahir );
					var jk = $(this).data('jk');
					$(".modal-body #jk").val( jk );
					var ortu = $(this).data('ortu');
					$(".modal-body #ortu").val( ortu );
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