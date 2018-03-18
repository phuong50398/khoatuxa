<?php

class Mhinhanh extends CI_Model
{

    public function getThumuc()
    {
        return $this->db->get('tbl_thumucanh')->result_array();
    }
    public function setFolder($folder)
    {
        $this->db->insert('tbl_thumucanh',$folder);
        return $this->db->affected_rows();
    }
    public function getMa_folder($thumuc)
    {
        $this->db->where('sTenthumuc',$thumuc);
        return $this->db->get('tbl_thumucanh')->row_array();
    }
    public function setAnh($value)
    {
        $this->db->insert('tbl_anh',$value);
        return $this->db->affected_rows();
    }

    public function getThumuc1()
    {

        $this->db->select('tm.*');
        $this->db->from('tbl_thumucanh as tm');
        return $this->db->get()->result_array();
    }

    public function getAnh1($matm)
    {
        $this->db->where('FK_iMathumuc',$matm);
        return $this->db->get('tbl_anh')->result_array();
    }
    public function getAnh2($matm)
    {
        $this->db->where('FK_iMathumuc',$matm);
        $this->db->select('*');
        $this->db->from('tbl_anh as anh');
        $this->db->join('tbl_thumucanh as tm','anh.FK_iMathumuc=tm.PK_iMathumuc');
        return $this->db->get()->result_array();
    }
    public function getAnh3($ma)
    {
        $this->db->where('iMaanh',$ma);
        $this->db->select('*');
        $this->db->from('tbl_anh as anh');
        $this->db->join('tbl_thumucanh as tm','anh.FK_iMathumuc=tm.PK_iMathumuc');
        return $this->db->get()->row_array();
    }
    public function getFolder_xoa($matm)
    {
        $this->db->where('PK_iMathumuc',$matm);
        return $this->db->get('tbl_thumucanh')->row_array();
    }
    public function DelThumuc($matm)
    {
        $this->db->where('PK_iMathumuc',$matm);
        $this->db->delete('tbl_thumucanh');
        return $this->db->affected_rows();
    }
    public function Delfile($matm)
    {
        $this->db->where('FK_iMathumuc',$matm);
        $this->db->delete('tbl_anh');
        return $this->db->affected_rows();
    }
    public function getFolder_sua($ma)
    {
        $this->db->where('PK_iMathumuc',$ma);
        return $this->db->get('tbl_thumucanh')->row_array();
    }
    public function upFolder($ma,$value)
    {
        $this->db->where('PK_iMathumuc',$ma);
        $this->db->update('tbl_thumucanh',$value);
        return $this->db->affected_rows();
    }
    public function Delfile1($ma)
    {
        $this->db->where('iMaanh',$ma);
        $this->db->delete('tbl_anh');
        return $this->db->affected_rows();
    }
}