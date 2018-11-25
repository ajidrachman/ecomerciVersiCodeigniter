<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Model_databarang extends CI_Model{

 	public function allbarang(){

 		$this->db->select('barang.*,kategori.nama_kategori');
 		$this->db->from('barang');
 		$this->db->join('kategori','kategori.id_kategori=barang.id_kategori');
 		return $this->db->get();
 	}

 	public function insertBarang($post){

 		$this->db->insert('barang',$post);
 		return $this->db->insert_id();
 	}

 	public function deleteBarang($idbarangD){

 		$this->db->where('id_barang',$idbarangD);
 		$this->db->delete('barang');
 		return $this->db->affected_rows();
 	}

 }

?>