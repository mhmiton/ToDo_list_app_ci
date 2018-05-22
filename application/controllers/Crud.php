<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller
{
	public function __construct(){

		parent:: __construct();
		auth_valid();
	}

 	public function save()
 	{
 		$data['task_name'] 		= $this->input->post('task_name');
 		$id 					= $this->input->post('id');

 		if(!$id)
 		{
 			$this->db->insert('task',$data);
 			$this->session->set_userdata(['msg'=>'Your Data Save Successfull...','type'=>'success']);
 		} else {
 			$this->db->update('task',$data,['id'=>$id]);
 			$this->session->set_userdata(['msg'=>'Your Data Update Successfull...','type'=>'success']);
 		}

 		redirect('View');
 	}

 	public function task_clear($id)
 	{
 		$this->db->delete('task',['id'=>$id]);
 		$this->session->set_userdata(['msg'=>'Your Data Delete Successfull...','type'=>'success']);
 		redirect('View');
 	}

 	public function task_edit()
 	{
 		$id = $this->input->post('id');
 		$task_list = $this->My_crud->get_one_row('task',['id'=>$id],'','');
 		echo json_encode($task_list);
 	}
} 

?>