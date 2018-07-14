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
          <a class="dropdown-item" href="<?php echo base_url('/c_user/viewProfile');?>"><i class="fa fa-user"></i> <?php echo $this->session->userdata('username');?></a>
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
                <a class="nav-link" href="<?php echo base_url('/c_statusPesanan/input');?>"><i class="fa fa-shopping-cart"></i> Kelola Status Pesanan</a>
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
foreach($mdata->result_array() as $row){
  $id     = $row['id'];
  $pesanan_id = $row['pesanan_id'];
    $no_spph = $row['no_spph'];
      $kepada_vendor = $row['kepada_vendor'];
  $nama_pengadaan = $row['nama_pengadaan'];

}
?> 
<main class="main">
   <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item"><a href="#">Logistik</a></li>
      <li class="breadcrumb-item active">Edit Template SPPH</li>
   </ol>
   <div class="container-fluid">
      <div class="card card-accent-success">
         <div class="card-header">
      <h3 class="panel-title pull-left">
       Edit Data
      </h3>
      <a href="<?php echo site_url('c_templateSPPH/viewTemplateSPPH');?>" class="btn btn-sm btn-success pull-right"><i class="fa fa-reply"></i> Kembali</a>
         </div>
         <ul class="nav navbar-right panel_toolbox">
         </ul>
         <div class="card-body">
      <form class="form-horizontal" method="post" action="<?php echo site_url('c_templateSPPH/update');?>">
        <div class="form-group">
        <label class="control-label col-sm-2" for="draft_id">PESANAN ID</label>
        <div class="col-sm-10">
          <select class="form-control" class="form-control" id="pesanan_id" name="pesanan_id" required>
          <?php
          foreach ($mdraft->result() as $row) {
            if($pesanan_id==$row->pesanan_id){
              echo'<option value="'.$row->pesanan_id.'" selected>'.$row->pesanan_id.' | '.$row->nama_pengadaan.'</option>';
            }else{
              echo'<option value="'.$row->pesanan_id.'">'.$row->pesanan_id.' | '.$row->nama_pengadaan.'</option>';
            }
            
          }
          ?>
          </select>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-2" for="nomor_spph">NO SURAT SPPH</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" id="no_spph" name="no_spph" value="<?php echo $no_spph;?>" placeholder="Input nomor surat" required>
          <input type="hidden" id="id" name="id" value="<?php echo $id;?>" readonly>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-2" for="nama_pengadaan">PERIHAL SURAT</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" id="nama_pengadaan" name="nama_pengadaan" value="<?php echo $nama_pengadaan;?>"  required>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-2" for="kepada_vendor">KEPADA</label>
        <div class="col-sm-10"> 
          <textarea class="form-control" rows="4" id="kepada_vendor" name="kepada_vendor" placeholder="Input Kepada" required><?php echo $kepada_vendor;?></textarea>
        </div>
        </div>
     <!--    <div class="form-group">
        <label class="control-label col-sm-2" for="tgl_surat">TANGGAL SURAT</label>
        <div class="col-sm-10"> 
          <input type="date" class="form-control" id="tgl_surat" name="tgl_surat" value="<?php echo $tgl_surat;?>" placeholder="Input tanggal surat" required>
        </div>
        </div> -->
        <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Ubah</button>
          
        </div>
        </div>
      </form>
            
         </div>
     
  
      </div>
   </div>
</main>
<script src="<?php echo base_url('asset/node_modules/jquery/dist/jquery.min.js');?>"></script>
<script src="<?php echo base_url('asset/ckeditor/ckeditor.js'); ?>"></script>
<script>
$(function (){
  CKEDITOR.replace( 'kepada_vendor');
});
</script>
</div>
</div>