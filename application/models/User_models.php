<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_models extends CI_Model
{
	// bagian delete data pada data dosen
	public function hapusDataDosen($id)
	{
		$this->db->delete('dt_dosen', ['id' => $id]);
	}
	
	// bagian delete data pada data dosen
	public function hapusAbsenDosen($id)
	{
		$this->db->delete('absen_dosen', ['id' => $id]);
	}

	// bagian delete data pada data dosen
	public function hapusJadwalDosen($id)
	{
		$this->db->delete('jadwal_mengajar', ['id' => $id]);
	}

	public function hapusNilaiMhs($id)
	{
		$this->db->delete('jadwal_mengajar', ['id' => $id]);
	}


	public function getAbsenDosenById($id)
	{
		return $this->db->get_where('absen_dosen', ['id' => $id])->row_array();
	}

	public function getNilaiById($id)
	{
		return $this->db->get_where('nilai_mhs', ['id' => $id])->row_array();
	}

	public function cariAbsenDosen()
	{
		$search = $this->input->post('keyword', true);
		$this->db->like('nm_dsn', $search);
		$this->db->or_like('kode_matkul', $search);
		$this->db->or_like('matkul', $search);
		$this->db->or_like('materi', $search);
		$this->db->or_like('jurusan', $search);
		$this->db->or_like('semester', $search);
		$this->db->or_like('tanggal', $search);
		$this->db->or_like('jam', $search);
		$this->db->or_like('ruangan', $search);
		return $this->db->get('absen_dosen')->result_array();
	}

	public function cariJadwalDosen()
	{
		$search = $this->input->post('keyword', true);
		$this->db->like('nm_dsn', $search);
		$this->db->or_like('kode_matkul', $search);
		$this->db->or_like('matkul', $search);
		$this->db->or_like('tanggal', $search);
		$this->db->or_like('jam', $search);
		$this->db->or_like('ruangan', $search);
		$this->db->or_like('jurusan', $search);
		$this->db->or_like('semester', $search);
		return $this->db->get('jadwal_mengajar')->result_array();
	}

	public function cariNilaiMhs()
	{
		$search = $this->input->post('keyword', true);
		$this->db->like('nm_dsn', $search);
		$this->db->or_like('kode_matkul', $search);
		$this->db->or_like('matkul', $search);
		$this->db->or_like('tanggal', $search);
		$this->db->or_like('jam', $search);
		$this->db->or_like('ruangan', $search);
		$this->db->or_like('jurusan', $search);
		$this->db->or_like('semester', $search);
		return $this->db->get('jadwal_mengajar')->result_array();
	}

	public function cariAddDosen()
	{
		$search = $this->input->post('keyword', true);
		$this->db->like('nm_dsn', $search);
		$this->db->like('pendidikan', $search);
		$this->db->like('jbtn_dsn', $search);
		$this->db->like('email_dsn', $search);
		$this->db->like('tlpn_dsn', $search);
		$this->db->like('almt_dsn', $search);

		return $this->db->get('dt_dosen')->result_array();
	}

	public function getJadwalDosenById($id)
	{
		return $this->db->get_where('jadwal_mengajar', ['id' => $id])->row_array();
	}

	public function editJadwalDosen()
	{
		$data = [
				'nm_dsn' => $this->input->post('nm_dsn', true),
				'kode_matkul' => $this->input->post('kode_matkul', true),
				'matkul' => $this->input->post('matkul', true),
				'tanggal' => $this->input->post('tanggal', true),
				'jam' => $this->input->post('jam', true),
				'ruangan' => $this->input->post('ruangan', true),
				'jurusan' => $this->input->post('jurusan', true),
				'semester' => $this->input->post('semester', true),
				'tahun_akd' => $this->input->post('tahun_akd', true)
			];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('jadwal_mengajar', $data);
	}

	

}