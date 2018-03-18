<?php 

/**
* 
*/
class Csxtincon extends My_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Danhmuc/Msxtincon');
	}
	public function index()
	{
	 		$ma=$this->input->post('malt');
		if(!empty($ma)){
			$this->layTincon($ma);
		}
		$mang=$this->input->post('mang');
		if(!empty($mang)){
			$this->sxTin($mang);
		}
		$data['loaitin']=$this->Msxtincon->getLoaitin();
		$data['message']    = getMessages();
        $temp['template']   = 'Danhmuc/Vsxtincon';
        $data['url']        = base_url();
        $temp['data']       = $data;
        $this->load->view('hethong/Vlayout_admin',$temp);
	}
	public function layTincon($ma)
	{
		$kq=$this->Msxtincon->getTincon($ma);
		echo json_encode($kq);
		exit();
	}
	public function sxTin($mang)
	{
		$kq=$this->Msxtincon->upTin($mang);
		echo json_encode($kq);
		exit();
	}
}
 ?>