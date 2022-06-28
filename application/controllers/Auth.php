<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jayapura');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		check_already_login();
		$this->load->view('login');
	}
	public function process()
	{
		
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$query = $this->user_model->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'userid' => $row->user_id,
					'level_id' => $row->level_id
				);
				$this->session->set_userdata($params);
				if ($this->session->userdata('level_id') == 1) {
					echo "<script>window.location='" . site_url('dashboard') . "'</script>";
				} else {
					echo "<script>window.location='" . site_url('peminjaman') . "'</script>";
				}
			}
		} else {
			$this->session->set_flashdata('gagal', 'Login gagal, username atau password salah');
			redirect(site_url('auth'));
		}
	}

	public function logout()
	{
		$params = array('userid', 'level_id');
		$this->session->unset_userdata($params);
		redirect('auth');
	}
}
