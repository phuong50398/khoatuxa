<?php 

 class Ctracuu extends CI_Controller
 {
 	public $input;
    public $Mtrangchu;
    public $Mhethong;
 	public function __construct()
 	{
 		parent::__construct();
        $this->input            = new CI_Input();
        $this->load->model('Layout/Mtrangchu','Mtrangchu');
        $this->Mtrangchu        = new Mtrangchu();
        $this->load->model('Mhethong','Mhethong');
        $this->Mhethong         = new Mhethong();
 	}
 	public function index()
 	{
        $this->load->library('pagination');

        $submit = $this->input->post('ndvideo');
        if(!empty($submit)){
            echo $this->input->post('ndvideo');
            exit();
        }

        if ($this->input->post('search'))
        {
            $tensv = $this->input->post('tensv');
            $tensv = str_replace(" ","%20",$tensv);
            $link = 'http://qldttx.hou.edu.vn/qldttx/retriveNameStudent?byName=' . $tensv;
            $uri = curl($link);
            $tracuu['uri'] = $uri; 
        }
        if ($this->input->get('ma') && !isset($tracuu['uri']))
        {
            $masv = $this->input->get('ma');
            $link2 = 'http://qldttx.hou.edu.vn/qldttx/retrivePointStudent?id=' . $masv;
            $info = curl($link2);
            $tracuu['info'] = $info;
        }
        if (isset($tracuu)){
            $data['left'] = $tracuu;
        }
        $data['tin']['bg']                  = $this->Mtrangchu->getBg();
        $data['tin']['banner']              = $this->Mtrangchu->getBanner();

        $data['tin']['theloai']             = $this->Mtrangchu->getTheloai();
        $data['tin']['loaitin']             = $this->Mtrangchu->getLoaitin();
        $mang_loaitin = $this->Mtrangchu->getTinleft();
        foreach ($mang_loaitin as $key  => $value) {
            $mang_loaitin[$key]['baiviet']  =  $this->Mhethong->get_tin_by_loaitin($value['PK_iMaloaitin']);
        }
        $data['left']['ctietleft']          = $mang_loaitin;
        $data['left']['maxleft']            = $this->Mhethong->getMax_lt('left');
        $data['left']['slide']              = $this->Mtrangchu->getTinslide();
        $data['tin']['delay']               = 0;
        $data['right']['loaitinright']      = $this->Mtrangchu->getTinright();
        $data['right']['quangcao']          =$this->Mtrangchu->getQuangcao();
        $data['right']['tinmoi']            = $this->Mtrangchu->getTinmoi();
        foreach ($data['right']['loaitinright'] as $key => $value) {
            $data['right']['loaitinright'][$key]['ctiet'] = $this->Mtrangchu->getCtright($value['PK_iMaloaitin']);
        }
        $data['right']['tam']               = 1;
        $data['template']                   = 'Layout/Vtracuu';
        $this->load->view('Layout/Vlayout_home',$data);
 	}
 }
 ?>