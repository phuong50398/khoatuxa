<?php 
	
	/**
	* 
	*/
	class Cdscauhoi extends My_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('Danhmuc/Mdscauhoi');
		}
		public function index()
		{
			$nd=$this->input->post('noidung');
			$id=$this->input->post('id');
			if(!empty($nd) && !empty($id)){
				$this->Themtraloi($id,$nd);
				exit();
			}

			$ma=$this->input->post('matraloi');
			if(!empty($ma)){
				$this->Xoatraloi($ma);
				exit();
			}
			$mach=$this->input->post('macauhoi');
			if(!empty($mach)){
				$this->Xoacauhoi($mach);
				exit();
			}


			$start=$this->input->get('trang');
			if(empty($start)){
				$start=0;
			}
			$data['start']=$start;
			$data['cauhoi'] = $this->Mdscauhoi->getCauhoi($start);
	        foreach ($data['cauhoi'] as $key => $value) {
	        	$data['cauhoi'][$key]['traloi']=$this->Mdscauhoi->getTraloi($value['PK_iMacauhoi']);
	        }
			$data['message'] = getMessages();
	        $data['tong'] = $this->Mdscauhoi->getSum();
	        // pr($data['tong']);

	        $temp['template'] = 'Danhmuc/Vdscauhoi';
	        $data['url'] = base_url();
	        $temp['data'] = $data;
	        $this->load->view('hethong/Vlayout_admin',$temp);
		}
		public function Themtraloi($id,$nd)
		{
			$value = array(
				'FK_iMacauhoi' => $id,
				'sNgaytraloi'  => date('Y-m-d',time()),
				'sNoidung'		=>$nd 
				);
			$kq=$this->Mdscauhoi->setTraloi($value);
			$maxstt=$this->Mdscauhoi->getMaxstt();
			if($kq>0){
				echo $maxstt['PK_Matraloi'];

			} else{
				echo 0;
			}

		}

		public function Xoatraloi($ma)
		{
			$kq1=$this->Mdscauhoi->getMa($ma);
			$kq2=$this->Mdscauhoi->TestNull($kq1['FK_iMacauhoi']);
			$kq=$this->Mdscauhoi->Deltraloi($ma);
			// echo $kq1['FK_iMacauhoi'];
			// exit();
			if($kq>0 && $kq2==1){

				echo 2;
			} else{
				if($kq>0){
					echo 1;
				} else
					echo 0;
			}
		}

		public function Xoacauhoi($ma)
		{
			$kq=$this->Mdscauhoi->Delcauhoi($ma);
			if($kq>0){
				echo 1;
			} else{
				echo 0;
			}
		}
	}

 ?>