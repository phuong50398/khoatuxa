<?php 

 /**
 * 
 */
 class Ccauhoi extends CI_Controller
 {
 	
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('Layout/Mcauhoi');
 		$this->load->model('Layout/Mtrangchu');
        $this->load->library('Send_Mail');
 	}
 	public function index()
 	{
 		
 		$hoten=$this->input->post('hoten');
 		if(!empty($hoten)){
 			$this->Themcauhoi();
 			exit();
 		}

 		$start=$this->input->get('trang');
		if(empty($start)){
			$start=0;
		}
		$data['left']['start']              = $start;
		$data['left']['tong']               = $this->Mcauhoi->getSum();
        $data['tin']['tieude']              = 'Giải đáp thắc mắc';
 		$data['tin']['bg']                  = $this->Mtrangchu->getBg();
        $data['tin']['banner']              = $this->Mtrangchu->getBanner();
        $data['tin']['theloai']             = $this->Mtrangchu->getTheloai();
        $data['tin']['loaitin']             = $this->Mtrangchu->getLoaitin();
        $data['tin']['delay']               = 0;
        $data['right']['loaitinright']      = $this->Mtrangchu->getTinright();
        $data['right']['quangcao']          = $this->Mtrangchu->getQuangcao();
        $data['right']['tinmoi']            = $this->Mcauhoi->getTinmoi();
        foreach ($data['right']['loaitinright'] as $key => $value) {
            $data['right']['loaitinright'][$key]['ctiet'] = $this->Mtrangchu->getCtright($value['PK_iMaloaitin']);
            // if($value['sTenloaitin']=='Video'){
            //     $s='https://www.youtube.com/embed/';
               
            //     $x=$data['right']['loaitinright'][$key]['ctiet'][0]['sNoidung'];
            //     $m=explode('=',$x);
                
            //     $data['right']['loaitinright'][$key]['ctiet'][0]['link']=$s.$m[1];
            // }
        }
        $data['right']['tam']               = 1;

        $data['left']['cauhoi'] = $this->Mcauhoi->getCauhoi($start);
        foreach ($data['left']['cauhoi'] as $key => $value) {
        	$data['left']['cauhoi'][$key]['traloi'] = $this->Mcauhoi->getTraloi($value['PK_iMacauhoi']);
        }
        // pr($data['left']['cauhoi']);

        $data['template']                   = 'Layout/Vcauhoi';
        $tam                                = $data;
        $this->load->view('Layout/Vlayout_home', $tam);
 	}

 	public function Themcauhoi()
 	{
 		$hoten   = $this->input->post('hoten');
 		$sdt     = $this->input->post('sdt');
 		$email   = $this->input->post('email');
 		$noidung = $this->input->post('noidung');

        //Email
        $mail                   = new PHPMailer;
        $mail->CharSet          = "utf8";  //encode character
        // $mail->isSMTP();
        $mail->Host             = 'smtp.gmail.com';
        $mail->SMTPAuth         = true;

        $mail->Username         = 'cauhoituyensinh@gmail.com';    // Email gửi câu hỏi
        $mail->Password         = 'khoatuxa123';           // Password
        $mail->SMTPSecure       = 'tls';
        $mail->SMTPDebug        = 0;
        $mail->Port             = 587;

        $mail->From             = 'cauhoituyensinh@gmail.com';
        $mail->FromName         = 'Hệ thống tư vấn tuyển sinh';
        $mail->AddReplyTo($email,$hoten);

        $mail->addAddress('namlh@hou.edu.vn');
        // $mail->addAddress('phuong50398@gmail.com','Cán bộ 2');
        $mail->addCC('nhungmtk02@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Tư vấn tuyển sinh';
            $bodyContent   = "<br><br>Họ tên: " . $hoten;
            $bodyContent  .= "<br>Số điện thoại: " . $sdt;
            $bodyContent  .= "<br>Email: " . $email;
            $bodyContent  .= "<br>Nội dung: <br> " . $noidung;
        $mail->Body = $bodyContent;
        $mail->AltBody = '';

        if(!$mail->send()) {
            echo 0;
            exit();
        } else {
            $error = 1;
        }
        //End email

 		$data    = array(
 			'dNgayhoi'      => date('Y-m-d',time()), 
 			'sSdt'          => $sdt,
 			'sEmail'        => $email,
 			'sNoidung'      => $noidung,
 			'sHoten'        => $hoten
 			);
 		$kq = $this->Mcauhoi->setCauhoi($data);
 		if($kq>0 && $error>0){
 			echo 1;
 		} else{
 			echo 0;
 		}
 	}
 }
 ?>