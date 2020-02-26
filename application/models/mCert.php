<?php

/**
 * class for certificate modle
 */
class MCert extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	function read_cert(){
		$cert = $this->db->get('tblfilmcertificates');
		return $cert->result();
	} //end of read genre
}// end of class genre

  ?>