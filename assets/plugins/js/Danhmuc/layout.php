<?php
	$data['url']  = base_url();
    $data['user'] = getSession();

    $result = checkPermission(getSession()['userLevel'], getSegment());
    if ($result == 0){
        redirect(base_url().'403_Forbidden');
    }
	$this->parser->parse('Layout_admin/Top_admin', $data);
	$this->parser->parse($template, $data);
	$this->parser->parse('Layout_admin/Footer_admin', $data);
//    pr(getSegment());
?>