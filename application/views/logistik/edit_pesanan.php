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
            <a class="nav-link" href=" <?php echo base_url('/c_user/homeLogistik');?> "><i class="fa fa-home"></i> Home</a>
          </li>
           <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/c_pesanan/viewPesanan');?>"><i class="fa fa-shopping-cart"></i> Pesanan </a>
              </li>
             <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-pencil"></i>Kelola Surat</a>
            <ul class="nav-dropdown-items">
             <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/c_templateSPPH/viewTemplateSPPH');?>"><i class="fa fa-file-text-o"></i>SPPH</a>
          </li>
               <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/c_templateSPH/viewTemplateSPH');?>"><i class="fa fa-file-text-o"></i>SPH</a>
          </li>
          </li>
               <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/c_templateSPK/viewTemplateSPK');?>"><i class="fa fa-file-text-o"></i>SPK</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/c_templateBAST/viewTemplateBAST');?>"><i class="fa fa-file-text-o"></i>BAST</a>
          </li>
              </ul>            
           <li class="nav-item nav-dropdown"> 
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-file"></i>Dokumen</a>          
            <ul class="nav-dropdown-items">   
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/c_suratKeluar/viewSuratKeluarLogistik');?>"><i class="fa fa-share"></i> Surat Keluar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href=" <?php echo base_url('/c_suratMasuk/surat_masukLogistik/');?>" > <i class="fa fa-inbox"></i> Surat Masuk</a>
              </li>
          
            </ul>
          </li>   
          </li>

          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-pencil"></i>Kelola</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/c_user/kelola_user');?>"><i class="fa fa-user"></i> Kelola user</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/c_progress/viewProgress');?>"><i class="fa fa-tasks"></i> Kelola Progress Pengadaan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/c_pesanan/viewStatuslog');?>"><i class="fa fa-shopping-cart"></i> Kelola status pesanan</a>
              </li
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
  $nama_pengadaan    = $row['nama_pengadaan'];
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
      <a href="<?php echo site_url('c_pesanan/viewPesanan');?>" class="btn btn-sm btn-success pull-right"><i class="fa fa-reply"></i> Kembali</a>
         </div>
         <ul class="nav navbar-right panel_toolbox">
         </ul>
         <div class="card-body">
      <form class="form-horizontal" method="post" action="<?php echo site_url('c_pesanan/edit');?>">
        <div class="form-group">
        <label class="control-label col-sm-2" for="pesanan_id">PESANAN ID</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="pesanan_id" name="pesanan_id" value="<?php echo $pesanan_id;?>" readonly>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-2" for="nama_pengadaan">NAMA PENGADAAN</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" id="nama_pengadaan" name="nama_pengadaan" value="<?php echo $nama_pengadaan;?>" placeholder="Input Judul" required>
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
</main>
</div>