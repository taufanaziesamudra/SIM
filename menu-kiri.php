<div id="sidebar" class="sidebar responsive ace-save-state">
  <script type="text/javascript">
    try{ace.settings.loadState('sidebar')}catch(e){}
  </script>
  <ul class="nav nav-list">
    <li class="">
      <a href="?halamane=beranda">
        <i class="menu-icon fa fa-home"></i>
        <span class="menu-text"> Dashboard </span>
      </a>
      <b class="arrow"></b>
    </li>
    <?php  if ($_SESSION['leveluser']=='admin'){ ?>
    <li class="">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-database"></i>
        <span class="menu-text"> Master </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>
      <b class="arrow"></b>
      <ul class="submenu">
        <?php 
        $master = [
          'user' => 'User',
          'mesin' => 'Mesin',
          'teknisi' => 'Teknisi',
          'divisi' => 'Divisi',
          'vendor' => 'Vendor',
          'sparepart' => 'Sparepart'
        ];
        foreach ($master as $key => $m) {
          ?>
          <li class="">
            <a href="?halamane=<?=$key?>">
              <i class="menu-icon fa fa-caret-right"></i> <?=$m?>
            </a>
            <b class="arrow"></b>
          </li>
          <?php 
        } 
        ?>
      </ul>
    </li>
    <?php  } ?>
    <?php  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='teknisi'){ ?>
    <li class="">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-book"></i>
        <span class="menu-text"> Transaksi </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>
      <b class="arrow"></b>
      <ul class="submenu">
        <li class="">
          <a href="?halamane=jadwal">
            <i class="menu-icon fa fa-caret-right"></i>
            Penjadwalan
          </a>
          <b class="arrow"></b>
        </li>
        <li class="">
          <a href="?halamane=perbaikan">
            <i class="menu-icon fa fa-caret-right"></i>
          Perbaikan</a>
          <b class="arrow"></b>
        </li>
      </ul>
    </li>
    <?php  } ?>
    <li class="">
      <a href="?halamane=perbaikan-approval&act=tambahperbaikan">
        <i class="menu-icon fa fa-list"></i>
        <span class="menu-text"> Permintaan Perbaikan</span>
      </a>
      <b class="arrow"></b>
    </li>
    <li class="">
      <a href="?halamane=perbaikan-approval">
        <i class="menu-icon fa fa-pencil-square-o"></i>
        <span class="menu-text"> Aproval Maintenance </span>
      </a>
      <b class="arrow"></b>
    </li>
    <?php  if ($_SESSION['leveluser']=='admin'){ ?>
    <li class="">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-bar-chart-o"></i>
        <span class="menu-text"> Laporan </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>
      <b class="arrow"></b>
      <ul class="submenu">
        <li class="">
          <a href="?halamane=report&id=perawatan">
            <i class="menu-icon fa fa-caret-right"></i>
            Laporan Penjadwalan
          </a>
          <b class="arrow"></b>
        </li>
        <li class="">
          <a href="?halamane=report&id=perbaikan">
            <i class="menu-icon fa fa-caret-right"></i>
            Laporan Perbaikan
          </a>
          <b class="arrow"></b>
        </li>
        <li class="">
          <a href="?halamane=riwayat">
            <i class="menu-icon fa fa-caret-right"></i>
            Kartu Riwayat Mesin
          </a>
          <b class="arrow"></b>
        </li>
      </ul>
    </li>
    <?php  } ?>
    <b class="arrow"></b>
    <!-- </li> -->
    <!-- </ul> -->
    <!-- </li> -->
  </ul><!-- /.nav-list -->

  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
  </div>
</div>