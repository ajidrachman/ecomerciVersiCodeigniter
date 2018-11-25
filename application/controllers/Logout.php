<?php 
defined('BASEPATH') OR exit('No direct script access allowed');	

	class Logout extends CI_Controller{

		public function __construct(){

			parent::__construct();

			$useridLogout=$this->session->has_userdata('id_user') ? $this->session->userdata('id_user') : false;

			if($useridLogout == false){
				
				redirect('home');
			}
		}

		public function index(){

			$this->session->unset_userdata('id_user');
			$this->session->unset_userdata('firstName');
			$this->session->unset_userdata('level');

			$this->session->set_flashdata('infologout', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Sukses</strong> Logout Sukses.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('home');
		}
	}
?>