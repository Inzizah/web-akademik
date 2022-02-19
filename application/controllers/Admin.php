<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// untuk pembatasan akses
		is_logged_in();
	}

	public function index() {

		$data['title'] = "Dashboard";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function role() {

		$data['title'] = "Role";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$data = [
				'role' => $this->input->post('role')
			];

			$this->db->insert('user_role', $data); 
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
			redirect('admin/role');

		}
	}

	public  function roleAccess($role_id) {

		$data['title'] = "Role Access";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();


		$this->db->where('id !=', 1);  //untuk menghilangkan menu admin yang tampil di role access
		$data['menu'] = $this->db->get('user_menu')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer', $data);
	}

	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Access Changed!</div>');
	}

	public function deleteRole($id) 
	{
		$this->db->delete('user_role', ['id' => $id]);
		// kirim data dosen
		$data['role'] = $this->db->get('user_role')->result_array();

		// kirim pesan successnya
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your data was successfully deleted!</div>');
		redirect('admin/role');
	}

}