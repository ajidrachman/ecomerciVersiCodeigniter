<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

 class Home extends CI_Controller{


 		public function __construct(){

 			parent:: __construct();
 			$this->load->model('model_datakategori');
 		}


 		public function index(){

 			$dataKategori['kategorihome']=$this->model_datakategori->kategorionhome()->result();

 			$this->load->view('partial/header',$dataKategori);
 			$this->load->view('halamanUtama/home');
 			$this->load->view('partial/footer');
 		}

 }

?>