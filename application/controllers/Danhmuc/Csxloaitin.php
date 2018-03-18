<?php 

/**
* 
*/
class Csxloaitin extends My_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Danhmuc/Msxloaitin');
	}
	public function index()
	{
		$tt=$this->input->post('matl');
		if(!empty($tt)){
			$this->layLoaitin($tt);
		}
		$mang=$this->input->post('mang');
		if(!empty($mang)){
			$this->sxLt($mang);
		}
		$data['message']    = getMessages();
        $temp['template']   = 'Danhmuc/Vsxloaitin';
        $data['url']        = base_url();
        $temp['data']       = $data;
        $this->load->view('hethong/Vlayout_admin',$temp);
	}
	public function layLoaitin($tt)
	{
		$kq=$this->Msxloaitin->getLt($tt);
		echo json_encode($kq);
		exit();
	}
	public function sxLt($mang)
	{
		$kq1=$this->Msxloaitin->upLt($mang);
		echo json_encode($kq1);
		exit();
	}
}
 ?>