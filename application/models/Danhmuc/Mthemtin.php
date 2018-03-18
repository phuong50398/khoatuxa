<?php

class Mthemtin extends CI_Model
{
    public function getLoaitin()
    {
        return $this->db->get('tbl_loaitin')->result_array();
    }
    public function getSukien()
    {
        return $this->db->get('tbl_sukien')->result_array();
    }
    public function setTintuc($value)
    {
        $this->db->insert('tbl_tinchitiet',$value);
        return $this->db->affected_rows();
    }
    public function getTin_sua($matin)
    {
        $this->db->where('PK_iMatin',$matin);
        return $this->db->get('tbl_tinchitiet')->row_array();
        // $this->db->where('PK_iMatin',$matin);
        // $this->db->join('tbl_tags as t','tt.PK_iMatags=t.PK_iMatags');
        // $tag = $this->db->get('tbl_tags_tin as tt')->result_array();
        // $mang = array();
        // foreach ($tag as $key => $value) {
        //     array_push($mang,$value['sTentags']);
        // }
        // $mang=implode(',',$mang);
        // $tinsua['tag']=$mang;
        // return $tinsua;
        // pr($tinsua);
    }
    public function upTin($value,$masua)
    {
        $this->db->where('PK_iMatin',$masua);
        $this->db->update('tbl_tinchitiet',$value);
        return $this->db->affected_rows();
    }
    public function updateslide($data,$slide){
        $this->db->where('slide', $slide);
        $this->db->update('tbl_tinchitiet',$data);
        return $this->db->affected_rows();
    }
    public function ThemTags($value)
    {
        $tags = explode(',', $value);
        foreach ($tags as $key => $value) {
            $tags[$key] = trim($value);
        }

        // pr($tags);

        foreach ($tags as $key => $val) {
           
            $this->db->where('sTag_khongdau',clean($val));
            $kt = $this->db->get('tbl_tags')->num_rows();
            if($kt == 0){
                $tam = array('sTentags' => $val, 'sTag_khongdau' => clean($val));
                $this->db->insert('tbl_tags',$tam);
            }

            
        }
    }
    // public function SuaTags($value,$matin)
    // {
    //     foreach ($value as $key => $value) {
    //         $this->db->where('sTentags',$value);
    //         $kt = $this->db->get('tbl_tags')->num_rows();
    //         if($kt == 0){
    //             $tam = array('sTentags' => $value, 'sTag_khongdau' => clean($value));
    //             $this->db->insert('tbl_tags',$tam);
    //         }

    //         $this->db->where('sTentags',$value);
    //         $id = $this->db->get('tbl_tags')->row_array();
    //         $tam1 = array('PK_iMatags' => $id['PK_iMatags'] , 'PK_iMatin' => $matin);
    //         $this->db->insert('tbl_tags_tin',$tam1);
    //     }
    // }

}