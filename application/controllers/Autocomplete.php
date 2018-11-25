<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Autocomplete extends CI_Controller{

		public function __construct(){

			parent::__construct();
		}

		public function search(){
			$this->load->helper('captcha');
			$vals = array(
				'img_path'      => './captcha/',
				'img_url'       => base_url('captcha'),
				'word_length'   => 9,
				'pool'          => 'ajidAJID1234567890'
				);

			$cap = create_captcha($vals);
			echo $cap['image'];
		}
	}
?>
