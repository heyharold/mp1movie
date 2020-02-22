<?php

class Create extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function Actor(){
		$this->load->view('header');
		$this->load->view('cactor');
	}

	function actor_create(){
		if (isset($_POST['strActorFullName'])) {
			$actorname = $_POST['strActorFullName'];
			$actordesc = $_POST['memActorDesc'];
			if($this->MActor->add_actor($actorname, $actordesc) == true){
				redirect('header', 'refresh');
			}else {
				redirect('cactor', 'refresh');
			}
		}
	
	}

} //end of create 
?>
