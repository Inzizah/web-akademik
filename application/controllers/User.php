<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// untuk pembatasan akses dengan helpers
		is_logged_in();
		$this->load->model('User_models');
	}
	
	public function index() 
	{

		$data['title'] = "Lecturer new";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function dataDosen() 
	{

		$data['title'] = "Lecturer Data";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['data'] = $this->db->get('dt_dosen')->result_array();

		// cari data dosen
		if ( $this->input->post('keyword') ) {
			$data['data'] = $this->User_models->cariAddDosen();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/data_dosen', $data);
		$this->load->view('templates/footer', $data);
	}

	public function addDataDosen()
	{

		$data['title'] = "Add New Lecturer Data";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['dosen'] = $this->db->get('dt_dosen')->result_array();
		$data['jurusan'] = $this->db->get('jurusan')->result_array();
		$data['semester'] = $this->db->get('semester')->result_array();
		
		$this->form_validation->set_rules('nm_dsn', 'Nama', 'required');
		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
		$this->form_validation->set_rules('jbtn_dsn', 'Jabatan', 'required');
		$this->form_validation->set_rules('email_dsn', 'Email', 'required');
		$this->form_validation->set_rules('tlpn_dsn', 'Telepon', 'required');
		$this->form_validation->set_rules('almt_dsn', 'Alamat', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/add_datadosen', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$data = [
				'nm_dsn' => $this->input->post('nm_dsn'),
				'pendidikan' => $this->input->post('pendidikan'),
				'jbtn_dsn' => $this->input->post('jbtn_dsn'),
				'email_dsn' => $this->input->post('email_dsn'),
				'tlpn_dsn' => $this->input->post('tlpn_dsn'),
				'almt_dsn' => $this->input->post('almt_dsn')
			];
			$this->db->insert('dt_dosen', $data); 
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
			redirect('user/datadosen');
		}
	}

	public function ubahDataDosen($id)
	{

		$data['title'] = "Edit Lecturer Data";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['ubah'] = $this->db->get_where('dt_dosen', ['id' => $id])->row_array();

		$data['dosen'] = $this->db->get('dt_dosen')->result_array();
		$data['jurusan'] = $this->db->get('jurusan')->result_array();
		$data['semester'] = $this->db->get('semester')->result_array();
		
		$this->form_validation->set_rules('nm_dsn', 'Nama', 'required');
		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
		$this->form_validation->set_rules('jbtn_dsn', 'Jabatan', 'required');
		$this->form_validation->set_rules('email_dsn', 'Email', 'required');
		$this->form_validation->set_rules('tlpn_dsn', 'Telepon', 'required');
		$this->form_validation->set_rules('almt_dsn', 'Alamat', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/ubah_datadosen', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$data = [
				'nm_dsn' => $this->input->post('nm_dsn'),
				'pendidikan' => $this->input->post('pendidikan'),
				'jbtn_dsn' => $this->input->post('jbtn_dsn'),
				'email_dsn' => $this->input->post('email_dsn'),
				'tlpn_dsn' => $this->input->post('tlpn_dsn'),
				'almt_dsn' => $this->input->post('almt_dsn')
			];

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('dt_dosen', $data); 
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your data successfully updated!</div>');
			redirect('user/datadosen');
		}
	}

	public function deletedataDosen($id) 
	{
		$this->load->model('User_models', 'dosen');
		// buat menu model dan saling terhubung dengan models-Menu_model.php
		$data['dosen'] = $this->dosen->hapusDataDosen($id);
		// kirim data dosen
		$data['dosen'] = $this->db->get('dt_dosen')->result_array();

		// kirim pesan successnya
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your data was successfully deleted!</div>');
		redirect('user/datadosen');
	}

	public function absensiDosen() 
	{

		$data['title'] = "Absensi Dosen";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['dosen'] = $this->db->get('absen_dosen')->result_array();

		// cari data dosen
		if ( $this->input->post('keyword') ) {
			$data['dosen'] = $this->User_models->cariAbsenDosen();
		}
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/absensi_dosen', $data);
			$this->load->view('templates/footer', $data);
	}

	public function addAbsenDosen() 
	{

		$data['title'] = "Add Absen Dosen";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['dosen'] = $this->db->get('absen_dosen')->result_array();
		$data['jurusan'] = $this->db->get('jurusan')->result_array();
		$data['semester'] = $this->db->get('semester')->result_array();
		
		$this->form_validation->set_rules('nm_dsn', 'Nama', 'required');
		$this->form_validation->set_rules('kode_matkul', 'Kode Mata Kuliah', 'required');
		$this->form_validation->set_rules('matkul', 'Mata Kuliah', 'required');
		$this->form_validation->set_rules('materi', 'Materi', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('semester', 'Semester', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jam', 'Jam', 'required');
		$this->form_validation->set_rules('ruangan', 'Ruangan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/add_absendosen', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$data = [
				'nm_dsn' => $this->input->post('nm_dsn'),
				'kode_matkul' => $this->input->post('kode_matkul'),
				'matkul' => $this->input->post('matkul'),
				'materi' => $this->input->post('materi'),
				'jurusan' => $this->input->post('jurusan'),
				'semester' => $this->input->post('semester'),
				'tanggal' => $this->input->post('tanggal'),
				'jam' => $this->input->post('jam'),
				'ruangan' => $this->input->post('ruangan')

			];
			$this->db->insert('absen_dosen', $data); 
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
			redirect('user/absensidosen');
		}
	}

	
	public function editAbsenDosen($id) 
	{

		$data['title'] = "Edit Absen Dosen";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('User_models', 'dosen');
		$data['edit'] = $this->dosen->getAbsenDosenById($id);

		$data['dosen'] = $this->db->get('absen_dosen')->result_array();

		$data['semester'] = $this->db->get('semester')->result_array();

		$data['jurusan'] = $this->db->get('jurusan')->result_array();
		
		$this->form_validation->set_rules('nm_dsn', 'Nama', 'required');
		$this->form_validation->set_rules('kode_matkul', 'Kode Mata Kuliah', 'required');
		$this->form_validation->set_rules('matkul', 'Mata Kuliah', 'required');
		$this->form_validation->set_rules('materi', 'Materi', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('semester', 'Semester', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jam', 'Jam', 'required');
		$this->form_validation->set_rules('ruangan', 'Ruangan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit_absendosen', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$data = [
				'nm_dsn' => $this->input->post('nm_dsn'),
				'kode_matkul' => $this->input->post('kode_matkul'),
				'matkul' => $this->input->post('matkul'),
				'materi' => $this->input->post('materi'),
				'jurusan' => $this->input->post('jurusan'),
				'semester' => $this->input->post('semester'),
				'tanggal' => $this->input->post('tanggal'),
				'jam' => $this->input->post('jam'),
				'ruangan' => $this->input->post('ruangan')
			];

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('absen_dosen', $data); 
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your data successfully updated!</div>');
			redirect('user/absensidosen');
		}
	}

	public function deleteAbsenDosen($id) 
	{
		$this->load->model('User_models', 'dosen');
		// buat menu model dan saling terhubung dengan models-Menu_model.php
		$data['dosen'] = $this->dosen->hapusAbsenDosen($id);
		// kirim data dosen
		$data['dosen'] = $this->db->get('absen_dosen')->result_array();

		// kirim pesan successnya
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your data was successfully deleted!</div>');
		redirect('user/absensidosen');
	}

	public function jadwalKelasDosen() 
	{

		$data['title'] = "Teaching Schedule";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['dosen'] = $this->db->get('jadwal_mengajar')->result_array();

		// cari data dosen
		if ( $this->input->post('keyword') ) {
			$data['dosen'] = $this->User_models->cariJadwalDosen();
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/jadwal_kelas_dosen', $data);
		$this->load->view('templates/footer', $data);
	}

	public function addJadwalDosen() 
	{

		$data['title'] = "Add Teaching Schedule";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['dosen'] = $this->db->get('absen_dosen')->result_array();
		$data['jurusan'] = $this->db->get('jurusan')->result_array();
		$data['semester'] = $this->db->get('semester')->result_array();
		$data['tahun'] = $this->db->get('tahun_akd')->result_array();
		
		$this->form_validation->set_rules('nm_dsn', 'Nama', 'required');
		$this->form_validation->set_rules('kode_matkul', 'Kode Mata Kuliah', 'required');
		$this->form_validation->set_rules('matkul', 'Mata Kuliah', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jam', 'Jam', 'required');
		$this->form_validation->set_rules('ruangan', 'Ruangan', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('semester', 'Semester', 'required');
		$this->form_validation->set_rules('tahun_akd', 'Tahun Akademik', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/add_jadwaldosen', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$data = [
				'nm_dsn' => $this->input->post('nm_dsn'),
				'kode_matkul' => $this->input->post('kode_matkul'),
				'matkul' => $this->input->post('matkul'),
				'tanggal' => $this->input->post('tanggal'),
				'jam' => $this->input->post('jam'),
				'ruangan' => $this->input->post('ruangan'),
				'jurusan' => $this->input->post('jurusan'),
				'semester' => $this->input->post('semester'),
				'tahun_akd' => $this->input->post('tahun_akd')
			];
			$this->db->insert('jadwal_mengajar', $data); 
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
			redirect('user/jadwalkelasdosen');
		}
	}

	public function deleteJadwalDosen($id)
	{
		$this->load->model('User_models', 'dosen');
		// buat menu model dan saling terhubung dengan models-Menu_model.php
		$data['dosen'] = $this->dosen->hapusJadwalDosen($id);
		// kirim data dosen
		$data['dosen'] = $this->db->get('jadwal_mengajar')->result_array();

		// kirim pesan successnya
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your data was successfully deleted!</div>');
		redirect('user/jadwalkelasdosen');
	}


	public function ubahJadwalDosen($id) 
	{

		$data['title'] = "Edit Teaching Schedule";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['ubah'] = $this->User_models->getJadwalDosenById($id);

		$data['dosen'] = $this->db->get('jadwal_mengajar')->result_array();
		$data['jurusan'] = $this->db->get('jurusan')->result_array();
		$data['semester'] = $this->db->get('semester')->result_array();
		$data['tahun_akd'] = $this->db->get('tahun_akd')->result_array();
		
		$this->form_validation->set_rules('nm_dsn', 'Nama', 'required');
		$this->form_validation->set_rules('kode_matkul', 'Kode Mata Kuliah', 'required');
		$this->form_validation->set_rules('matkul', 'Mata Kuliah', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('jam', 'Jam', 'required');
		$this->form_validation->set_rules('ruangan', 'Ruangan', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('semester', 'Semester', 'required');
		$this->form_validation->set_rules('tahun_akd', 'Tahun Akademik', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/ubah_jadwaldosen', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$this->User_models->editJadwalDosen();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your data has been updated!</div>');
			redirect('user/jadwalkelasdosen');
		}

	}


	public function nilaiMahasiswa() 
	{

		$data['title'] = "Grades Mahasiswa";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['jadwal'] = $this->db->get('jadwal_mengajar')->result_array();

		// cari data dosen
		if ( $this->input->post('keyword') ) {
			$data['jadwal'] = $this->User_models->cariNilaiMhs();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/nilai_mahasiswa', $data);
		$this->load->view('templates/footer', $data);
	}

	public function deleteNilaiMhs($id)
	{
		$this->load->model('User_models', 'dosen');
		// buat menu model dan saling terhubung dengan models-Menu_model.php
		$data['dosen'] = $this->dosen->hapusNilaiMhs($id);
		// kirim data dosen
		$data['dosen'] = $this->db->get('jadwal_mengajar')->result_array();

		// kirim pesan successnya
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your data was successfully deleted!</div>');
		redirect('user/nilaimahasiswa');
	}

	public function detailNilaiMahasiswa($id) 
	{

		$data['title'] = "Detail Grades Mahasiswa";
		// ambil data di session
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['score'] = $this->User_models->getNilaiById($id);

		$data['nilai'] = $this->db->get('nilai_mhs')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/detail_nilaimhs', $data);
		$this->load->view('templates/footer', $data);
	}

}