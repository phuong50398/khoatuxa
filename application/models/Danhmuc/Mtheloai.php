<?php

class Mtheloai extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getTheloai()
    {
        $this->db->select('*');
        $this->db->from('tbl_theloai');
        return $this->db->get()->result_array();
    }
    public function setTheloai($value)
    {
        $this->db->insert('tbl_theloai',$value);
        return $this->db->affected_rows();
    }
    public function sluong($ma)
    {
        $this->db->where('FK_iMatheloai',$ma);
        return $this->db->get('tbl_loaitin')->num_rows();
    }
    public function setXoatl($value)
    {
        $this->db->where('PK_iMatheloai',$value);
        $this->db->delete('tbl_theloai');
        return $this->db->affected_rows();
    }
    public function getTl($value)
    {
        $this->db->select('*');
        $this->db->from('tbl_theloai');
        $this->db->where('PK_iMatheloai',$value);
        return $this->db->get()->row_array();
    }
    public function upTl($masua,$datasua)
    {
        $this->db->where('PK_iMatheloai',$masua);
        $this->db->update('tbl_theloai',$datasua);
        return $this->db->affected_rows();
    }
    public function getTinxoa($ma)
    {
        $this->db->where('FK_iMatheloai',$ma);
        return $this->db->get('tbl_loaitin')->num_rows();
    }
}