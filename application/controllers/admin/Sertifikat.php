<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat extends CI_Controller {

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

	// Halaman List Sertifikat
	public function index() {
		$data['title'] = 'Kelola Sertifikat';
		$data['sertifikats'] = $this->Admin_model->get_all_sertifikats();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/sertifikat', $data);
		$this->load->view('templates/admin_footer');
	}

	// Tambah Sertifikat
	public function tambah() {
		$this->form_validation->set_rules('nama_sertifikat', 'Nama Sertifikat', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			// Upload file sertifikat
			if (empty($_FILES['file']['name'])) {
				$this->session->set_flashdata('error', 'File sertifikat wajib diupload!');
				redirect('admin/sertifikat');
			}

			// Buat folder jika belum ada
			if (!is_dir('./uploads/sertifikat/')) {
				mkdir('./uploads/sertifikat/', 0777, true);
			}

			// Konfigurasi upload - SEMUA FORMAT FILE DIIZINKAN
			$config['upload_path'] = './uploads/sertifikat/';
			$config['allowed_types'] = '*'; // Izinkan semua tipe file
			$config['max_size'] = 10240; // 10MB
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {
				$upload_data = $this->upload->data();
				
				$data = array(
					'nama_sertifikat' => $this->input->post('nama_sertifikat'),
					'deskripsi' => $this->input->post('deskripsi'),
					'tahun' => $this->input->post('tahun'),
					'file' => $upload_data['file_name']
				);

				$insert = $this->Admin_model->insert_sertifikat($data);

				if ($insert) {
					$this->session->set_flashdata('success', 'Sertifikat berhasil ditambahkan!');
				} else {
					$this->session->set_flashdata('error', 'Gagal menambahkan sertifikat!');
				}
			} else {
				$error = $this->upload->display_errors('', '');
				$this->session->set_flashdata('error', 'Upload file gagal: ' . $error);
			}

			redirect('admin/sertifikat');
		}
	}

	// Edit Sertifikat
	public function edit($id) {
		$this->form_validation->set_rules('nama_sertifikat', 'Nama Sertifikat', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'nama_sertifikat' => $this->input->post('nama_sertifikat'),
				'deskripsi' => $this->input->post('deskripsi'),
				'tahun' => $this->input->post('tahun')
			);

			// Upload file baru jika ada
			if (!empty($_FILES['file']['name'])) {
				// Buat folder jika belum ada
				if (!is_dir('./uploads/sertifikat/')) {
					mkdir('./uploads/sertifikat/', 0777, true);
				}

				// Konfigurasi upload - SEMUA FORMAT FILE DIIZINKAN
				$config['upload_path'] = './uploads/sertifikat/';
				$config['allowed_types'] = '*'; // Izinkan semua tipe file
				$config['max_size'] = 10240; // 10MB
				$config['encrypt_name'] = TRUE;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('file')) {
					$upload_data = $this->upload->data();
					
					// Hapus file lama
					$old_sertifikat = $this->Admin_model->get_sertifikat_by_id($id);
					if (!empty($old_sertifikat['file']) && file_exists('./uploads/sertifikat/' . $old_sertifikat['file'])) {
						unlink('./uploads/sertifikat/' . $old_sertifikat['file']);
					}

					$data['file'] = $upload_data['file_name'];
				} else {
					$error = $this->upload->display_errors('', '');
					$this->session->set_flashdata('error', 'Upload file gagal: ' . $error);
					redirect('admin/sertifikat');
				}
			}

			$update = $this->Admin_model->update_sertifikat($id, $data);

			if ($update) {
				$this->session->set_flashdata('success', 'Sertifikat berhasil diupdate!');
			} else {
				$this->session->set_flashdata('error', 'Gagal mengupdate sertifikat!');
			}

			redirect('admin/sertifikat');
		}
	}

	// Hapus Sertifikat
	public function hapus($id) {
		$sertifikat = $this->Admin_model->get_sertifikat_by_id($id);

		// Hapus file
		if (!empty($sertifikat['file']) && file_exists('./uploads/sertifikat/' . $sertifikat['file'])) {
			unlink('./uploads/sertifikat/' . $sertifikat['file']);
		}

		$delete = $this->Admin_model->delete_sertifikat($id);

		if ($delete) {
			$this->session->set_flashdata('success', 'Sertifikat berhasil dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Gagal menghapus sertifikat!');
		}

		redirect('admin/sertifikat');
	}
}