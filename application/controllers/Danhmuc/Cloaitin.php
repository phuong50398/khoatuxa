<?php

class Cloaitin extends My_Controller
{
    public $input;
    public $Mloaitin;
    public $Mhethong;
    function __construct()
    {
        parent::__construct();
        $this->input = new CI_Input();
        $this->load->model('Danhmuc/Mloaitin','Mloaitin');
        $this->load->model('Mhethong','Mhethong');
        $this->Mloaitin = new Mloaitin();
        $this->Mhethong = new Mhethong();
    }
    public function index()
    {
        if($this->input->post('themloaitin')){
            $this->Themloaitin();
        }
        $ma=$this->input->get('maloaitin');
        
        $type=$this->input->get('type');
        if(!empty($ma) && $type=='xoa'){
            // echo '123';exit;
            $this->Xoaloaitin();
        }
        if($this->input->post('ma_sua')){
            $this->getloaitin_sua();
        }
        if($this->input->post('sualoaitin')){
            $this->SuaLoaitin();
        }
        $data['message']    = getMessages();
        $data['loaitin']    = $this->Mloaitin->getLoaitin();
        foreach ($data['loaitin'] as $key => $value) {
            $data['loaitin'][$key]['soluong']=$this->Mloaitin->slTin($value['PK_iMaloaitin']);
        }
        $data['theloai']    = $this->Mloaitin->getTheloai();
        $data['stt']        = 1;

        $temp['template']   = 'Danhmuc/Vloaitin';
        $data['url']        = base_url();
        $temp['data']       = $data;
        $this->load->view('hethong/Vlayout_admin',$temp);
    }
    public function Themloaitin()
    {

        $trangthai=$this->input->post('trangthai');
        $uutien=$this->Mhethong->getMax_lt($trangthai);
        $uutien['maxlt']=$uutien['maxlt']+1;
        $giatri=array(
            'sTenloaitin'=>$this->input->post('tenloaitin'),
            'sTrangthai'=>$this->input->post('trangthai'),
            'FK_iMatheloai'=>$this->input->post('theloai'),
            'iDouutien_lt'=>$uutien['maxlt']
        );
        $kqthem=$this->Mloaitin->setLoaitin($giatri);
        if($kqthem>0){
            setMessages('success','','Thêm loại tin thành công');
            redirect(base_url().'loaitin');
        } else{
            setMessages('error','','Thêm loại tin thất bại');
            redirect(base_url().'loaitin');
        }
    }

    public function Xoaloaitin()
    {
        $maloaitin          = $this->input->get('maloaitin');
        $kt                 = $this->Mloaitin->Layloaitin_xoa($maloaitin);

        if($kt<=0){
            $kqxoa          = $this->Mloaitin->Delloaitin($maloaitin);
            if($kqxoa>0){
                setMessages('success','','Xóa thành công');
                redirect(base_url().'loaitin');
            } else{
                setMessages('error','','Xóa thất bại');
                redirect(base_url().'loaitin');
            }
        }else{
            setMessages('error','','Xóa thất bại');
            redirect(base_url().'loaitin');
        }
    }
    public function getloaitin_sua()
    {
        $malt       = $this->input->post('ma_sua');
        $giatri     = $this->Mloaitin->Layloaitin_sua($malt);
        echo json_encode($giatri);
        exit();
    }
    public function SuaLoaitin()
    {
        $ma         = $this->input->post('sualoaitin');
        $giatri = array(
            'sTenloaitin'       => $this->input->post('tenloaitin'),
            'sTrangthai'        => $this->input->post('trangthai'),
            'FK_iMatheloai'     => $this->input->post('theloai')
        );
        $kqsua = $this->Mloaitin->upLoaitin($giatri,$ma);
        if($kqsua>0){
            setMessages('success','','Sửa thành công');
            redirect(base_url().'loaitin');
        } else{
            setMessages('error','','Sửa thất bại');
            redirect(base_url().'loaitin');
        }
    }
}