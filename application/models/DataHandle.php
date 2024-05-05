<?php

class DataHandle extends CI_Model
{

	function getAll($tabel)
	{
		return $this->db->get($tabel);
	}
	function getAllOrder($field, $tabel, $format)
	{
		$this->db->order_by($field, $format);
		return $this->db->get($tabel);
	}

	function getAllWhere($tabel, $field, $where)
	{
		$this->db->select($field);
		$this->db->from($tabel);
		$this->db->where($where);
		return $this->db->get();
	}
}
