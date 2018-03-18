<?php 
/**
* 
*/
class Msxtincon extends CI_Model
{
	
	public function getLoaitin()
	{
		$this->db->where('sTrangthai !=','nav');
		return $this->db->get('tbl_loaitin')->result_array();
	}
	public function getTincon($ma)
	{
		$this->db->where('FK_iMaloaitin',$ma);
		$this->db->where('iTrangthai',1);
		$this->db->order_by('iDouutien_ct','DESC');
		return $this->db->get('tbl_tinchitiet')->result_array();
	}
	public function upTin($value)
	{
		$kq=0;
		$sl=count($value);
		foreach ($value as $key => $value) {
			$this->db->where('PK_iMatin',$value);
			$this->db->set('iDouutien_ct',$sl-$key);
			$this->db->update('tbl_tinchitiet');
			$a=$this->db->affected_rows();
			if($a>0){
				$kq=1;
			}
		}
		return $kq;
	}
}

 ?>