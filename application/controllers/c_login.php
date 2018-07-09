<?php 

/**
* 
*/
class c_login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();        
        $this->load->model('m_user');
        $this->load->model('m_customer');
        $this->load->model('m_vendor');
	}

	function index() {
		if($this->session->has_userdata('username')){
				if($this->session->userdata('hak_akses')=='logistik'){
					redirect('c_logistik/home');
				}elseif($this->session->userdata('hak_akses')=='direktur'){
					redirect('c_direktur/home');
				}elseif ($this->session->userdata('hak_akses')=='customer') {
					redirect('c_customer/home');
				}else{
					redirect('c_vendor/home');
				}
		}else{
			$this->load->view('utama/login-page');
		}
		
	}

	function validate() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cekUser = $this->m_user->cek($username, $password);	
		$cekVendor = $this->m_vendor->cek($username, $password);
		$cekCustomer = $this->m_customer->cek($username, $password);

		if($cekUser->num_rows() == 1)
		{
			foreach($cekUser->result() as $data){
				$sess_data['username'] = $data->username;
				$sess_data['password'] = $data->password;
				$sess_data['hak_akses'] = $data->hak_akses;
				$this->session->set_userdata($sess_data);
			}
		

			if($this->session->userdata('hak_akses') == 'logistik')
			{
				redirect('c_logistik/home');
			}else if ($this->session->userdata('hak_akses') == 'direktur')
			{
				redirect('c_direktur/home');
			}
			// else{
			// 	$_SESSION['pesan'] = 'Maaf, kombinasi username dengan password salah.';
			// 	$this->session->mark_as_flash('pesan');
			// }
		}
		 else if($cekVendor->num_rows() == 1)
		{
			foreach($cekVendor->result() as $data){
				$sess_data['username'] = $data->username;
				$sess_data['password'] = $data->password;
				$sess_data['hak_akses'] = $data->hak_akses;
				$sess_data['status'] = $data->status;
				$this->session->set_userdata($sess_data);
			}
		
			if($this->session->userdata('hak_akses') == 'vendor' && $this->session->userdata('status') == 'aktif')
			{
				redirect('c_vendor/home');

			}else{
				 ?>
                     <script type=text/javascript>alert("Status tidak aktif");</script>

        		<?php
        		$this->index();
			}
		} else if($cekCustomer->num_rows() == 1)
			{
			foreach($cekCustomer->result() as $data){
				$sess_data['username'] = $data->username;
				$sess_data['password'] = $data->password;
				$sess_data['hak_akses'] = $data->hak_akses;
				$sess_data['status'] = $data->status;

				$this->session->set_userdata($sess_data);
			}
		
			if($this->session->userdata('hak_akses') == 'customer' && $this->session->userdata('status') == 'aktif')
			{
				redirect('c_customer/home');
			}else{
				?>
                     <script type=text/javascript>alert("Status tidak aktif");</script>
        		<?php
        		$this->index();
			}
		} else {
			 ?>
                     <script type=text/javascript>alert("Maaf, kombinasi username dengan password salah. ");</script>

        	<?php
			$this->index();

		}
	}
}