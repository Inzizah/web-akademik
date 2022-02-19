<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_models extends CI_Model
{
	public function getSubMenu()
	{
		$query = "SELECT `user_sub_menu`.*, `user_menu`.`menu` FROM `user_sub_menu` JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
				";
		return $this->db->query($query)->result_array();
	}

	public function getSubmenuById($id)
	{
		return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
	}

	public function getMenuById($id)
	{
		return $this->db->get_where('user_menu', ['id' => $id])->row_array();
	}

	public function editMenu()
	{
		$data = [
			"menu" => $this->input->post('menu', true),
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('user_menu', $data);
	}

	public function editSubmenu()
	{
		$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('user_sub_menu', $data); 
	}

	// bagian delete data pada menu management
	public function hapusDataMenu($id)
	{
		$this->db->delete('user_menu', ['id' => $id]);
	}

	// bagian delete data pada sub menu management
	public function hapusDataSubMenu($id)
	{
		$this->db->delete('user_sub_menu', ['id' => $id]);
	}

	// bagian delete data pada data dosen
	public function hapusDataDosen($id)
	{
		$this->db->delete('dt_dosen', ['id_dsn' => $id]);
	}
	
}