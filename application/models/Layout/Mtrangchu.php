<?php

class Mtrangchu extends CI_Model
{
    public function getTheloai()
    {
        $this->db->order_by('iDouutien_tl','ASC');
        return $this->db->get('tbl_theloai')->result_array();
    }
    public function getLoaitin()
    {
        $this->db->order_by('iDouutien_lt','DESC');
        return $this->db->get('tbl_loaitin')->result_array();
    }
    public function getTinleft()
    {
        $this->db->select('*');
        $this->db->from('tbl_loaitin as lt');
        $this->db->join('tbl_theloai as tl','lt.FK_iMatheloai=tl.PK_iMatheloai');
        $this->db->where('sTrangthai','left');
        $this->db->order_by('iDouutien_lt','DESC');
        $this->db->limit(4);
        return $this->db->get()->result_array();
    }
    public function getCtLeft()
    {
        $this->db->where('lt.sTrangthai','left');
        $this->db->where('ct.iTrangthai',1);
        $this->db->select('*');

        $this->db->from('tbl_tinchitiet as ct');
        $this->db->join('tbl_loaitin as lt','ct.FK_iMaloaitin=lt.PK_iMaloaitin');

        $this->db->order_by('iDouutien_ct','DESC');
        $this->db->limit(4);

        return $this->db->get()->result_array();
    }
    public function getTinright()
    {
        $this->db->select('*');
        $this->db->from('tbl_loaitin as lt');
        $this->db->join('tbl_theloai as tl','lt.FK_iMatheloai=tl.PK_iMatheloai');
        $this->db->where('sTrangthai','right');
        $this->db->order_by('iDouutien_lt','DESC');

        return $this->db->get()->result_array();
    }
    public function getCtright($ma)
    {
        $this->db->where('FK_iMaloaitin',$ma);
        $this->db->where('iTrangthai',1);

        $this->db->select('*');
        $this->db->from('tbl_tinchitiet as ct');

        $this->db->order_by('iDouutien_ct','DESC');
        $this->db->limit(6);
        return $this->db->get()->result_array();
    }
    public function getBg()
    {
        $this->db->where('sTrangthai','bg');
        return $this->db->get('tbl_anh')->row_array();
    }
    public function getBanner()
    {
        $this->db->where('sTrangthai','banner');
        return $this->db->get('tbl_anh')->row_array();
    }
    public function getTinslide(){
        $this->db->where('iSlide!=',NULL);
        $this->db->order_by('iSlide','ASC');
        $this->db->select('*');
        $this->db->from('tbl_tinchitiet');
        return $this->db->get()->result_array();
    }
    public function getQuangcao()
    {
        $this->db->order_by('PK_Maquangcao','DESC');
        $this->db->limit(3);
        return $this->db->get('tbl_quangcao')->result_array();
    }
    public function getTinmoi()
    {
        $this->db->order_by('dNgaydang','DESC');
        $this->db->limit(5);
        return $this->db->get('tbl_tinchitiet')->result_array();
    }
}