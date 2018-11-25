<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('model_user');
		$this->load->helper('security');

		$iduserPanel=$this->session->has_userdata('id_user') ? $this->session->userdata('id_user') : false;

		if($iduserPanel){
			
			redirect('home');
		}
	}

	public function login(){

		$this->form_validation->set_rules('email','EMAIL','required|valid_email',array('required' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> maaf email tidak boleh kosong.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>',
			'valid_email' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> masukan email yang valid.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'));

		$this->form_validation->set_rules('pw','Password','required|alpha_numeric',array('required' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> maaf password tidak boleh kosong.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>',
			'alpha_numeric' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> maaf password hanya boleh angka atau huruf dan tidak boleh menggunakan spasi.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'));

		if ($this->form_validation->run() == TRUE) {
			
			$email=$this->input->post('email',TRUE);
			$pwlogin=$this->input->post('pw',TRUE);
			$pwenc=do_hash($pwlogin,'md5');

			$auth=$this->model_user->login($email,$pwenc);

			if($auth->num_rows() == 0){
				
				$this->session->set_flashdata('notif', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> email atau password tidak valid.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
				redirect('panel/login');
			}else{

				$auth1=$auth->row();

				$id_user=$auth1->id_user;
				$firstName=$auth1->firstName;
				$level=$auth1->level;

				$this->session->set_userdata('id_user',$id_user);
				$this->session->set_userdata('firstName',$firstName);
				$this->session->set_userdata('level',$level);
				redirect('home');
			}
		}

		$this->load->view('panel/login');
	}

	public function register(){

		$this->form_validation->set_rules('firstName','NAMA AWAL','required|alpha_numeric',array('required' => 'maaf nama awal tidak boleh kosong',
			'alpha_numeric' => 'maaf nama awal hanya boleh menggunakan huruf atau anggka tidak boleh menggunakan spasi'));

		$this->form_validation->set_rules('lastName','NAMA AKHIR','required|alpha_numeric',array('required' => 'maaf nama akhir tidak boleh kosong',
			'alpha_numeric' => 'maaf nama akhir hanya boleh menggunakan huruf atau anggka tidak boleh menggunakan spasi'));

		$this->form_validation->set_rules('email','Email','required|valid_email',array('required' => 'maaf email tidak boleh kosong',
			'valid_email' => 'masukan email yang valid'));

		$this->form_validation->set_rules('pw','Password','required|alpha_numeric',array('required' => 'maaf password tidak boleh kosong',));

		$this->form_validation->set_rules('re_pw','re-Password','required|matches[pw]|alpha_numeric',array('required' => 'maaf confirm password tidak boleh kosong',
			'matches' => 'password tidak sama'));

		if ($this->form_validation->run() == TRUE){
			
			$regis['firstName']=$this->input->post('firstName',TRUE);
			$regis['lastName']=$this->input->post('lastName',TRUE);
			$regis['email']=$this->input->post('email',TRUE);
			$pw=$this->input->post('pw',TRUE);
			$regis['pw']=do_hash($pw,'md5');
			$regis['status']='on';
			$regis['level']='customer';

			$inputData=$this->model_user->regis($regis);
			if ($inputData) {
				
				redirect('panel/login');
			}
		}

		$this->load->view('panel/register');
	}

}

?>