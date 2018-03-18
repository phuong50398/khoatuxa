<?php 

 class Ctest extends CI_Controller
 {
 	
 	public function __construct()
 	{
 		parent::__construct();
        $this->load->library('Send_Mail');
 	}
 	public function index()
 	{
 		// $name       = 'Văn thư Sở Tài chính';
   //      $from_email = 'cauhoituyensinh@gmail.com';
   //      $subject    = 'abc'; // nội dung gửi mail
   //      $message    = 'def';
   //      $to_email   = 'cauhoituyensinh@gmail.com';// mail nhận

   //      //configure email settings
   //      $config['protocol'] = 'smtp';
   //      $config['smtp_host'] = 'ssl://smtp.gmail.com';
   //      $config['smtp_port'] = '465';
   //      $config['smtp_user'] = 'cauhoituyensinh@gmail.com';// email gửi
   //      $config['smtp_pass'] = 'khoatuxa123';// pass cua mail tren
   //      $config['mailtype'] = 'html';
   //      $config['charset'] = 'utf-8';
   //      $config['wordwrap'] = TRUE;
   //      $config['newline'] = "\r\n"; //use double quotes
   //      $config['smtp_conn_options'] = array(
   //          'ssl' => array(
   //              'verify_peer' => false,
   //              'verify_peer_name' => false,
   //              'allow_self_signed' => true
   //          )
   //      );
   //      $this->load->library('email', $config);
   //      $this->email->initialize($config);
   //      //send mail
   //      $this->email->clear(TRUE);
   //      $this->email->from($from_email, $name);
   //      $this->email->to($to_email);
   //      $this->email->subject($subject);
   //      $this->email->message($message);
   //      if ($this->email->send()) {
   //          echo 'thành công';
   //      } else {
   //          echo $this->email->print_debugger();
   //      }
 		//Email
        $mail                   = new PHPMailer;
        $mail->CharSet          = "utf8";  //encode character
        // $mail->isSMTP();
        // $mail->Host = gethostbyname('smtp.gmail.com');
        $mail->Host             = 'smtp.gmail.com';
        $mail->SMTPAuth         = true;

        $mail->Username         = 'cauhoituyensinh@gmail.com';    // Email gửi câu hỏi
        $mail->Password         = 'khoatuxa123';           // Password
        $mail->SMTPSecure       = 'tls';
        $mail->SMTPDebug        = 2;
        $mail->Port             = 587;

        $mail->From             = 'cauhoituyensinh@gmail.com';
        $mail->FromName         = 'Câu hỏi tuyển sinh';
        $mail->AddReplyTo('ndthanh.7598@gmail.com');

        $mail->addAddress('ndthanh.7598@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Câu hỏi tư vấn tuyển sinh';
            $bodyContent  = "<br>Họ tên: ndt";
            $bodyContent  .= "<br>Số điện thoại: 0987654321";
            $bodyContent  .= "<br>Email: tyhnmkiug@gmail.com";
            $bodyContent  .= "<br>Nội dung: <br> tyuiovccghjfvbnmkfvb";
        $mail->Body = $bodyContent;
        $mail->AltBody = '';
        // $mail->MsgHTML($bodyContent);
        // $mail->Send();
        if(!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            return 0;
        } else {
            echo "def";
        }
        //End email
 	}
 }
 ?>