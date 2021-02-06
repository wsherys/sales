<html>
    <head>
    <?php $serv=$_SERVER['REQUEST_URI']; $sturl='/sales/index.php/';?>
    </head>
    <body>
    
    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>User Tester</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class=" nav-item">
          <a href="<?= base_url();?>">
            <i class="fa fa-dashboard"></i> 
            <span>Dashboard</span>
          </a>
        </li>
        
        
        <li class="header">MASTER DATA </li>
          
          <?php if($serv === $sturl.'CtrlBisnis'||
          $sturl.'CtrlMerek'||
          $sturl.'CtrlProduk'||
          $sturl.'CtrlCOA'||
          $sturl.'CtrlPartner'||
          $sturl.'CtrUnit'||
          $sturl.'CtrlGudang'||
          $sturl.'CtrlBank'||
          $sturl.'CtrlBankCabang'||
          $sturl.'CtrlPenjualan'||
          $sturl.'CtrlPengiriman'
          ){ ?>
            <li class="treeview active">
          <?php }else{ ?>
            <li class="treeview">
          <?php } ?>
       
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Master</span>
            <!-- <small class="label pull-right bg-green">new</small> -->
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
              <?php foreach($menu as $m){ ?>
                  <?php if($m->menu === "master"){ ?>
                      <li class="nav-item ">
                        <a href="<?= site_url();?>/<?= $m->locate_url; ?>" class="nav-link">
                          <i class="<?= $m->icon_name; ?>"></i>
                          <?= $m->name; ?>
                        </a>
                      </li>
                  <?php } ?>
              <?php } ?>
          </ul>
        </li>

        <li class="header">PRODUK</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Produk</span>
            <!-- <small class="label pull-right bg-green">new</small> -->
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <?php foreach($menu as $m){ ?>
                  <?php if($m->menu === "produk"){ ?>
                      <li class="nav-item">
                        <a href="<?= site_url();?>/<?= $m->locate_url; ?>" class="nav-link">
                          <i class="<?= $m->icon_name; ?>"></i>
                          <?= $m->name; ?>
                        </a>
                      </li>
                  <?php } ?>
              <?php } ?>
          </ul>
        </li>

        <li class="header">CASH ON ACCOUNT</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>C.O.A</span>
            <!-- <small class="label pull-right bg-green">new</small> -->
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <?php foreach($menu as $m){ ?>
                  <?php if($m->menu === "cash on account"){ ?>
                      <li class="nav-item">
                        <a href="<?= site_url();?>/<?= $m->locate_url; ?>" class="nav-link">
                          <i class="<?= $m->icon_name; ?>"></i>
                          <?= $m->name; ?>
                        </a>
                      </li>
                  <?php } ?>
              <?php } ?>
          </ul>
        </li>

        <li class="header">PENJUALAN</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Penjualan</span>
            <!-- <small class="label pull-right bg-green">new</small> -->
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <?php foreach($menu as $m){ ?>
                  <?php if($m->menu === "penjualan"){ ?>
                      <li class="nav-item">
                        <a href="<?= site_url();?>/<?= $m->locate_url; ?>" class="nav-link">
                          <i class="<?= $m->icon_name; ?>"></i>
                          <?= $m->name; ?>
                        </a>
                      </li>
                  <?php } ?>
              <?php } ?>
          </ul>
        </li>

        <li class="header">LAPORAN</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Laporan</span>
            <!-- <small class="label pull-right bg-green">new</small> -->
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <?php foreach($menu as $m){ ?>
                  <?php if($m->menu === "laporan"){ ?>
                      <li class="nav-item">
                        <a href="<?= site_url();?>/<?= $m->locate_url; ?>" class="nav-link">
                          <i class="<?= $m->icon_name; ?>"></i>
                          <?= $m->name; ?>
                        </a>
                      </li>
                  <?php } ?>
              <?php } ?>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
    </aside>

    </body>
</html>