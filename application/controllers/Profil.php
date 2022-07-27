<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	// update profil
	public function index()
	{
		// panggil data user yg mau diedit
		$id_user = $this->session->userdata('id_user');
		$user = $this->user_model->detail($id_user);

		// validation input
		$valid = $this->form_validation;
		// check nama
		$valid->set_rules('nama_user', 'Nama Lengkap', 'required',
				array( 'required'		=> '%s harus diisi'));

		// check email
		$valid->set_rules('email', 'Email', 'required|valid_email',
				array( 	'required'		=> '%s harus diisi',
						'valid_email'	=> '%s tidak valid. Masukan email yang benar'
					));
		
		// jika sudah dicheck
		if($valid->run()===FALSE){
		// end validasi
		$data = array(	'title'			=> 'Edit Profil : '.$user->nama_user,
						'user'			=> $user,
						'content' 		=> 'profil/index'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
		// jika validasi oke,maka masuk database
		}else{
			$inp = $this->input;
			// cek panjang password
			if(strlen($inp->post('password')) >= 6 || strlen($inp->post('password')) <= 32){

					$data = array(	'id_user'	=> $id_user,
									'nama_user'	=> $inp->post('nama_user'),
									'email'		=> $inp->post('email'),
									'password'	=> SHA1($inp->post('password')),
									'akses_level'	=> $inp->post('akses_level')
				    );
			}else{
				// kalau kurang dari 6 password tdk diganti
					$data = array(	'id_user'	=> $id_user,
									'nama_user'	=> $inp->post('nama_user'),
									'email'		=> $inp->post('email'),
									'akses_level'	=> $inp->post('akses_level')
				    );
			}

			// proses oleh model
			$this->user_model->edit($data);
			// notifikasi
			$this->session->set_flashdata('sukses', 'Data Berhasil diedit !');
			redirect(base_url('profil','refresh'));
		}
		// end masuk database
	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */
