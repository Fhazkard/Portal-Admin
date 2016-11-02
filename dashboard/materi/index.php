<?php include "../header.php";?>  
<?php include ("Save.php");?>

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
                <th>Kelas </th>
                <th>Judul </th>
                <th>Keterangan </th>
                <th>Tanggal</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
            <?php
                include '../../koneksi/konek.php';
                $selek_data = mysqli_query($koneksi, "SELECT * FROM materi");
                while($data = mysqli_fetch_array($selek_data)){
            ?>                  
              <tr class=" ">
                <td class=" "><?php echo $data['bimbel_id']; ?></td>
                <td class=" "><?php echo $data['kelas_id']; ?></td>
                <td class=" "><?php echo $data['judul']; ?></td>
                <td class=" "><?php echo $data['keterangan']; ?></td>
                <td class=" "><?php echo $data['date']; ?></td>
                <td class=" last">
                    <a id="edit_link" href="#" class="btn btn-info btn-xs last" data-toggle="modal" data-target=".edit" 
                    data-materi_di="<?php echo $data['materi_id'];?>"
                    data-bimbel_id="<?php echo $data['bimbel_id']; ?>"
                    data-kelas_id="<?php echo $data['kelas_id']; ?>"
                    data-judul="<?php echo $data['judul']; ?>"
                    data-keterangan="<?php echo $data['keterangan']; ?>"
                    data-file_location="<?php echo $data['file_location']; ?>"
                    data-date="<?php echo $data['date']; ?>"><i class="fa fa-pencil"></i> Edit</a>
                    <form method="post" action="../../koneksi/delete.php" style="width:auto;float:right;">
                        <input type="hidden" name="delete_id" value="<?php echo $data['sekolah_id']; ?>">
                        <input id="module" type="hidden" name="module" value="sekolah">
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
                  <h4 class="modal-title" id="">Upload Materi</h4>
                </div>
                <div class="modal-body">
                   <form method="POST" action="" class="form-horizontal form-label-left">
                    <input type="hidden" name="materi_di" id="materi_di"> 
                    <input type="hidden" name="date" id="date" />
                    <input type="hidden" name="file_location" id="file_location" />
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kelas Bimble <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="bimbel_id" id="bimbel_id" onchange="document.getElementById('KelasBimble_Name').value=this.options[this.selectedIndex].text">
                                <option value="0">None</option>
                                <option value="1">Bahasa Inggris</option>
                                <option value="2">Bahasa Indonesia</option>
                                <option value="3">Bahasa Mandarin</option>
                                <option value="4">Matematika</option>
                                <option value="5">Fisika</option>
                                <option value="6">Biologi</option>
                            </select>
                            <input type="hidden" name="KelasBimble_Name" id="KelasBimble_Name" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kelas <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="kelas_id" id="kelas_id" onchange="document.getElementById('Kelas_Name').value=this.options[this.selectedIndex].text">
                                <option value="0">None</option>
                                <option value="1">Kelas 1</option>
                                <option value="2">Kelas 2</option>
                                <option value="3">Kelas 3</option>
                                <option value="4">Kelas 4</option>
                                <option value="5">Kelas 5</option>
                                <option value="6">Kelas 6</option>
                            </select>
                            <input type="hidden" name="Kelas_Name" id="Kelas_Name" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Judul</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" name="judul" id="judul" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">File</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="file" name="data_upload" />
                          </div>
                    </div>
                    <?php print CSRF::tokenInput(); ?>
                </div>
                <div class="modal-footer">
                    <input id="module" type="hidden" name="module" value="sekolah"> 
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
                    <input type="hidden" name="materi_di" id="materi_di"> 
                    <input type="hidden" name="date" id="date" />
                    <input type="hidden" name="file_location" id="file_location" />
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kelas Bimble <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="bimbel_id" id="bimbel_id" onchange="document.getElementById('KelasBimble_Name').value=this.options[this.selectedIndex].text">
                                <option value="0">None</option>
                                <option value="1">Bahasa Inggris</option>
                                <option value="2">Bahasa Indonesia</option>
                                <option value="3">Bahasa Mandarin</option>
                                <option value="4">Matematika</option>
                                <option value="5">Fisika</option>
                                <option value="6">Biologi</option>
                            </select>
                            <input type="hidden" name="KelasBimble_Name" id="KelasBimble_Name" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kelas <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="kelas_id" id="kelas_id" onchange="document.getElementById('Kelas_Name').value=this.options[this.selectedIndex].text">
                                <option value="0">None</option>
                                <option value="1">Kelas 1</option>
                                <option value="2">Kelas 2</option>
                                <option value="3">Kelas 3</option>
                                <option value="4">Kelas 4</option>
                                <option value="5">Kelas 5</option>
                                <option value="6">Kelas 6</option>
                            </select>
                            <input type="hidden" name="Kelas_Name" id="Kelas_Name" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Judul</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" name="judul" id="judul" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">File</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="file" name="data_upload" />
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
            var materi_di = $(this).data('materi_di');
            $(".modal-body #materi_di").val( materi_di );
            var bimbel_id = $(this).data('bimbel_id');
            $(".modal-body #bimbel_id").val( bimbel_id );
            var kelas_id = $(this).data('kelas_id');
            $(".modal-body #kelas_id").val( kelas_id );
            var judul = $(this).data('judul');
            $(".modal-body #judul").val( judul );
            var keterangan = $(this).data('keterangan');
            $(".modal-body #keterangan").text( keterangan );
            var date = $(this).data('date');
            $(".modal-body #date").val( date );
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