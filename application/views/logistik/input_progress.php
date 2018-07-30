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
            <a class="nav-link" href="<?php echo base_url('/c_logistik/home');?>"><i class="icon-speedometer"></i>Logistik Dashboard </a>
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
            <h3>  Progress Pengadaan </h3>
            <a href="<?php echo base_url('c_progress/viewProgress')?>" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"> </i> kembali </a>
          </div>
          <div class="pull-right">
            
          </div>
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
                          
                          <?php echo form_open('c_progress/inputProgress'); ?>
                          <!--  <div class="form-group">
                            <label>id progress</label>
                            <input name="id_progress" class="form-control" required>
                            
                          </div>
                          -->
                          <div class="form-group ">
                    <label>no pesanan</label>
                    <div>
                      <select class="form-control select2" style="min-width:499px;" required name="pesanan_id" onchange="setDropdown()" id="pesanan_id">
                        <option></option>
                          <?php
          foreach ($mdraft->result() as $row) {
            if($pesanan_id==$row->pesanan_id){
              echo'<option value="'.$row->pesanan_id.'" selected>'.$row->pesanan_id.' | '.$row->nama_vendor.' | '.$row->nama_customer.'</option>';
            }else{
              echo'<option value="'.$row->pesanan_id.'">'.$row->pesanan_id.' | '.$row->nama_vendor.' | '.$row->nama_customer.' </option>';
            }
            
          }
          ?>
          
          </select>
                         
                     <label>nama vendor</label>
                    <div>
                      <select class="form-control select2" style="min-width:499px;" required name="nama_vendor" onchange="setDropdown()" id="nama_vendor">
                        <option></option>
                          <?php
          foreach ($mdraft->result() as $row) {
            if($pesanan_id==$row->pesanan_id){
              echo'<option value="'.$row->nama_vendor.'" selected>'.$row->nama_vendor.' </option>';
            }else{
              echo'<option value="'.$row->nama_vendor.'">'.$row->nama_vendor.' </option>';
            }
            
          }
          ?>
          
          </select>
                         <label>nama customer</label>
                    <div>
                      <select class="form-control select2" style="min-width:499px;" required name="nama_customer" onchange="setDropdown()" id="nama_customer">
                        <option></option>
                          <?php
          foreach ($mdraft->result() as $row) {
            if($pesanan_id==$row->pesanan_id){
              echo'<option value="'.$row->nama_customer.'" selected>'.$row->nama_customer.' </option>';
            }else{
              echo'<option value="'.$row->nama_customer.'">'.$row->nama_customer.' </option>';
            }
            
          }
          ?>
          
          </select>
                   
                          
                     
                          <div class="form-group">
                            <label>progress</label>
                            <input name="progress" class="form-control" required>
                            
                          </div>
                          <div class="form-group">
                            <label>kendala</label><br>
                            <textarea name="kendala" class="form-control"  rows="7" cols="80" required></textarea>
                          </div>
                          <button type="submit" name="simpan" value="submit" class="btn btn-primary">Submit</button>
                        </form>
                        
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
