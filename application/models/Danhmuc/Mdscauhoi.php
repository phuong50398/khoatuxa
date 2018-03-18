<?php 

 /**
 * 
 */
 class Mdscauhoi extends CI_Model
 {
 	
 	public function getCauhoi($start)
 	{
 		$this->db->select('*');
 		$this->db->from('tbl_cauhoi as ch');
 		$this->db->order_by('dNgayhoi','DESC');
 		$this->db->limit(5,$start*5);
 		return $this->db->get()->result_array();
 	}
 	public function getTraloi($ma)
 	{
 		$this->db->where('FK_iMacauhoi',$ma);
 		$this->db->order_by('sNgaytraloi','DESC');
 		return $this->db->get('tbl_traloi')->result_array();
 	}
 	public function setTraloi($value)
 	{
 		$this->db->insert('tbl_traloi',$value);
 		return $this->db->affected_rows();
 	}
 	public function Deltraloi($ma)
 	{	
 		$this->db->where('PK_Matraloi',$ma);
 		$this->db->delete('tbl_traloi');
 		return $this->db->affected_rows();
 	}
 	public function Delcauhoi($ma)
 	{
 		$this->db->where('PK_iMacauhoi',$ma);
 		$this->db->delete('tbl_cauhoi');
 		return $this->db->affected_rows();
 	}

 	public function getSum()
 	{
 		return $this->db->get('tbl_cauhoi')->num_rows();
 	}
 	public function getMa($ma)
 	{
 		$this->db->where('PK_Matraloi',$ma);
 		$this->db->select('FK_iMacauhoi');
 		return $this->db->get('tbl_traloi')->row_array();
 	}
 	public function TestNull($ma)
 	{
 		$this->db->where('FK_iMacauhoi',$ma);
 		return $this->db->get('tbl_traloi')->num_rows();
 	}
 	public function getMaxstt()
 	{
 		$this->db->select('PK_Matraloi');
 		$this->db->order_by('PK_Matraloi','DESC');
 		$this->db->limit(1);
 		return $this->db->get('tbl_traloi')->row_array();
 	}
 	public function getTinmoi()
    {
        $this->db->order_by('dNgaydang');
        $this->db->limit(5);
        return $this->db->get('tbl_tinchitiet')->result_array();
    }
 }
 ?>