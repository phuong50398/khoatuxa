<?php 
 /**
 * 
 */
 class Cfeed extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->helper('xml');
 		$this->load->helper('text');
 		$this->load->model('Mfeed');
 		$this->load->library('Feed');
 	}
 	public function index()
 	{
 		// $data['url'] = base_url();
 		// $data['feed_name'] = 'khoatuxa';
 		// $data['encoding']  = 'utf-8';
 		// $data['feed_url']	= 'feedrss';
 		// $data['page_description']	= 'Khoa đào tạo từ xa - Viện đại học Mở Hà Nội';
 		// $data['page_language']	= 'vi_VN';
 		// $data['posts']	=	$this->Mfeed->getPost();
 		// pr($data['posts']);
 		// header("Content-Type: application/rss+xml; charset=utf-8");

 		// $this->load->view('Vfeed',$data);
 	
 		$posts = $this->Mfeed->getPost();
 		 // create new instance
	    $feed = new Feed();

	    // set your feed's title, description, link, pubdate and language
	    $feed->title = 'Khoa Đào Tạo Từ Xa - Viện Đại Học Mở Hà Nội';
	    $feed->description = 'Khoa Đào Tạo Từ Xa - Viện Đại Học Mở Hà Nội';
	    $feed->link = base_url();
	    $feed->lang = 'vi';
	    $feed->pubdate = $posts[0]['dNgaydang']; // date of your last update (in this example create date of your latest post)

	    // add posts to the feed
	    foreach ($posts as $post)
	    {
	        // set item's title, author, url, pubdate and description
	        $feed->add($post['sTieude'], 'Diêu', base_url().$post['sTieude_khongdau'].'_'.$post['PK_iMatin'].'.html', $post['dNgaydang'], $post['sTomtatnoidung']);
	    }

	    // show your feed (options: 'atom' (recommended) or 'rss')
	    $feed->render('atom');

 	}
 }

 ?>