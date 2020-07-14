<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function verify($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('user')->result_array();

		if (count($query) > 0) 
		{
			$this->db->where('id_user', @$query[0]['id_user']);
			$kar = $this->db->get('user')->result_array();
			$this->session->set_userdata('id_user', @$query[0]['id_user']);
			$this->session->set_userdata('nama_user', @$kar[0]['nama_user']);
			$this->session->set_userdata('username', @$query[0]['username']);
			$this->session->set_userdata('password', @$query[0]['password']);
			$this->session->set_userdata('level', @$query[0]['level']);
			return true;
		} else {
			return false;
		}
	}

}

?>