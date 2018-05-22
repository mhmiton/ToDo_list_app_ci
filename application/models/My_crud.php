<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_crud extends CI_Model
{
	public function get_one_row($table,$where=null,$order=null,$limit=null)
	{
		$this->db->select('*');
		$this->db->from($table);
		if(!empty($where)) $this->db->where($where);
		if(!empty($order)) $this->db->order_by($order);
		if(!empty($limit)) $this->db->limit($limit);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_all_row($table,$where=null,$order=null,$limit=null)
	{
		$this->db->select('*');
		$this->db->from($table);
		if(!empty($where)) $this->db->where($where);
		if(!empty($order)) $this->db->order_by($order);
		if(!empty($limit)) $this->db->limit($limit);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_row($table,$where=null,$order=null,$limit=null)
	{
		$this->db->select('*');
		$this->db->from($table);
		if(!empty($where)) $this->db->where($where);
		if(!empty($order)) $this->db->order_by($order);
		if(!empty($limit)) $this->db->limit($limit);
		$query = $this->db->get();
		return $query->num_rows();
	}


} // end model

?>
