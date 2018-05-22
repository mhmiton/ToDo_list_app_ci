<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller
{
	public function __construct(){

		parent:: __construct();

	}

	public function index()
	{
		$login  = $this->session->userdata('login');
		if($login == 'Success')
		{
			redirect('View');
		} else {
			$this->load->view('login');
		}
	}

	public function login()
	{
		auth_log_in();
 	}

 	public function logout()
	{
		auth_log_out();
 	}
} 

?>