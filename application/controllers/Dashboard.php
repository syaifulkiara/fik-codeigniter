<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->my_login->check_login();
		$this->load->model('Suhu_tubuh_model');
		$this->load->model('Denyut_nadi_model');
		$this->load->model('User_model');
		$this->load->model('Pasien_model');
	}

	public function index()
	{
		// Data total pertable
		$pasien 		= $this->Pasien_model->total();
		$user 			= $this->User_model->total();
		$denyut_nadi 	= $this->Denyut_nadi_model->total();
		$suhu_tubuh 	= $this->Suhu_tubuh_model->total();

		$data = array('title' 			=> 'Halaman Dashboard',
						'pasien' 		=> $pasien,
						'user' 			=> $user,
						'denyut_nadi' 	=> $denyut_nadi,
						'suhu_tubuh' 	=> $suhu_tubuh,
					    'content' 		=> 'dashboard/index'
		 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */