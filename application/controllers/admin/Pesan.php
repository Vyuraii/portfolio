<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

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

	// Halaman List Pesan
	public function index() {
		$data['title'] = 'Kelola Pesan';
		$data['pesans'] = $this->Admin_model->get_all_pesan();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/pesan', $data);
		$this->load->view('templates/admin_footer');
	}

	// Detail Pesan
	public function detail($id) {
		$data['title'] = 'Detail Pesan';
		$data['pesan'] = $this->Admin_model->get_pesan_by_id($id);

		if (empty($data['pesan'])) {
			redirect('admin/pesan');
		}

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/pesan_detail', $data);
		$this->load->view('templates/admin_footer');
	}

	// Hapus Pesan
	public function hapus($id) {
		$delete = $this->Admin_model->delete_pesan($id);

		if ($delete) {
			$this->session->set_flashdata('success', 'Pesan berhasil dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Gagal menghapus pesan!');
		}

		redirect('admin/pesan');
	}
}