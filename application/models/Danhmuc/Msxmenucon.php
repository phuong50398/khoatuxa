<?php 

/**
* 
*/
class Msxmenucon extends CI_Model
{
	
	public function getTheloai()
	{
		$this->db->where('iTrangthai',0);
		$this->db->order_by('iDouutien_tl','ASC');
		return $this->db->get('tbl_theloai')->result_array();
	}

	public function getMenucon($matl)
	{
		$this->db->where('FK_iMatheloai',$matl);
		$this->db->where('sTrangthai','nav');
		$this->db->order_by('iDouutien_lt','DESC');
		$this->db->from('tbl_loaitin');
		return $this->db->get()->result_array();
	}

	public function upSapxep($value)
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