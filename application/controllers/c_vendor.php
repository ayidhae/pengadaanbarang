<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_vendor extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_vendor');
		$this->load->model('m_barang');
	}
	public function home(){
		$where = array('username' => $this->session->userdata('username'));
		$data['barang'] = $this->m_barang->getBarang($where,'barang')->result();
		$this->load->view('template/header'); // default template
		$this->load->view('vendor/dashboard',$data); // dashboard vendornya
		$this->load->view('template/footer'); // default template
	}

	public function add(){
		$this->load->view('vendor/registrasiVendor');
	}

	public function detail_user($username){
		$where = array('username' => $username);
		$data['vendor'] = $this->m_vendor->detail($where,'vendor')->result();
		$this->load->view('template/header');
		$this->load->view('logistik/detail_vendor',$data);
		$this->load->view('template/footer');
	}

	public function edit_user($username){
		$where = array('username' => $username);
		$data['user'] = $this->m_vendor->detail($where,'vendor')->result();
		$this->load->view('template/header');
		$this->load->view('logistik/edit_vendor',$data);
		$this->load->view('template/footer');
	}

	public function update_user($username){	
		$status=$this->input->post('status');
		$data=array(
			'status'=>$status
			);
		$where=array(
			'username'=>$username
			);
		$this->m_vendor->updateProfile($where,$data,'vendor');
		redirect(base_url('c_user/kelola_user'));		
	}

	function delete_user($username){
		$where=array(
            'username'=>$username
		);
		$this->m_vendor->delete_user($where,'vendor');
		redirect('c_user/kelola_user');
	}

	public function viewProfile(){
		$data ['profile'] = $this->m_vendor->profileVendor($this->session->userdata('username'));	
		$this->load->view('template/header');
		$this->load->view('vendor/kelola_profil',$data);
		$this->load->view('template/footer');		
	}

	function updateProfile(){
			$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('alamat_perusahaan', 'alamat perusahaan','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('email', 'Email','required|valid_email');
			$this->form_validation->set_rules('contact', 'Contact','required|numeric');

			if($this->form_validation->run() == TRUE) {
			$nama_perusahaan=$this->input->post('nama_perusahaan');
			$alamat_perusahaan=$this->input->post('alamat_perusahaan');
			$email=$this->input->post('email');
			$contact=$this->input->post('contact');			

			$data=array(
                'nama_perusahaan'=>$nama_perusahaan,
                'alamat_perusahaan'=>$alamat_perusahaan,
                'email'=>$email,
                'contact'=>$contact                
				);

			$where=array(
			     'username'=>$this->session->userdata('username')
			  );  
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> <a href="" class="close" data-dismiss="alert" aria-label="close">&times; </a>Data Profil berhasil diubah</div>');
			$this->m_vendor->updateProfile($where,$data,'vendor');  			
			$this->viewProfile();
		} else {
			$this->viewProfile();
		}
	}

	public function update_password(){
		$this->form_validation->set_rules('curr_password', 'current password','required|alpha_numeric');
		$this->form_validation->set_rules('new_password', 'new password','required|alpha_numeric');
		$this->form_validation->set_rules('conf_password', 'confirm password','required|alpha_numeric');
		if($this->form_validation->run()){
			$curr_password = $this->input->post('curr_password');
			$new_password = $this->input->post('new_password');
			$conf_password = $this->input->post('conf_password');			
			$uname = $this->session->userdata('username');
			$data= $this->m_vendor->getCurrentpass($uname);					
				if($data->password == md5($curr_password)) {			
					if($new_password == $conf_password ){
						if($this->m_vendor->update_password($new_password, $uname)){						
							?>
	                    		 <script type=text/javascript>alert("update sukses!");</script>
	        				<?php
		        			$this->load->view('template/header');
							$this->viewProfile();							
						}else{						
							?>
	                    		 <script type=text/javascript>alert("Gagal update password!");</script>
	        				<?php	    
							$this->viewProfile();
						}
					}else{
						?>
	                     <script type=text/javascript>alert("password baru dan confirm password tidak cocok!");</script>
	        			<?php
						$this->viewProfile();
					}
				}else{
					?>
                     <script type=text/javascript>alert("password lama yang anda masukan salah!");</script>
        			<?php
					$this->viewProfile();
				}				
		}else{
			$this->load->view('vendor/kelola_profil');
		}
	}


	public function registrasiVendor(){
		$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan','required|alpha_numeric_spaces');
		$this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan','required|alpha_numeric_spaces');
		$this->form_validation->set_rules('email', 'Email','required|valid_email');
		$this->form_validation->set_rules('contact', 'Contact','required|numeric');
		$this->form_validation->set_rules('password', 'password','required');
		$this->form_validation->set_rules('confirm_password', 'Confirm password','required|matches[password]');

		if ($this->form_validation->run() == TRUE){
			$dataVendorAda=$this->m_vendor->check_regis($this->input->post('username'));		
			if($dataVendorAda->num_rows() == 1){
				?>
	                <script type=text/javascript>alert("Username sudah tersedia");</script>
	        	<?php
	        	$this->load->view('vendor/registrasiVendor');
			}else{				
					$config['upload_path']   = 'asset/img/akte/'; 
					$config['allowed_types'] = 'gif|jpg|png'; 
					$config['max_size']      = 10000; 
					$config['max_width']     = 2048; 
					$config['max_height']    = 1536;
					$this->load->library('upload',$config);  				
				if ( ! $this->upload->do_upload('akte_pendiri')) {
		        	$error = array('error' => $this->upload->display_errors()); 
		        	?>
                     <script type=text/javascript>alert("File tidak sesuai format");</script>
        			<?php
        			$this->load->view('vendor/registrasiVendor');
		        }else { 
		        	$upload=$this->upload->data();			      
						$data = array(
							  'hak_akses' => 'vendor',
							  'akte_pendiri' => $upload['file_name'],
							  'nama_perusahaan' => $this->input->post('nama_perusahaan'),
							  'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
							  'contact' => $this->input->post('contact'),
							  'email' => $this->input->post('email'),
							  'username' => $this->input->post('username'),
							  'password' => md5($this->input->post('password')),
							  'status' =>'aktif'
							  );										
			 			$this->m_vendor->insert($data);	
			 			$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> <a href="" class="close" data-dismiss="alert" aria-label="close">&times; </a>Registrasi berhasil</div>');
	        			redirect(base_url('c_login/index'));	        			
			     } 						   
			}
		}else {
			$this->load->view('vendor/registrasiVendor');
		}
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('Home');
	}
}

