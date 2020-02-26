<?php
	
	/**
	 * This class is for films database
	 */
	class MFilms extends CI_Model
	{
		
		public function __construct()
		{
			parent::__construct();
		}

		function get_last_id_Film(){
			$last_id = $this->db->count_all('tblfilmtitles');
			$last_id = $last_id+1;
			return $last_id;
		}

		function add_films(){
			if (isset($_POST['strFilmTitle']) && isset($_POST['memFilmStory'])) {
				$strFilmTitle = $_POST['strFilmTitle'];
				$memFilmStory = $_POST['memFilmStory'];
				$dtmFilmReleaseDate = $_POST['dtmFilmReleaseDate'];
				$intFilmDuration = $_POST['intFilmDuration'];
				$lngFilmGenreID = $_POST['lngFilmGenreID'];
				$lngFilmCertificateID = $_POST['lngFilmCertificateID'];
				$memFilmAdditionalInfo = $_POST['memFilmAdditionalInfo'];

				$last_id = $this->MFilms->get_last_id_Film();
				$data = array(
				   'lngFilmTitleID' => $last_id,
				   'strFilmTitle' => $strFilmTitle,
				   'memFilmStory' => $memFilmStory,
				   'dtmFilmReleaseDate' => $dtmFilmReleaseDate,
				   'intFilmDuration' => $intFilmDuration,
				   'intFilmGenreID' => $lngFilmGenreID,
				   'lngFilmCertificateID' => $lngFilmCertificateID,
				   'memFilmAdditionalInfo' => $memFilmAdditionalInfo
				);
			}

				$config['upload_path'] = './posters/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '200';
				$config['remove_spaces'] = true;
				$config['overwrite'] = false;
				$config['max_width'] = '0';
				$config['max_height'] = '0';
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('image')){
					echo $this->upload->display_errors();
					exit();
				} else {
					$image = $this->upload->data();
					if ($image['file_name']){
						$data['image'] = "posters/".$image['file_name'];
					}	

					if($this->db->insert('tblfilmtitles', $data)){
						return true;
					}
				}
		}// end of function add films;

		function read_films(){
			$films=$this->db->get('tblfilmtitles');
			return $films->result();
		}

		function tobe_edit_film($id){
			$data = array();
			$this->db->select('*');
			$this->db->where('lngFilmTitleID', $id);
			$query = $this->db->get('tblfilmtitles');
			if($query->num_rows() > 0){
				foreach ($query->result_array() as $row) {
					$data['lngFilmTitleID'] = $row['lngFilmTitleID'];
					$data['strFilmTitle'] = $row['strFilmTitle'];
					$data['memFilmStory'] = $row['memFilmStory'];
					$data['dtmFilmReleaseDate'] = $row['dtmFilmReleaseDate'];
					$data['intFilmDuration'] = $row['intFilmDuration'];
					$data['intFilmGenreID'] = $row['intFilmGenreID'];
					$data['lngFilmCertificateID'] = $row['lngFilmCertificateID'];
					$data['memFilmAdditionalInfo'] = $row['memFilmAdditionalInfo'];
				}
			}
			$query->free_result();
			return $data;
		}

		function del_films($id){
			if($this->db->delete('tblfilmtitles', array('lngFilmTitleID' => $id))){
				return true;
			}else {
				return false; 
			}
		}
	}//end of model class films;
?>