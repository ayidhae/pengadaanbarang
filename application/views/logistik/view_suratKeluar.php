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
    <main class="main">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Logistik</a></li>
        <li class="breadcrumb-item active">Dashboard</li>

        <!-- Breadcrumb Menu-->
      </ol>
<!-- /.conainer-fluid -->
<div class="container-fluid">
<div class="card card-accent-success">
  <div class="card-header">
    <h5>  Surat keluar </h5>
    <?php
        if ($this->session->flashdata('msg')){
          echo $this->session->flashdata('msg');
        }
      ?>
  </div>
  
  <div class="card-body">
    <table id="dataSuratKeluar" class="table ">
      <thead>
        <tr>
          <th>No</th>
          <th> tujuan </th>
          <th> jenis surat </th>
          <th> penanggung jawab </th>
          <th> contact </th>
          <th>nomor surat </th>
          <th>tanggal</th>
          <th> surat </th>
          <th>pesan</th>
          
          
        </tr>
      </thead>
      <tbody>
        <?php
         $i = 1;
        foreach($surat_keluar as $ul):
        
        ?>
        
        <tr>
          <td><?php echo $i;?></td>
          <td><?php echo $ul->tujuan_customer ;?> <?php echo $ul->tujuan_vendor ;?> </td>
          <td><?php echo $ul->jenis_surat ;?></td>
          <td><?php echo $ul->penanggung_jawab ;?></td>
          <td><?php echo $ul->no_hp ;?></td>
          <td><?php echo $ul->no_surat ; $i++;?></td>
           <td><?php echo date('d-m-Y H:i:s',strtotime($ul->tgl_surat))?></td>        
          <td><?php echo "<br><b>File : </b><i><a href='".base_URL()."asset/upload/surat_keluar/".$ul->file."' target='_blank'>".$ul->file."</a>"?></td>
          <!--  DIBAWAH UNTUK MODAL   -->
          <td
            <a href="#view<?php echo $ul->id_surat ;?>" data-toggle="modal"> <button type="button" class="btn btn-primary"><i class="fa fa-external-link"> </i> pesan<span class="" aria-hidden="true"></span></button></a></td>
            <!-- Modal Tambah -->
            <div   role="dialog" tabindex="" id="view<?php echo $ul->id_surat; ?>" class="modal fade">
              <div class="modal-dialog">
                
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">pesan</h4>
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                  </div>
                  <div class="modal-body">
                  <?php echo $ul->pesan ;?></td>
                  
                </div>
                <div class="form-group">
                  
                  <div class="modal-footer">
                    
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Back</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- END Modal Tambah -->
        
      </tr>
      <?php
      endforeach;
      ?>
      
    </tbody>
  </table>
  
  
</div>
</div>

</div>
</main>
</div>

</div>
</div>
</div>
</main>
</div>