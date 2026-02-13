<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

	// Dashboard Utama
	public function index() {
		$data['title'] = 'Dashboard Admin';
		$data['total_project'] = $this->Admin_model->count_projects();
		$data['total_sertifikat'] = $this->Admin_model->count_sertifikats();
		$data['total_pesan'] = $this->Admin_model->count_pesan();
		$data['total_skill'] = $this->Admin_model->count_skills();
		$data['pesan_terbaru'] = $this->Admin_model->get_latest_pesan(5);

		$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates/admin_footer');
	}
}