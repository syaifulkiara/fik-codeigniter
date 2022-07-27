<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->my_login->check_login();
		$this->load->model('user_model');
		// proteksi hanya admin
		if($this->session->userdata('akses_level') !='Admin')
		{
		// klo bukan admin,lempar ke login
		$this->my_login->logout();
		$this->session->set_flashdata('warning', 'Hak akses anda tidak diizinkan mengakses menu user');
		redirect(base_url('login','refresh'));
	    }
	}

	public function index()
	{
		$user = $this->user_model->listing();
		$total = $this->user_model->total();

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
		// check username
		$valid->set_rules('username', 'Username', 'required|is_unique[users.username]',
				array(	'required'		=> '%s harus diisi',
						'is_unique'		=> '%s sudah ada. Buat username berbeda'));
		// check password
		$valid->set_rules('password', 'Password', 'required|min_length[6]|max_length[32]',
				array(	'required'		=> '%s harus diisi',
						'min_length'	=> '%s minimal 6 karakter',
						'max_length'	=> '% maximal 32 karakter'));
		// jika sudah dicheck
		if($valid->run()===FALSE){
		// end validasi
		$data = array(	'title'			=> 'Data User ('.$total->total.')',
						'user'			=> $user,
						'content' 		=> 'user/index'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
		// jika validasi oke,maka masuk database
		}else{
			$inp = $this->input;
			$data = array(	'nama_user'	=> $inp->post('nama_user'),
							'email'		=> $inp->post('email'),
							'username'	=> $inp->post('username'),
							'password'	=> SHA1($inp->post('password')),
							'akses_level'	=> $inp->post('akses_level')
		    );
			// proses oleh model
			$this->user_model->tambah($data);
			// notifikasi
			$this->session->set_flashdata('sukses', 'Data Berhasil ditambah !');
			redirect('user','refresh');
		}
		// end masuk database
	}
	// edit user
	public function edit($id_user)
	{
		// panggil data user yg mau diedit
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
		$data = array(	'title'			=> 'Edit Data User : '.$user->nama_user,
						'user'			=> $user,
						'content' 		=> 'user/edit'
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
			redirect('user','refresh');
		}
		// end masuk database
	}

	// Delete User
	public function delete($id_user)
	{
		$data = array('id_user' => $id_user);
		// Proses Delete
		$this->user_model->delete($data);
		// Notifikasi
		$this->session->set_flashdata('sukses', 'Data Berhasil Dihapus !');
		redirect('user','refresh');

	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */