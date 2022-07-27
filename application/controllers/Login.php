<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('email')) {
            redirect(base_url('dashboard'));
        }

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username','Username', 'required',
			array( 'required'	=> '%s harus diisi'));
		$this->form_validation->set_rules('password','Password', 'required',
			array( 'required'	=> '%s harus diisi'));
		if($this->form_validation->run())
		{
			$this->my_login->login($username, $password);
		}

		$data = array('title' => 'Halaman Administrator');
		$this->load->view('login/index', $data, FALSE);
	}

	public function logout()
	{
		$this->my_login->logout();
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */