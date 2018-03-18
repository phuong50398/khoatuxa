<?php

class Mcanbo extends CI_Model
{
    public function getCanbo(){
        return $this->db->get('tbl_canbo')->result_array();
    }
    public function getThongtincb($macb){
        $this->db->where('PK_iMacanbo',$macb);
        return $this->db->get('tbl_canbo')->row_array();
    }
    public function fixThongtincb($thongtincb){
        $this->db->where('PK_iMacanbo',$thongtincb['PK_iMacanbo']);
        $this->db->update('tbl_canbo',$thongtincb);
        return $this->db->affected_rows();
    }
    public function insertcb($data2){
        $this->db->insert('tbl_canbo',$data2);
    }
    public function getMacanbo(){
        $this->db->select_max('PK_iMacanbo','FK_iMacanbo');
        return $this->db->get('tbl_canbo')->row_array();
    }
    public function inserttk($data1){
        $this->db->insert('tbl_dangnhap',$data1);
        return $this->db->affected_rows();
    }
    public function deletecanbo($macb){
        $this->db->where('FK_iMacanbo',$macb);
        $this->db->delete('tbl_dangnhap');
        $this->db->where('PK_iMacanbo',$macb);
        $this->db->delete('tbl_canbo');
        return $this->db->affected_rows();
    }
}