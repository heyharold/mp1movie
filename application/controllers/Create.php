<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller{
	public $CI = NULL;

    public function __construct() {
        parent::__construct();
        $this->CI = & get_instance();
        // $this->load->library('session');
        $this->load->helper('security');
        session_start();
        print_r($_SESSION);
        if (isset($_SESSION['id'])) {
        	$_SESSION['qty'] = $this->MCarts->select_usercart($_SESSION['id']);
        }
    }

	function Actor(){
		$this->load->view('cactor');
	}

	function actor_create(){
		if (isset($_POST['strActorFullName'])) {
			$actorname = $_POST['strActorFullName'];
			$actordesc = $_POST['memActorDesc'];
			if($this->MActor->add_actor($actorname, $actordesc) == true){
				redirect('Create/read_all_actors', 'refresh');
			}else {
				redirect('Create/read_all_actors', 'refresh');
			}
		}
	
	} // end of actor create 

	function read_all_actors(){
		$data= array();
		$data['actors'] = $this->MActor->read_all_actor();
		$this->load->view('ractor', $data);
		print_r($_SESSION);
	}

	function edit_actor($actor_id = 0){
		$id['id'] = $this->uri->segment(3);
		$data['actor'] = $this->MActor->read_actor_byid($actor_id);
		$this->load->vars($data);
		// print_r($data);
		$this->load->view('eactor', $data);
	}// end fetch edit actor data

	function edit_actor_data(){
		if (isset($_POST['strActorFullName'])) {
			$actorname = $_POST['strActorFullName'];
			$actordesc = $_POST['memActorDesc'];
			$actorid = $_POST['lngActorID'];
			if($this->MActor->edit_actor($actorname,$actordesc,$actorid)){
				redirect('Create/read_all_actors', 'refresh');
		}else {
				redirect('Create/edit_actor/$actor_id', 'refresh');
			}
		}
		
	}//enf of edit actor function 

	function del_actor($actor_id = 0){
		$actor_id = $this->uri->segment(3);
		if($this->MActor->delete_actor($actor_id)) {
			redirect('Create/read_all_actors', 'refresh');
		}else {
			$this->load->view('dactor');
		}
	}// end of function delete actor


	//functions for films 
	function films(){
		$data = array();
		$data['genres'] = $this->MGenre->read_genre();
		$data['cert'] = $this->MCert->read_cert();
		$this->load->view('cfilms', $data);
	} // end of film view

	function films_create(){
		if($this->MFilms->add_films()){
			redirect('Create/films', 'refresh');
		}
	} // end of add films

	function read_all_films(){
		$data['films'] = $this->MFilms->read_films();
		$this->load->view('rfilms', $data);
	}

	function edit_film($id = 0){
		$data = array();
		$data['films'] = $this->MFilms->tobe_edit_film($id);
		$data['genres'] = $this->MGenre->read_genre();
		$data['cert'] = $this->MCert->read_cert();
		$this->load->vars($data);
		var_dump($data['films']);
		$this->load->view('efilms',$data);
	}

	function edit_films(){
		if($this->MFilms->edit_films($_POST['strFilmTitle'],$_POST['memFilmStory'],$_POST['dtmFilmReleaseDate']
			, $_POST['intFilmDuration'], $_POST['lngFilmGenreID'], $_POST['lngFilmCertificateID'], $_POST['memFilmAdditionalInfo'], $_POST['lngFilmTitleID'])){
				redirect('Create/read_all_films', 'refresh');
		}else {
				redirect('Create/edit_film/$lngFilmTitleID', 'refresh');
			}
	}

	function del_film($id =0){
		if($this->MFilms->del_films($id)){
			redirect('Create/read_all_films', 'refresh');
		}
	}

	function film($id = 0){
		$data = array();
		$id = $this->uri->segment(3);
		$data['films'] = $this->MFilms->view_film_byid($id);
		$data['rates'] = $this->MFilms->read_rating();
		$data['rating'] = $this->MFilms->rates($id);
		$data['voters'] = $this->MFilms->get_userrating_byfilm($id);
		$data['analytics'] = $this->MFilms->getratingsbyfilm($id);
		for ($i=1; $i<=5 ; $i++) { 
			$data["rating_".$i] = $this->MFilms->get_rate($id, $i);
		}
		for($x=0;$x<=12;$x++){
			if ($this->MFilms->getratingsbymonth($id,$x) == NULL) {
				$data['month_'.$x] = '0';	
			} else {
				$data['month_'.$x] = $this->MFilms->getratingsbymonth($id,$x); 
			}
		}
		$this->load->view('fdetails', $data);
		$this->load->view('stats', $data);
	}

	function addtocart($id = 0){
		$id = $this->uri->segment(3);
		$this->MCarts->add_tocart($id);
		redirect('Create/film/'.$id.''); 
	}


	//functions for producer 

	function producer(){
		$this->load->view('cproducer');
	}

	function prod_create(){
		if (isset($_POST['strProducerName'])) {
			$data['prod']= $this->MProd->add_prod();
			// $this->load->view('rprod', $data);
			redirect('Create/read_all_prods', $data);
		} else {
			reidrect('Create/producer', 'refresh');
		}
	}

	function read_all_prods(){
		$data['prod'] = $this->MProd->read_all_prods();
		$this->load->view('rprod', $data);
	}
	
	function edit_prod($id=0) {
		$id = $this->uri->segment(3);
		$data['prod'] = $this->MProd->read_prod_byid($id);
		// print_r($data);
		$this->load->view('eprod',$data);
	}

	function prod_edit(){
		if (isset($_POST['strProducerName'])) {
			if($this->MProd->prod_edit()){
				redirect('Create/read_all_prods','refresh');
			}
		} else {
			redirect('Create/edit_prod', 'refresh');
		}
	}//end of prod edit

	function del_prod($id = 0){
		$id = $this->uri->segment(3);
		if($this->MProd->del_prod($id)){
			redirect('Create/read_all_prods', 'refresh');
		} 
	}

	function rating(){
		$rated = $_POST['btnClickedValue'];
		echo $rated; 
		redirect('Create/film', 'refresh');
	}

	function login(){
		$this->load->view('login');
	}

	function verify(){
		if (!empty($this->input->post('username'))) {
			$u = $this->input->post('username');
			$p = $this->input->post('password');			
		}
		if($this->MLogin->verifyuser($u,$p)){
			$_SESSION['username'] = $u;
			$_SESSION['id'] = $this->MLogin->verifyuser($u,$p);
			    if (isset($_SESSION['id'])) {
        			$_SESSION['qty'] = $this->MCarts->select_usercart($_SESSION['id']);
        		}
			redirect('Welcome/index', 'refresh');
		}else{
			redirect('Create/login','refresh');
		}
	}//end verify

	function signup(){
		$this->load->view('register');
	}
	function registers(){
		if(!empty($this->input->post('username'))){
			$f = $this->input->post('fname');
			$l = $this->input->post('lname');
			$u = $this->input->post('username');
			$p = do_hash($this->input->post('password'), 'md5');
			echo $f;
			echo $l;
			echo $u;
			echo $p;
		}
		if($this->MLogin->registeruser($f,$l,$u,$p) == true){
			redirect('Create/login', 'refresh');
		} else {
			redirect('Create/signup', 'refresh');
		}
	}

	function logout(){
		$this->MLogin->logout();
		redirect('Welcome/index', 'refresh');
	}


	function viewcart(){
		$data['carts'] =$this->MCarts->read_usercart($_SESSION['id']);
		var_dump($data);
		$this->load->view('cart', $data);
	}

	function removetocart(){
		$filmid = $this->uri->segment(3);
		$this->MCarts->remove_tocart($filmid,$_SESSION['id']);
		redirect('Create/viewcart', 'refresh');
	}

	function reduceqty(){
		$filmid = $this->uri->segment(3);
		if($this->MCarts->reduce_qty($filmid, $_SESSION['id'])){
			redirect('Create/viewcart', 'refresh');
		}else {
			redirect('Create/viewcart', 'refresh');
		}
	}

	function addqty(){
		$filmid = $this->uri->segment(3);
		if ($this->MCarts->add_tocart($filmid)){
			redirect('Create/viewcart', 'refresh');
		}
	}

	function checkout(){
		if (isset($_POST['checkout'])) {
			foreach ($_POST['filmid'] as $ids) {
				echo $ids;
				$this->MCarts->order($ids, $_SESSION['id']);
			}
		}
		redirect('Create/viewcart', 'refresh');
	}
} //end of create 
?>
