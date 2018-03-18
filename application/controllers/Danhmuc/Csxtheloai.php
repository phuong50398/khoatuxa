<?php 

/**
* 
*/
class Csxtheloai extends My_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Danhmuc/Msxtheloai');
	}
	public function index()
	{
		$data['theloai']=$this->Msxtheloai->getTheloai();
		if($this->input->post('mang')){
			$this->SxTheloai();
		}
		$data['message']    = getMessages();
        $temp['template']   = 'Danhmuc/Vsxtheloai';
        $data['url']        = base_url();
        $temp['data']       = $data;
        $this->load->view('hethong/Vlayout_admin',$temp);
	}

	public function SxTheloai()
	{
		$value=$this->input->post('mang');
		
		$kq=$this->Msxtheloai->SxTheloai($value);

		echo json_encode($kq);
		exit;
		
	}
}
 ?>