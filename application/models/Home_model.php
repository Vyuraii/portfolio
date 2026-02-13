<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	// Get Profile
	public function get_profile() {
		return $this->db->get('profile')->row_array();
	}

	// Get Skills
	public function get_skills() {
		return $this->db->order_by('level', 'DESC')->get('skills')->result_array();
	}

	// Get Projects
	public function get_projects($limit = null) {
		if ($limit) {
			$this->db->limit($limit);
		}
		return $this->db->order_by('created_at', 'DESC')->get('project')->result_array();
	}

	// Get Sertifikat
	public function get_sertifikats($limit = null) {
		if ($limit) {
			$this->db->limit($limit);
		}
		return $this->db->order_by('tahun', 'DESC')->get('sertifikat')->result_array();
	}

	// Get Tentang
	public function get_tentang() {
		return $this->db->get('tentang')->row_array();
	}

	// Get Sosial Media
	public function get_sosial_media() {
		return $this->db->get('sosial_media')->result_array();
	}

	// Insert Pesan
	public function insert_pesan($data) {
		return $this->db->insert('pesan', $data);
	}
}