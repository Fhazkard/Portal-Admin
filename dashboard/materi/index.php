<link href="../../content/css/bootstrap.min.css" rel="stylesheet">
<link href="../../content/css/font-awesome.min.css" rel="stylesheet">
<link href="../../content/css/animate.min.css" rel="stylesheet">
<!-- Custom styling plus plugins -->
<link href="../../content/css/custom.css" rel="stylesheet">
<link href="../../content/css/site.css" rel="stylesheet">
<link href="../../content/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<script src="../../content/js/jquery.min.js"></script>
<script src="../../content/js/nprogress.js"></script>
<script src="../../content/js/moment.min.js"></script>
<script src="../../content/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../content/js/bootstrap-datetimepicker.min.js"></script>
<script src="../../content/js/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="../../content/js/custom.js"></script>
<?php include "../../header.php";?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Upload File <small>(untuk mengupload materi pelajaran)</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br>
          <form method="POST" action="Save.php" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Kelas Bimble <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="KelasBimble">
                    <option value="None">Choose option</option>
                    <option value="1">Bahasa Indonesia</option>
                    <option value="2">Bahasa Ingris</option>
                    <option value="3">Bahasa Mandarin</option>
                    <option value="4">Option one</option>
                    <option value="5">Option two</option>
                  </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Kelas <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="Kelas">
                    <option value="None">Choose option</option>
                    <option value="1">Option one</option>
                    <option value="2">Option two</option>
                    <option value="3">Option three</option>
                    <option value="4">Option four</option>
                    <option value="5">Option one</option>
                    <option value="6">Option two</option>
                  </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Tanggal <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="input-group date" id="datetimepicker1">
                    <input type='text' class="form-control" name="Date" />
                    <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Judul <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="last-name" name="Judul" required="required" class="form-control col-md-7 col-xs-12" data-parsley-id="5583"><ul class="parsley-errors-list" id="parsley-id-5583"></ul>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ext">Keterangan
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea class="resizable_textarea form-control" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 74px;" data-autosize-on="true" name="Keterangan"></textarea>
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ext">File
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="file">
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Cancel</button>
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
</div>
<?php include "../../footer.php";?>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
                format: 'DD-MM-YYYY'
            });
    });
</script>
