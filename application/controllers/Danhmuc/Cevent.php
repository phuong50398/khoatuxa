<?php

class Cevent extends MY_Controller
{
    public $input;
    public $Mevent;
    public function __construct(){
        parent::__construct();
        $this->input = new CI_Input();
        $this->load->model('Mevent','Mevent');
        $this->Mevent = new Mevent();
    }
    public function index(){
        if ($this->input->post('themsukien')){
            $sk['sTensukien'] = $this->input->post('tensukien');
            $row = $this->Mevent->insertSukien($sk);
            if ($row > 0)
                setMessages('success','','Thêm sự kiện thành công');
            else
                setMessages('error','','Thêm sự kiện không thành công');
        }
        if($this->input->post('masua')){
            $this->getSk_sua();
        }
        if($this->input->post('suasukien')){
            $this->Fixsukien();
        }
        if ($this->input->get('masukien')){
            $ma = $this->input->get('masukien');
            $row = $this->Mevent->xoaSk($ma);
            if ($row > 0)
                setMessages('success','','Xoá sự kiện thành công');
            else
                setMessages('error','','Xoá sự kiện không thành công');
        }
        $data['message'] = getMessages();
        $data['sukien']  = $this->Mevent->getSukien();
        foreach ($data['sukien'] as $key => $value) {
            $data['sukien'][$key]['soluong']=$this->Mevent->demSk($value['PK_iMasukien']);
        }
        $data['stt'] = 1;
        $temp['template'] = 'hethong/Vevent';
        $data['url'] = base_url();
        $temp['data'] = $data;
        $this->load->view('hethong/Vlayout_admin',$temp);
    }
    public function getSk_sua()
    {
        $mask       = $this->input->post('masua');
        $giatri     = $this->Mevent->getSksua($mask);
        echo json_encode($giatri);
        exit();
    }
    public function Fixsukien()
    {
        $ma         = $this->input->post('suasukien');
        $giatri = array(
            'sTensukien'       => $this->input->post('tensukien'),
        );
        $kqsua = $this->Mevent->updateSk($giatri,$ma);
        if($kqsua>0){
            setMessages('success','','Sửa thành công');
            redirect('sukien');
        } else{
            setMessages('error','','Sửa thất bại');
            redirect('sukien');
        }
    }
}