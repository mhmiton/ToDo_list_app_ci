<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	function auth_log_in()
	{
		$_CI = &get_instance();

		$usr_name 	= $_CI->input->post('usr_name');
		$password 	= md5($_CI->input->post('password'));

		$check_auth = $_CI->My_crud->get_one_row('users',['usr_name'=>$usr_name, 'password'=>$password],'','');

		if($check_auth && $password == $check_auth->password)
		{
			$_CI->session->set_userdata(['login'=>'Success']);
			redirect('View');
		} else {
			$_CI->session->set_userdata(['login'=>'Fail']);
			redirect('App');
		}
	}

	function auth_log_out()
	{
		$_CI 	= &get_instance();
		$_CI->session->sess_destroy();
		redirect('App');
	}

	function auth_valid()
	{
		$_CI 	= &get_instance();
		$login  = $_CI->session->userdata('login');
		if($login !== 'Success')
		{
			redirect('App');
		}
	}

?>