<?php

class Mslide extends CI_Model
{
    public function getTinslide(){
        $where = "iSlide!='NULL' OR iSlide!=''";
        $this->db->where($where);
        $this->db->select('*');
        $this->db->order_by('iSlide','ASC');
        $this->db->from('tbl_tinchitiet');
        return $this->db->get()->result_array();
    }
    public function updateslide($data,$PK_iMatin){
        $this->db->where('PK_iMatin', $PK_iMatin);
        $this->db->update('tbl_tinchitiet',$data);
        return $this->db->affected_rows();
    }
    public function getTintuc()
    {
        $this->db->order_by('dNgaydang','DESC');
        return $this->db->get('tbl_tinchitiet')->result_array();
    }
    public function updatenull($data,$slide){
        $this->db->where('iSlide', $slide);
        $this->db->update('tbl_tinchitiet',$data);
        return $this->db->affected_rows();
    }

    public function getTinslideId($PK_iMatin)
    {
        $this->db->where('PK_iMatin', $PK_iMatin);
        return $this->db->get('tbl_tinchitiet')->result_array();
    }
}