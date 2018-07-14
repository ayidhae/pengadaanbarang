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
  <main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item"><a href="#">Logistik</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
      <!-- Breadcrumb Menu-->
    </ol>
    <?php foreach ($pesanan as $detail): ?>
    <div class="container-fluid">
      <div class="card card-accent-success">
        <div class="card-header">
           <h3 class="panel-title pull-left">Kirim SPH</h3>
            <a href="<?php echo site_url('c_templateSPH/viewTemplateSPH');?>" class="btn btn-sm btn-success pull-right"><i class="fa fa-reply"></i> Kembali</a>       
        </div>
        <!--   <div class="pull-right">
          <a href="<?php echo base_url('c_ulasan/viewUlasan')?>" class="btn btn-link pull-right"><i class="fa fa-history"> </i> History Ulasan saya </a>
        </div> -->
        <body>
          <!-- Navigation -->
          
          <div id="page-wrapper">
            <div class="row">
              <div class="col-lg-12">
                
              </div>
              <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-lg-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    
                  </div>
                  <!--  <div class="panel-body"> -->
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-6">
                        <?php echo form_open_multipart(base_url('c_suratKeluar/inputSuratKeluarCustomer')) ;?>
                        <input type="text" name="no_surat" value="<?php echo $detail->no_sph;?>" hidden>
                        <input type="text" name="jenis_surat" value="sph" hidden>
                        <input type="text" name="tujuan_customer" value="<?php echo $detail->nama_customer;?>" hidden>
                        
                          <div class="form-group">
                            <label for="tipe" class="col-md-3 control-label">Penanggung Jawab</label>
                            <div class="col-md-7 required">
                              <input type="text" name="penanggung_jawab" class="form-control"  rows="7" cols="80" ></text>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="tipe" class="col-md-3 control-label">No Hp</label>
                            <div class="col-md-7 required">
                              <input type="text" name="no_hp" class="form-control"  rows="7" cols="80" ></text>
                            </div>
                          </div>
                          <!-- tgl-->
                          <!-- <div class="form-group ">
                            <label for="tgl" class="col-md-3 control-label">Tanggal</label>
                            <div class="col-md-7 col-sm-12 required">
                              <div class="input-group date">
                                <input type="date" name="tgl_surat" class="form-control pull-right" id="datepickerNow" data-date-format="dd/mm/yyyy" required>
                              </div>
                            </div>
                          </div> -->
                          <div class="form-group">
                            <label for="tipe" class="col-md-3 control-label">Upload SPH</label>
                            <div class="col-md-7 required">
                              <input type="file" class="form-control" placeholder="choose file" name="file"  value="" required>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="tipe" class="col-md-3 control-label">pesan</label>
                            <div class="col-md-7 required">
                              <textarea name="pesan" class="form-control"  rows="7" cols="80" ></textarea>
                            </div>
                          </div>
                          <button type="submit" name="simpan" value="submit" class="btn btn-primary">Kirim</button>
                        </form>
                        <?php endforeach; ?> 
                      </div>
                    </div>
                  </div>
                </main>
              </div>