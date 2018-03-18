<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$data['session'] = getSession();
$data['url'] = base_url();

$this->parser->parse('hethong/Vheader_admin',$data);

$this->parser->parse($template,$data);

$this->parser->parse('hethong/Vfooter_admin',$data);

?>