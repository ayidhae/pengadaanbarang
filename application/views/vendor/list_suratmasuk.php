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
        <a class="nav-link" href="<?php echo base_url('/c_vendor/home');?>">Dashboard</a>
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
          <a class="dropdown-item" href="<?php echo base_url('/c_vendor/viewProfile');?>"><i class="fa fa-user"></i> <?php echo $this->session->userdata('username');?></a>      
          <a class="dropdown-item" href="<?php echo base_url('c_vendor/keluar'); ?>"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
      </li>
    </ul>

  </header>

  <div class="app-body">
    <div class="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/c_vendor/home');?>"><i class="icon-speedometer"></i>Vendor Dashboard </a>
          </li>

         <li class="nav-title">
            Menu
          </li>
          <li class="nav-item nav-dropdown"> 
          <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-file"></i> Kelola dokumen</a>          
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href=" <?php echo base_url('/c_suratKeluar/viewSuratKeluarVendor');?>"><i class="fa fa-share"></i> Surat Keluar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/c_suratMasuk/surat_masukVendor');?>"><i class="fa fa-inbox"></i> Surat Masuk</a>
              </li> 
            </ul>
          </li>          

          <li class="nav-item">          
            <a class="nav-link" href="<?php echo base_url('/c_barang/view_barang');?>"> <i class="fa fa-square"></i> Kelola Barang </a>
          </li>
          <li class="divider"></li>

        </ul>
      </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>

    <!-- Main content -->
    <main class="main">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Vendor</li>      
        <!-- Breadcrumb Menu-->
      </ol>
      <div class="container-fluid">
        <div class="card card-accent-success">
          <div class="card-header">
            <h3>  kotak masuk </h3>
          </div>
           <div class="pull-right">

  
              <div class="card-body">
                <table id="dataSuratMasuk" class="table ">
                <thead>
                   <tr>

                    <th>No</th>
                    <th>Dari</th>
                    <th>Jenis Surat </th>
                    <th>Nomor Surat </th>
                    <th>Tanggal</th>
                    <th>Surat </th>
                    <th>Pesan</th>
                    <th>Aksi</th>                                 

        

                  <!--  <th> aksi </th> -->


                  </tr>
                </thead>
                <tbody>
                  <?php              
                  $i = 1; 
                  foreach($surat_masuk as $sm):
                
                  ?>
                  
                  <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $sm['username'] ;?></td>
                     <td><?php echo $sm['jenis_surat'] ;?></td>
                   <td><?php echo $sm['no_surat'] ;?></td>
<<<<<<< HEAD
                    <td><?php echo $sm['tgl_surat'];?></td>
                    

                      <td><?php echo "<br><b>File : </b><i><a href='".base_URL()."asset/upload/surat_keluar/".$sm['file']."' target='_blank'>".$sm['file']."</a>"?></td> 
                       <td><?php echo $sm['pesan'];?></td>
                      <td>
                        <a href="<?=base_url()?>c_suratKeluar/formsph/<? ;?>" class="btn btn-success btn-sm" title="balas"><i class="fa fa-share-square-o"></i></a></td></center>
                      </td>
                    <td><?php echo "<br><b>File : </b><i><a href='".base_URL()."asset/upload/surat_keluar/".$sm['file']."' target='_blank'>".$sm['file']."</a>"?></td> 
                    <td><?php echo $sm['pesan'];?></td>
                    
=======
                    <td><?php echo $sm['tgl_surat'];?></td>                  
                      <td><?php echo "<br><b>File : </b><i><a href='".base_URL()."asset/upload/surat_keluar/".$sm['file']."' target='_blank'>".$sm['file']."</a>"?></td> 
<<<<<<< HEAD
                       <td><?php echo $sm['pesan'];$i++;?></td>                                  
=======
                       <td><?php echo $sm['pesan'];?></td>                                  

                      <!-- <a href="<?=base_url()?>c_suratKeluar/formsph/<? ;?>" class="btn btn-success btn-sm" title="balas"><i class="fa fa-share-square-o"></i></a> -->
                    <td> 
                      <?php 
                      if($sm['jenis_surat'] == 'spk'){
                            echo ("--");
                      } else{
                            echo "<a  class='btn btn-primary' href='".base_url('/c_suratkeluar/formsph/')."'> Balas </a>";
                      }?>                   
                    </td>
                   
                  </center>
<<<<<<< HEAD

              
            
             
            
                  </tr>
=======
                    </tr>
>>>>>>> eda516d651e8d8028bc6e52aa757e4a0b0f8ae6f
                  <?php
                  endforeach;
                  ?>
                 
                </tbody>
              </table>
              

</div>
</td>
</tr>
</table>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
