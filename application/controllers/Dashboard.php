<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Dashboard extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
        is_login();
		check_admin();
		
    }

	public function index()
	{
		$this->template->load('template','dashboard');
	}
}
