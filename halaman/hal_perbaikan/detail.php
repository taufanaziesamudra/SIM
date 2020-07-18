<?php $r = perbaikan($_GET['id']) ?>
<div class="row">
  <div class="col-xs-12">    
    <a href="?halamane=perbaikan">Kembali</a>
    <div class="table-header">
      Detail Perbaikan
    </div>
    <div>
      <table class="table table-striped table-bordered table-hover">
        <tbody>
          <tr>
            <td>ID Perbaikan</td>
            <td><?=$r->id_perbaikan?></td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td><?=$r->tgl_buat?></td>
          </tr>
          <tr>
            <td>Nama user</td>
            <td><?=$r->nama_user?></td>
          </tr>
          <tr>
            <td>Nama Mesin</td>
            <td><?=$r->nama_mesin?></td>
          </tr>
          <tr>
            <td>Judul</td>
            <td><?=$r->judul?></td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td><?=$r->keterangan?></td>
          </tr>
          <tr>
            <td>Sparepart</td>
            <td><?=$r->nm_sparepart?></td>
          </tr>
          <tr>
            <td>Vendor</td>
            <td><?=$r->nm_vendor?></td>
          </tr>
          <tr>
            <td>Kuantiti</td>
            <td><?=$r->quantity?></td>
          </tr>
          <tr>
            <td>Waktu Mulai</td>
            <td><?=$r->time_start?></td>
          </tr>
          <tr>
            <td>Waktu Berakhir</td>
            <td><?=$r->time_finish?></td>
          </tr>
          <tr>
            <td>Status</td>
            <td>
              <?php
              if ($r->status=="Open"){ 
                ?>
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-xs btn-danger dropdown-toggle">
                    Open
                    <i class="ace-icon fa fa-angle-down icon-on-right"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-danger">
                    <li><a href="<?=$aksi?>?halamane=perbaikan&act=updatestatus&id=<?=$r->id_perbaikan?>&s=Waiting">Waiting</a></li>
                    <li><a href="<?=$aksi?>?halamane=perbaikan&act=updatestatus&id=<?=$r->id_perbaikan?>&s=Closed">Closed</a></li>
                  </ul>
                </div>
                <?php
              }elseif ($r->status=="Waiting"){ 
                ?>
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-xs btn-warning dropdown-toggle">
                    Waiting
                    <i class="ace-icon fa fa-angle-down icon-on-right"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-warning">
                    <li><a href="<?=$aksi?>?halamane=perbaikan&act=updatestatus&id=<?=$r->id_perbaikan?>&s=Open">Open</a></li>
                    <li><a href="<?=$aksi?>?halamane=perbaikan&act=updatestatus&id=<?=$r->id_perbaikan?>&s=Closed">Closed</a></li>
                  </ul>
                </div>
                <?php
              }elseif ($r->status=="Closed"){ 
                ?>
                <div class="label label-danger">Closed</div>
                <?php 
              }
              ?>
            </td>
          </tr>
          <tr>
            <td></td>
            <td>
              <div class="hidden-sm hidden-xs action-buttons">
                <a class="green" href="?halamane=perbaikan&act=editperbaikan&id=<?=$r->id_perbaikan?>">
                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                </a>
                <a class="red" href="<?=$aksi?>?halamane=perbaikan&act=hapus&id=<?=$r->id_perbaikan?>">
                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                </a>
              </div>
              <div class="hidden-md hidden-lg">
                <div class="inline pos-rel">
                  <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                    <li>
                      <a href="?halamane=perbaikan&act=editperbaikan&id=<?=$r->id_perbaikan?>" class="tooltip-success" data-rel="tooltip" title="Edit">
                        <span class="green">
                          <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                        </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>