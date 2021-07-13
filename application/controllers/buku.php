<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	//Constructor
	public function __construct() {
		parent::__construct();

		$this->load->model('buku_model'); //Bisa diautoload di config/autoload.php
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

        $data['title'] = ucwords('Daftar Buku');

        $data['data'] = $this->buku_model->getAll();

		$this->load->view('template/header');
		$this->load->view('buku/index', $data);
		$this->load->view('template/footer', $data);
	}

	public function view($idBuku = NULL) {

		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}

		$data['title'] = ucwords('Informasi Buku');

		if (is_null($idBuku)) {
			show_404();
		}

		$data['data'] = $this->buku_model->getBukuById($idBuku);

		$this->load->view('template/header');
		$this->load->view('buku/view', $data);
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

		$data['title'] = ucwords('Tambah Buku');

		//Load Library untuk Form Validation
		$this->load->library('form_validation');

		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('judul', 'Judul Buku', 'required');
		$this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'required');
		$this->form_validation->set_rules('penerbit', 'Nama Penerbit', 'required');
		$this->form_validation->set_rules('tglTerbit', 'Tanggal Terbit', 'required');

		/* Periksa kesesuai Form terhadap Rules:
		*	Jika belum, maka dikembalikan lagi ke Form beserta Error-nya
		*	Jika sudah, maka dilanjutkan proses data
		*/		
		if ($this->form_validation->run() === FALSE){
			$this->load->view('template/header');
			$this->load->view('buku/create', $data);
			$this->load->view('template/footer');
		} else {
			// print_r("Form Data sudah benar");
			$result = $this->buku_model->addBuku();         //Proses postingan baru

			// Menggunakan Session Message
			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? 'buku/index' : 'buku/create');	//Jika Sukses kembali ke Index Buku, jika Tidak kembali ke Form
		}
	}

	public function delete($idBuku = NULL) {

		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}

		if($this->session->userdata('role')<>'admin'){
			$this->session->set_flashdata('error',"Access Unauthorized! Admin Only.");

			redirect('salam','refresh');
		}

		if (is_null($idBuku)) {
			$this->session->set_flashdata('error',"Buku belum dipilih");
		}

		$result = $this->buku_model->deleteBuku($idBuku);

		$this->session->set_flashdata(
			($result->status==200) ? 'success' : 'error',
			"<strong>Respond Status:</strong> $result->status<br />
			<strong>Respond Error:</strong> $result->error<br />
			<strong>Message:</strong> $result->message"
		);

		redirect('buku/index');
	}

	public function edit($idBuku) {

		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}
		
		if (is_null($idBuku)) {
			$this->session->set_flashdata('error',"Buku belum dipilih");
		}

		//Ambil data yg mau di Edit
		$data['data'] = $this->buku_model->getBukuById($idBuku);

		//Load Library untuk Form Validation
		$this->load->library('form_validation');

		//Menentukan Rules dari Form Validation untuk setiap elemen form sesuai kebutuhan
		$this->form_validation->set_rules('judul', 'Judul Buku', 'required');
		$this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'required');
		$this->form_validation->set_rules('penerbit', 'Nama Penerbit', 'required');
		$this->form_validation->set_rules('tglTerbit', 'Tanggal Terbit', 'required');

		/* Periksa kesesuai Form terhadap Rules:
		*	Jika belum, maka dikembalikan lagi ke Form beserta Error-nya
		*	Jika sudah, maka dilanjutkan proses data
		*/		
		if ($this->form_validation->run() === FALSE){
			$data['title'] = ucwords('edit data buku');

			$this->load->view('template/header');
			$this->load->view('buku/edit', $data);
			$this->load->view('template/footer');
		} else {
			//Simpan data baru
			$result = $this->buku_model->editBuku($idBuku);

			$this->session->set_flashdata(
				($result->status==200) ? 'success' : 'error',
				"<strong>Respond Status:</strong> $result->status<br />
				<strong>Respond Error:</strong> $result->error<br />
				<strong>Message:</strong> $result->message"
			);

			redirect(($result->status==200) ? "buku/index" : "buku/edit/$idBuku");	//Jika Sukses kembali ke Index Buku, jika Tidak kembali ke Form
		}
	}
}