<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        $this->CI->load->model('user_model');
	}

	public function login($username, $password)
	{
		$check = $this->CI->user_model->login($username, $password);
		if($check)
		{
			$id_user	 = $check->id_user;
			$nama		 = $check->nama_user;
			$akses_level = $check->akses_level;
			$email 		 = $check->email;

			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('akses_level',$akses_level);
			$this->CI->session->set_userdata('email',$email);

			$this->CI->session->set_flashdata('sukses','Anda Berhasil Login');
			redirect(base_url('dashboard'));
		}else{
			$this->CI->session->set_flashdata('warning','Username atau password salah');
			redirect(base_url('login'));
		}
	}

	public function check_login()
	{
		if($this->CI->session->userdata('username')=="" &&
		   $this->CI->session->userdata('akses_level')=="")
		{
			$this->CI->session->set_flashdata('warning', 'Anda belum login');
			redirect(base_url('login'));
		}
	}

	public function logout()
	{
			$this->CI->session->unset_userdata('id_user');
			$this->CI->session->unset_userdata('nama');
			$this->CI->session->unset_userdata('akses_level');
			$this->CI->session->unset_userdata('email');

			$this->CI->session->set_flashdata('sukses','Anda Berhasil Logout');
			redirect(base_url('login'));
	}

	

}

/* End of file My_login.php */
/* Location: ./application/libraries/My_login.php */
