<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserRoles extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('users_model');
		$this->load->model('userroles_model');
		$this->load->model('roles_model');
	}

	public function index() {
		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}
		
		if($this->session->userdata('role')<>'admin'){
			$this->session->set_flashdata('error',"Access Unauthorized! Admin Only.");

			redirect('salam','refresh');
		}

        $data['title']= ucwords('daftar user role');

		try {
			$data['data'] = $this->userroles_model->getAll();

			$this->load->view('template/header');
			$this->load->view('userroles/index', $data);
		}
		catch (Exception $ex) {
			$this->load->view('template/header');
		}		

		$this->load->view('template/footer');
	}

	public function view($userId = NULL) {
		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}

		if($this->session->userdata('role')<>'admin'){
			$this->session->set_flashdata('error',"Access Unauthorized! Admin Only.");

			redirect('salam','refresh');
		}
		
		$data['title'] = ucwords('detail user');

		try {
			// $data['data'] = $this->userrole_model->getUser($userName);
			$data['data'] = $this->userroles_model->getusersByUserId($userId);

			$this->load->view('template/header');
			$this->load->view('userroles/view', $data);
		}
		catch (Exception $ex) {
			$this->load->view('template/header');

		}
		
		$this->load->view('template/footer');
	}

    public function create() {
		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}

		//Cek Admin Akses
		if($this->session->userdata('role')<>'admin') {
			$this->session->set_flashdata('error',"Access Unauthorized! Admin Only.");
			redirect('salam','refresh');
		}
		
		$data['title']		= ucwords('Tambah User Role');
        $data['datetime']	= date('d-M-Y H:i', time());

		$this->load->library('form_validation');
		$this->form_validation->set_rules('userId', 'Nama', 'required');
		$this->form_validation->set_rules('userRole', 'User Role', 'required');
		$this->form_validation->set_rules('aktif', 'Status', 'required');

		if ($this->form_validation->run() === FALSE){
			try{
				$data['users'] = $this->users_model->getAll();
				$data['roles'] = $this->roles_model->getAll();

				$this->load->view('template/header');
				$this->load->view('userroles/create', $data);
			}
			catch (Exception $ex) {
				$this->load->view('template/header');
			}

			$this->load->view('template/footer');
		} else {
			//Jika Sukses kembali ke Index Pelanggan, jika Tidak kembali ke Form
			try {
				// $result = $this->users_model->create();
				$result = $this->userroles_model->create();
				
				redirect('userroles','refresh');
			}
			catch (Exception $ex) {
				redirect('userroles/create');
			}

		}
	}

    public function edit($userId = false) {
		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}

		$data['title'] = ucfirst('Edit User Role');
		
		$this->load->library('form_validation');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('userRole', 'User Role', 'required');
		$this->form_validation->set_rules('aktif', 'User Status', 'required');

		if ($this->form_validation->run() === FALSE){
			try {
				$data['roles'] = $this->roles_model->getAll();	
				$data['users'] = $this->userroles_model->getusersByUserId($userId);
				// var_dump($data['users']);

				$this->load->view('template/header');
				$this->load->view('userroles/edit', $data);
			}
			catch (Exception $ex){
				$this->load->view('template/header');
			}

			$this->load->view('template/footer');
		} else {
			try {
				$result = $this->userroles_model->updateUserRole();
			}
			catch (Exception $ex){
				// $this->load->view('template/header');
			}
		
			redirect('userroles');                      
		}
	}

    public function delete($userRoleId = NULL){
		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}

		if($this->session->userdata('role')<>'admin'){
			$this->session->set_flashdata('error',"Access Unauthorized! Admin Only.");

			redirect('salam','refresh');
		}

		try{
			$result = $this->userroles_model->delete($userRoleId);
			
		}
		catch(Exception $ex){
			//Catch Error
		}
		
		redirect('userroles', 'refresh');			
	}
}