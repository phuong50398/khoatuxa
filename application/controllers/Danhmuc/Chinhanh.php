<?php

class Chinhanh extends My_Controller
{
    public $upload;
    public $input;
    public $Mhinhanh;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Danhmuc/Mhinhanh','Mhinhanh');
        $this->Mhinhanh = new Mhinhanh();
        $this->upload = new CI_Upload();
        $this->input = new CI_Input();
    }

    public function index()
    {
        if($this->input->post('themanh')){
            $this->up_anh($this->input->post('thumuc'));
        }
        if($this->input->post('folder')){
            $folder = $this->input->post('newfolder');
            $folder = clean($folder);
            $this->Newfolder($folder);
        }
        $ma = $this->input->get('matm');
        if(!empty($ma)){
            $this->XoaThumuc();
        }
        $data['dsanh'] = $this->Mhinhanh->getThumuc1();

        foreach ($data['dsanh'] as $key => $value) {
            $data['dsanh'][$key]['listimg']=$this->Mhinhanh->getAnh1($value['PK_iMathumuc']);
        }
        if($this->input->post('folder_sua')){
            $mafolder_sua   = $this->input->post('folder_sua');
            $value          = $this->Mhinhanh->getFolder_sua($mafolder_sua);
            echo json_encode($value);
            exit();
        }
        if($this->input->post('sua_folder')){
            $this->suaFolder();
        }
        $ajaxfile=$this->input->post('ajaxfile');
        if(!empty($ajaxfile)){
            $ma=$this->input->post('ajaxfile');
            $valuefile=$this->Mhinhanh->getAnh2($ma);
            echo json_encode($valuefile);
            exit();
        }
        $mafile=$this->input->get('mafile');
        if(!empty($mafile)){
            $this->XoaFile();
        }
        $data['thumuc']     = $this->Mhinhanh->getThumuc();
        $data['message']    = getMessages();
        $temp['template']   = 'Danhmuc/Vhinhanh';
        $data['url']        = base_url();
        $temp['data']       = $data;
        $this->load->view('hethong/Vlayout_admin',$temp);
    }

    public function Newfolder($thumuc)
    {
        $path   = './files/'.$thumuc;
        if (!is_dir($path)) { //create the folder if it's not already exists
            $a = mkdir($path,0755,TRUE);
            if($a==1){
                $value          = array('sTenthumuc' => $thumuc, 'sTencodau' => $this->input->post('newfolder'));
                $kqthemfolder   = $this->Mhinhanh->setFolder($value);
                if($kqthemfolder>0){
                    setMessages('success','','Tạo thư mục thành công');
                    redirect(base_url().'hinhanh');
                } else{
                    setMessages('error','','Tạo thư mục thất bại');
                    redirect(base_url().'hinhanh');
                }
            } else{
                setMessages('error','','Tạo thư mục thất bại');
                redirect(base_url().'hinhanh');
            }
        }
    }

    public function up_anh($thumuc)
    {
        $ma_folder = $this->Mhinhanh->getMa_folder($thumuc);
        for ($i=0;$i<count($_FILES['userfile']['name']);$i++){
            $value[$i] = array(
                'sTenanh' => $_FILES['userfile']['name'][$i],
                'FK_iMathumuc' => $ma_folder['PK_iMathumuc']
            );
            $kqthem = $this->Mhinhanh->setAnh($value[$i]);
            $config['upload_path']          = './files/'.$thumuc.'/';
            $config['allowed_types']        = '*';
            $config['file_name']            = $_FILES['userfile']['name'][$i];
            $config['overwrite']            = true;
            $_FILES['multi'] = array(
                'name'              => $_FILES['userfile']['name'][$i],
                'type'              => $_FILES['userfile']['type'][$i],
                'tmp_name'          => $_FILES['userfile']['tmp_name'][$i],
                'error'             => $_FILES['userfile']['error'][$i],
                'size'              => $_FILES['userfile']['size'][$i]
            );
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('multi') && $kqthem<=0)
            {
                $data['error'] =  $this->upload->display_errors();
                setMessages('error','','Thêm ảnh thất bại');
            }
            else
            {
                $data['upload_data'] = $this->upload->data();
                setMessages('success','','Thêm ảnh thành công');
            }
        };
        redirect('hinhanh');
    }

    public function XoaThumuc()
    {
        $matm=$this->input->get('matm');
        $folder=$this->Mhinhanh->getFolder_xoa($matm);
        $kq1=$this->recursiveRemoveDirectory($folder['sTenthumuc']);
        if($kq1==1){
            $getanhxoa=$this->Mhinhanh->getAnh1($matm);
            $kqxoafile=$this->Mhinhanh->Delfile($matm);
            $kq2=$this->Mhinhanh->DelThumuc($matm);
            if($kq2>0 && $kqxoafile>0 || $kq2>0 &&$getanhxoa== null){
                setMessages('success','','Xóa thư mục thành công');

                redirect('hinhanh');
            } else{
                setMessages('error','','Xóa không thành công');
                redirect('hinhanh');
            }

        } else{
            setMessages('error','','Xóa không thành công');
            redirect('hinhanh');
        }
    }
    public function recursiveRemoveDirectory($fol)
    {

        $scan = scandir("./files/".$fol."/");
        for ($i=2; $i <count($scan); $i++) {
            if(is_dir($scan[$i]))
            {
                recursiveRemoveDirectory($scan[$i]);
            }
            else{
                unlink("./files/".$fol."/".$scan[$i]);
            }
        }
        return rmdir("./files/".$fol."/");


    }
    public function suaFolder()
    {
        $masua          = $this->input->post('sua_folder');
        $value_sua      = $this->Mhinhanh->getFolder_sua($masua);
        $namecdau       = $this->input->post('newfolder');
        $newname        = clean($namecdau);
        $kq1            = $this->RenameFolder($value_sua['sTenthumuc'],$newname);
        if($kq1==1){
            $giatri = array(
                'sTenthumuc' => $newname,
                'sTencodau' => $namecdau
            );
            $kq2 = $this->Mhinhanh->upFolder($masua,$giatri);
            if($kq2>0){
                setMessages('success','','Sửa thành công');
                redirect('hinhanh');
            } else{
                setMessages('error','','Sửa thất bại');
                redirect('hinhanh');
            }
        } else{
            setMessages('error','','Sửa thất bại');
            redirect('hinhanh');
        }

    }

    public function RenameFolder($filename,$newname)
    {
        return rename("./files/".$filename."/","./files/".$newname."/");
    }

    public function XoaFile()
    {
        $ma         = $this->input->get('mafile');
        $giatri     = $this->Mhinhanh->getAnh3($ma);
        $kq1        = $this->Xoa1($giatri);

        if(file_exists("./files/".$giatri['sTenthumuc']."/".$giatri['sTenanh'])!=1){
            $kq2 = $this->Mhinhanh->Delfile1($ma);
            // pr($kq2);
            if($kq2>0){
                setMessages('success','','Xóa thành công');
                redirect('hinhanh');
            }
            else{
                setMessages('error','','Xóa thất bại');
                redirect('hinhanh');
            }
        } else{
            setMessages('error','','Xóa thất bại');
            redirect('hinhanh');
        }
    }

    public function Xoa1($giatri)
    {
        unlink("./files/".$giatri['sTenthumuc']."/".$giatri['sTenanh']);
    }
}