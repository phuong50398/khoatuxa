<?php 
 /**
 * 
 */
 class Mcauhoi extends CI_Model
 {
 	public function setCauhoi($value)
 	{
 		$this->db->insert('tbl_cauhoi',$value);
 		return $this->db->affected_rows();
 	}
 	public function getCauhoi($start)
 	{
 		$this->db->select('*');
 		$this->db->from('tbl_cauhoi as ch');
 		$this->db->order_by('dNgayhoi','DESC');
 		$this->db->limit(10,$start*10);
 		return $this->db->get()->result_array();
 	}
 	public function getTraloi($ma)
 	{
 		$this->db->where('FK_iMacauhoi',$ma);
 		return $this->db->get('tbl_traloi')->result_array();
 	}
 	public function getSum()
 	{
 		return $this->db->get('tbl_cauhoi')->num_rows();
 	}
 	public function getTinmoi()
    {
        $this->db->order_by('dNgaydang','DESC');
        $this->db->limit(5);
        return $this->db->get('tbl_tinchitiet')->result_array();
    }
 }
 ?>