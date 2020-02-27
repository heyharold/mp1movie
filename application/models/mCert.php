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


	function read_cert_byid($id){
		$data = array();
			$this->db->select('strCertificate');
			$this->db->where('lngCertificateID', $id);
			$query = $this->db->get('tblfilmcertificates');
			if($query->num_rows() > 0){
				$data = $query->row();
			}
			$cert = $data->strCertificate;
			$query->free_result();
			return $cert;
	}
}// end of class genre

  ?>