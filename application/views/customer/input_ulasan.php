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
        <a class="nav-link" href="<?php echo base_url('/c_customer/home');?>">Dashboard</a>
      </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          Welcome <?php echo $this->session->userdata('username');?>
        </a>
        <!--  <img src="" class="img-avatar" alt="Customer">
      </a> -->
      <div class="dropdown-menu dropdown-menu-right">
        
        
        <div class="dropdown-header text-center">
          <strong>Settings</strong>
        </div>
        <!-- <a class="dropdown-item" href="<?php echo base_url('c_customer/viewProfile'); ?>"><i class="fa fa-user"></i> <?php echo $this->session->userdata('username');?>
        </a></a> -->
        <!--    <a class="dropdown-item" href="<?php echo base_url('c_customer/updateProfile'); ?>"><i class="fa fa-wrench"></i> Settings</a> -->
        <a class="dropdown-item" href="<?php echo base_url('/c_customer/viewProfile');?>"><i class="fa fa-user"></i> <?php echo $this->session->userdata('username');?></a>
        <a class="dropdown-item" href="<?php echo base_url('c_customer/keluar'); ?>"><i class="fa fa-sign-out"></i> Logout</a>
      </div>
    </li>
  </ul>
</header>
<div class="app-body">
  <div class="sidebar">
    <nav class="sidebar-nav">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('/c_customer/home');?>"><i class="icon-speedometer"></i>customer Dashboard </a>
        </li>
        <li class="nav-title">
          Menu
        </li>
        <li class="nav-item">
          <a class="nav-link" href=" <?php echo base_url('/c_customer/home');?> "><i class="fa fa-home"></i> Home</a>
        </li>
      </li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-file"></i> Kirim Surat </a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href=" <?php echo base_url('/c_suratKeluar/inputSuratDirektur');?>"><i class="fa fa-paper-plane"></i> direktur </a>
          </li>
          <!--    <li class="nav-item">
            <a class="nav-link" href=" <?php echo base_url('/c_suratKeluar/inputSuratLogistik');?>"><i class="fa fa-paper-plane"></i>logistik</a>
          </li> -->
        </ul>
      </li>
    </li>
  </li>
  <li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-file"></i> Kelola dokumen</a>
    <ul class="nav-dropdown-items">
      <li class="nav-item">
        <a class="nav-link" href=" <?php echo base_url('/c_suratKeluar/viewSuratKeluarCustomer');?>"><i class="fa fa-share"></i> Surat Keluar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('/c_suratMasuk/surat_masukCustomer');?>"><i class="fa fa-download"></i> Kotak Masuk</a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('/c_pesanan/viewStatusPesanan');?>"><i class="fa fa-cart-arrow-down"></i> melihat status pesanan</a>
    <a class="nav-link" href="<?php echo base_url('/c_ulasan/input');?>"><i class="fa fa-comment"></i> ulasan saya </a>
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
<li class="breadcrumb-item"><a href=" <?php echo base_url('/c_customer/home');?> "> Home</a></li>
<li class="breadcrumb-item"><a href="#"> Halaman Customer</a></li>
<!-- Breadcrumb Menu-->
</ol>
<!-- /.conainer-fluid -->
<div class="container-fluid">
<div class="card card-accent-success">
  <div class="card-header">
    <h5>  Masukkan Ulasan anda </h5>
  </div>
  <div class="pull-right">
    <a href="<?php echo base_url('c_ulasan/viewUlasan')?>" class="btn btn-link pull-right"><i class="fa fa-history"> </i> History Ulasan saya </a>
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
                  
                  <?php echo form_open('c_ulasan/inputUlasan'); ?>
                 
                  <div class="form-group ">
                    <label>no pesanan</label>
                    <div>
                      <select class="form-control select2" style="min-width:499px;"  onchange="setDropdown()" required name="pesanan_id" id="pesanan_id">
                        <option></option>
                        <?php
                        if($pesanan_id){
                        foreach($pesanan_id as $d){
                        echo '<option id=' . $d['pesanan_id'] . '>' . $d['pesanan_id'] . '| '.$d['nama_vendor'].'</option>';
                        }
                        }
                        ?>
                        
                      </select>
                    </div>
                  </div>
                   
                  <div class="form-group">
                    <label >dari vendor</label>
                    <input type="text" class="form-control" id="nama_vendor" name="nama_vendor" >
                  </div>
                  <div class="form-group ">
                    <label >Rating </label>  <em> *ket rating : 1 (Sangat Tidak Baik), 2 (Tidak Baik), 3 (Biasa saja), 4 (Baik), 5 (Sangat Baik)</em>
                    <div >
                      <select class="form-control select2" style="min-width:499px;" required name="rating" id="" equired>
                        <option></option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>

                    </div>
                  </div>
                  <div class="form-group">
                    <label>Komentar</label><br>
                    <textarea name="komentar" class="form-control"  rows="7" cols="80" required></textarea>
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
<script type="text/javascript">
function setDropdown(){
var abc = $('#pesanan_id option:selected').text();
var text = abc.substring(10, abc.length);
$('#nama_vendor').val(text);
console.log(abc);
}
</script>