<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cslide extends MY_Controller {

    public $Mslide;
    public $input;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Danhmuc/Mslide','Mslide');
        $this->Mslide = new Mslide();
        $this->input  = new CI_Input();
    }

    public function index()
    {
        $data['btn_name']       = 'add';
        $data['btn_value']      = 'add';
        if($this->input->post('add')){
            $this->addslide();
        }
        if($this->input->get('xoa')){
            $this->delside();
        }
        if($this->input->get('sua')){
            $data['btn_name']   = 'update';
            $data['btn_value']  = 'update';
            $ma                 = $this->input->get('sua');
            $data['tinslideId'] = $this->Mslide->getTinslideId($ma);
        }

        if($this->input->post('update')){
            $this->updateslide();
        }
        $data['slide']          = array('1','2','3','4');
        $data['tintuc']         = $this->Mslide->getTintuc();
        $data['tinslide']       = $this->Mslide->getTinslide();
//        pr($data);exit();
        $data['message']        = getMessages();
        $temp['template']       = 'Danhmuc/Vslide';
        $data['url']            = base_url();
        $temp['data']           = $data;
        $this->load->view('hethong/Vlayout_admin',$temp);
    }

    public function delside(){
        $PK_iMatin      = $this->input->get('xoa');
        $dataslide      = array(
            'slide' => null
        );
        $kqslide        = $this->Mslide->updateslide($dataslide,$PK_iMatin);

        if($kqslide>0){
            setMessages('success','','Xóa thành công');
            redirect(base_url().'slide');
        } else{
            setMessages('error','','Xóa thất bại');
            redirect(base_url().'slide');
        }
    }


    public function addslide(){

        $slide = $this->input->post('slide');
        $PK_iMatin = $this->input->post('tintuc');
        $dataslide = array(
            'iSlide' => $slide
        );

        $datanull = array(
            'iSlide' => NULL
        );

        $kqnull     = $this->Mslide->updatenull($datanull,$slide);
        $kqslide    = $this->Mslide->updateslide($dataslide,$PK_iMatin);

        if($kqslide>0){
            setMessages('success','','Cập nhật thành công');
            redirect(base_url().'slide');
        } else{
            setMessages('error','','Cập nhật thất bại');
            redirect(base_url().'slide');
        }
    }

    public function updateslide(){

        $slide          = $this->input->post('slide');
        $PK_iMatin      = $this->input->get('sua');
        $dataslide      = array(
            'iSlide' => $slide
        );
        $ma             = $this->input->get('sua');
        $tinslideId     = $this->Mslide->getTinslideId($ma);
        $datapre = array(
            'iSlide' => $tinslideId[0]['slide']
        );
        $kqpre          = $this->Mslide->updatenull($datapre,$slide);
        $kqslide        = $this->Mslide->updateslide($dataslide,$PK_iMatin);

        if($kqslide>0){
            setMessages('success','','Cập nhật thành công');
            redirect(base_url().'slide');
        } else{
            setMessages('error','','Cập nhật thất bại');
            redirect(base_url().'slide');
        }
    }
}