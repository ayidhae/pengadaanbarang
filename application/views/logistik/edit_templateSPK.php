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
          <a class="dropdown-item" href="<?php echo base_url('cuser/keluar'); ?>"><i class="fa fa-sign-out"></i> Logout</a>
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
  $id         =$row['id'];
  $nomor_spk    =$row['nomor_spk'];
  $pesanan_id     =$row['pesanan_id'];
  $nama_pengadaan  =$row["nama_pengadaan"];
  $tgl_negoisasi_spk    =$row["tgl_negoisasi_spk"];
  $lokasi_pengadaan =$row["lokasi_pengadaan"];
  $jangka_waktu   =$row["jangka_waktu"];
  $nama_vendor    =$row["nama_vendor"];
  $nama_pihak_vendor  =$row["nama_pihak_vendor"];
  $jabatan_pihak_vendor=$row["jabatan_pihak_vendor"];
  $alamat_pihak_vendor=$row["alamat_pihak_vendor"];
  $hp_pihak_vendor  =$row["hp_pihak_vendor"];
  $fax_pihak_vendor =$row["fax_pihak_vendor"];
  $no_rekening_vendor =$row["no_rekening_vendor"];
  $nama_rekening_vendor=$row["nama_rekening_vendor"];
  $bank_rekening_vendor=$row["bank_rekening_vendor"];
  $tgl_spk      =$row["tgl_spk"];
}
?>

  <?php
foreach($mdraft->result_array() as $row){
 
  $nama_pengadaan  = $row['nama_pengadaan'];
  
}
?>

<main class="main">
   <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item"><a href="#">Logistik</a></li>
      <li class="breadcrumb-item active">Edit Template SPK</li>
   </ol>
   <div class="container-fluid">
      <div class="card card-accent-success">
         <div class="card-header">
      <h3 class="panel-title pull-left">
       Edit Data
      </h3>
      <a href="<?php echo site_url('c_templateSPK/viewTemplateSPK');?>" class="btn btn-sm btn-success pull-right"><i class="fa fa-reply"></i> Kembali</a>
         </div>
         <ul class="nav navbar-right panel_toolbox">
         </ul>
         <div class="card-body">
      <form class="form-horizontal" method="post" action="<?php echo site_url('c_templateSPK/edit');?>">
        <div class="form-group">
        <label class="control-label col-sm-10" for="nomor_spk">NO SURAT</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" id="nomor_spk" name="nomor_spk" value="<?php echo $nomor_spk;?>" placeholder="Input no surat" required>
          <input type="hidden" id="id" name="id" value="<?php echo $id;?>" readonly>
        </div>
        </div>
        <input type="hidden" class="form-control" id="pesanan_id" name="pesanan_id" value="<?php echo $pesanan_id;?>" placeholder="Input nomor surat" readonly>
        
        <input type="hidden" class="form-control" id="nama_pengadaan" name="nama_pengadaan" value="<?php echo $nama_pengadaan;?>" placeholder="Input nomor surat" readonly>
        <div class="form-group">
        <label class="control-label col-sm-10" for="tgl_negoisasi_spk">TANGGAL NEGOISASI</label>
        <div class="col-sm-10"> 
          <input type="date" class="form-control" id="tgl_negoisasi_spk" name="tgl_negoisasi_spk" value="<?php echo $tgl_negoisasi_spk;?>" placeholder="Input tgl negoisasi" required>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-10" for="lokasi_pengadaan">LOKASI PENGADAAN</label>
        <div class="col-sm-10"> 
          <textarea class="form-control" rows="4" id="lokasi_pengadaan" name="lokasi_pengadaan" placeholder="Input lokasi pengadaan" required><?php echo $lokasi_pengadaan;?></textarea>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-10" for="jangka_waktu">JANGKA WAKTU</label>
        <div class="col-sm-10"> 
          <input type="number" class="form-control" id="jangka_waktu" name="jangka_waktu" value="<?php echo $jangka_waktu;?>" placeholder="Input jangka waktu (hari)" required>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-10" for="nama_vendor">NAMA VENDOR</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" id="nama_vendor" name="nama_vendor" value="<?php echo $nama_vendor;?>" placeholder="Input nama vendor" required>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-10" for="nama_pihak_vendor">NAMA PERWAKILAN VENDOR</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" id="nama_pihak_vendor" name="nama_pihak_vendor" value="<?php echo $nama_pihak_vendor;?>" placeholder="Input nama perwakilan vendor" required>
        </div>
        </div>
         <div class="form-group">
        <label class="control-label col-sm-10" for="jabatan_pihak_vendor">JABATAN PERWAKILAN VENDOR</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" id="jabatan_pihak_vendor" name="jabatan_pihak_vendor" value="<?php echo $jabatan_pihak_vendor;?>" placeholder="Input jabatan perwakilan vendor" required>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-10" for="alamat_pihak_vendor">ALAMAT PERWAKILAN VENDOR</label>
        <div class="col-sm-10"> 
          <textarea class="form-control" rows="4" id="alamat_pihak_vendor" name="alamat_pihak_vendor" placeholder="Input alamat perwakilan vendor" required><?php echo $alamat_pihak_vendor;?></textarea>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-10" for="hp_pihak_vendor">HP PERWAKILAN VENDOR</label>
        <div class="col-sm-10"> 
          <input type="number" class="form-control" id="hp_pihak_vendor" name="hp_pihak_vendor" value="<?php echo $hp_pihak_vendor;?>" placeholder="Input hp perwakilan vendor" required>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-10" for="fax_pihak_vendor">FAX PERWAKILAN VENDOR</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" id="fax_pihak_vendor" name="fax_pihak_vendor" value="<?php echo $fax_pihak_vendor;?>" placeholder="Input fax perwakilan vendor" required>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-10" for="no_rekening_vendor">NOMOR REKENING VENDOR</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" id="no_rekening_vendor" name="no_rekening_vendor" value="<?php echo $no_rekening_vendor;?>" placeholder="Input nomor rekening vendor" required>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-10" for="nama_rekening_vendor">REKENING VENDOR ATAS NAMA</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" id="nama_rekening_vendor" name="nama_rekening_vendor" value="<?php echo $nama_rekening_vendor;?>" placeholder="Input atas nama rekening vendor" required>
        </div>
        </div>
        <div class="form-group">
        <label class="control-label col-sm-10" for="bank_rekening_vendor">REKENING VENDOR BANK</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" id="bank_rekening_vendor" name="bank_rekening_vendor" value="<?php echo $bank_rekening_vendor;?>" placeholder="Input bank yang digunakan vendor" required>
        </div>
        </div>
        <!-- <div class="form-group">
        <label class="control-label col-sm-10" for="tgl_spk">TANGGAL SURAT</label>
        <div class="col-sm-10"> 
          <input type="date" class="form-control" id="tgl_spk" name="tgl_spk" value="<?php echo $tgl_spk;?>" placeholder="Input tgl surat" required>
        </div>
        </div> -->
        <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Ubah</button>
      <!--     <button type="reset" class="btn btn-warning"><i class="fa fa-ban"></i> Reset</button> -->
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
  CKEDITOR.replace( 'lokasi_pengadaan');
  CKEDITOR.replace( 'alamat_pihak_vendor');
});
</script>
</div>