<?php

class Mbanner_bg extends CI_Model{

    public function getMa2($tentruong,$bang,$dd)
    {
        $this->db->select_max($tentruong,'maxid');
        $q = $this->db->get($bang)->row_array();
        if($q>0){
            $ma = $q['maxid']+1;
            return $dd.$ma;
        }
        else
            return $dd.'1';
    }
    public function doiBanner($tenanh){
        $this->db->set('sTenanh',$tenanh);
        $this->db->where('sTrangthai','banner');
        $this->db->update('tbl_anh');
    }
    public function doiBg($tenanh){
        $this->db->set('sTenanh',$tenanh);
        $this->db->where('sTrangthai','bg');
        $this->db->update('tbl_anh');
    }
    public function getAnh($type){
        $this->db->select('sTenanh');
        $this->db->where('sTrangthai',$type);
        $this->db->from('tbl_anh');
        return $this->db->get()->row_array();
    }
}