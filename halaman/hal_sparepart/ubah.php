<?php $r = spareparts($_GET["id"]) ?>
<div class="row">
  <div class="col-xs-12">
    <div class="widget-box">
      <div class="widget-header">
        <h4 class="widget-title">Form Ubah Sparepart</h4>
        <div class="widget-toolbar">
          <a href="#" data-action="collapse">
            <i class="ace-icon fa fa-chevron-up"></i>
          </a>
        </div>
      </div>
      <div class="widget-body">
        <div class="widget-main">
          <form method="POST" action="<?=$aksi?>?halamane=sparepart&act=update">
            <div>
              <label for="form-field-8">ID Sparepart</label>
              <input type="text" name="id_sparepart" class="form-control" placeholder="ID Sparepart" required="required" value="<?=$r->id_sparepart?>" readonly="yes">
            </div>
            <hr />
            <div>
              <label for="form-field-8">Nama Sparepart</label>
              <input type="text" name="nama_sparepart" class="form-control" placeholder="Nama Sparepart" required="required" value="<?=$r->nm_sparepart?>">
            </div>
            <hr />
            <div class="clearfix form-actions">
              <div class="col-md-offset-3 col-md-9">
                <button class="btn btn-info" type="submit">
                  <i class="ace-icon fa fa-check bigger-110"></i>
                  Submit
                </button>
                &nbsp; &nbsp; &nbsp;
                <button class="btn" type="reset" onclick="self.history.back()">
                  <i class="ace-icon fa fa-undo bigger-110"></i>
                  Reset
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div><!-- /.span -->
</div>