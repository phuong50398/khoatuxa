<?php 

/**
* 
*/
class Mfeed extends CI_Model
{
	
	public function getPost()
	{
		$this->db->order_by('dNgaydang','DESC');
		return $this->db->get('tbl_tinchitiet',10)->result_array();
	}
}
 ?>