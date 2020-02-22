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
			$data['image'] = "/images/".$image['file_name'];
		}

		if($this->db->insert('tblactors', $data)) {
			return true;
		}
	}
}
} // end of model actors 

?>
