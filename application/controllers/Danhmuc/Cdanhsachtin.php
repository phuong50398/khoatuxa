<?php

class Cdanhsachtin extends MY_Controller
{
    public $input;
    public $Mdanhsachtin;
    function __construct()
    {
        parent::__construct();
        $this->input = new CI_Input();
        $this->load->model('Danhmuc/Mdanhsachtin','Mdanhsachtin');
        $this->Mdanhsachtin = new Mdanhsachtin();
    }

    public function index()
    {
        $ma     = $this->input->get('matin');
        $type   = $this->input->get('type');
        if(!empty($ma) && $type=='xoa'){
            $this->Xoatin();
        }
        $data['message'] = getMessages();
        $data['tintuc']  = $this->Mdanhsachtin->getTintuc();
        $data['stt'] = 1;

        $temp['template'] = 'Danhmuc/Vdanhsachtin';
        $data['url'] = base_url();
        $temp['data'] = $data;
        $this->load->view('hethong/Vlayout_admin',$temp);
    }

    public function Xoatin()
    {
        $matin=$this->input->get('matin');
        // $xoatagtin = $this->Mdanhsachtin->XoaTagsTin($matin);
        $kqxoa=$this->Mdanhsachtin->Deltin($matin);
        if($kqxoa>0){
            setMessages('success','','Xóa thành công');
            redirect(base_url().'danhsachtin');
        } else{
            setMessages('error','','Xóa thất bại');
            redirect(base_url().'danhsachtin');
        }
    }
}