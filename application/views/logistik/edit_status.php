<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
    <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
    <span class="navbar-toggler-icon"></span>
    </button>
    <style type="text/css">
    body { font-family: sans-serif; }
    </style>
    <ul class="nav navbar-nav d-md-down-none">
      <li class="nav-item px-3">
        <a class="nav-link" href="<?php echo base_url('/c_user/homeLogistik');?>">Dashboard</a>
      </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          Selamat datang <?php echo $this->session->userdata('username');?>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>Account</strong>
          </div>
          <a class="dropdown-item" href="<?php echo base_url('/c_logistik/viewProfile');?>"><i class="fa fa-user"></i> <?php echo $this->session->userdata('username');?></a>
          <a class="dropdown-item" href="<?php echo base_url('c_user/keluar'); ?>"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
      </li>
    </ul>
  </header>
  <div class="app-body">
    <div class="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/c_user/homeLogistik');?>"><i class="icon-speedometer"></i>Logistik Dashboard </a>
          </li>
          <li class="nav-title">
            Menu
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/c_user/homeLogistik');?>"><i class="fa fa-home"></i> Home</a>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-file"></i>Dokumen</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-share"></i> Send Dokumen</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-download"></i> Receive Dokumen</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-pencil"></i>Kelola</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/c_user/kelola_user');?>"><i class="fa fa-user"></i> Kelola user</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/c_progress/viewProgress');?>"><i class="fa fa-tasks"></i> Kelola progress pengadaan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/c_pesanan/viewStatuslog');?>"><i class="fa fa-shopping-cart"></i> Kelola status pesanan</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/c_ulasan/viewUlasanlog');?>"><i class="fa fa-comment"></i>View Ulasan</a>
          </li>
          <li class="divider"></li>
        </ul>
      </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
    <!-- Main content -->
    
    
    <?php
    foreach($editpesanan->result_array() as $row){
    $pesanan_id = $row['pesanan_id'];
    $nama_customer    = $row['nama_customer'];
    $tgl_input   = $row['tgl_input'];
    $status2 = $row['status2'];
    $catatan = $row['catatan'];
    }
    ?>
    <main class="main">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Logistik</a></li>
        <li class="breadcrumb-item active">Edit Draft Permintaan</li>
      </ol>
      <div class="container-fluid">
        <div class="card card-accent-success">
          <div class="card-header">
            <h3 class="panel-title pull-left">
            Edit Data
            </h3>
            <a href="<?php echo site_url('c_pesanan/viewStatusLog');?>" class="btn btn-sm btn-success pull-right"><i class="fa fa-reply"></i> Kembali</a>
          </div>
          <ul class="nav navbar-right panel_toolbox">
          </ul>
          <div class="card-body">
            <form class="form-horizontal" method="post" action="<?php echo site_url('c_pesanan/updateStatus');?>">
           
                  <input type="text" class="form-control" id="pesanan_id" name="pesanan_id" value="<?php echo $pesanan_id;?>" hidden>
       
                  <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="<?php echo $nama_customer;?>" placeholder="Input Judul" hidden>
            
                  <input type="text" class="form-control" id="tgl_input" name="tgl_input" value="<?php echo $tgl_input;?>" placeholder="Input Judul" hidden>
         <!--     
              <div class="form-group ">
                <label class="control-label col-sm-2" for="status">Status </label>
                <div class="col-sm-10">
                  <select class="form-control select2"  required name="status" id="status" value="<?php echo $status;?>" required>
                    
                    <option> Waiting</option>
                    <option>Progress</option>
                    <option>Finish</option>
                  </select>
                </div>
              </div>
            </div> -->
  <input type="hidden" name="status3" id="status3" value="finish" />
            <div class="form-group">
              <label class="control-label col-sm-2" for="catatan">Catatan</label>
              <div class="col-sm-10">
                
                <textarea name="catatan" class="form-control"  rows="5" cols="50"> <?php echo $catatan ?></textarea>
              </div>
            </div>
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
              
            </div>
          </div>
        </form>
      </div>
    </div>
    
    
  </div>
</div>
</main>
</div>
