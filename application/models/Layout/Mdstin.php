<?php

class Mdstin extends CI_Model
{
    public function getTin_ma($ma,$start)
    {
        $this->db->where('FK_iMaloaitin',$ma);
        $this->db->where('iTrangthai',1);
        $this->db->select('ct.*, lt.sTenloaitin');
        $this->db->from('tbl_tinchitiet as ct');
        $this->db->join('tbl_loaitin as lt','ct.FK_iMaloaitin=lt.PK_iMaloaitin');
        $this->db->order_by('iDouutien_ct','DESC');
        $this->db->limit(10,$start);
        return $this->db->get()->result_array();
    }
    public function getTongtin($ma)
    {
        $this->db->where('FK_iMaloaitin',$ma);
        $this->db->where('iTrangthai',1);
        return $this->db->get('tbl_tinchitiet')->num_rows();
    }
    public function getChitiet($ma)
    {
        $this->db->where('PK_iMatin',$ma);
        $this->db->where('iTrangthai',1);
        $this->db->select('ct.*, lt.sTenloaitin');
        $this->db->from('tbl_tinchitiet as ct');
        $this->db->join('tbl_loaitin as lt','ct.FK_iMaloaitin=lt.PK_iMaloaitin');
        return $this->db->get()->row_array();
    }
    public function getTin_nav($ma)
    {
        $this->db->where('lt.PK_iMaloaitin',$ma);
        $this->db->where('ct.iTrangthai',1);
        $this->db->select('*');
        $this->db->from('tbl_loaitin as lt');
        $this->db->join('tbl_tinchitiet as ct','lt.PK_iMaloaitin=ct.FK_iMaloaitin','left');
        return $this->db->get()->result_array();
    }
    public function getTin_tl($ma)
    {
        $this->db->where('PK_iMatheloai',$ma);
        $this->db->where('ct.iTrangthai',1);
        $this->db->select('lt.*, tl.sTentheloai,ct.*');
        $this->db->from('tbl_theloai as tl');
        $this->db->join('tbl_loaitin as lt','tl.PK_iMatheloai=lt.FK_iMatheloai','left');
        $this->db->join('tbl_tinchitiet as ct','lt.PK_iMaloaitin=ct.FK_iMaloaitin','left');
        return $this->db->get()->result_array();
    }
    public function getThumuc()
    {
        $this->db->select('tm.*');
        $this->db->from('tbl_thumucanh as tm');
        return $this->db->get()->result_array();
    }

    public function getAnh($matm)
    {
        $this->db->where('FK_iMathumuc',$matm);
        return $this->db->get('tbl_anh')->result_array();
    }
    public function getLoaitin1($ma)
    {
        $this->db->where('PK_iMaloaitin',$ma);
        return $this->db->get('tbl_loaitin')->row_array();
    }
    public function danhsachtinchitiet()
    {
        return $this->db->get('tbl_tinchitiet')->result_array();
    }
    public function getTinmoi()
    {
        $this->db->order_by('dNgaydang','DESC');
        $this->db->limit(5);
        return $this->db->get('tbl_tinchitiet')->result_array();
    }

    public function getTagCodau($dk)
    {
        $this->db->where('sTag_khongdau',$dk);
        return $this->db->get('tbl_tags')->row_array();
    }

    public function getTimkiem($ten)
    {
        $this->db->like('sTieude',$ten);
        $this->db->or_like('sNoidung',$ten);
        $this->db->or_like('sTags',$ten);
        return $this->db->get('tbl_tinchitiet')->result_array();
    }
    // public function getTags($ma)
    // {
    //     $this->db->where('PK_iMatin',$ma);
    //     $this->db->from('tbl_tags_tin as tt');
    //     $this->db->join('tbl_tags as t','tt.PK_iMatags=t.PK_iMatags');
    //     return $this->db->get()->result_array();
    // }
}