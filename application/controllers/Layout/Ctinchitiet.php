<?php 

/**
* 
*/
class Ctinchitiet extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Layout/Mdstin','Mdstin');
        $this->load->model('Layout/Mtrangchu','Mtrangchu');
	}

	public function index()
	{
		$data['left']['chitiet']        = $this->Laychitiet();
        $data['left']['danhsach']       = $this->Layds();

        $data['left']['trangthai']      = 'tinctiet';



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

	public function Laychitiet()
    {
        $ma = $this->uri->segment(1);
        $td = substr($ma,0,strlen($ma)-5);
        $ma = strstr($ma,'_');
        $ma = substr($ma,1,strlen($ma)-6);
        // pr($ma);
        $kq=$this->Mdstin->getChitiet($ma);
        $linktd= substr($td,0,strlen($td)-(strlen($ma)+1));

        
        // $kq['tags']           = $this->Mdstin->getTags($ma);
        $tags = explode(',', $kq['sTags']);
        foreach ($tags as $key => $value) {
            $tags[$key] = trim($value);
        }
        $kq['sTags'] = $tags;
// pr($kq);
        if(empty($kq)){
        	redirect('loi');
        }
        $red=$kq['sTieude_khongdau'].'_'.$ma;
        // pr($linktd);
        if($kq['sTieude_khongdau']!=$linktd){
        	
        	redirect("$red.html");
        }
        return $kq;
    }

    public function Layds()
    {
        return $this->Mdstin->danhsachtinchitiet() ;
    }
    
}
 ?>