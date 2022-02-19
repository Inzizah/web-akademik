<?php

// fungsi helpers dan dipanggil dengan "is_logged_in();"
// helpers= sebuah fungsi yang dibuat oleh kita sendiri dan dapat dihubungkan dengan fungsi atau controler lainnya.
function is_logged_in()
{
	// memanggil libraries CI dalam fungsi ini
	$ci = get_instance();
	// hubungkan dengan perintah di controllers(admin,menu,user)
	// untuk mengamankan web dari user yang ingin masuk langsung
	if (!$ci->session->userdata('email')) { //cek apakah user itu boleh mengakses data itu atau tidak
		redirect('auth');  // cek user sebelum login
	} else { 
		// cek user sesudah login
		$role_id = $ci->session->userdata('role_id');
		$menu = $ci->uri->segment(1);

		$queryMenu = $ci->db->get_where('user_sub_menu', ['url' => $menu])->row_array(); //ambil nilai ke database yang boleh diakses atau tidak

		$menu_id = $queryMenu['id']; //ambil data yang ada di database

		$userAccess = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id
		]);

		if ($userAccess->num_rows() < 1 ) {
			redirect('auth/blocked');
		}
	}

	// method untuk checkbox di role agar lebih dinamis
	function check_access($role_id, $menu_id)
	{
		// panggil fungsi helpers
		$ci = get_instance();

		// ambil data yang hanya boleh diakses oleh member ataupun admin
		// logikanya = kalau menunya admin boleh akses menu atau tidak, kalau menunya user boleh akses menu itu atau tidak. Dan itu semua terhubung dengan user_access_menu yang sebelumnya telah dibuat
		$ci->db->where('role_id', $role_id);
		$ci->db->where('menu_id', $menu_id);

		// cari semua data di user_access_menu dan masukkan dalam variabel $result
		$result = $ci->db->get('user_access_menu');

		// buat kondisinya dengan mengarahkan pada data di atas, jika barisnya > 0, maka tampilkan checkboxnya
		if ($result->num_rows() > 0) {
			return "checked='checked'";
		}
	}

}
