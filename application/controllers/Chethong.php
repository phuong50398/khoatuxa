<?php


class Chethong extends MY_Controller{

    public $input;
    public $Mhethong;
    public function __construct()
    {
        parent::__construct();
        $this->input = new CI_Input();
        $this->load->model('Mhethong','Mhethong');
        $this->Mhethong = new Mhethong();
    }

    public function index(){
        $temp['template']   = 'Danhmuc/Vwelcome';
        $data['macb']       = $this->_session['macb'];
        if ($this->input->get('doimk'))
        {
            $macb = $this->input->get('doimk');
            if ($macb != $data['macb'])
                redirect('hethong');
            else
                $this->doimk($macb,$data);
        }
        else
            $this->load->view('hethong/Vlayout_admin',$temp);
    }

    public function doimk($macb,$data){
        if ($this->input->post('doimatkhau')) {
            $info = $this->Mhethong->getCanbo($macb);
            $pass = $this->input->post('password');
            $newpass = sha1($this->input->post('newpass'));
            if (sha1($pass)==$info['sMatkhau']) {
                $row = $this->Mhethong->doimk($macb, $newpass);
                if ($row > 0) {
                    setMessages('success','','Đổi mật khẩu thành công');
                }
            }
            else
                setMessages('error','','Mật khẩu nhập vào sai');
            $data['message'] = getMessages();
        }
        if ($this->input->post('huy')) {
            redirect('hethong');
        }
        $temp['template'] = 'hethong/Vdoimatkhau';
        $temp['data'] = $data;
        $this->load->view('hethong/Vlayout_admin',$temp);
    }
}