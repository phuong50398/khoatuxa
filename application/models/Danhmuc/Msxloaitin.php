<?php 
/**
* 
*/
class Msxloaitin extends CI_Model
{
	
	public function getLt($tt)
	{
		$this->db->where('sTrangthai',$tt);
		$this->db->where('PK_iMaloaitin !=',91);
		$this->db->where('PK_iMaloaitin !=',94);
		$this->db->order_by('iDouutien_lt','DESC');
		return $this->db->get('tbl_loaitin')->result_array();
	}
	public function upLt($value)
	{
		$kq=0;
		$sl=count($value);
		foreach ($value as $key => $value) {
			$this->db->where('PK_iMaloaitin',$value);
			$this->db->set('iDouutien_lt',$sl-$key);
			$this->db->update('tbl_loaitin');
			$a=$this->db->affected_rows();
			if($a>0){
				$kq=1;
			}
		}
		return $kq;
	}
}

 ?>