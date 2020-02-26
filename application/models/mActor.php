<?php

class MActor extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	function add_actor($afn, $ad){
		$data = array(
   		'strActorFullName' => $afn,
   		'memActorNotes' => $ad
		);

		$config['upload_path'] = './images/';
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
				$data['image'] = "images/".$image['file_name'];
			}	

			if($this->db->insert('tblactors', $data)) {
				return true;
			}
		}
	} // end of add_actor 

	function read_all_actor(){
		// Produces: SELECT * FROM mytable
		$query = $this->db->get('tblactors');
		return $query->result();
		mysqli_free_result($query);
	}// end of read all actor

	function edit_actor($afn, $ad, $actor_id){
		$data = array(
   		'strActorFullName' => $afn,
   		'memActorNotes' => $ad
		);

		$config['upload_path'] = './images/';
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
				$data['image'] = "images/".$image['file_name'];

			}	

			$this->db->where('lngActorID', $actor_id);
			
			if($this->db->update('tblactors', $data)){
				return true; 
			}
		}
	}//end of edit actor

	function read_actor_byid($actor_id){
		$data = array();
		$this->db->select('*');
		$this->db->where('lngActorID', $actor_id);
		$query = $this->db->get('tblactors');
		if($query->num_rows() > 0){
			foreach ($query->result_array() as $row) {
				$data['lngActorID'] = $row['lngActorID'];
				$data['strActorFullName'] = $row['strActorFullName'];
				$data['memActorNotes'] = $row['memActorNotes'];
			}
		}
		$query->free_result();
		return $data;
	}

	function delete_actor($actor_id){
		if($this->db->delete('tblactors', array('lngActorID' => $actor_id))){
			return true;
		}else {
			return false; 
		}
	}// end of delete actor function 
	// function remove_old_pic($image, $actor_id){
	// 	$this->db->select('image');
	// 	$this->db->where('lngActorID', $actor_id);
	// 	$query = $this->db->get('tblactors');
	// 	$pathimage = $query->row();

	// 	unlink($image);
	// }

	// function update_actor_image(){

	// }
} // end of model actors 

?>
