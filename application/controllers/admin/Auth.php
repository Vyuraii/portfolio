<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Admin_model');
	}

	// Halaman Login
	public function login() {
		// Jika sudah login, redirect ke dashboard
		if ($this->session->userdata('admin_logged_in')) {
			redirect('admin/dashboard');
		}

		$data['title'] = 'Login Admin';

		$this->load->view('admin/login', $data);
	}

	// Proses Login
	public function do_login() {
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->login();
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			// Cek login (TANPA HASHING)
			$admin = $this->Admin_model->login($email, $password);

			if ($admin) {
				// Set session
				$session_data = array(
					'admin_id' => $admin['id'],
					'admin_nama' => $admin['nama'],
					'admin_email' => $admin['email'],
					'admin_logged_in' => TRUE
				);

				$this->session->set_userdata($session_data);
				redirect('admin/dashboard');
			} else {
				$this->session->set_flashdata('error', 'Email atau Password salah!');
				redirect('admin/login');
			}
		}
	}

	// Logout
	public function logout() {
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('admin_nama');
		$this->session->unset_userdata('admin_email');
		$this->session->unset_userdata('admin_logged_in');
		$this->session->set_flashdata('success', 'Berhasil logout!');
		redirect('admin/login');
	}
}