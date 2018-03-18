<?php

class Cquangcao extends CI_Controller{

    public $upload;
    public $input;
    public $Mquangcao;
    public function __construct()
    {
        parent::__construct();
        $this->input = new CI_Input();
        $this->load->model('Danhmuc/Mquangcao', 'Mquangcao');
        $this->upload = new CI_Upload();
    }

    public function index(){
        $data['ads']        = $this->Mquangcao->getAds();
        if ($this->input->post('themads'))
            $this->insertAds();
        if ($this->input->get('delete'))
            $this->deleteAds();
        if ($this->input->post('masuaqc'))
            $this->getAds();
        if ($this->input->post('suaqc'))
            $this->updateAds();
        $data['message']    = getMessages();
        $temp['data']       = $data;
        $temp['template']   = 'Danhmuc/Vquangcao';
        $this->load->view('hethong/Vlayout_admin',$temp);
    }
    public function insertAds(){
        $duoianh    = setTenanh($_FILES['ads']['name']);
        $getma      = $this->Mquangcao->getMa('PK_Maquangcao', 'tbl_quangcao', 'ads');
        $tenanh     = $getma.$duoianh;
        $this->upload_anh($tenanh);
        $Ads = array(
            'sAnh' => $tenanh,
            'sNoidung' => $this->input->post('link')
        );
        $row = $this->Mquangcao->insertAds($Ads);
        if ($row > 0)
            setMessages('success','','Thêm quảng cáo thành công');
        else
            setMessages('error','','Thêm quảng cáo không thành công');
        redirect(base_url().'ads');
    }
    public function upload_anh($tenanh){
        $config['upload_path']          = './files/';
        $config['allowed_types']        = '*';
        $config['file_name']            = $tenanh;
        $config['overwrite']            = true;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('ads'))
            $data['error'] = $this->upload->display_errors();
        else
            $data['upload_data'] = $this->upload->data();
    }
    public function deleteAds(){
        $ma = $this->input->get('delete');
        $row = $this->Mquangcao->deleteAds($ma);
        if ($row > 0)
            setMessages('success','','Xoá quảng cáo thành công');
        else
            setMessages('error','','Xoá quảng cáo không thành công');
        redirect(base_url().'ads');
    }
    public function getAds()
    {
        $maqc               = $this->input->post('masuaqc');
        $kqlay['kq']        = $this->Mquangcao->getAdsfix($maqc);
        $kqlay['kq']['type']= 'sua';
        echo json_encode($kqlay['kq']);
        exit();
    }
    public function updateAds()
    {
        $ma         = $this->input->post('suaqc');
        // pr($_FILES);
        if (!empty($_FILES['ads']['name']))
        {
            $duoianh    = setTenanh($_FILES['ads']['name']);
            $tenanh     = 'ads'.$ma.$duoianh;
            $this->upload_anh($tenanh);
            $info['sAnh'] = $tenanh;
        }
        $info['sNoidung'] = $this->input->post('link');
        $row = $this->Mquangcao->updateAds($ma,$info);
        if ($row > 0)
            setMessages('success','','Sửa thành công');
        else
            setMessages('error','','Sửa thất bại');
        redirect(base_url().'ads');
    }
}