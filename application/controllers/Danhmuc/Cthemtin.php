<?php

class Cthemtin extends MY_Controller
{
    public $input;
    public $Mthemtin;
    public $Mhethong;
    public $upload;
    function __construct()
    {
        parent::__construct();
        $this->input = new CI_Input();
        $this->upload = new CI_Upload();
        $this->load->model('Danhmuc/Mthemtin','Mthemtin');
        $this->Mthemtin = new Mthemtin();

        $this->load->model('Mhethong','Mhethong');
        $this->Mhethong = new Mhethong();
    }
    public function index()
    {
        if($this->input->post('luutin')){
            $this->do_upload();
        }
        $matin  = $this->input->get('matin');
        $type   = $this->input->get('type');
        if(!empty($matin) && $type=='sua'){
            $data['tinsua'] = $this->Laytin_sua();
        }
        if($this->input->post('suatin')){
            $this->Suatin();
        }
        $data['message'] = getMessages();
        $data['loaitin'] = $this->Mthemtin->getLoaitin();
        $data['sukien']  = $this->Mthemtin->getSukien();
        $data['stt']     = 1;

        $temp['template']   = 'Danhmuc/Vthemtin';
        $data['url']        = base_url();
        $temp['data']       = $data;
        $this->load->view('hethong/Vlayout_admin',$temp);
    }

    public function do_upload()
    {
        $duoianh        = setTenanh($_FILES['userfile']['name']);
        // upload ảnh
        $getma          = $this->Mhethong->getMa('PK_iMatin','tbl_tinchitiet','BV');

        $tenanh         = $getma.$duoianh;

        $config['upload_path']          = './files/';
        $config['allowed_types']        = '*';
        $config['file_name']        = $tenanh;
        $config['overwrite']        = true;
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $data['error'] =  $this->upload->display_errors();
        }
        else
        {
            $data['upload_data'] = $this->upload->data();
        }

        // insert db
        if(!$_FILES['userfile']['name']){
            $tenanh = '';
        }
        $tieude         = $this->input->post('tieude');
        $loaitin        = $this->input->post('loaitin');
        $sukien         = $this->input->post('sukien');
        $tomtat         = $this->input->post('tomtat');
        $namefile       = $tenanh;
        $noidung        = $this->input->post('noidung');
        $trangthai      = $this->input->post('trangthai');
        $lienket        = $this->input->post('lienket');
        $ngaydang       = date('Y-m-d',time());
        $uutien         = $this->Mhethong->getMax_ct($loaitin);
        $uutien['maxct']= $uutien['maxct']+1;
        $mota           = $this->input->post('mota');
        $tags           = $this->input->post('tags');
        $session        = $this->session->userdata('login');

        $tag            = $this->input->post('tags');
        // $tags = explode(',', $tag);
        // foreach ($tags as $key => $value) {
        //     $tags[$key] = trim($value);
        // }
        // pr($tags);
        $value = array(
            'PK_iMatin'         => $getma,
            'FK_iMaloaitin'     => $loaitin,
            'PK_iCanbodang'     => $session['macb'],
            'sTieude'           => $tieude,
            'sTomtatnoidung'    => $tomtat,
            'sNoidung'          => $noidung,
            'dNgaydang'         => $ngaydang,
            'sAnhdaidien'       => $namefile,
            'FK_iSukien'        => $sukien ? $sukien : null,
            'iTrangthai'        => $trangthai,
            'iLienket'          => $lienket,
            'sMota'          => $mota,
            'sTags'          => $tags,
            'iDouutien_ct'      => $uutien['maxct'],
            'sTieude_khongdau'      => clean($tieude)
                    
        );

        if ($value['FK_iMaloaitin']==91)
        {
            $vid                = $value['sNoidung'];
            $value['sNoidung']  = trim($vid,'<p>!') ;
            $vid                = $value['sNoidung'];
            $vid1               = str_replace( '</p>', '', $vid );
            $value['sNoidung']  = trim($vid1,'') ;
        };

//        $data = array(
//            'slide' => NULL
//        );
//
//        $kqslide = $this->Mthemtin->updateslide($data,$slide);

