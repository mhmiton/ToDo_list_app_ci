<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller
{
	public function __construct(){

		parent:: __construct();
		auth_valid();
	}

	public function index()
	{
		$result['task_list'] = $this->My_crud->get_all_row('task','','id DESC','');
		$this->load->view('dashboard',$result);
	}
} 

?>