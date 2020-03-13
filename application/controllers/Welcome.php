<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		// $this->load->library('session');
		session_start();
	}

	public function index()
	{
		$data = array();
		$data['films'] =$this->MFilms->read_films();
		// $data['rate'] = $this->input->post('demo');
		// $_SESSION['username'] = 'Harold';
		// print_r($data);
		$this->load->view('header', $data);
		$this->load->view('films_index' , $data);
		var_dump($_SESSION);
	}

	// public function load(){
	// 	$data['qty'] = $this->MCarts->select_usercart($_SESSION['id']);
	// 	var_dump($data);
	// 	$this->load->view('header', $data);
	// }
}
