<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Home_model');
	}

	// Halaman Utama
	public function index() {
		$data['title'] = 'Home - Portfolio';
		$data['profile'] = $this->Home_model->get_profile();
		$data['skills'] = $this->Home_model->get_skills();
		$data['projects'] = $this->Home_model->get_projects(3); // Tampilkan 3 project terbaru
		$data['sertifikats'] = $this->Home_model->get_sertifikats(3); // Tampilkan 3 sertifikat terbaru
		$data['sosial_media'] = $this->Home_model->get_sosial_media();
		
		$this->load->view('templates/header', $data);
		$this->load->view('public/home', $data);
		$this->load->view('templates/footer');
	}

	// Halaman Tentang
	public function tentang() {
		$data['title'] = 'Tentang Saya - Portfolio';
		$data['profile'] = $this->Home_model->get_profile();
		$data['tentang'] = $this->Home_model->get_tentang();
		$data['skills'] = $this->Home_model->get_skills();
		$data['sosial_media'] = $this->Home_model->get_sosial_media();
		
		$this->load->view('templates/header', $data);
		$this->load->view('public/tentang', $data);
		$this->load->view('templates/footer');
	}

	// Halaman Project
	public function project() {
		$data['title'] = 'Project - Portfolio';
		$data['profile'] = $this->Home_model->get_profile();
		$data['projects'] = $this->Home_model->get_projects();
		$data['sosial_media'] = $this->Home_model->get_sosial_media();
		
		$this->load->view('templates/header', $data);
		$this->load->view('public/project', $data);
		$this->load->view('templates/footer');
	}

	// Halaman Sertifikat
	public function sertifikat() {
		$data['title'] = 'Sertifikat - Portfolio';
		$data['profile'] = $this->Home_model->get_profile();
		$data['sertifikats'] = $this->Home_model->get_sertifikats();
		$data['sosial_media'] = $this->Home_model->get_sosial_media();
		
		$this->load->view('templates/header', $data);
		$this->load->view('public/sertifikat', $data);
		$this->load->view('templates/footer');
	}

	// Halaman Kontak
	public function kontak() {
		$data['title'] = 'Hubungi Saya - Portfolio';
		$data['profile'] = $this->Home_model->get_profile();
		$data['sosial_media'] = $this->Home_model->get_sosial_media();
		
		$this->load->view('templates/header', $data);
		$this->load->view('public/kontak', $data);
		$this->load->view('templates/footer');
	}

	// Proses Kirim Pesan
	public function kirim_pesan() {
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('subjek', 'Subjek', 'required|trim');
		$this->form_validation->set_rules('pesan', 'Pesan', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('kontak');
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'subjek' => $this->input->post('subjek'),
				'pesan' => $this->input->post('pesan')
			);

			// Simpan ke database
			$insert = $this->Home_model->insert_pesan($data);

			if ($insert) {
				// Kirim email
				$this->send_email($data);
				
				$this->session->set_flashdata('success', 'Pesan berhasil dikirim! Terima kasih telah menghubungi saya.');
			} else {
				$this->session->set_flashdata('error', 'Gagal mengirim pesan. Silakan coba lagi.');
			}

			redirect('kontak');
		}
	}

	// Fungsi kirim email
	private function send_email($data) {
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'your_email@gmail.com', // Ganti dengan email Anda
			'smtp_pass' => 'your_app_password', // Ganti dengan App Password
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		);

		$this->email->initialize($config);
		$this->email->from($data['email'], $data['nama']);
		$this->email->to('your_email@gmail.com'); // Email tujuan (email Anda)
		$this->email->subject($data['subjek']);
		
		$message = "
			<h3>Pesan dari Portfolio Website</h3>
			<p><strong>Nama:</strong> {$data['nama']}</p>
			<p><strong>Email:</strong> {$data['email']}</p>
			<p><strong>Subjek:</strong> {$data['subjek']}</p>
			<p><strong>Pesan:</strong></p>
			<p>{$data['pesan']}</p>
		";
		
		$this->email->message($message);
		$this->email->send();
	}
}