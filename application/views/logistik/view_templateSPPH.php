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
        <li class="breadcrumb-item active">Template SPPH</li>
        <!-- Breadcrumb Menu-->
      </ol>
      <!-- /.conainer-fluid -->
     
      <div class="container-fluid">
        <div class="card card-accent-success">
      <div class="card-header">
        <?php
        if ($this->session->flashdata('msg')){
          echo $this->session->flashdata('msg');
        }
      ?>
        <h3 class="panel-title pull-left">
         Kelola SPPH
        </h3>
        
        <a href="<?php echo site_url('c_templateSPPH/inputTemplateSPPH');?>" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i> Tambah</a>
       </div>
      <ul class="nav navbar-right panel_toolbox">
        </ul>

      
          <div class="card-body">
        <?php
        if ($this->session->flashdata('info')){  
          echo'<div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Info, </strong>'.$this->session->flashdata('info').'
            </div>';
        }
        ?>        
              <table id="dataVendor" class="table ">
                <thead>
                  <tr>
                    <th class="text-center">NO</th>
                    <th>NO.SURAT SPPH</th>
                    <th>PESANAN ID</th>
                    <th>TANGGAL SURAT SPPH</th>
                    <th>KEPADA VENDOR</th>
                    <th>PERIHAL</th>
                    <th class="text-center">AKSI</th>
                  </tr>
                </thead>
                <tbody>

            <?php
          if($mdata->num_rows()>0){
            $no = 1;
            foreach ($mdata->result() as $row) {
              if($row->status1==''){
                $act='<a href="'.site_url('c_templateSPPH/edit/'.trim(base64_encode($row->id),'=').'').'" class="btn btn-warning btn-sm" title="edit"><i class="fa fa-pencil"></i></a>';
              }else{
                $act='<a href="#" class="btn btn-warning btn-sm disabled" title="Edit"><i class="fa fa-pencil"></i></a>';
              }
              echo'
              <tr>
                <td width="5%" class="text-center">'.$no++.'</td>
                <td>'.$row->no_spph.'</td>
                <td>'.$row->pesanan_id.'</td>
                <td>'.date('d-m-Y',strtotime($row->tgl_spph)).'</td>
                <td>'.$row->kepada_vendor.'</td>
                <td>'.$row->nama_pengadaan.'</td>
                <td class="text-center">
                '.$act.'
               
                  <a href="'.site_url('c_templateSPPH/export_pdf/'.trim(base64_encode($row->id),'=').'').'" class="btn btn-primary btn-sm" title="Generate PDF"><i class="fa fa-file-pdf-o"></i></a>

                  <a href="'.site_url('c_suratKeluar/form_kirimspph/'.trim(base64_encode($row->id),'=').'').'" class="btn btn-success btn-sm" title="Kirim SPPH"><i class="fa fa-share-square-o"></i></a>
                </td>
              </tr>';
            }
            
          }
          ?> 
            
          
                </tbody>
              </table>
            </div>
          </div>
      </div>
</main>
<!-- <script src="<?php echo base_url('asset/js/jquery-1.11.1.min.js'); ?>"></script>
<script>
$(document).ready(function () {
   $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });
});
</script>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                Apakah anda ingin menghapus data ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div> -->
        </div>
    </div>
</div>
</div>
  <!--  <a href="#" data-href="'.site_url('c_templateSPPH/hapus/'.trim(base64_encode($row->id),'=').'').'"  class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin ingin menghapus data?\')"><i class="fa fa-trash-o"></i></a> -->