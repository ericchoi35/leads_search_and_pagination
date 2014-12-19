<?php

class Lead extends CI_Model{

	function get_all_leads()
	{
		return $this->db->query("SELECT * FROM leads")->result_array();
	}

	function get_leads($info)
	{
		return $this->db->query("SELECT * FROM leads LIMIT ?,?", array($info['limit'], $info['size']))->result_array();
	}

	function search_leads($leads)
	{
		$query = "SELECT * FROM leads WHERE first_name LIKE ? AND email LIKE ? AND created_at BETWEEN ? AND ?";

		$values = array($leads['name'], $leads['email'], $leads['date_from'], $leads['date_to']);
		return $this->db->query($query, $values)->result_array();
	}
}