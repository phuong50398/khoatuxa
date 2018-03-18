<?php

class Mhome extends CI_Model
{

    public function getTintuc(){
        $this->db->select('sTieude,sTomtatnoidung,sNoidung,sAnhdaidien,sTenloaitin,FK_iMaloaitin');
        $this->db->from('tbl_tinchitiet');
        $this->db->join('tbl_loaitin','tbl_tinchitiet.FK_iMaloaitin = tbl_loaitin.PK_iMaloaitin');
        $result = $this->db->get()->result_array();
        return $result;
    }
//    public function getAnh(){
//
//    }
    public function getLoaitin(){
        $this->db->select('PK_iMaloaitin,sTenloaitin');
        $this->db->from('tbl_loaitin');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getTheloai(){
        $result = $this->db->get('tbl_theloai')->result_array();
        return $result;
    }
}