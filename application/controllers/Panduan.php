<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panduan extends CI_Controller {

	public function index()
	{
		$data = array('title'   => 'Panduan Pengguna Sistem Informasi',
					  'content' => 'panduan/index'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Panduan.php */
/* Location: ./application/controllers/Panduan.php */