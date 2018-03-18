<?php 

/**
* 
*/
class Msxtheloai extends CI_Model
{
	
	public function getTheloai()
	{	
		$this->db->order_by('iDouutien_tl','ASC');
		return $this->db->get('tbl_theloai')->result_array();
	}
	public function getTincon($id)
	{
		$this->db->where('FK_iMatheloai',$id);
		$this->db->where('sTrangthai','nav');
		return $this->db->get('tbl_loaitin')->result_array();
	}
	public function SxTheloai($value)
	{
		$kq=0;
		foreach ($value as $key => $value) {
			$this->db->where('PK_iMatheloai',$value);
			$this->db->set('iDouutien_tl',$key);
			$this->db->update('tbl_theloai');
			$a=$this->db->affected_rows();
			if($a>0){
				$kq=1;
			}
		}
		return $kq;
	}
}
 ?>