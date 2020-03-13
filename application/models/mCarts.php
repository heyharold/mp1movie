<?php
/**
 * class for carts
 */
class MCarts extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->db->reconnect();
	}

	function add_tocart($filmid){
		// if($this->input->post('addtocart')){
			$data = array(
				'filmid' => $filmid,
				'userid' => $_SESSION['id'],
				'ordered' => 'false'
			);
			if($this->db->insert('carts', $data)){
				return true;
			}
		// }
			// unset($_POST['addtocart']);
			$this->db->close();
	}	

	function select_usercart($user){
		$query = $this->db->query('SELECT COUNT(\'idcarts\') as \'qty\' FROM carts WHERE ordered=\'false\' and userid='.$user.';');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data = $row->qty;
			}
			return $data;
		} else {
			return False;
		}
	}

	function remove_tocart($filmid,$userid){
		$this->db->where('filmid', $filmid);
		$this->db->where('userid', $userid);
		if($this->db->delete('carts')){
			return true;
		}else{
			return false; 
		}
	}

	function reduce_qty($filmid, $userid){
		$query = $this->db->query("DELETE FROM carts WHERE filmid = $filmid AND userid = $userid LIMIT 1");
		if($query){
			return true;
		} else {
			return false;
		}
	}

	function read_usercart($userid){
		$query = $this->db->query('CALL read_usercart('.$userid.');');
		return $query->result_array();
		mysqli_free_result($query);
	}

	function order($filmid,$userid){
		$query = $this->db->query('CALL confirmed_order('.$filmid.','.$userid.');');
		return true;
		$this->db->close();
	}

	// function add_qty($filmid,$userid){
	// 	$this->add_tocart($filmid);
	// }

}// end of class carts
  ?>