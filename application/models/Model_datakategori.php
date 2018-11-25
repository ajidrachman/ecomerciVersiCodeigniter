<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 class Model_datakategori extends CI_Model{

 	  public function allkategori(){

 	  	return $this->db->get('kategori');

 	  }

 	  public function insertKategori($postData){

 	  	$this->db->insert('kategori',$postData);
 	  	return $this->db->insert_id();
 	  }

 	  public function kategoriDetail($idkategori){

 	  	$this->db->where('id_kategori',$idkategori);
 	  	return $this->db->get('kategori');
 	  }

 	  public function kategoriUpdate($idkategori,$edit){

 	  	$this->db->where('id_kategori',$idkategori);
 	  	$this->db->update('kategori',$edit);
 	  	return $this->db->affected_rows();
 	  }

 	  public function kategoriDelete($idkategori1){

 	  	 $this->db->where('id_kategori',$idkategori1);
 	  	 $this->db->delete('kategori');
 	  	 return $this->db->affected_rows();
 	  }

 	  public function kategorionhome(){

 	  	$this->db->where('status','on');
 	  	return $this->db->get('kategori');
 	  }
 }
?>