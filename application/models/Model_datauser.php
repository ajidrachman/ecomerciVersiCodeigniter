<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	
   class Model_datauser extends CI_Model{

   		public function dataUser(){

   			$this->db->where('level','customer');
   			return $this->db->get('user');
   		}

   		public function dataUseredit($iduser){

   			$this->db->where('id_user',$iduser);
   			return $this->db->get('user');
   		}

   		public function dataUserupdate($iduser,$update){

   			$this->db->where('id_user',$iduser);
   			$this->db->update('user',$update);
   			return $this->db->affected_rows(); 
   		}

   		public function dataUserdelete($iduser1){

   			$this->db->where('id_user',$iduser1);
   			$this->db->delete('user');
   			return $this->db->affected_rows();
   		}
   }

?>