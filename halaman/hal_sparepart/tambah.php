<div class="row">
  <div class="col-xs-12">
    <div class="widget-box">
      <div class="widget-header">
        <h4 class="widget-title">Form Tambah Sparepart</h4>
        <div class="widget-toolbar">
          <a href="#" data-action="collapse">
            <i class="ace-icon fa fa-chevron-up"></i>
          </a>
        </div>
      </div>
      <div class="widget-body">
        <div class="widget-main">
          <form method="POST" action="<?=$aksi?>?halamane=sparepart&act=input">
            <div>
              <label>ID Sparepart</label>
              <input type="text" name="id_sparepart" class="form-control" placeholder="ID Sparepart" required="required" value="<?=getKode('sparepart', 'BSI-SP')?>" readonly="yes">
            </div>
            <hr />
            <div>
              <label>Nama Sparepart</label>
              <input type="text" name="nama_sparepart" class="form-control" placeholder="Nama Sparepart" required="required">
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
  </div>
</div>