        $kqthem = $this->Mthemtin->setTintuc($value);

        if($kqthem>0){
            setMessages('success','','Thêm thành công');
            $this->Mthemtin->ThemTags($tags);
            redirect(base_url().'danhsachtin');
        } else{
            setMessages('error','','Thêm thất bại');
            redirect(base_url().'danhsachtin');
        }
    }

    public function Laytin_sua()
    {
        $matin = $this->input->get('matin');
        return $this->Mthemtin->getTin_sua($matin);
    }

    public function Suatin()
    {
        $tinsua1 = $this->Mthemtin->getTin_sua($this->input->post('suatin'));
        if(empty($tinsua1['sAnhdaidien']) && empty($_FILES['userfile']['name'])){
            $tenanh = '';
        }
        else{
            if(!empty($_FILES['userfile']['name'])){
                $duoianh    = setTenanh($_FILES['userfile']['name']);
                $matin      = $this->input->post('suatin');
                $tenanh     = $matin.$duoianh;
            } else{
                $tenanh     = $tinsua1['sAnhdaidien'];
            }
        }
        // upload ảnh

        $this->load->library('upload');
        $config['upload_path']          = './files/';
        $config['allowed_types']        = '*';
        $config['file_name']            = $tenanh;
        $config['overwrite']            = true;

        $this->upload->initialize($config);


        if ( ! $this->upload->do_upload('userfile'))
        {
            $data['error'] =  $this->upload->display_errors();
        }
        else
        {
            $data['upload_data'] = $this->upload->data();
        }
        $matin      = $this->input->post('suatin');
        $tieude     = $this->input->post('tieude');
        $loaitin    = $this->input->post('loaitin');
        $sukien     = $this->input->post('sukien');
        $tomtat     = $this->input->post('tomtat');
        $namefile   = $tenanh;
        $noidung    = $this->input->post('noidung');
        $trangthai  = $this->input->post('trangthai');
        $lienket    = $this->input->post('lienket');
        $mota    = $this->input->post('mota');
        $tags    = $this->input->post('tags');
        $ngaydang   = date('Y-m-d',time());
//        $slide      = $this->input->post('slide');
        $session    = $this->session->userdata('login');
        $tags            = $this->input->post('tags');
        // $tags = explode(',', $tag);
        // foreach ($tags as $key => $value) {
        //     $tags[$key] = trim($value);
        // }
// pr($tags);
        if ($loaitin==91)
        {
            $vid                = $noidung;
            $noidung  = trim($vid,'<p>!') ;
            $vid                = $noidung;
            $vid1               = str_replace( '</p>', '', $vid );
            $noidung  = trim($vid1,'') ;
            // pr($noidung);
        };

        $value = array(
            'PK_iMatin'         => $matin,
            'FK_iMaloaitin'     => $loaitin,
            'PK_iCanbodang'     => $session['macb'],
            'sTieude'           => $tieude,
            'sTomtatnoidung'    => $tomtat,
            'sNoidung'          => $noidung,
            'dNgaydang'         => $ngaydang,
            'sAnhdaidien'       => $namefile,
            'FK_iSukien'        => $sukien ? $sukien : null,
            'iTrangthai'        => $trangthai,
            'iLienket'          => $lienket,
            'sMota'          => $mota,
            'sTags'          => $tags,
            'sTieude_khongdau'      => clean($tieude)
//            'slide'             => $slide ? $slide : null
        );



        $kqsua = $this->Mthemtin->upTin($value,$matin);
        if($kqsua>0){
            setMessages('success','','Sửa thành công');
            $this->Mthemtin->ThemTags($tags);
            redirect(base_url().'danhsachtin');
        } else{
            setMessages('error','','Sửa thất bại');
            redirect(base_url().'danhsachtin');
        }
    }
}