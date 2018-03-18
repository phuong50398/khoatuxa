<?php

class Mloaitin extends CI_Model
{
    /**
     * Lay loai tin
     */
    public function getLoaitin()
    {
        $this->db->select('*');
        $this->db->from('tbl_loaitin as lt');
        $this->db->join('tbl_theloai as tl','lt.FK_iMatheloai=tl.PK_iMatheloai');
        $this->db->order_by('PK_iMaloaitin','DESC');
        return $this->db->get()->result_array();
    }

    public function getTheloai()
    {
        return $this->db->get('tbl_theloai')->result_array();
    }
    public function slTin($ma)
    {
        $this->db->where('FK_iMaloaitin',$ma);
        $this->db->from('tbl_tinchitiet');
        return $this->db->get()->num_rows();
    }

    /**
     * Hàm thêm loại tin
     */
    public function setLoaitin($value)
    {
        $this->db->insert('tbl_loaitin',$value);
        return $this->db->affected_rows();
    }

    /**
     * Hàm xóa loại tin
     */
    public function Delloaitin($maloaitin)
    {
        $this->db->where('PK_iMaloaitin',$maloaitin);
        $this->db->delete('tbl_loaitin');
        return $this->db->affected_rows();
    }

    /**
     *  Hàm lấy tin cần sửa
     */
    public function Layloaitin_sua($ma_sua)
    {
        $this->db->where('PK_iMaloaitin',$ma_sua);
        $this->db->from('tbl_loaitin');
        return $this->db->get()->row_array();
    }
    public function upLoaitin($value,$ma)
    {
        $this->db->where('PK_iMaloaitin',$ma);
        $this->db->update('tbl_loaitin',$value);
        return $this->db->affected_rows();
    }
    public function Layloaitin_xoa($ma)
    {
        $this->db->where('FK_iMaloaitin',$ma);
        $this->db->from('tbl_tinchitiet');
        return $this->db->get()->num_rows();
    }
}