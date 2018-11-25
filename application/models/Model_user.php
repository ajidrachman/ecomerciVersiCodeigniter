<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

	class Model_user extends CI_Model{

		public function regis($regis){

			return $this->db->insert('user',$regis);
		}

		public function login($email,$pwenc){

			$this->db->where('email',$email);
			$this->db->where('pw',$pwenc);
			$this->db->where('status','on');
			return $this->db->get('user');
		}
	}
?>