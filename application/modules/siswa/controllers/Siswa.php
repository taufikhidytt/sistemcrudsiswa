<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model', 'siswa');
	}

	public function index()
	{
		$param = $this->input->post(null, true);
		$data['title'] = 'Data Siswa';
		$data['judul'] = 'Data Siswa';
		$data['siswa'] = $this->siswa->getData();
		$this->template->load('template', 'index', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nik', 'NIK Siswa', 'required|max_length[16]|is_unique[siswa.nik]');
		$this->form_validation->set_rules('nama', 'Nama Siswa', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Siswa', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin Siswa', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir Siswa', 'required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$this->form_validation->set_message('max_length', '{field} tidak lebih dari 16 karakter');
		$this->form_validation->set_message('is_unique', '{field} sudah ada silahkan cari nik baru');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Add Data Siswa';
			$data['judul'] = 'Add Data Siswa';
			$this->template->load('template', 'tambah', $data);
		} else {
			$data = $this->input->post(null, true);
			$this->siswa->add($data);
			if($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata('success', 'Selamat Anda Berhasil Menambahkan Data Baru');
				redirect('siswa');
			}else{
				$this->session->set_flashdata('error', 'Anda Gagal Menambahkan Data Baru');
				redirect('siswa');
			}
		}
	}

	public function ubah($id)
	{
		$this->form_validation->set_rules('nik', 'NIK Siswa', 'required|max_length[16]');
		$this->form_validation->set_rules('nama', 'Nama Siswa', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Siswa', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin Siswa', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir Siswa', 'required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$this->form_validation->set_message('max_length', '{field} tidak lebih dari 16 karakter');
		$this->form_validation->set_message('is_unique', '{field} sudah ada silahkan cari nik baru');
		if ($this->form_validation->run() == FALSE) {
			$query = $this->siswa->getData($id);
			if($query->num_rows() > 0){
				$data['title'] = 'Ubah Data';
				$data['judul'] = 'Ubah Data';
				$data['data'] = $query->row();
				$this->template->load('template', 'ubah', $data);
			}else{
				$this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
				redirect('barang');
			}
		} else {
			$data = $this->input->post(null, true);
			$this->siswa->ubah($data);
			if($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
				redirect('siswa');
			}else{
				$this->session->set_flashdata('warning', 'Anda Tidak Mengupdate Data');
				redirect('siswa');
			}
		}
	}

	public function del()
	{
		$id = $this->input->post(null, true);
		$this->siswa->delete($id);
		if($this->db->affected_rows() > 0 )
		{
			$this->session->set_flashdata('success', 'Selamat Anda Berhasil Menghapus Data');
			redirect('siswa');
		}else{
			$this->session->set_flashdata('error', 'Anda Gagal Menghapus Data');
			redirect('siswa');
		}
	}
}
