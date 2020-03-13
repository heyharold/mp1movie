<?php
/**
 * this is the class of login for users 
 */
class MLogin extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('security');
	}

	public function hash($string){
		return hash('md5', $string.config_item('encryption_key'));
	}

	function verifyuser($u ,$p){
		// $data = array();
		$this->db->select('user_id,username');
		$this->db->where('username',$u);
		$this->db->where('pass',$this->hash($p));
		$this->db->limit(1);
		$sql = $this->db->get('users');
		if ($sql->num_rows() > 0) {
			foreach ($sql->result() as $row) {
				$data = $row->user_id;
			}
			return $data;
		} else {
			return False;
		}
	}

	function registeruser($f,$l,$u,$p){
		$data = array(
			'first_name' => $f, 
			'last_name' => $l,
			'username' =>  $u,
			'pass' => $p
		);

		if($this->db->insert('users', $data)){
			return true;
		} else {
			return false;
		}
	}

	function logout(){
		session_destroy();
	}
}
?>