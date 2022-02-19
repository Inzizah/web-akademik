<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// untuk pembatasan akses
		is_logged_in();
	}
	
	public function index() {

		$data['title'] = "My Profile";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('profile/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function detailProfile() {

		$data['title'] = "Detail My Profile";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('profile/detail-profile', $data);	
		$this->load->view('templates/footer', $data);
	}

	public function edit() {

		$data['title'] = "Edit Profile";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['semester'] = $this->db->get('semester')->result_array();
		$data['jurusan'] = $this->db->get('jurusan')->result_array();

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');
		
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('profile/edit-profile', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$nim = $this->input->post('nim');
			$semester = $this->input->post('semester');
			$jurusan = $this->input->post('jurusan');

			// cek jika ada gambar yang diupload
			$upload_image = $_FILES['image']['name'];

			// cek apakah yang diupload beneran gambar atau bukan dan ukurannya tidak kebesaran
			// bisa cari settingannya di codeigniter = file uploading class - setting preferences 
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/profil/';

				$this->load->library('upload', $config);

				// jika sudah lulus semua, upload filenya
				if ($this->upload->do_upload('image')) {
					// untuk gambar lama
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profil/' . $old_image);
					}

					// gambar akan diberikan nama, jika memiliki nama yang sama, maka database akan membuat nama itu sedikit berbeda
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					// jika tidak berhasil, tampilkan errornya 
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' .$this->upload->display_errors(). '</div>');
					redirect('profile');
				}

			}

			$this->db->set('name', $name);
			$this->db->set('nim', $nim);
			$this->db->set('semester', $semester);
			$this->db->set('jurusan', $jurusan);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated</div>');
			redirect('profile');
		}
	}

	public function changePassword() {

		$data['title'] = "Change Password";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// Gunanya untuk mencek inputan data, jika tidak sesuai maka akan tampil pesan error
		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('profile/change-password', $data);
			$this->load->view('templates/footer', $data);
		} else {
			// tangkap dulu data password awalnya
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');

			// cek password 
			if (!password_verify($current_password, $data['user']['password'])) {
				// jika password yang dimasukkan tidak sama dengan ada yang di database, maka tampilkan pesan error ini
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
				redirect('profile/changepassword');
			} else {
				//cek apakah password current password = new password
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
					redirect('profile/changepassword');
				} else {
					// jika passwordnya sudah benar dan ok, maka lanjutkan
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					// update password
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your password has been updated! </div>');
					redirect('profile/changepassword');
				}
			}
		}
		
		
	}

}