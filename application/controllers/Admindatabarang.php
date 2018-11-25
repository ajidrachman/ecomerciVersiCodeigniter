<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
  class Admindatabarang extends CI_Controller{

  	 public function __construct(){

  	 	parent::__construct();

  	 		$this->load->model('model_databarang');
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

  	 	$dataSbarang['barang']=$this->model_databarang->allbarang()->result();

  	 	$this->load->view('partial/header');
  	 	$this->load->view('databarang/barang',$dataSbarang);
  	 	$this->load->view('partial/footer');
  	 }


  	 public function tambahbarang(){
  	 	$kategori['kategori']=$this->model_datakategori->kategorionhome()->result();

  	 	$this->form_validation->set_rules('id_kategori','ID KATEGORI','required',array('required' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> kategori harus dipilih.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'));

  	 	$this->form_validation->set_rules('nb','NAMA BARANG','required|alpha_numeric_spaces',array('required' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> nama barang tidak boleh kosong.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>',
				'alpha_numeric_spaces' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> nama barang hanya boleh menggunakan huruf dan angka.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'));

  	 	$this->form_validation->set_rules('harga_barang','HARGA BARANG','required|is_natural',array('required' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> harga barang tidak boleh kosong.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>',
				'is_natural' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> harga barang tidak boleh kurang dari nol.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'));

  	 	$this->form_validation->set_rules('spek_barang','SPEK BARANG','required',array('required' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> spesifikasi barang tidak boleh kosong.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'));

  	 	$this->form_validation->set_rules('status','STATUS BARANG','required',array('required' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> status stok barang harus dipilih.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'));

  	 	$this->form_validation->set_rules('jumlah_barang','JUMLAH BARANG','required|is_natural',array('required' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> jumlah barang tidak boleh kosong.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>',
				'is_natural' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Warning</strong> jumlah barang tidak boleh kurang dari nol.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'));

  	 	if ($this->form_validation->run() == TRUE) {
  	 		
  	 		$post['id_kategori']=$this->input->post('id_kategori',TRUE);
  	 		$post['nama_barang']=$this->input->post('nb',TRUE);
  	 		$post['harga_barang']=$this->input->post('harga_barang',TRUE);
  	 		$post['spesifikasi']=$this->input->post('spek_barang',TRUE);
  	 		$post['status_stok']=$this->input->post('status',TRUE);
  	 		$post['jumlah_barang']=$this->input->post('jumlah_barang',TRUE);

  	 		$config['upload_path']          = './gambar/';
  	 		$config['allowed_types']        = 'gif|jpg|png';
  	 		$config['max_size']             = 100;
  	 		$config['max_width']            = 1024;
  	 		$config['max_height']           = 768;

  	 		$this->load->library('upload', $config);
  	 		 if( ! $this->upload->do_upload('gambar_barang'))
                {	
                		$this->session->set_flashdata('kesalahanupload',$this->upload->display_errors());
                		redirect('admindatabarang');
                }
                else
                {
                        $post['gambar_barang']=$this->upload->data('file_name');
                }

                 $insert=$this->model_databarang->insertBarang($post);
                        if($insert){
                           
                        	$this->session->set_flashdata('insertdatabarang','<div class="alert alert-success alert-dismissible fade show" role="alert">
                        		<strong>SUKSES</strong> data berhasil di masukan ke database.
                        		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        			<span aria-hidden="true">&times;</span>
                        		</button>
                        	</div>');

                        	redirect('admindatabarang');
                        }
  	 	}

  	 	$this->load->view('partial/header');
  	 	$this->load->view('databarang/form_tambah_data',$kategori);
  	 	$this->load->view('partial/footer');
  	 }


  	 public function delete($idbarangD){

  	 	$delete=$this->model_databarang->deleteBarang($idbarangD);
  	 	if($delete){
  	 		
  	 		$this->session->set_flashdata('deletebarangsukses','<div class="alert alert-success alert-dismissible fade show" role="alert">
  	 			<strong>SUKSES</strong> data berhasil di hapus.
  	 			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  	 				<span aria-hidden="true">&times;</span>
  	 			</button>
  	 		</div>');

  	 		redirect('admindatabarang');
  	 	}else{

  	 		$this->session->set_flashdata('deletebaranggagal','<div class="alert alert-warning alert-dismissible fade show" role="alert">
  	 			<strong>Warning</strong> data gagal di hapus.
  	 			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  	 				<span aria-hidden="true">&times;</span>
  	 			</button>
  	 		</div>');

  	 		redirect('admindatabarang');
  	 	}
  	 }

  }
?>