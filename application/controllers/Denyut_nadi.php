<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Denyut_nadi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('pasien_model');
		$this->load->model('denyut_nadi_model');
	}

	public function index()
	{
		$denyut_nadi   = $this->denyut_nadi_model->listing();
		$total 		  = $this->denyut_nadi_model->total();

		$data    = array('title' => 'Data Denyut Nadi ('.$total->total.')',
							'denyut_nadi' => $denyut_nadi,
							'content'  => 'denyut_nadi/index'
							 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function pasien($id_pasien)
	{
		$pasien 	  = $this->pasien_model->detail($id_pasien);
		$denyut_nadi   = $this->denyut_nadi_model->pasien($id_pasien);

		$data    = array('title' => 'Riwayat Denyut Nadi: '.$pasien->nama_pasien,
							'denyut_nadi' 	=> $denyut_nadi,
							'pasien' 		=> $pasien,
							'content'  		=> 'denyut_nadi/riwayat'
							 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function riwayat($id_pasien)
	{
		$pasien 	  = $this->pasien_model->detail($id_pasien);
		$denyut_nadi   = $this->denyut_nadi_model->pasien($id_pasien);

		$data    = array('title' => 'Riwayat Denyut Nadi: '.$pasien->nama_pasien,
							'denyut_nadi' 	=> $denyut_nadi,
							'pasien' 		=> $pasien
							 );
		$this->load->view('denyut_nadi/cetak_riwayat', $data, FALSE);
	}

	public function export($id_pasien)
	{
		$pasien 	  = $this->pasien_model->detail($id_pasien);
		$denyut_nadi   = $this->denyut_nadi_model->pasien($id_pasien);

		$data    = array('title' => 'Riwayat Denyut Nadi: '.$pasien->nama_pasien,
							'denyut_nadi' 	=> $denyut_nadi,
							'pasien' 		=> $pasien
							 );
		$this->load->view('denyut_nadi/word', $data, FALSE);
	}

	public function detail($id_denyut_nadi)
	{
		$denyut_nadi   = $this->denyut_nadi_model->detail($id_denyut_nadi);
		$id_pasien	  = $denyut_nadi->id_pasien;
		$pasien 	  = $this->pasien_model->detail($id_pasien);

		$data    = array('title' 		=> 'Riwayat Data Denyut Nadi: '.$pasien->nama_pasien,
						 'denyut_nadi' 	=> $denyut_nadi,
						 'pasien'		=> $pasien,
						 'content'  	=> 'denyut_nadi/detail'
							 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function cetak($id_denyut_nadi)
	{
		$denyut_nadi   = $this->denyut_nadi_model->detail($id_denyut_nadi);
		$id_pasien	  = $denyut_nadi->id_pasien;
		$pasien 	  = $this->pasien_model->detail($id_pasien);

		$data    = array('title' => 'Riwayat Data Denyut Nadi: '.$pasien->nama_pasien,
							'denyut_nadi' => $denyut_nadi,
							'pasien'	=> $pasien
							 );
		$this->load->view('denyut_nadi/cetak', $data, FALSE);
	}

	public function tambah($id_pasien ='')
	{
		// Ambil data pasien
		$pasien = $this->pasien_model->listing();

		// Validasi
		$this->form_validation->set_rules('id_pasien', 'Pasien', 'required',
			array('required' => '%s harus dipilih'));
		if ($this->form_validation->run()===FALSE) {
		// end validasi
		$data    = array(   'title' 	=> 'Tambah Data Denyut Nadi',
							'pasien' 	=>  $pasien,
							'content' 	=> 'denyut_nadi/tambah'
							 );
		$this->load->view('layout/wrapper', $data, FALSE);
		// jika validasi oke,maka masuk database
		}else{
			$inp = $this->input;
			$data = array(	'id_user'			=> $this->session->userdata('id_user'),
							'id_pasien'			=> $inp->post('id_pasien'),
							'tanggal_pengukuran'=> date('d-m-Y',strtotime($inp->post('tanggal_pengukuran'))),
							'jam_pengukuran'	=> $inp->post('jam_pengukuran'),
							'tds'				=> $inp->post('tds'),
							'tdd'				=> $inp->post('tdd'),
							'denyut_nadi'		=> $inp->post('denyut_nadi'),
							'keterangan'		=> $inp->post('keterangan'),
							'tanggal_update'	=> date('Y-m-d H:i:s')
		    );
			// proses oleh model
			$this->denyut_nadi_model->tambah($data);
			// notifikasi
			$this->session->set_flashdata('sukses', 'Data Berhasil ditambah !');
			redirect(base_url('denyut_nadi'),'refresh');
		}
		// end masuk database
		}

		public function edit($id_denyut_nadi)
		{
			// panggil data denyut_nadi yg mau diedit
		$denyut_nadi = $this->denyut_nadi_model->detail($id_denyut_nadi);

		// Ambil data pasien
		$pasien = $this->pasien_model->listing();

		// Validasi
		$this->form_validation->set_rules('id_pasien', 'Pasien', 'required',
			array('required' => '%s harus dipilih'));
		if ($this->form_validation->run()===FALSE) {
		// end validasi
		$data    = array(   'title' 	=> 'Edit Data Denyut Nadi',
							'pasien' 	=>  $pasien,
							'denyut_nadi'=>  $denyut_nadi,
							'content' 	=> 'denyut_nadi/edit'
							 );
		$this->load->view('layout/wrapper', $data, FALSE);
		// jika validasi oke,maka masuk database
		}else{
			$inp = $this->input;
			$data = array(	'id_denyut_nadi'	=> $id_denyut_nadi,
							'id_user'			=> $this->session->userdata('id_user'),
							'id_pasien'			=> $inp->post('id_pasien'),
							'tanggal_pengukuran'=> date('d-m-Y',strtotime($inp->post('tanggal_pengukuran'))),
							'jam_pengukuran'	=> $inp->post('jam_pengukuran'),
							'tds'				=> $inp->post('tds'),
							'tdd'				=> $inp->post('tdd'),
							'denyut_nadi'		=> $inp->post('denyut_nadi'),
							'keterangan'		=> $inp->post('keterangan')
		    );
			// proses oleh model
			$this->denyut_nadi_model->edit($data);
			// notifikasi
			$this->session->set_flashdata('sukses', 'Data Berhasil diubah !');
			redirect(base_url('denyut_nadi'),'refresh');
		}
		// end masuk database
		}

		// Delete suhu tubuh
		public function delete($id_denyut_nadi)
		{
			$data = array('id_denyut_nadi' => $id_denyut_nadi);
			// Proses Delete
			$this->denyut_nadi_model->delete($data);
			// Notifikasi
			$this->session->set_flashdata('sukses', 'Data Berhasil Dihapus !');
			redirect(base_url('denyut_nadi'),'refresh');

		}

	}


/* End of file Denyut_nadi.php */
/* Location: ./application/controllers/Denyut_nadi.php */