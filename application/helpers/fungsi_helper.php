<?php
date_default_timezone_set('Asia/Jayapura');

function check_already_login()
{

	$ci = &get_instance();
	$user_session = $ci->session->userdata('userid');
	if ($user_session) {
		redirect('dashboard');
	}
}

//untuk semua ctrl cek seesion login dan session unit
function is_login()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('userid');
	if (!$user_session) {
		redirect('auth');
	}
}

function check_admin()
{
	$ci = &get_instance();
	$ci->load->library('fungsi');
	if ($ci->fungsi->user_login()->level_id != 1) {
		redirect('dashboard');
	}
}

function pegawai_id($user_id)
{
	$ci = &get_instance();
	$data = $ci->db->query("SELECT * FROM user join pegawai on pegawai.nip = user.username where user.user_id='" . $user_id . "'")->row();
	return $data->pegawai_id;
}
