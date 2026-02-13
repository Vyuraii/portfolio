<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->check_login();
		$this->load->model('Admin_model');
	}

	// Cek login
	private function check_login() {
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('admin/login');
		}
	}

	// Halaman Tentang
	public function index() {
		$data['title'] = 'Kelola Tentang Saya';
		$data['tentang'] = $this->Admin_model->get_tentang();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/tentang', $data);
		$this->load->view('templates/admin_footer');
	}

	// Update Tentang
	public function update() {
		$this->form_validation->set_rules('judul', 'Judul', 'required|trim');
		$this->form_validation->set_rules('isi', 'Isi', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi')
			);

			$update = $this->Admin_model->update_tentang($data);

			if ($update) {
				$this->session->set_flashdata('success', 'Tentang Saya berhasil diupdate!');
			} else {
				$this->session->set_flashdata('error', 'Gagal mengupdate Tentang Saya!');
			}

			redirect('admin/tentang');
		}
	}
}