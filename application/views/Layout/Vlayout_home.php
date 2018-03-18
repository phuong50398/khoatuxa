<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	  	if(isset($left['dstin'])){
	  		foreach ($left['dstin'] as $key => $value) {
	  		    $s='';
                for ($i=0; $i < strlen($value['sTomtatnoidung']) ; $i++) {
                    $s=$s.$value['sTomtatnoidung'][$i];
                    if(strlen($s)>=200 && $value['sTomtatnoidung'][$i]==' '){
                        $value['sTomtatnoidung']=substr($value['sTomtatnoidung'],0,strlen($s)).'...';
                        break;
                    }
                }
                $left['dstin'][$key]['substr']=$value['sTomtatnoidung'];
	  	    }
	  	}
	  
    $tin['url'] = base_url();
    $tin['tinleft'] = $left;
    $this->parser->parse('Layout/top',$tin);

    $this->parser->parse($template,$left);

    $this->parser->parse('Layout/right',$right);

    $this->parser->parse('Layout/bottom',$tin);

?>