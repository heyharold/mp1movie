<?php
/**
   * class for producers
   */
  class MProd extends CI_Model
  {
  	
  	 public function __construct()
  	{
  		parent::__construct();
  	}


  	function add_prod(){
  		$data = array(
  			'strProducerName' => $_POST['strProducerName'],
  			'hypContactEmailAddress' => $_POST['hypContactEmailAddress'],
  			'hypWebsite' => $_POST['hypWebsite']
  		);

  		if ($this->db->insert('tblproducers', $data)) {
  			return true;
  		}else {
  			return false;
  		}
  	}

  	function read_all_prods(){
  		$query = $this->db->get('tblproducers');
  		return $query->result();
  	}

  	function read_prod_byid($id){
  		$this->db->select('*');
  		$this->db->where('lngProducerID', $id);
  		$query = $this->db->get('tblproducers');
  		$data = $query->row();
  		$query->free_result();
  		return $data;
  	}

  	function prod_edit(){
  		$data = array(
  			'strProducerName' => $_POST['strProducerName'],
  			'hypContactEmailAddress' => $_POST['hypContactEmailAddress'],
  			'hypWebsite' => $_POST['hypWebsite'],
  			'lngProducerID' => $_POST['lngProducerID']
  		);

  		$this->db->where('lngProducerID', $data['lngProducerID']);
		if($this->db->update('tblproducers', $data)){
			return true;
		} else {
			return false;
		}
  	}

  	function del_prod($id){
  		if($this->db->delete('tblproducers', array('lngProducerID' => $id))){
			return true;
		}else {
			return false; 
		}
  	}

  }// end of class producer  

?>