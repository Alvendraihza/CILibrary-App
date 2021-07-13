<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('users_model');
		$this->load->model('roles_model');
		$this->load->model('userroles_model');
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
		
        $data['title']= ucwords('Daftar User');

		try {
			$data['data'] = $this->users_model->getAll();

			$this->load->view('template/header');
			$this->load->view('users/index', $data);
		}
		catch (Exception $ex) {
			$this->load->view('template/header');
		}		

		$this->load->view('template/footer');
	}

	public function view($userName = NULL) {
		//Jika belum login tampilkan halaman Login
		if(!$this->session->userdata('username')){
			$this->session->set_flashdata('error',"Access Unauthorized! Please Login.");

			redirect('login','refresh');
		}

		if($this->session->userdata('role')<>'admin'){
			$this->session->set_flashdata('error',"Access Unauthorized! Admin Only.");

			redirect('salam','refresh');
		}
		
		$data['title'] = ucwords('Informasi User');

		try {
			// $data['data'] = $this->users_model->getUser($userName);
			$data['data'] = $this->users_model->getUser($userName);

			$this->load->view('template/header');
			$this->load->view('users/view', $data);
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

		// if(!$this->session->userdata('role')<>'admin'){
		// 	$this->session->set_flashdata('error',"Access Unauthorized! Admin Only.");

		// 	redirect('salam','refresh');
		// }

		$data['title'] = ucwords('Tambah User');
        $data['datetime']=date('d-M-Y H:i', time());

		$this->load->library('form_validation');
		$this->form_validation->set_rules('fullName', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('userName', 'User Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE){
			$this->load->view('template/header');
			$this->load->view('users/create', $data);
			$this->load->view('template/footer');
		} else {
			$result = $this->users_model->create();

			// Menggunakan Session Message
			// $this->session->set_flashdata(
			// 	($result->status==200) ? 'success' : 'error',
			// 	"<strong>Respond Status:</strong> $result->status<br />
			// 		<strong>Respond Error:</strong> $result->error<br />
			// 		<strong>Message:</strong> $result->message"
			// );

			redirect(($result->status==200) ? 'users' : 'users/create');	//Jika Sukses kembali ke Index Pelanggan, jika Tidak kembali ke Form
		}
	}

	public function edit($userName = false) {
        //Jika belum login tampilkan halaman Login
        if($this->session->userdata('role')<>'admin'){
            $this->session->set_flashdata('error', "error 404");
            redirect('index.html','refresh');

        }

        $data['title'] = ucfirst('Edit User Role');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'User Password', 'required');
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'E-Mail', 'required');

        if ($this->form_validation->run() === FALSE){
            try {
                // $data['roles'] = $this->roles_model->getAll();
                $data['users'] = $this->users_model->getUser($userName);

                $this->load->view('template/header');
                $this->load->view('users/edit', $data);
            }
            catch (Exception $ex){
                $this->load->view('template/header');
            }

            $this->load->view('template/footer');
        } else {
            try {
                //Save updated data
                $result = $this->users_model->update();
            }
            catch (Exception $ex){
                // $this->load->view('templates/header');
            }

            redirect('users');
        }
    }

    public function delete($userId = NULL){
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
			$result = $this->users_model->delete($userId);
			
			redirect('users','refresh');			
		}
		catch(Exception $ex){
			redirect('users', 'refresh'); 
		}

	}
}