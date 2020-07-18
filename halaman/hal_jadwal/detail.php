<?php $r = perawatan($_GET['id']) ?>
<div class="row">
  <div class="col-xs-12">    
    <a href="?halamane=jadwal">Kembali</a>
    <div class="table-header">
      Detail Penjadwalan
    </div>
    <div>
      <table class="table table-striped table-bordered table-hover">
        <tbody>
          <tr>
            <td>ID jadwal</td>
            <td><?=$r->id_jadwal?></td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td><?=$r->tgl?></td>
          </tr>
          <tr>
            <td>Nama Divisi</td>
            <td><?=$r->nama_divisi?></td>
          </tr>
          <tr>
            <td>Nama Mesin</td>
            <td><?=$r->nama_mesin?></td>
          </tr>
          <tr>
            <td>Point Check</td>
            <td><?=$r->point_chek?></td>
          </tr>
          <tr>
            <td>Tanggal Jadwal</td>
            <td><?=$r->tgl_jadwal?></td>
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
                    <li><a href="<?=$aksi?>?halamane=jadwal&act=updatestatus&id=<?=$r->id_jadwal?>&s=Waiting">Waiting</a></li>
                    <li><a href="<?=$aksi?>?halamane=jadwal&act=updatestatus&id=<?=$r->id_jadwal?>&s=Closed">Closed</a></li>
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
                    <li><a href="<?=$aksi?>?halamane=jadwal&act=updatestatus&id=<?=$r->id_jadwal?>&s=Open">Open</a></li>
                    <li><a href="<?=$aksi?>?halamane=jadwal&act=updatestatus&id=<?=$r->id_jadwal?>&s=Closed">Closed</a></li>
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
                <a class="green" href="?halamane=jadwal&act=editjadwal&id=<?=$r->id_jadwal?>">
                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                </a>
                <a class="red" href="<?=$aksi?>?halamane=jadwal&act=hapus&id=<?=$r->id_jadwal?>">
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
                      <a href="?halamane=jadwal&act=editjadwal&id=<?=$r->id_jadwal?>" class="tooltip-success" data-rel="tooltip" title="Edit">
                        <span class="green">
                          <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                        </span>
                      </a>
                    </li>
                    <li>
                      <a href="<?=$aksi?>?halamane=jadwal&act=hapus&id=<?=$r->id_jadwal?>" class="tooltip-error" data-rel="tooltip" title="Delete">
                        <span class="red">
                          <i class="ace-icon fa fa-trash-o bigger-120"></i>
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