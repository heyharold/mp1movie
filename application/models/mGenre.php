<?php

/**
 * class for genre model 
 */
class MGenre extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	function read_genre(){
		$genres = $this->db->get('tblfilmgenres');
		return $genres->result();
	} //end of read genre
}// end of class genre

  ?>