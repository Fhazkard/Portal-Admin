<?php include "../header.php";?>  
<?php include ("Save.php");?>
<?php include ("Edit.php");?>
<?php include ("Delete.php");?>
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
                <th>Bimbel </th>
                <th>Sekolah </th>
                <th>Kelas </th>
                <th>Judul </th>
                <th>Keterangan </th>
                <th>Tanggal</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
            <?php
                $query = "SELECT m.materi_id, m.bimbel_id, m.kelas_id, m.sekolah_id, m.judul, "
                        . "m.keterangan,m.date, m.file_location, k.nama as nama_kelas, "
                        . "s.nama as nama_sekolah, b.nama as bimbel_nama "
                        . "FROM materi m "
                        . "INNER JOIN kelas k on k.kelas_id = m.kelas_id "
                        . "INNER JOIN sekolah s on s.sekolah_id = m.sekolah_id "
                        . "INNER JOIN bimbel b on b.bimbel_id = m.bimbel_id";
                $selek_data = mysqli_query($koneksi, $query);
                while($data = mysqli_fetch_array($selek_data)){
            ?>                  
              <tr class=" ">
                <td class=" "><?php echo $data['bimbel_nama']; ?></td>
                <td class=" "><?php echo $data['nama_sekolah']; ?></td>
                <td class=" "><?php echo $data['nama_kelas']; ?></td>
                <td class=" "><?php echo $data['judul']; ?></td>
                <td class=" "><?php echo $data['keterangan']; ?></td>
                <td class=" "><?php echo $data['date']; ?></td>
                <td class=" last">
                    <a id="edit_link" href="#" class="btn btn-info btn-xs last" data-toggle="modal" data-target=".edit" 
                    data-materi_id="<?php echo $data['materi_id'];?>"
                    data-sekolah_id="<?php echo $data['sekolah_id'];?>"
                    data-sekolah_name="<?php echo $data['nama_sekolah'];?>"
                    data-bimbel_id="<?php echo $data['bimbel_id']; ?>"
                    data-bimbel_name="<?php echo $data['bimbel_nama'] ?>"
                    data-kelas_id="<?php echo $data['kelas_id']; ?>"
                    data-kelas_name="<?php echo $data['nama_kelas']; ?>"
                    data-judul="<?php echo $data['judul']; ?>"
                    data-keterangan="<?php echo $data['keterangan']; ?>"
                    data-file_location="<?php echo $data['file_location']; ?>"
                    data-date="<?php echo $data['date']; ?>"><i class="fa fa-pencil"></i> Edit</a>
                    
                    <a id="delete_link" href="#" class="btn btn-danger btn-xs last" data-toggle="modal" data-target=".delete"
                        data-materi_id="<?php echo $data['materi_id'];?>"
                        data-sekolah_name="<?php echo $data['nama_sekolah'];?>"
                        data-bimbel_name="<?php echo $data['bimbel_nama'] ?>"
                        data-kelas_name="<?php echo $data['nama_kelas']; ?>"
                        data-judul="<?php echo $data['judul']; ?>"
                        data-file_location="<?php echo $data['file_location']; ?>">
                        <i class="fa fa-trash-o"></i> Delete </a>
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
                  <h4 class="modal-title" id="">Upload Materi</h4>
                </div>
                <div class="modal-body">
                   <form method="POST" action="" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kelas Bimble <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="bimbel_id" id="bimbel_id" onchange="document.getElementById('KelasBimble_Name').value=this.options[this.selectedIndex].text">
                                <option value="0">None</option>
                                <?php 
                                    $query = "SELECT * FROM bimbel";
                                        $selek_data = mysqli_query($koneksi, $query);
                                        while($data = mysqli_fetch_array($selek_data)){
                                            echo "<option value='".$data['bimbel_id']."'>".$data['nama']."</option>";
                                        }
                                ?>
                            </select>
                            <input type="hidden" name="KelasBimble_Name" id="KelasBimble_Name" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sekolah <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="sekolah_id" id="sekolah_id" onchange="document.getElementById('Sekolah_Name').value=this.options[this.selectedIndex].text">
                                <option value="0">None</option>
                                <?php 
                                    $query = "SELECT * FROM sekolah";
                                        $selek_data = mysqli_query($koneksi, $query);
                                        while($data = mysqli_fetch_array($selek_data)){
                                            echo "<option value='".$data['sekolah_id']."'>".$data['nama']."</option>";
                                        }
                                ?>
                            </select>
                            <input type="hidden" name="Sekolah_Name" id="Sekolah_Name" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kelas <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="kelas_id" id="kelas_id" onchange="document.getElementById('Kelas_Name').value=this.options[this.selectedIndex].text">
                                <option value="0">None</option>
                                <?php 
                                    $query = "SELECT * FROM kelas";
                                        $selek_data = mysqli_query($koneksi, $query);
                                        while($data = mysqli_fetch_array($selek_data)){
                                            echo "<option value='".$data['kelas_id']."'>".$data['nama']."</option>";
                                        }
                                ?>
                            </select>
                            <input type="hidden" name="Kelas_Name" id="Kelas_Name" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Judul</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" name="judul" id="judul" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">File</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                              <input type="file" name="data_upload" />
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
                    <form method="POST" action="" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    <input type="hidden" name="materi_id" id="materi_id"> 
                    <input type="hidden" name="date" id="date" />
                    <input type="hidden" name="file_location" id="file_location" />
                    <input type="hidden" name="bimbel_id" id="bimbel_id" />
                    <input type="hidden" name="sekolah_id" id="sekolah_id" />
                    <input type="hidden" name="kelas_id" id="kelas_id" />
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kelas Bimble <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" name="bimbel_name" id="bimbel_name" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sekolah <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control col-md-9 col-xs-12" name="sekolah_name" id="sekolah_name" readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kelas <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control col-md-9 col-xs-12" name="kelas_name" id="kelas_name" readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Judul</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control col-md-9 col-xs-12" type="text" name="judul" id="judul" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">File</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                              <input type="file" name="data_upload" />
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
        
        <!--Modal Dialog Edit Materi-->
        <div class="modal fade delete" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span>
                    </button>
                    <h4 class="modal-title" id="">Hapus Materi</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" class="form-horizontal form-label-left">
                        <input type="hidden" name="materi_id" id="materi_id"> 
                        <input type="hidden" name="file_location" id="file_location" />
                        <div class="alert alert-danger" role="alert">
                            <p>
                                Apakah akan menghapus materi <label id="bimbel_label"></label> untuk sekolah <label id="sekolah_label"></label> kelas <label id="kelas_label"></label>
                                dengan judul <label id="judul_label"></label>
                            </p>
                        </div>
                        <?php print CSRF::tokenInput(); ?>
                </div>
                <div class="modal-footer">
                    <input id="module" type="hidden" name="module" value="materi"> 
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="margin:0px;">Keluar</button>
                    <button type="submit" class="btn btn-success" name="Hapus">Hapus</button>
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
            var bimbel_name = $(this).data('bimbel_name');
            $(".modal-body #bimbel_name").val( bimbel_name );
            
            var sekolah_id = $(this).data('sekolah_id');
            $(".modal-body #sekolah_id").val( sekolah_id );
            var sekolah_name = $(this).data('sekolah_name');
            $(".modal-body #sekolah_name").val( sekolah_name );
            
            var kelas_id = $(this).data('kelas_id');
            $(".modal-body #kelas_id").val( kelas_id );
            var kalas_name = $(this).data('kelas_name');
            $(".modal-body #kelas_name").val( kalas_name );
            
            var judul = $(this).data('judul');
            $(".modal-body #judul").val( judul );
            var keterangan = $(this).data('keterangan');
            $(".modal-body #keterangan").text( keterangan );
            var date = $(this).data('date');
            $(".modal-body #date").val( date );
            var file_location = $(this).data('file_location');
            $(".modal-body #file_location").val( file_location );
        });
        
        $(document).on("click", "#delete_link", function () {
            var materi_id = $(this).data('materi_id');
            $(".modal-body #materi_id").val( materi_id );
            
            var bimbel_name = $(this).data('bimbel_name');
            $(".modal-body #bimbel_label").text( bimbel_name );
            
            var sekolah_name = $(this).data('sekolah_name');
            $(".modal-body #sekolah_label").text( sekolah_name );
            
            var kalas_name = $(this).data('kelas_name');
            $(".modal-body #kelas_label").text( kalas_name );
            
            var judul = $(this).data('judul');
            $(".modal-body #judul_label").text( judul );
            
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