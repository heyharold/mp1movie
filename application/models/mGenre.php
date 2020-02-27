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

	function read_genre_byid($id){
		$data = array();
			$this->db->select('strGenre');
			$this->db->where('lngGenreID', $id);
			$query = $this->db->get('tblfilmgenres');
			if($query->num_rows() > 0){
				$data = $query->row();
			}
			$genre = $data->strGenre;
			$query->free_result();
			return $genre;
	}
}// end of class genre

  ?>