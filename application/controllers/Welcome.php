<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('usuario');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('header');
		$this->load->view('welcome');
		$this->load->view('footer');
	}

	public function login()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}
	    
    public function signin() {
        $mail = $this->input->post('mail');
        $pass = $this->input->post('pass');
        
        $arrayUser = $this->usuario->login($mail, md5($pass));
        if (count($arrayUser) > 0) {
            //$this->session->set_userdata("user", $arrayUser);
            echo json_encode(array("msg" => "1"));
        } else {
            echo json_encode(array("msg" => "0"));
        }
	}
	
	public function home() {
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
}
