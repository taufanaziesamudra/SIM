<div class="row">
  <div class="col-xs-12">    
    <div class="clearfix">
      <div class="pull-right tableTools-container"></div>
      <button class="btn btn-white btn-info btn-bold" onclick="window.location.href='?halamane=jadwal&act=tambahjadwal'">
        <i class="ace-icon glyphicon glyphicon-plus"></i>
      Tambah jadwal</button>
    </div>
    <br/>
    <div class="table-header">
      Tabel jadwal View
    </div>
    <div>
      <table id="dynamic-table1" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="center">No</th>
            <th>ID jadwal</th>
            <th>Tanggal</th>
            <th>Nama Divisi</th>
            <th>Nama Mesin</th>
            <th>Point Check</th>
            <th>Tanggal Jadwal</th>
            <th>Kuantiti</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach(perawatan() as $r){
            ?>
            <tr>
              <td class="center"><?=$no?></td>
              <td><?=$r->id_jadwal?></td>
              <td><?=$r->tgl?></td>
              <td><?=$r->nama_divisi?></td>
              <td><?=$r->nama_mesin?></td>
              <td><?=$r->point_chek?></td>
              <td><?=$r->tgl_jadwal?></td>
              <td><?=$r->quantity?></td>
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
              <td>
                <div class="hidden-sm hidden-xs action-buttons">
                  <a class="green" href="?halamane=jadwal&act=editjadwal&id=<?=$r->id_jadwal?>">
                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                  </a>
                  <a class="red" href="<?=$aksi?>?halamane=jadwal&act=hapus&id=<?=$r->id_jadwal?>">
                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                  </a>
                  <a class="blue" href="?halamane=jadwal&act=detail&id=<?=$r->id_jadwal?>">
                    <i class="ace-icon fa fa-eye bigger-130"></i>
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
                      <li>
                        <a href="?halamane=jadwal&act=detail&id=<?=$r->id_jadwal?>" class="tooltip-primary" data-rel="tooltip" title="Detail">
                          <span class="blue">
                            <i class="ace-icon fa fa-eye bigger-120"></i>
                          </span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </td>
            </tr>
            <?php
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>