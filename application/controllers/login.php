<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('login_model');
    }

    public function index() {
        $data['title'] = ucwords('login');

        $this->load->library('form_validation');
		$this->form_validation->set_rules('userEmail', 'User E-Mail', 'required');
		$this->form_validation->set_rules('userPass', 'Password', 'required');

        if ($this->form_validation->run() === FALSE){            
            $this->load->view('template/header');
            $this->load->view('login/index', $data);                
            $this->load->view('template/footer');
        }
        else {
            $response = $this->login_model->request_login();

            if ($response)
                redirect('salam','refresh');
            else                
                redirect('login','refresh');                
        }
    }

    public function logout() {
        $this->session->sess_destroy();
            
        redirect('login','refresh');      }
}