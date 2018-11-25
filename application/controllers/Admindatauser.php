<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	
    class Admindatauser extends CI_Controller{

    	public function __construct(){
    		parent::__construct();

    		$this->load->model('model_datauser');
    		$iduserDatauser=$this->session->has_userdata('id_user') ? $this->session->userdata('id_user') : false;
    		$level=$this->session->has_userdata('level') ? $this->session->userdata('level') : false;

    		if($iduserDatauser == false){
    			
    			redirect('home');
    		}

    		if($level != "superadmin") {
    			
    			$this->session->set_flashdata('bukanadmin','<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> Maaf anda bukan admin.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
    			redirect('home');	
    		}
    	}

    	public function index(){

    		$data['user']=$this->model_datauser->dataUser()->result();
    		$this->load->view('partial/header');
    		$this->load->view('datauser/datauser',$data);
    		$this->load->view('partial/footer');
    	}


    	public function edit($iduser){

    		if($this->input->post()){
    			
    			$update['status']=$this->input->post('status',TRUE);

    			$updateNotif=$this->model_datauser->dataUserupdate($iduser,$update);

    			if($updateNotif){
    				
    				$this->session->set_flashdata('updatesukses','<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>SUKSES</strong> Update Sukses.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
    				redirect('admindatauser');
    			}
    		}

    		$dataEdit['edit']=$this->model_datauser->dataUseredit($iduser)->row();
    		$this->load->view('partial/header');
    		$this->load->view('datauser/form_edit',$dataEdit);
    		$this->load->view('partial/footer');
    	}


    	public function delete($iduser1){

    		$deleteNotif=$this->model_datauser->dataUserdelete($iduser1);

    		if($deleteNotif){

    			$this->session->set_flashdata('deletesukses','<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>SUKSES</strong> Delete Sukses.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
    			redirect('admindatauser');
    		}else{

    			$this->session->set_flashdata('deletegagal','<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> Delete Gagal.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
    			redirect('admindatauser');

    		}
    	}

    }
?>