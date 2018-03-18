<?php

class Cdstin extends CI_Controller
{
    public $Mdstin;
    public $Mtrangchu;
    public $input;
    function __construct()
    {
        parent::__construct();
        $this->input        =  new CI_Input();
        $this->load->model('Layout/Mdstin','Mdstin');
        $this->load->model('Layout/Mtrangchu','Mtrangchu');
        $this->Mdstin       = new Mdstin;
        $this->Mtrangchu    = new Mtrangchu;
    }

    public function index()
    {
        // $ma = $this->input->get('ma');
        // if(!empty($ma)){
            $ma = $this->uri->segment(1);
            $td = substr($ma,0,strlen($ma)-5);
            $ma = strstr($ma,'_');
            $ma = substr($ma,1,strlen($ma)-6);

            $start = 0;
            $data['left']['chitiet']        = $this->Laychitiet();
            $data['left']['dstin']          = $this->LayTin_ma($start,$ma);
            $data['left']['ltin']           = $this->Mdstin->getLoaitin1($ma);

            $tenlt=$data['left']['ltin']['sTenloaitin'];
            $tentl = trim($tenlt);
            $td = substr($td,0,strlen($td)-(strlen($ma)+1));
            $red = clean($tenlt).'_'.$ma;
            // echo $tenlt.'<br>'.$td.'<br>'.$red.'<br>'.clean($tenlt);
            // exit();
            if(clean($tenlt) != $td){
                redirect("$red.html");
            }
            
            $data['left']['trangthai']      = 'loaitin';
            $data['left']['s']              = '';
            $data['left']['tongtin']        = $this->Mdstin->getTongtin($ma);
        
        $maloaitin = $this->input->post('maloaitin');
        if($maloaitin  != null){
            $maloaitin = $maloaitin*10;
            $value = $this->LayTin_ma($maloaitin,$ma);
            if(isset($value)){
                foreach ($value as $key => $value1) {
                    $s='';
                    for ($i=0; $i < strlen($value1['sTomtatnoidung']) ; $i++) {
                        $s=$s.$value1['sTomtatnoidung'][$i];
                        if(strlen($s)>=200 && $value1['sTomtatnoidung'][$i]==' '){
                            $value1['sTomtatnoidung'] = substr($value1['sTomtatnoidung'],0,strlen($s)).'...';
                            break;
                        }
                    }
                    $value[$key]['substr'] = $value1['sTomtatnoidung'];
                }
            }
            echo json_encode($value);
            exit();
        }
        $data['tin']['bg']                  = $this->Mtrangchu->getBg();
        $data['tin']['banner']              = $this->Mtrangchu->getBanner();
        $data['tin']['theloai']             = $this->Mtrangchu->getTheloai();
        $data['tin']['loaitin']             = $this->Mtrangchu->getLoaitin();
        $data['right']['quangcao']          =$this->Mtrangchu->getQuangcao();
        $data['right']['tinmoi']            = $this->Mtrangchu->getTinmoi();
        $data['tin']['delay']               = 0;
        $data['right']['loaitinright']      = $this->Mtrangchu->getTinright();
        foreach ($data['right']['loaitinright'] as $key => $value) {
            $data['right']['loaitinright'][$key]['ctiet'] = $this->Mtrangchu->getCtright($value['PK_iMaloaitin']);
        }
        $data['right']['tam']               = 1;

        $data['template']                   = 'Layout/Vdstin';
        $tam                                = $data;
        $this->load->view('Layout/Vlayout_home', $tam);
    }
    public function theloai()
    {
        $data['left']['chitiet']        = $this->Laychitiet();
        $data['left']['dstin']          = $this->Laytin_tl();

            $data['left']['trangthai']      = 'tin_theloai';

            $data['tin']['bg']                  = $this->Mtrangchu->getBg();
        $data['tin']['banner']              = $this->Mtrangchu->getBanner();
        $data['tin']['theloai']             = $this->Mtrangchu->getTheloai();
        $data['tin']['loaitin']             = $this->Mtrangchu->getLoaitin();
        $data['right']['quangcao']          =$this->Mtrangchu->getQuangcao();
        $data['right']['tinmoi']            = $this->Mtrangchu->getTinmoi();
        $data['tin']['delay']               = 0;
        $data['right']['loaitinright']      = $this->Mtrangchu->getTinright();
        foreach ($data['right']['loaitinright'] as $key => $value) {
            $data['right']['loaitinright'][$key]['ctiet'] = $this->Mtrangchu->getCtright($value['PK_iMaloaitin']);
        }
        $data['right']['tam']               = 1;

        $data['template']                   = 'Layout/Vdstin';
        $tam                                = $data;
        $this->load->view('Layout/Vlayout_home', $tam);
    }
    public function LayTin_ma($start,$ma)
    {
        return $this->Mdstin->getTin_ma($ma,$start);
    }
    public function Laychitiet()
    {
        $ma = $this->input->get('mact');
        return $this->Mdstin->getChitiet($ma) ;
    }
    public function Laytin_nav()
    {
        $ma = $this->input->get('manav');
        return $this->Mdstin->getTin_nav($ma);
    }
    public function Laytin_tl()
    {
        $ma = $this->uri->segment(1);
            $td = substr($ma,0,strlen($ma));
            $ma = strstr($ma,'_');
            $ma = substr($ma,1,strlen($ma));
            // pr($ma);
        return $this->Mdstin->getTin_tl($ma);
    }

    public function Layanh()
    {
        $data['tin']['bg']      = $this->Mtrangchu->getBg();
        $data['tin']['banner']  = $this->Mtrangchu->getBanner();
        $data['left']['dsanh']  = $this->Mdstin->getThumuc();
        foreach ($data['left']['dsanh'] as $key => $value) {
            $data['left']['dsanh'][$key]['listimg'] = $this->Mdstin->getAnh($value['PK_iMathumuc']);

        }
        $data['tin']['tieude'] = 'Thư viện ảnh';
        $data['tin']['theloai']         = $this->Mtrangchu->getTheloai();
        $data['tin']['loaitin']         = $this->Mtrangchu->getLoaitin();
        $data['tin']['delay']           = 0;
        $data['right']['loaitinright']  = $this->Mtrangchu->getTinright();
        $data['right']['quangcao']          =$this->Mtrangchu->getQuangcao();
        $data['right']['tinmoi']            = $this->Mtrangchu->getTinmoi();
        foreach ($data['right']['loaitinright'] as $key => $value) {
            $data['right']['loaitinright'][$key]['ctiet'] = $this->Mtrangchu->getCtright($value['PK_iMaloaitin']);
        }
        $data['right']['tam']           = 1;

        $data['template']               = 'Layout/Vanh';
        $tam                            = $data;
        $this->load->view('Layout/Vlayout_home', $tam);
    }

    public function demo($td, $ma)
    {
        echo $td.'<br>';
        echo $ma;
    }
    public function demo2()
    {
        echo $this->uri->segment(0);
        
    }
}