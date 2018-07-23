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
        <li class="breadcrumb-item active">Kelola Profil</li>
        <!-- Breadcrumb Menu-->
      </ol>
      <?php foreach($profil as $user): ?>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
              <?php
                if ($this->session->flashdata('msg')){
                  echo $this->session->flashdata('msg');
                }
              ?>
            <h5> <i class="fa fa-check"></i> Profil Logistik</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-9">              
                <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
                <div class="panel-body">
                  <div class="form-horizontal">
                    <form action="<?php echo base_url(). 'c_user/updateProfile'; ?>" method="post">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label">Nama </label>
                            <div class="">
                              <input class="form-control" type="text" name="nama" value="<?php echo $user->nama ;?>" >
                            </div>
                          </div>
                          <div class="form-group">Username</label>
                            <div>
                              <input class="form-control" type="text" name="username" value="<?php echo $user->username ;?>"">
                            </div>
                          </div>             

                          <div class="form-group">No Hp</label>
                            <div>
                              <input class="form-control" type="text" name="no_hp" value="<?php echo $user->no_hp ;?>"">
                            </div>
                          </div>          

                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button class="btn btn-primary"> <i class="fa fa-check">Ubah</i></button>
                              <button type="button"  class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil">Ubah Password</i></button>            
                            </div>
                          </div>
                        </div>                        
                      </div>
                      
                      <?php endforeach; ?>
                    </form>
                    </div>  <!-- end form-horizontal -->
                    </div> <!-- end panel-body -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
      
      <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4>Ubah Password</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
       
        </div>
        <!-- body modal -->
       
  <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
      
    <form action="<?php echo base_url(). 'c_user/update_password'; ?>" method="post">
        
          <table class="table-form" width="100%">
  <tr><td width="20%">Password Lama</td><td><b><input type="password"  name="curr_password"  class="form-control" style="width: 200px" required></b></td></tr>   

  <tr><td width="30%">Password Baru </td><td><b><input type="password" name="new_password"  class="form-control" style="width:200px"  required></b></td></tr> 
  <tr><td colspan="2">
  
  <tr><td width="40%">konfirmasi password baru </td><td><b><input type="password" name="conf_password"  class="form-control" style="width:200px"  required></b></td></tr> 
  <tr><td colspan="2">
  <br>
         
        <!-- footer modal -->
        <div class="modal-footer">
      <button type="submit"  class="btn btn-success" value="submit"><i class="fa fa-check icon-white"></i> Simpan</button>
         </form>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
        </table>
  </fieldset>
</form>
</div>
</td>
</tr>
</table>
</form>
      </div>

    </div>
  </div>
</div>
    </main>
</div>

    