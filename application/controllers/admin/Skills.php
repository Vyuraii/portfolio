<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skills extends CI_Controller {

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

	// Halaman List Skills
	public function index() {
		$data['title'] = 'Kelola Skills';
		$data['skills'] = $this->Admin_model->get_all_skills();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/skills', $data);
		$this->load->view('templates/admin_footer');
	}

	// Tambah Skill
	public function tambah() {
		$this->form_validation->set_rules('nama_skill', 'Nama Skill', 'required|trim');
		$this->form_validation->set_rules('level', 'Level', 'required|trim|numeric|greater_than[0]|less_than[101]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
		} else {
			$data = array(
				'nama_skill' => $this->input->post('nama_skill'),
				'level' => $this->input->post('level')
			);

			$insert = $this->Admin_model->insert_skill($data);

			if ($insert) {
				$this->session->set_flashdata('success', 'Skill berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('error', 'Gagal menambahkan skill!');
			}
		}

		redirect('admin/skills');
	}

	// Edit Skill
	public function edit($id) {
		$this->form_validation->set_rules('nama_skill', 'Nama Skill', 'required|trim');
		$this->form_validation->set_rules('level', 'Level', 'required|trim|numeric|greater_than[0]|less_than[101]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
		} else {
			$data = array(
				'nama_skill' => $this->input->post('nama_skill'),
				'level' => $this->input->post('level')
			);

			$update = $this->Admin_model->update_skill($id, $data);

			if ($update) {
				$this->session->set_flashdata('success', 'Skill berhasil diupdate!');
			} else {
				$this->session->set_flashdata('error', 'Gagal mengupdate skill!');
			}
		}

		redirect('admin/skills');
	}

	// Hapus Skill
	public function hapus($id) {
		$delete = $this->Admin_model->delete_skill($id);

		if ($delete) {
			$this->session->set_flashdata('success', 'Skill berhasil dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Gagal menghapus skill!');
		}

		redirect('admin/skills');
	}
}