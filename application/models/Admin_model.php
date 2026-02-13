<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	// ============================================
	// ADMIN AUTH
	// ============================================
	
	// Login Admin (TANPA HASHING)
	public function login($email, $password) {
		$this->db->where('email', $email);
		$this->db->where('password', $password); // Plain text password
		$query = $this->db->get('admin');
		
		if ($query->num_rows() == 1) {
			return $query->row_array();
		}
		return false;
	}

	// ============================================
	// DASHBOARD
	// ============================================
	
	public function count_projects() {
		return $this->db->count_all('project');
	}

	public function count_sertifikats() {
		return $this->db->count_all('sertifikat');
	}

	public function count_pesan() {
		return $this->db->count_all('pesan');
	}

	public function count_skills() {
		return $this->db->count_all('skills');
	}

	public function get_latest_pesan($limit) {
		return $this->db->order_by('created_at', 'DESC')->limit($limit)->get('pesan')->result_array();
	}

	// ============================================
	// PROFILE
	// ============================================
	
	public function get_profile() {
		return $this->db->get('profile')->row_array();
	}

	public function update_profile($data) {
		$this->db->where('id', 1);
		return $this->db->update('profile', $data);
	}

	// ============================================
	// PROJECT
	// ============================================
	
	public function get_all_projects() {
		return $this->db->order_by('created_at', 'DESC')->get('project')->result_array();
	}

	public function get_project_by_id($id) {
		return $this->db->where('id', $id)->get('project')->row_array();
	}

	public function insert_project($data) {
		return $this->db->insert('project', $data);
	}

	public function update_project($id, $data) {
		$this->db->where('id', $id);
		return $this->db->update('project', $data);
	}

	public function delete_project($id) {
		$this->db->where('id', $id);
		return $this->db->delete('project');
	}

	// ============================================
	// SERTIFIKAT
	// ============================================
	
	public function get_all_sertifikats() {
		return $this->db->order_by('tahun', 'DESC')->get('sertifikat')->result_array();
	}

	public function get_sertifikat_by_id($id) {
		return $this->db->where('id', $id)->get('sertifikat')->row_array();
	}

	public function insert_sertifikat($data) {
		return $this->db->insert('sertifikat', $data);
	}

	public function update_sertifikat($id, $data) {
		$this->db->where('id', $id);
		return $this->db->update('sertifikat', $data);
	}

	public function delete_sertifikat($id) {
		$this->db->where('id', $id);
		return $this->db->delete('sertifikat');
	}

	// ============================================
	// SKILLS
	// ============================================
	
	public function get_all_skills() {
		return $this->db->order_by('level', 'DESC')->get('skills')->result_array();
	}

	public function get_skill_by_id($id) {
		return $this->db->where('id', $id)->get('skills')->row_array();
	}

	public function insert_skill($data) {
		return $this->db->insert('skills', $data);
	}

	public function update_skill($id, $data) {
		$this->db->where('id', $id);
		return $this->db->update('skills', $data);
	}

	public function delete_skill($id) {
		$this->db->where('id', $id);
		return $this->db->delete('skills');
	}

	// ============================================
	// TENTANG
	// ============================================
	
	public function get_tentang() {
		return $this->db->get('tentang')->row_array();
	}

	public function update_tentang($data) {
		$this->db->where('id', 1);
		return $this->db->update('tentang', $data);
	}

	// ============================================
	// SOSIAL MEDIA
	// ============================================
	
	public function get_all_sosial_media() {
		return $this->db->get('sosial_media')->result_array();
	}

	public function get_sosial_media_by_id($id) {
		return $this->db->where('id', $id)->get('sosial_media')->row_array();
	}

	public function insert_sosial_media($data) {
		return $this->db->insert('sosial_media', $data);
	}

	public function update_sosial_media($id, $data) {
		$this->db->where('id', $id);
		return $this->db->update('sosial_media', $data);
	}

	public function delete_sosial_media($id) {
		$this->db->where('id', $id);
		return $this->db->delete('sosial_media');
	}

	// ============================================
	// PESAN
	// ============================================
	
	public function get_all_pesan() {
		return $this->db->order_by('created_at', 'DESC')->get('pesan')->result_array();
	}

	public function get_pesan_by_id($id) {
		return $this->db->where('id', $id)->get('pesan')->row_array();
	}

	public function delete_pesan($id) {
		$this->db->where('id', $id);
		return $this->db->delete('pesan');
	}
}