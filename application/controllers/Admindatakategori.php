<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 class Admindatakategori extends CI_Controller{

 		public function __construct(){

 			parent::__construct();

 			$this->load->model('model_datakategori');
 			$iduserDatauser=$this->session->has_userdata('id_user') ? $this->session->userdata('id_user') : false;
    		$level=$this->session->has_userdata('level') ? $this->session->userdata('level') : false;

    		if($iduserDatauser == false){
    			
    			redirect('home');
    		}

    		if($level != "superadmin"){
    			
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

 			$datakategori['kategori']=$this->model_datakategori->allkategori()->result();

 			$this->load->view('partial/header');
 			$this->load->view('datakategori/kategori',$datakategori);
 			$this->load->view('partial/footer');
 		}


 		public function tambahkategori(){

 			$this->form_validation->set_rules('nama_kategori','NAMA KATEGORI','required|alpha_numeric_spaces',array('required' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> nama kategori tidak boleh kosong.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>', 
				'alpha_numeric_spaces' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> nama kategori hanya boleh huruf atau angka.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'));
 			$this->form_validation->set_rules('status','STATUS','required',array('required' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> status harus dipilih.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'));

 			if($this->form_validation->run() == TRUE){
 				
 				$postData['nama_kategori']=$this->input->post('nama_kategori',TRUE);
 				$postData['status']=$this->input->post('status',TRUE);

 				$insertData=$this->model_datakategori->insertKategori($postData);
 				if($insertData){
 					
 					$this->session->set_flashdata('inputsukses','<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Sukses</strong> Data Sukses Diinput.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
 					redirect('admindatakategori');

 				}else{

 					$this->session->set_flashdata('inputgagal','<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> Data gagal Diinput.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
 					redirect('admindatakategori');
 				}
 			}

 			$this->load->view('partial/header');
 			$this->load->view('datakategori/form_tambah_data');
 			$this->load->view('partial/footer');
 		}


 		public function edit($idkategori){

 			$kategoriDetail['kdetail']=$this->model_datakategori->kategoriDetail($idkategori)->row();

 			$this->form_validation->set_rules('nama_kategori','NAMA KATEGORI','required|alpha_numeric_spaces',array('required' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> nama kategori tidak boleh kosong.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>',
				'alpha_numeric_spaces' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> nama kategori hanya boleh huruf atau angka saja.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'));

 			if($this->form_validation->run() == TRUE){
 				
 				$edit['nama_kategori']=$this->input->post('nama_kategori',TRUE);
 				$edit['status']=$this->input->post('status',TRUE);

 				$editNotif=$this->model_datakategori->kategoriUpdate($idkategori,$edit);
 				if($editNotif){
 					
 					$this->session->set_flashdata('updatesukses','<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Sukses</strong> data sukses di update.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');

 					redirect('admindatakategori');
 				}else{

 					$this->session->set_flashdata('updategagal','<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> data gagal di update.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');

 					redirect('admindatakategori');
 				}
 			}

 			$this->load->view('partial/header');
 			$this->load->view('datakategori/form_edit_data',$kategoriDetail);
 			$this->load->view('partial/footer');
 		}

 		public function delete($idkategori1){

 			$deleteNotif=$this->model_datakategori->kategoriDelete($idkategori1);
 			if($deleteNotif){
 				
 				$this->session->set_flashdata('deletesukses','<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Sukses</strong> data sukses di hapus.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
 				redirect('admindatakategori');
 			}else{

 				$this->session->set_flashdata('deletegagal','<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> data gagal di hapus.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
 				redirect('admindatakategori');
 			}
 		}
 }

?>