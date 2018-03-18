<?php

class Mquangcao extends CI_Model
{
    public function getAds()
    {
        return $this->db->get('tbl_quangcao')->result_array();
    }
    public function getMa($tentruong,$bang,$dd)
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
    public function insertAds($Ads)
    {
        $this->db->insert('tbl_quangcao',$Ads);
        return $this->db->affected_rows();
    }
    public function deleteAds($ma)
    {
        $this->db->where('PK_Maquangcao',$ma);
        $this->db->delete('tbl_quangcao');
        return $this->db->affected_rows();
    }
    public function getAdsfix($ma)
    {
        $this->db->where('PK_Maquangcao',$ma);
        return $this->db->get('tbl_quangcao')->row_array();
    }
    public function updateAds($ma,$info)
    {
        $this->db->where('PK_Maquangcao',$ma);
        $this->db->update('tbl_quangcao',$info);
        return $this->db->affected_rows();
    }
}