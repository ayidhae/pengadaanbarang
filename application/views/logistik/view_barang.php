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
        <a class="nav-link" href="<?php echo base_url('/c_logistik/home');?>">Dashboard</a>
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
                <a class="nav-link" href="<?php echo base_url('/c_pesanan/viewStatusLog');?>"><i class="fa fa-shopping-cart"></i> Kelola Status Pesanan</a>
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
   
        
        <!-- Breadcrumb Menu-->
      </ol>
      
      
      <div class="container-fluid">
        <H1>Data Barang</H1>
        <body>
          <div class="row">
           
            <?php foreach($barang as $detail): ?>
              <div class="col-sm-3 col-md-3">
                <div class="card">
                  <div class="card-header">
                    <h3> <?=$detail->namabarang?></h3>
                  </div>
                  <div class="card-body">
                  <img src="<?php echo base_url('asset/img/barang/').$detail->gambar; ?>" alt="menu" style="height: 200px; width: 200px;">
                  <div> 
                    <p> <?=$detail->jenis ?> </p>
                    <p> <?=$detail->nama_perusahaan ?> </p>
                    <p>
                      <a  class='btn btn-primary' href="<?php echo base_url('/c_barang/detail/'.$detail->idbarang);?>"> detail </a>
                    </p>
                  </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </body>
        </div>

<<<<<<< HEAD
       
=======
>>>>>>> ee281e62631501c49192e58cac840dbc2bc4e3ab
</main>
</div>
</body>
          </div>
        </body>
      </div>
      
    </main>
  </div>
  
  <!-- /.conainer-fluid -->
</main>
</div>
<!--Start of Tawk.to Script-->
<!--  <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ac440b44b401e45400e5212/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script> -->
<!--End of Tawk.to Script-->
</body>
</body>
</div>