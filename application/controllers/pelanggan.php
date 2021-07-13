<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	//Constructor
	public function __construct() {
		parent::__construct();

		$this->load->model('pelanggan_model'); //Bisa diautoload di config/autoload.php
	}

	public function index()
	{
		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}

		// if($this->session->userdata('role')<>'admin'){
		// 	$this->session->set_flashdata('error',"Access Unauthorized! Admin Only.");

		// 	redirect('salam','refresh');
		// }

        $data['title'] = ucwords('Daftar Pelanggan');

        $data['data'] = $this->pelanggan_model->getAll();

		$this->load->view('template/header');
		$this->load->view('pelanggan/index', $data);
		$this->load->view('template/footer', $data);
	}

	public function view($id = NULL) {

		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}

		$data['title'] = ucwords('Informasi Pelanggan');

		if (is_null($id)) {
			show_404();
		}

		$data['data'] = $this->pelanggan_model->getPelangganById($id);

		$this->load->view('template/header');
		$this->load->view('pelanggan/view', $data);
		$this->load->view('template/footer');
	}

	public function create() {

		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}

		// if(!$this->session->userdata('role')<>'admin'){
		// 	$this->session->set_flashdata('error',"Access Unauthorized! Admin Only.");

		// 	redirect('salam','refresh');
		// }

		$data['title'] = ucwords('Tambah Pelanggan');

		//Load Library untuk Form Validation
		$this->load->library('form_validation');

		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('kodepel', 'Kode Pelanggan', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telp', 'Telepon', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('email', 'E-Mail', 'required');

		/* Periksa kesesuai Form terhadap Rules:
		*	Jika belum, maka dikembalikan lagi ke Form beserta Error-nya
		*	Jika sudah, maka dilanjutkan proses data
		*/		
		if ($this->form_validation->run() === FALSE){
			$this->load->view('template/header');
			$this->load->view('pelanggan/create', $data);
			$this->load->view('template/footer');
		} else {
			// print_r("Form Data sudah benar");
			$result = $this->pelanggan_model->addPelanggan();         //Proses postingan baru

			// Menggunakan Session Message
			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? 'pelanggan/index' : 'pelanggan/create');	//Jika Sukses kembali ke Index Pelanggan, jika Tidak kembali ke Form
		}
	}

	public function delete($id = NULL) {

		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}

		if($this->session->userdata('role')<>'admin'){
			$this->session->set_flashdata('error',"Access Unauthorized! Admin Only.");

			redirect('salam','refresh');
		}

		if (is_null($id)) {
			$this->session->set_flashdata('error',"Pelanggan belum dipilih");
		}

		$result = $this->pelanggan_model->deletePelanggan($id);

		$this->session->set_flashdata(
			($result->status==200) ? 'success' : 'error',
			"<strong>Respond Status:</strong> $result->status<br />
			<strong>Respond Error:</strong> $result->error<br />
			<strong>Message:</strong> $result->message"
		);

		redirect('pelanggan/index');
	}

	public function edit($id) {

		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}
		
		if (is_null($id)) {
			$this->session->set_flashdata('error',"Pelanggan belum dipilih");
		}

		//Ambil data yg mau di Edit
		$data['data'] = $this->pelanggan_model->getPelangganById($id);

		//Load Library untuk Form Validation
		$this->load->library('form_validation');

		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('kodepel', 'Kode Pelanggan', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telp', 'Telepon', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('email', 'E-Mail', 'required');

		/* Periksa kesesuai Form terhadap Rules:
		*	Jika belum, maka dikembalikan lagi ke Form beserta Error-nya
		*	Jika sudah, maka dilanjutkan proses data
		*/		
		if ($this->form_validation->run() === FALSE){
			$data['title'] = ucwords('edit data pelanggan');

			$this->load->view('template/header');
			$this->load->view('pelanggan/edit', $data);
			$this->load->view('template/footer');
		} else {
			//Simpan data baru
			$result = $this->pelanggan_model->editPelanggan($id);

			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? "pelanggan/index" : "pelanggan/edit/$id");	//Jika Sukses kembali ke Index Pelanggan, jika Tidak kembali ke Form
		}
	}
}
