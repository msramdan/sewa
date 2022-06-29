<?php
class Fungsi
{
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
	}

	public function user_login()
	{
		$this->ci->load->model('user_model');
		$user_id = $this->ci->session->userdata('userid');
		$user_data = $this->ci->user_model->get($user_id)->row();
		return $user_data;
	}

	
}
