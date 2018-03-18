<?php

class Mevent extends CI_Model
{
    public function getSukien(){
        return $this->db->get("tbl_sukien")->result_array();
    }
    public function insertSukien($sk){
        $this->db->insert('tbl_sukien',$sk);
        return $this->db->affected_rows();
    }
    public function demSk($ma){
        $this->db->where('FK_iSukien',$ma);
        return $this->db->get('tbl_tinchitiet')->num_rows();
    }
    public function xoaSk($ma){
        $this->db->where('PK_iMasukien',$ma);
        $this->db->delete('tbl_sukien');
        return $this->db->affected_rows();
    }
    public function getSksua($ma){
        $this->db->where('PK_iMasukien',$ma);
        $this->db->from('tbl_sukien');
        return $this->db->get()->row_array();
    }
    public function updateSk($giatri,$ma){
        $this->db->where('PK_iMasukien',$ma);
        $this->db->update('tbl_sukien',$giatri);
        return $this->db->affected_rows();
    }
}