<?php 
 /**
 * 
 */
 class CTags extends CI_Controller
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
		$dieukien = $this->uri->segment(1);
		$dieukien = substr($dieukien,0,strlen($dieukien)-4);
		$data['left'] = $this->Mdstin->getTagCodau($dieukien);
		// pr($tag_codau);
		$data['left']['timkiem'] = $this->Mdstin->getTimkiem($data['left']['sTentags']);
		// pr($data['left']);
		// $data['left']['tag']        = $this->Mdstin->getTinTag();

        $data['left']['trangthai']      = 'timkiem';



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

        $data['template']                   = 'Layout/Vtimkiem';
        $tam                                = $data;
        $this->load->view('Layout/Vlayout_home', $tam);
	}
	public function Laychitiet()
    {
        $ma = $this->input->get('mact');
        return $this->Mdstin->getChitiet($ma) ;
    }
 }
 ?>