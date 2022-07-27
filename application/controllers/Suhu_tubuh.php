<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suhu_tubuh extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('pasien_model');
		$this->load->model('suhu_tubuh_model');
	}

	public function index()
	{
		$suhu_tubuh   = $this->suhu_tubuh_model->listing();
		$total 		  = $this->suhu_tubuh_model->total();

		$data    = array('title' => 'Data Suhu Tubuh ('.$total->total.')',
							'suhu_tubuh' => $suhu_tubuh,
							'content'  => 'suhu_tubuh/index'
							 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function pasien($id_pasien)
	{
		$pasien 	  = $this->pasien_model->detail($id_pasien);
		$suhu_tubuh   = $this->suhu_tubuh_model->pasien($id_pasien);

		$data    = array('title' => 'Riwayat Suhu Tubuh: '.$pasien->nama_pasien,
							'suhu_tubuh' 	=> $suhu_tubuh,
							'pasien' 		=> $pasien,
							'content'  		=> 'suhu_tubuh/riwayat'
							 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function riwayat($id_pasien)
	{
		$pasien 	  = $this->pasien_model->detail($id_pasien);
		$suhu_tubuh   = $this->suhu_tubuh_model->pasien($id_pasien);

		$data    = array('title' => 'Riwayat Suhu Tubuh: '.$pasien->nama_pasien,
							'suhu_tubuh' 	=> $suhu_tubuh,
							'pasien' 		=> $pasien
							 );
		$this->load->view('suhu_tubuh/cetak_riwayat', $data, FALSE);
	}

	public function export($id_pasien)
	{
		$pasien 	  = $this->pasien_model->detail($id_pasien);
		$suhu_tubuh   = $this->suhu_tubuh_model->pasien($id_pasien);

		$data    = array('title' => 'Riwayat Suhu Tubuh: '.$pasien->nama_pasien,
							'suhu_tubuh' 	=> $suhu_tubuh,
							'pasien' 		=> $pasien
							 );
		$this->load->view('suhu_tubuh/word', $data, FALSE);
	}

	public function detail($id_suhu_tubuh)
	{
		$suhu_tubuh   = $this->suhu_tubuh_model->detail($id_suhu_tubuh);
		$id_pasien	  = $suhu_tubuh->id_pasien;
		$pasien 	  = $this->pasien_model->detail($id_pasien);

		$data    = array('title' 		=> 'Riwayat Data Suhu Tubuh: '.$pasien->nama_pasien,
						 'suhu_tubuh' 	=> $suhu_tubuh,
						 'pasien'		=> $pasien,
						 'content'  	=> 'suhu_tubuh/detail'
							 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function cetak($id_suhu_tubuh)
	{
		$suhu_tubuh   = $this->suhu_tubuh_model->detail($id_suhu_tubuh);
		$id_pasien	  = $suhu_tubuh->id_pasien;
		$pasien 	  = $this->pasien_model->detail($id_pasien);

		$data    = array('title' => 'Riwayat Data Suhu Tubuh: '.$pasien->nama_pasien,
							'suhu_tubuh' => $suhu_tubuh,
							'pasien'	=> $pasien
							 );
		$this->load->view('suhu_tubuh/cetak', $data, FALSE);
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
		$data    = array(   'title' 	=> 'Tambah Data Suhu Tubuh',
							'pasien' 	=>  $pasien,
							'content' 	=> 'suhu_tubuh/tambah'
							 );
		$this->load->view('layout/wrapper', $data, FALSE);
		// jika validasi oke,maka masuk database
		}else{
			$inp = $this->input;
			$data = array(	'id_user'			=> $this->session->userdata('id_user'),
							'id_pasien'			=> $inp->post('id_pasien'),
							'tanggal_pengukuran'=> date('d-m-Y',strtotime($inp->post('tanggal_pengukuran'))),
							'jam_pengukuran'	=> $inp->post('jam_pengukuran'),
							'suhu_tubuh'		=> $inp->post('suhu_tubuh'),
							'metode_pengukuran'	=> $inp->post('metode_pengukuran'),
							'keterangan'		=> $inp->post('keterangan'),
							'tanggal_update'	=> date('Y-m-d H:i:s')
		    );
			// proses oleh model
			$this->suhu_tubuh_model->tambah($data);
			// notifikasi
			$this->session->set_flashdata('sukses', 'Data Berhasil ditambah !');
			redirect(base_url('suhu_tubuh'),'refresh');
		}
		// end masuk database
		}

		public function edit($id_suhu_tubuh)
		{
			// panggil data suhu_tubuh yg mau diedit
		$suhu_tubuh = $this->suhu_tubuh_model->detail($id_suhu_tubuh);

		// Ambil data pasien
		$pasien = $this->pasien_model->listing();

		// Validasi
		$this->form_validation->set_rules('id_pasien', 'Pasien', 'required',
			array('required' => '%s harus dipilih'));
		if ($this->form_validation->run()===FALSE) {
		// end validasi
		$data    = array(   'title' 	=> 'Edit Data Suhu Tubuh',
							'pasien' 	=>  $pasien,
							'suhu_tubuh'=>  $suhu_tubuh,
							'content' 	=> 'suhu_tubuh/edit'
							 );
		$this->load->view('layout/wrapper', $data, FALSE);
		// jika validasi oke,maka masuk database
		}else{
			$inp = $this->input;
			$data = array(	'id_suhu_tubuh'		=> $id_suhu_tubuh,
							'id_user'			=> $this->session->userdata('id_user'),
							'id_pasien'			=> $inp->post('id_pasien'),
							'tanggal_pengukuran'=> date('d-m-Y',strtotime($inp->post('tanggal_pengukuran'))),
							'jam_pengukuran'	=> $inp->post('jam_pengukuran'),
							'suhu_tubuh'		=> $inp->post('suhu_tubuh'),
							'metode_pengukuran'	=> $inp->post('metode_pengukuran'),
							'keterangan'		=> $inp->post('keterangan')
		    );
			// proses oleh model
			$this->suhu_tubuh_model->edit($data);
			// notifikasi
			$this->session->set_flashdata('sukses', 'Data Berhasil diubah !');
			redirect(base_url('suhu_tubuh'),'refresh');
		}
		// end masuk database
		}

		// Delete suhu tubuh
		public function delete($id_suhu_tubuh)
		{
			$data = array('id_suhu_tubuh' => $id_suhu_tubuh);
			// Proses Delete
			$this->suhu_tubuh_model->delete($data);
			// Notifikasi
			$this->session->set_flashdata('sukses', 'Data Berhasil Dihapus !');
			redirect(base_url('suhu_tubuh'),'refresh');

		}

	}


/* End of file Suhu_tubuh.php */
/* Location: ./application/controllers/Suhu_tubuh.php */