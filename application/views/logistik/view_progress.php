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
          <a class="dropdown-item" href="<?php echo base_url('/c_logistik/viewProfile');?>"><i class="fa fa-user"></i> <?php echo $this->session->userdata('username');?></a>
          <a class="dropdown-item" href="<?php echo base_url('c_logistik/keluar'); ?>"><i class="fa fa-sign-out"></i> Logout</a>
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
            <a class="nav-link" href=" <?php echo base_url('/c_logistik/home');?> "><i class="fa fa-home"></i> Home</a>
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
                <a class="nav-link" href="<?php echo base_url('/c_logistik/kelola_user');?>"><i class="fa fa-user"></i> Kelola user</a>
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
            <h3 class="panel-title pull-left">  Progress Pengadaan </h3>
            <a href="<?php echo base_url('c_progress/input')?>" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"> </i> tambah data </a>
          </div>
    <div class="pull-center">
          <div class="card-body">
                <table id="dataProgress" class="table ">
                <thead>
                  <tr>
                <!--     <th>No pesanan</th> -->
                    <th>No.</th>
                    <th>tanggal</th>
                    <th>nama customer</th>
                    <th>nama vendor</th>
                    <th>progress</th>
                    <th>kendala</th>
                    <th>aksi</th>

                    
                  </tr>
                </thead>
                <tbody>
                  <?php              
                  $i = 1;
                  foreach($progress as $prog):
                
                  ?>
                  
                  <tr>
                    <td><?php echo $i; ?></td>
                   <!--  <td><?php echo $prog->no_pesanan ;?></td> -->
                    <td><?php echo $prog->tanggal ;?></td>    
                    <td><?php echo $prog->nama_customer ;?></td>  
                   <td><?php echo $prog->nama_vendor ;?></td>                                   
                    <td><?php echo $prog->progress ; $i++;?></td>                                     
           
             <td
             <a href="#view<?php echo $prog->id_progress ;?>" data-toggle="modal"> <button type="button" class="btn btn-primary"><i class="fa fa-external-link"> </i> kendala<span class="" aria-hidden="true"></span></button></a></td>
             <!-- Modal Tambah -->
  <div   role="dialog" tabindex="" id="view<?php echo $prog->id_progress; ?>" class="modal fade">
      <div class="modal-dialog">
      
          <div class="modal-content">
              <div class="modal-header">
              <h4 class="modal-title">kendala</h4> 
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>         
              </div>


                <div class="modal-body">
               <?php echo $prog->kendala ;?></td>
              
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
             <td>
            <center><a href="<?=base_url()?>c_progress/hapusProgress/<?=$prog->id_progress?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fa fa-trash"></i></a> 
            <a href="<?=base_url()?>c_progress/edit/<?=$prog->id_progress?>" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a></td></center>
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
