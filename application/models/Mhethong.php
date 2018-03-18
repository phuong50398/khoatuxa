<?php

class Mhethong extends CI_Model{

    public function getMa($tentruong,$bang,$dd)
    {
        $this->db->select('max(convert(SUBSTRING('.$tentruong.',3), UNSIGNED INTEGER)) as maxid');
        $q = $this->db->get($bang)->row_array();
        if($q>0){
            $ma=$q['maxid']+1;
            return $dd.$ma;
        } else return $dd.'1';

    }
    public function getCanbo($macb){
        $this->db->select('PK_sTendangnhap,sMatkhau');
        $this->db->where('FK_iMacanbo',$macb);
        $this->db->from('tbl_dangnhap');
        return $this->db->get()->row_array();
    }
    public function doimk($macb,$newpass){
        $this->db->set('sMatkhau', $newpass);
        $this->db->where('FK_iMacanbo',$macb);
        $this->db->update('tbl_dangnhap');
        return $this->db->affected_rows();
    }
    public function getMax_lt($trangthai)
    {
        $this->db->select('max(iDouutien_lt) as maxlt');
        $this->db->from('tbl_loaitin');
        $this->db->where('sTrangthai',$trangthai);
        return $this->db->get()->row_array();
    }
    public function getMax_ct($maloaitin)
    {
        $this->db->select('max(iDouutien_ct) as maxct');
        $this->db->from('tbl_tinchitiet');
        $this->db->where('FK_iMaloaitin',$maloaitin);
        return $this->db->get()->row_array();
    }
    public function get_tin_by_loaitin($value)
    {
        $this->db->where('FK_iMaloaitin',$value);
        $this->db->where('ct.iTrangthai',1);
        $this->db->select('*');
        $this->db->from('tbl_tinchitiet as ct');
        $this->db->order_by('iDouutien_ct','DESC');
        $this->db->limit(4);
        return $this->db->get()->result_array();

    }
}