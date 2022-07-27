<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->my_login->check_login();
		$this->load->model('pasien_model');
	}

	public function index()
	{
		$pasien = $this->pasien_model->listing();
		$total = $this->pasien_model->total();

		// validation input
		$valid = $this->form_validation;
		// check nama
		$valid->set_rules('nama_pasien', 'Nama Lengkap', 'required',
				array( 'required'		=> '%s harus diisi'));

		// check pasienname
		$valid->set_rules('kode_pasien', 'Kode Pasien', 'required|is_unique[pasien.kode_pasien]',
				array(	'required'		=> '%s harus diisi',
						'is_unique'		=> '%s sudah ada. Buat kode pasien berbeda'));
		
		// jika sudah dicheck
		if($valid->run()===FALSE){
		// end validasi
		$data = array(	'title'			=> 'Data Pasien ('.$total->total.')',
						'pasien'		=> $pasien,
						'content' 		=> 'pasien/index'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
		// jika validasi oke,maka masuk database
		}else{
			$inp = $this->input;
			$data = array(	'id_user'		=> $this->session->userdata('id_user'),
							'kode_pasien'	=> $inp->post('kode_pasien'),
							'nama_pasien'	=> $inp->post('nama_pasien'),
							'jenis_kelamin'	=> $inp->post('jenis_kelamin'),
							'tempat_lahir'	=> $inp->post('tempat_lahir'),
							'tanggal_lahir'	=> date('d-m-Y',strtotime($inp->post('tanggal_lahir'))),
							'alamat'		=> $inp->post('alamat'),
							'telepon'		=> $inp->post('telepon')
		    );
			// proses oleh model
			$this->pasien_model->tambah($data);
			// notifikasi
			$this->session->set_flashdata('sukses', 'Data Berhasil ditambah !');
			redirect('pasien','refresh');
		}
		// end masuk database
	}

	public function tambah()
	{
		// validation input
		$valid = $this->form_validation;
		// check nama
		$valid->set_rules('nama_pasien', 'Nama Lengkap', 'required',
				array( 'required'		=> '%s harus diisi'));

		// check pasienname
		$valid->set_rules('kode_pasien', 'Kode Pasien', 'required|is_unique[pasien.kode_pasien]',
				array(	'required'		=> '%s harus diisi',
						'is_unique'		=> '%s sudah ada. Buat kode pasien berbeda'));
		
		// jika sudah dicheck
		if($valid->run()===FALSE){
		// end validasi
		$data = array(	'title'			=> 'Tambah Pasien',
						'content' 		=> 'pasien/tambah_baru'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
		// jika validasi oke,maka masuk database
		}else{
			$inp = $this->input;
			$data = array(	'id_user'		=> $this->session->userdata('id_user'),
							'kode_pasien'	=> $inp->post('kode_pasien'),
							'nama_pasien'	=> $inp->post('nama_pasien'),
							'jenis_kelamin'	=> $inp->post('jenis_kelamin'),
							'tempat_lahir'	=> $inp->post('tempat_lahir'),
							'tanggal_lahir'	=> date('d-m-Y',strtotime($inp->post('tanggal_lahir'))),
							'alamat'		=> $inp->post('alamat'),
							'telepon'		=> $inp->post('telepon')
		    );
			// proses oleh model
			$this->pasien_model->tambah($data);
			// notifikasi
			$this->session->set_flashdata('sukses', 'Data Berhasil ditambah !');
			redirect('pasien','refresh');
		}
		// end masuk database
	}
	// edit pasien
	public function edit($id_pasien)
	{
		// panggil data pasien yg mau diedit
		$pasien = $this->pasien_model->detail($id_pasien);

		// validation input
		$valid = $this->form_validation;
		// check nama
		$valid->set_rules('nama_pasien', 'Nama Lengkap', 'required',
				array( 'required'		=> '%s harus diisi'));

		// jika sudah dicheck
		if($valid->run()===FALSE){
		// end validasi
		$data = array(	'title'			=> 'Edit Data Pasien : '.$pasien->nama_pasien,
						'pasien'		=> $pasien,
						'content' 		=> 'pasien/edit'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
		// jika validasi oke,maka masuk database
		}else{
			$inp = $this->input;
			
			$data = array(	'id_pasien'	=> $id_pasien,
							'id_user'		=> $this->session->userdata('id_user'),
							'kode_pasien'	=> $inp->post('kode_pasien'),
							'nama_pasien'	=> $inp->post('nama_pasien'),
							'jenis_kelamin'	=> $inp->post('jenis_kelamin'),
							'tempat_lahir'	=> $inp->post('tempat_lahir'),
							'tanggal_lahir'	=> date('d-m-Y',strtotime($inp->post('tanggal_lahir'))),
							'alamat'		=> $inp->post('alamat'),
							'telepon'		=> $inp->post('telepon')
				    );
			

			// proses oleh model
			$this->pasien_model->edit($data);
			// notifikasi
			$this->session->set_flashdata('sukses', 'Data Berhasil diedit !');
			redirect('pasien','refresh');
		}
		// end masuk database
	}

	// Delete Pasien
	public function delete($id_pasien)
	{
		$data = array('id_pasien' => $id_pasien);
		// Proses Delete
		$this->pasien_model->delete($data);
		// Notifikasi
		$this->session->set_flashdata('sukses', 'Data Berhasil Dihapus !');
		redirect('pasien','refresh');

	}

	public function cetak($id_pasien)
	{
		$pasien = $this->pasien_model->detail($id_pasien);
		$data = array(	'title'			=> $pasien->nama_pasien,
						'pasien'		=> $pasien
					);
		$this->load->view('pasien/cetak', $data, FALSE);
	}

	public function detail($id_pasien)
	{
		$pasien = $this->pasien_model->detail($id_pasien);
		$data = array(	'title'			=> $pasien->nama_pasien,
						'pasien'		=> $pasien,
						'content' 		=> 'pasien/detail'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Pasien.php */
/* Location: ./application/controllers/Pasien.php */