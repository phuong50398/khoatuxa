<?php


class Clogin extends CI_Controller{

    public $input;
    public $Mlogin;
    public function __construct()
    {
        parent::__construct();
        $this->input = new CI_Input();

        $this->load->model('Mlogin','Mlogin');
        $this->Mlogin = new Mlogin();

        $this->session->unset_userdata('login');
    }

    public function index(){

        if ($this->input->post('login')){
            $this->checklogin();
        }

        $temp['template'] = 'hethong/Vlogin';
        $this->load->view('hethong/Vlayout_login',$temp);

        if ($this->input->post('huy')) {
            redirect('login');
        }

    }

    public function checklogin(){

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $info = $this->Mlogin->getUser($username);

        if (($username==$info['PK_sTendangnhap']) && (sha1($password)==$info['sMatkhau'])){
            $session['user']    = $info['PK_sTendangnhap'];
            $session['maquyen'] = $info['FK_iMaquyen'];
            $session['macb']    = $info['FK_iMacanbo'];
            $this->session->set_userdata('login',$session);
            redirect('hethong');
        }
        else
            echo "<script language=\"javascript\">alert('Sai tên đăng nhâp hoặc mật khẩu')</script>";
    }
}