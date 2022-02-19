<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{
	
	public function index() 
	{

		$data['title'] = "Menu Management";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// query data menu
		$data['menu'] = $this->db->get('user_menu')->result_array();

		// form_validation untuk conek bisa dihubungkan dengan autoload.php->library->masukkan 'form_validation'
		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/footer', $data);	
		} else {
			// jika data berhasil dimasukkan
			$this->db->insert('user_menu',['menu' => $this->input->post('menu')]);
			// pesan berhasil menambahkan menu baru
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New menu added!</div>');
			redirect('menu');
		}
		
	}

	public function submenu()
	{
		$data['title'] = 'Submenu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// model menu
		$this->load->model('Menu_models', 'menu');

		$data['subMenu'] = $this->menu->getSubMenu();
		// kirim data menu
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			// user dan admin page dan menu
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer');	
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->insert('user_sub_menu', $data); 
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
			redirect('menu/submenu');
		}
	}

	public function hapusMenu($id)
	{
		$this->load->model('Menu_models', 'menu');
		// buat menu model dan saling terhubung dengan models-Menu_model.php
		$data['menu'] = $this->menu->hapusDataMenu($id);
		// kirim data menu
		$data['menu'] = $this->db->get('user_menu')->result_array();

		// kirim pesan successnya
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your data was successfully deleted!</div>');
		redirect('menu');
	}

	public function hapusSubMenu($id)
	{
		$this->load->model('Menu_models', 'menu');
		// buat menu model dan saling terhubung dengan models-Menu_model.php
		$data['menu'] = $this->menu->hapusDataSubMenu($id);
		// kirim data menu
		$data['menu'] = $this->db->get('user_sub_menu')->result_array();

		// kirim pesan successnya
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your data was successfully deleted!</div>');
		redirect('menu/submenu');
	}

	public function edit()
	{
		// model menu
		$this->load->model('Menu_models', 'menu');

		$data['menu'] = $this->menu->getMenuById($id);

		// $data['menu'] = $this->menu->editMenu();
		
		// kirim data menu
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your menu has been updated!</div>');
		redirect('menu');
	}

	public function editSubmenu()
	{
		// model menu
		$this->load->model('Menu_models', 'menu');

		$data['menu'] = $this->menu->getSubmenuById($id);

		$data['menu'] = $this->menu->editSubmenu();
		
		// kirim data menu
		$data['menu'] = $this->db->get('user_sub_menu')->result_array();

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your submenu has been updated!</div>');
		redirect('menu/submenu');
	}
}


