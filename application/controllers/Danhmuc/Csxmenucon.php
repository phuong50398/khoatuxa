<?php 

/**
* 
*/
class Csxmenucon extends My_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Danhmuc/Msxmenucon');
	}

	public function index()
	{
		$matl=$this->input->post('matl');
		if(!empty($matl)){
			$this->layMenucon($matl);
		}
		$mangmenucon=$this->input->post('mang');
		if(!empty($mangmenucon)){
			$this->sxMenucon($mangmenucon);
		}
		$data['theloai']=$this->Msxmenucon->getTheloai();
		$data['message']    = getMessages();
        $temp['template']   = 'Danhmuc/Vsxmenucon';
        $data['url']        = base_url();
        $temp['data']       = $data;
        $this->load->view('hethong/Vlayout_admin',$temp);
	}
	public function layMenucon($matl)
	{
		$value=$this->Msxmenucon->getMenucon($matl);
		echo json_encode($value);
		exit();	
	}
	public function sxMenucon($mangmenucon)
	{
		$kq=$this->Msxmenucon->upSapxep($mangmenucon);
		echo json_encode($kq);
		exit;
	}
}
 ?>