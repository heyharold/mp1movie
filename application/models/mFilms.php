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
			$last = $this->db->order_by('lngFilmTitleID',"desc")
				->limit(1)
				->get('tblfilmtitles')
				->row();
			return $last->lngFilmTitleID + 1;
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
				print($last_id);
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

		function edit_films($tle, $st, $rd, $du, $gr, $cert, $inf, $id){
			$data = array(
   				   'lngFilmTitleID' => $id,
				   'strFilmTitle' => $tle,
				   'memFilmStory' => $st,
				   'dtmFilmReleaseDate' => $rd,
				   'intFilmDuration' => $du,
				   'intFilmGenreID' => $gr,
				   'lngFilmCertificateID' => $cert,
				   'memFilmAdditionalInfo' => $inf
			);

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

				$this->db->where('lngFilmTitleID', $id);
				
				if($this->db->update('tblfilmtitles', $data)){
					return true; 
				}
			}
		}

		function del_films($id){
			if($this->db->delete('tblfilmtitles', array('lngFilmTitleID' => $id))){
				return true;
			}else {
				return false; 
			}
		}

		function view_film_byid($id){
			$data = array();
			$rateing = array();
			$this->db->select('*');
			$this->db->where('lngFilmTitleID', $id);
			$query = $this->db->get('tblfilmtitles');
			if($query->num_rows() > 0){
				foreach ($query->result_array() as $row) {
					$data['lngFilmTitleID'] = $row['lngFilmTitleID'];
					$rating['lngFilmTitleID'] = $row['lngFilmTitleID'];
					$data['strFilmTitle'] = $row['strFilmTitle'];
					$data['memFilmStory'] = $row['memFilmStory'];
					$data['dtmFilmReleaseDate'] = $row['dtmFilmReleaseDate'];
					$data['intFilmDuration'] = $row['intFilmDuration'];
					$genre = $row['intFilmGenreID'];
					$cert = $row['lngFilmCertificateID'];
					$data['memFilmAdditionalInfo'] = $row['memFilmAdditionalInfo'];	
					$data['image'] = $row['image'];
				}
			}
			$data['lngFilmGenreID']= $this->MGenre->read_genre_byid($genre);
			$data['lngFilmCertificateID']= $this->MCert->read_cert_byid($cert);
			$query->free_result();
			$filmid = $rating['lngFilmTitleID'];
			$this->MFilms->add_rating($filmid);
			return $data;
		}

		function add_rating($filmid){
			if($this->input->post('demo') != null){
				$rate = $this->input->post('demo');
				$data =array(
					'lngFilmTitleID' => $filmid,
					'lngRatingID' => $rate,
					'user_id' => 1
				);
				if($this->db->insert('tblfilmrating' , $data)){
					unset($_POST['demo']);
					return true;
				}

			}
		}

		function read_rating(){
			$query = $this->db->get('tblratings');
			return $query->result_array();
		}


		function rates($filmid){
			$this->db->select_avg('lngRatingID');
			$query = $this->db->get_where('tblfilmrating', array('lngFilmTitleID' => $filmid));
			return $query->result_array();
		}

		function get_rate($filmid, $equivrate){
			$query = $this->db->query("SELECT COUNT(lngRatingID) as 'numbervotes' FROM tblfilmrating WHERE lngRatingID = $equivrate AND lngFilmTitleID = $filmid;");
			$data = $query->row();
			return $data->numbervotes;
		}

		function get_userrating_byfilm($filmid){
			$this->db->select('COUNT(*) as \'voters\'');
			$query = $this->db->get_where('tblfilmrating', array('lngFilmTitleID' => $filmid));
			return $query->row_array();
		}
	}//end of model class films;
?>