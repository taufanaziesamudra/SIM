<div class="row">
  <div class="col-xs-12">
    <div class="widget-box">
      <div class="widget-header">
        <h4 class="widget-title">Form Tambah Vendor</h4>
        <div class="widget-toolbar">
          <a href="#" data-action="collapse">
            <i class="ace-icon fa fa-chevron-up"></i>
          </a>
        </div>
      </div>
      <div class="widget-body">
        <div class="widget-main">
          <form method="POST" action="<?=$aksi?>?halamane=vendor&act=input">
            <div>
              <label>ID Vendor</label>
              <input type="text" name="id_vendor" class="form-control" placeholder="ID Vendor" required="required" value="<?=getKode('vendor', 'BSI-V')?>" readonly="yes">
            </div>
            <hr />
            <div>
              <label>Nama Vendor</label>
              <input type="text" name="nama_vendor" class="form-control" placeholder="Nama Vendor" required="required">
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
