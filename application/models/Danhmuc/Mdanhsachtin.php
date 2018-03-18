<?php

class Mdanhsachtin extends CI_Model
{

    public function getTintuc()
    {
        $this->db->join('tbl_loaitin as lt','ct.FK_iMaloaitin=lt.PK_iMaloaitin');
        $this->db->order_by('dNgaydang','DESC');
        return $this->db->get('tbl_tinchitiet as ct')->result_array();
    }

    public function Deltin($matin)
    {
        $this->db->where('PK_iMatin',$matin);
        $this->db->delete('tbl_tinchitiet');
        return $this->db->affected_rows();
    }
    public function XoaTagsTin($ma)
    {
        $this->db->where('PK_iMatin',$ma);
        $this->db->delete('tbl_tags_tin');
    }
}