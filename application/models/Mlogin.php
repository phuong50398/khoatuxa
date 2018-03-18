<?php


class Mlogin extends CI_Model{

    public function getUser($user){
        $this->db->select('PK_sTendangnhap,FK_iMaquyen,FK_iMacanbo,sMatkhau');
        $this->db->from('tbl_dangnhap');
        $this->db->join('tbl_quyen','tbl_dangnhap.FK_iMaquyen = tbl_quyen.PK_iMaquyen');
        $this->db->where("PK_sTendangnhap",$user);
        return $this->db->get()->row_array();
    }
}