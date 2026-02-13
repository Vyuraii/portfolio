<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sosial_media extends CI_Controller {

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

	// Halaman List Sosial Media
	public function index() {
		$data['title'] = 'Kelola Sosial Media';
		$data['sosial_medias'] = $this->Admin_model->get_all_sosial_media();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/sosial_media', $data);
		$this->load->view('templates/admin_footer');
	}

	// Tambah Sosial Media
	public function tambah() {
		$this->form_validation->set_rules('nama_platform', 'Nama Platform', 'required|trim');
		$this->form_validation->set_rules('link', 'Link', 'required|trim');
		$this->form_validation->set_rules('icon', 'Icon', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
		} else {
			$data = array(
				'nama_platform' => $this->input->post('nama_platform'),
				'link' => $this->input->post('link'),
				'icon' => $this->input->post('icon')
			);

			$insert = $this->Admin_model->insert_sosial_media($data);

			if ($insert) {
				$this->session->set_flashdata('success', 'Sosial Media berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('error', 'Gagal menambahkan sosial media!');
			}
		}

		redirect('admin/sosial_media');
	}

	// Edit Sosial Media
	public function edit($id) {
		$this->form_validation->set_rules('nama_platform', 'Nama Platform', 'required|trim');
		$this->form_validation->set_rules('link', 'Link', 'required|trim');
		$this->form_validation->set_rules('icon', 'Icon', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
		} else {
			$data = array(
				'nama_platform' => $this->input->post('nama_platform'),
				'link' => $this->input->post('link'),
				'icon' => $this->input->post('icon')
			);

			$update = $this->Admin_model->update_sosial_media($id, $data);

			if ($update) {
				$this->session->set_flashdata('success', 'Sosial Media berhasil diupdate!');
			} else {
				$this->session->set_flashdata('error', 'Gagal mengupdate sosial media!');
			}
		}

		redirect('admin/sosial_media');
	}

	// Hapus Sosial Media
	public function hapus($id) {
		$delete = $this->Admin_model->delete_sosial_media($id);

		if ($delete) {
			$this->session->set_flashdata('success', 'Sosial Media berhasil dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Gagal menghapus sosial media!');
		}

		redirect('admin/sosial_media');
	}
}