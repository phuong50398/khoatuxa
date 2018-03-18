<?php

class Cbanner extends CI_Controller{

    public $upload;
    public $input;
    public $Mbanner_bg;
    public function __construct()
    {
        parent::__construct();
        $this->input = new CI_Input();
        $this->load->model('Danhmuc/Mbanner_bg', 'Mbanner_bg');
        $this->Mbanner_bg = new Mbanner_bg();
        $this->upload = new CI_Upload();
    }

    public function index(){
        $type = 'banner';
        $data[$type]        = $this->Mbanner_bg->getAnh($type);
        $data[$type]        = $data[$type]['sTenanh'];
        $data['message']    = getMessages();
        $temp['data']       = $data;
        $temp['template']   = 'Danhmuc/V'.$type;
        $this->load->view('hethong/Vlayout_admin',$temp);
        if ($this->input->post('savebanner')) {
            $duoianh    = setTenanh($_FILES['anhbanner']['name']);
            $getma      = $this->Mbanner_bg->getMa2('iMaanh', 'tbl_anh', 'BN');
            $tenanh     = $getma.$duoianh;
            $this->upload_anh($tenanh, 'banner');
        }
    }

    public function upload_anh($tenanh,$type){
        $config['upload_path']          = './files/';
        $config['allowed_types']        = '*';
        $config['file_name']            = $tenanh;
        $config['overwrite']            = true;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('anhbanner'))
            $data['error'] = $this->upload->display_errors();
        else
            $data['upload_data'] = $this->upload->data();
        $this->Mbanner_bg->doiBanner($tenanh);
        setMessages('success','','Thay banner thành công');
        redirect($type, 'refresh');
    }
}