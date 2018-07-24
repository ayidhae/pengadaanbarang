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


  <div class="container-fluid">
    <div class="card card-accent-success">
      <div class="card-header">
        <h3>  Approve SPPH Dari Direktur </h3>
      </div>
      <?php
        if ($this->session->flashdata('msg')){
          echo $this->session->flashdata('msg');
        }
      ?>
      <div class="card-body">

        <div>

          <table id="dataCustomer" class="table ">
            <thead>
              <tr>
                <th>Asal </th>
                <th> jenis_surat </th>
                <th> penanggung jawab </th>
                <th> contact </th>
                <th>nomor surat </th>
                <th>tanggal</th>
                <th> surat </th>                  
                <th> status approve</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody>
             <?php              

             foreach($surat_approve as $st):

              ?>

              <tr>
               <td><?php echo $st->username ;?></td> 
               <td><?php echo $st->jenis_surat ;?></td>
               <td><?php echo $st->penanggung_jawab ;?></td>
               <td><?php echo $st->no_hp ;?></td>
               <td><?php echo $st->no_surat ;?></td>
               <td><?php echo date('d-m-Y',strtotime($st->tgl_surat))?></td>

               <td><?php echo "<br><b>File : </b><i><a href='".base_URL()."asset/upload/surat_keluar/".$st->file."' target='_blank'>".$st->file."</a>"?></td> 

                <td><?php echo $st->status_approve ;?></td> 

                <td> <?php if($st->status_dipesanlogistik !== null){
                      echo ("Data pesanan telah dibuat!");
                } else{
                    echo "<a  class='btn btn-primary' href='".base_url('/c_pesanan/tambahPesanan/'.$st->id_surat.'/'.$st->username)."'> Tambah Pesanan</a>";
                }?> 
                    
                </td>

              </div>
              <!--   <a href="" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a></td></center> -->




            </tr>
            <?php
          endforeach;
          ?>
        </tbody>
      </table>




    </div>
  </div>
</div>

</div>
<div class="container-fluid">
  <div class="card card-accent-success">
    <div class="card-header">
      <h3>  kotak masuk Dari Customer dan Vendor</h3>
    </div>
    <div class="pull-right">


      <div class="card-body">
        <table id="dataUlasan" class="table ">
          <thead>
           <tr>
            <th> dari </th>
            <th> penanggung jawab </th>
            <th> contact </th>
            <th> jenis_surat </th>
            <th>nomor surat </th>
            <th>tanggal</th>
            <th> surat </th>
            <th>pesan</th>




          </tr>
        </thead>
        <tbody>
          <?php              
          foreach($surat_masuk as $st):
            ?>

            <tr>
              <td><?php echo $st['username'] ;?></td>
              <td><?php echo $st['penanggung_jawab'] ;?></td>
              <td><?php echo $st['no_hp'] ;?></td>
              <td><?php echo $st['jenis_surat'] ;?></td>
              <td><?php echo $st['no_surat'] ;?></td>                                    
              <td><?php echo date ('d-m-Y',strtotime($st['tgl_surat']))?></td>

              <td><?php echo "<br><b>File : </b><i><a href='".base_URL()."asset/upload/surat_keluar/".$st['file']."' target='_blank'>".$st['file']."</a>"?></td> 
               <td><?php echo $st['pesan'];?></td>
               <!--   <a href="" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a></td></center> -->

             </tr>
             <?php
           endforeach;
           ?>
         </tbody>
       </table>




     </div>
   </div>
 </div>
</div>
</main>
</div>