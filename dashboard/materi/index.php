<?php 
include ("../header.php");
include ("Save.php");
?>     
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Upload File <small>(untuk upload materi bimbel)</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form method="POST" action="" enctype="multipart/form-data" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kelas Bimble <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="KelasBimble" onchange="document.getElementById('KelasBimble_Name').value=this.options[this.selectedIndex].text">
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
                          <select class="form-control" name="Kelas" onchange="document.getElementById('Kelas_Name').value=this.options[this.selectedIndex].text">
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
                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="Judul" data-parsley-id="6816"><ul class="parsley-errors-list" id="parsley-id-6816"></ul>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" name="Keterangan"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="data_upload" />
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="reset" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success" name="Save">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
<?php include "../footer.php";?>
