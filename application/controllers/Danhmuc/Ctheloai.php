<?php

class Ctheloai extends MY_Controller
{
    public $input;
    public $Mtheloai;
    function __construct()
    {
        parent::__construct();
        $this->input = new CI_Input();
        $this->load->model('Danhmuc/Mtheloai', 'Mtheloai');
        $this->Mtheloai = new Mtheloai();
    }

    public function index()
    {
        if($this->input->post('themtheloai')){
            $this->Themtl();
        }

        if($this->input->get('type')=='xoa' && $this->input->get('matheloai')){
            $this->XoaTl();
        }
        if($this->input->post('ma_sua')){
            $this->LayTl();
        }

        if($this->input->post('suatheloai')){
            $this->SuaTl();
        }
        $data['stt']            = 1;
        $data['theloai']        = $this->Mtheloai->getTheloai();
        foreach ($data['theloai'] as $key => $value) {
            $data['theloai'][$key]['soluong']=$this->Mtheloai->sluong($value['PK_iMatheloai']);
        }
        $data['message']        = getMessages();
        $temp['template']       = 'Danhmuc/Vtheloai';
        $data['url']            = base_url();
        $temp['data']           = $data;
        $this->load->view('hethong/Vlayout_admin',$temp);
    }

    // hàm thêm thể loại
    public function Themtl()
    {
        $tentl=$this->input->post('tentheloai');
        $trangthai=$this->input->post('trangthai');
        $mau=$this->input->post('mamau');
        $datathem=array(
            'sTentheloai'       => $tentl,
            'iTrangthai'        => $trangthai,
            'sMau'              => $mau
        );
        $kqthem=$this->Mtheloai->setTheloai($datathem);
        if($kqthem>0){
            setMessages('success','','Thêm thể loại thành công');
            redirect(base_url().'theloai');
        } else{
            setMessages('error','','Thêm thể loại thất bại');
        }


    }
    public function XoaTl()
    {
        $matl   = $this->input->get('matheloai');
        $kt     = $this->Mtheloai->getTinxoa($matl);
        if($kt<=0){
            $kqxoa = $this->Mtheloai->setXoatl($matl);
            if($kqxoa>0){
                setMessages('success','','Xóa thành công');
                redirect(base_url().'theloai');
            } else{
                setMessages('error','','Xóa thất bại');
                redirect(base_url().'theloai');
            }
        } else{
            setMessages('error','','Xóa thất bại');
            redirect(base_url().'theloai');
        }
    }

    public function LayTl()
    {
        $ma_sua=$this->input->post('ma_sua');
        $kqlay['kq']=$this->Mtheloai->getTl($ma_sua);
        $kqlay['kq']['type']='sua';
        echo json_encode($kqlay['kq']);
        exit();
    }

    public function SuaTl()
    {
        $ma_sua         = $this->input->post('suatheloai');
        $tentl          = $this->input->post('tentheloai');
        $trangthai      = $this->input->post('trangthai');
        $mau            = $this->input->post('mamau');
        $datasua = array(
            'sTentheloai'   => $tentl,
            'iTrangthai'    => $trangthai,
            'sMau'          => $mau
        );
        // pr($datasua);
        $kqsua          = $this->Mtheloai->upTl($ma_sua,$datasua);
        if($kqsua>0){
            setMessages('success','','Sửa thành công');
            redirect(base_url().'theloai');
        }else setMessages('error','','Sửa thất bại');
    }
}