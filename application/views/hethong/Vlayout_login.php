<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    $data['url'] = base_url();

    $this->parser->parse('hethong/Vtop',$data);

    $this->parser->parse($template,$data);

    $this->parser->parse('hethong/Vbottom',$data);

?>