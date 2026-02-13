<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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

	// Halaman Profile
	public function index() {
		$data['title'] = 'Kelola Profile';
		$data['profile'] = $this->Admin_model->get_profile();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('templates/admin_footer');
	}

	// Update Profile
	public function update() {
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
		$this->form_validation->set_rules('ipk', 'IPK', 'required|trim');
		$this->form_validation->set_rules('semester', 'Semester', 'required|trim');
		$this->form_validation->set_rules('universitas', 'Universitas', 'required|trim');
		$this->form_validation->set_rules('jenjang', 'Jenjang', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'deskripsi' => $this->input->post('deskripsi'),
				'ipk' => $this->input->post('ipk'),
				'semester' => $this->input->post('semester'),
				'universitas' => $this->input->post('universitas'),
				'jenjang' => $this->input->post('jenjang')
			);

			// Cek upload foto
			if (!empty($_FILES['foto']['name'])) {
				// Buat folder jika belum ada
				if (!is_dir('./uploads/profile/')) {
					mkdir('./uploads/profile/', 0777, true);
				}

				// Konfigurasi upload - SEMUA FORMAT GAMBAR DIIZINKAN
				$config['upload_path'] = './uploads/profile/';
				$config['allowed_types'] = '*'; // Izinkan semua tipe file
				$config['max_size'] = 10240; // 10MB
				$config['encrypt_name'] = TRUE;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('foto')) {
					$upload_data = $this->upload->data();
					
					// Hapus foto lama jika ada
					$old_profile = $this->Admin_model->get_profile();
					if (!empty($old_profile['foto']) && $old_profile['foto'] != 'default.jpg' && file_exists('./uploads/profile/' . $old_profile['foto'])) {
						unlink('./uploads/profile/' . $old_profile['foto']);
					}

					$data['foto'] = $upload_data['file_name'];
					
					$this->session->set_flashdata('success', 'Profile dan foto berhasil diupdate!');
				} else {
					$error = $this->upload->display_errors('', '');
					$this->session->set_flashdata('error', 'Upload foto gagal: ' . $error);
					redirect('admin/profile');
				}
			} else {
				$this->session->set_flashdata('success', 'Profile berhasil diupdate!');
			}

			// Update data
			$update = $this->Admin_model->update_profile($data);

			if (!$update) {
				$this->session->set_flashdata('error', 'Gagal mengupdate profile! Silakan coba lagi.');
			}

			redirect('admin/profile');
		}
	}
}