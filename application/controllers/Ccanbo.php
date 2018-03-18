<?php

class Ccanbo extends CI_Controller
{
    public $input;
    public $Mcanbo;
    public function __construct()
    {
        parent::__construct();
        $this->input = new CI_Input();
        $this->load->model('Mcanbo', 'Mcanbo');
        $this->Mcanbo = new Mcanbo();
    }

    public function index(){
        $temp['template'] = 'hethong/Vthongtincanbo';
        $data['thongtin'] = $this->Mcanbo->getCanbo();
        $data['stt']      = 1;
        if ($this->input->post('ma_sua'))
            $this->laytt();
        if ($this->input->post('suattcb'))
            $this->suacanbo();
        if ($this->input->post('delete'))
            $this->delete();
        $data['message'] = getMessages();
        $temp['data'] = $data;
        $this->load->view('hethong/Vlayout_admin', $temp);
    }

    public function themcb(){
        if ($this->input->post('themcanbo')) {

            $data2 = array(
                'sTencanbo' => $this->input->post('tencb'),
                'dNgaysinh' => $this->input->post('ngaysinh'),
                'sGioitinh' => $this->input->post('gt'),
                'sSdt' => $this->input->post('sdt'),
                'sEmail' => $this->input->post('email')
            );
            $this->Mcanbo->insertcb($data2);
            $data1                      = $this->Mcanbo->getMacanbo();
            $data1['PK_sTendangnhap']   = $this->input->post('username');
            $data1['sMatkhau']          = sha1($this->input->post('password'));
            $data1['FK_iMaquyen']       = $this->input->post('quyen');
            $row = $this->Mcanbo->inserttk($data1);
            if ($row>0) {
                setMessages('success', '', 'Thêm cán bộ thành công');
                redirect('hethong/canbo');
            }
            else {
                setMessages('error', '', 'Thêm cán bộ thất bại');
            }
            $data['message'] = getMessages();
            $temp['data']    = $data;
        }
        $temp['template'] = 'hethong/Vthemcanbo';
        $this->load->view('hethong/Vlayout_admin', $temp);
    }

    public function delete(){
        $macb = $this->input->post('delete');
        $row = $this->Mcanbo->deletecanbo($macb);
        if ($row > 0){
            setMessages('success','','Xoá cán bộ thành công');
            redirect('hethong/canbo');
        }
        else {
            setMessages('error', '', 'Xoá cán bộ không thành công');
        }
    }

    public function laytt(){
        $macb = $this->input->post('ma_sua');
        $kqlay['kq'] = $this->Mcanbo->getThongtincb($macb);
        // echo json_encode($kqlay['kq']);
        exit();
    }

    public function suacanbo(){
        $thongtincb = array(
            'PK_iMacanbo'       => $this->input->post('suattcb'),
            'sTencanbo'         => $this->input->post('tencb'),
            'dNgaysinh'         => $this->input->post('ngaysinh'),
            'sGioitinh'         => $this->input->post('gt'),
            'sSdt'              => $this->input->post('sdt'),
            'sEmail'            => $this->input->post('email')
        );
        $row = $this->Mcanbo->fixThongtincb($thongtincb);
        if ($row > 0){
            setMessages('success','','Sửa thông tin cán bộ thành công');
        }
        else {
            setMessages('error', '', 'Sửa thông tin cán bộ không thành công');
        }
        $kqlay['kq'] = $this->Mcanbo->getCanbo();
        // echo json_encode($kqlay['kq']);
        exit();
    }
}