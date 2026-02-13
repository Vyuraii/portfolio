<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

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

	// Halaman List Project
	public function index() {
		$data['title'] = 'Kelola Project';
		$data['projects'] = $this->Admin_model->get_all_projects();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/project', $data);
		$this->load->view('templates/admin_footer');
	}

	// Tambah Project
	public function tambah() {
		$this->form_validation->set_rules('nama_project', 'Nama Project', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
		$this->form_validation->set_rules('github_link', 'Link GitHub', 'required|trim');
		$this->form_validation->set_rules('teknologi', 'Teknologi', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'nama_project' => $this->input->post('nama_project'),
				'deskripsi' => $this->input->post('deskripsi'),
				'github_link' => $this->input->post('github_link'),
				'teknologi' => $this->input->post('teknologi')
			);

			// Upload thumbnail
			if (!empty($_FILES['thumbnail']['name'])) {
				// Buat folder jika belum ada
				if (!is_dir('./uploads/project/')) {
					mkdir('./uploads/project/', 0777, true);
				}

				// Konfigurasi upload - SEMUA FORMAT GAMBAR DIIZINKAN
				$config['upload_path'] = './uploads/project/';
				$config['allowed_types'] = '*'; // Izinkan semua tipe file
				$config['max_size'] = 10240; // 10MB
				$config['encrypt_name'] = TRUE;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('thumbnail')) {
					$upload_data = $this->upload->data();
					$data['thumbnail'] = $upload_data['file_name'];
				} else {
					$error = $this->upload->display_errors('', '');
					$this->session->set_flashdata('error', 'Upload thumbnail gagal: ' . $error);
					redirect('admin/project');
				}
			}

			$insert = $this->Admin_model->insert_project($data);

			if ($insert) {
				$this->session->set_flashdata('success', 'Project berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('error', 'Gagal menambahkan project!');
			}

			redirect('admin/project');
		}
	}

	// Edit Project
	public function edit($id) {
		$this->form_validation->set_rules('nama_project', 'Nama Project', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
		$this->form_validation->set_rules('github_link', 'Link GitHub', 'required|trim');
		$this->form_validation->set_rules('teknologi', 'Teknologi', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'nama_project' => $this->input->post('nama_project'),
				'deskripsi' => $this->input->post('deskripsi'),
				'github_link' => $this->input->post('github_link'),
				'teknologi' => $this->input->post('teknologi')
			);

			// Upload thumbnail baru
			if (!empty($_FILES['thumbnail']['name'])) {
				// Buat folder jika belum ada
				if (!is_dir('./uploads/project/')) {
					mkdir('./uploads/project/', 0777, true);
				}

				// Konfigurasi upload - SEMUA FORMAT GAMBAR DIIZINKAN
				$config['upload_path'] = './uploads/project/';
				$config['allowed_types'] = '*'; // Izinkan semua tipe file
				$config['max_size'] = 10240; // 10MB
				$config['encrypt_name'] = TRUE;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('thumbnail')) {
					$upload_data = $this->upload->data();
					
					// Hapus thumbnail lama
					$old_project = $this->Admin_model->get_project_by_id($id);
					if (!empty($old_project['thumbnail']) && file_exists('./uploads/project/' . $old_project['thumbnail'])) {
						unlink('./uploads/project/' . $old_project['thumbnail']);
					}

					$data['thumbnail'] = $upload_data['file_name'];
				} else {
					$error = $this->upload->display_errors('', '');
					$this->session->set_flashdata('error', 'Upload thumbnail gagal: ' . $error);
					redirect('admin/project');
				}
			}

			$update = $this->Admin_model->update_project($id, $data);

			if ($update) {
				$this->session->set_flashdata('success', 'Project berhasil diupdate!');
			} else {
				$this->session->set_flashdata('error', 'Gagal mengupdate project!');
			}

			redirect('admin/project');
		}
	}

	// Hapus Project
	public function hapus($id) {
		$project = $this->Admin_model->get_project_by_id($id);

		// Hapus file thumbnail
		if (!empty($project['thumbnail']) && file_exists('./uploads/project/' . $project['thumbnail'])) {
			unlink('./uploads/project/' . $project['thumbnail']);
		}

		$delete = $this->Admin_model->delete_project($id);

		if ($delete) {
			$this->session->set_flashdata('success', 'Project berhasil dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Gagal menghapus project!');
		}

		redirect('admin/project');
	}
}