                <div class="col-md-12 col-xs-12 col-sm-12 canchinh1 startslide">
                    <div id="jssor_1" class="jssor_1">
                        <!-- Loading Screen -->
                        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                            <div class="load1"></div>
                            <div class="load2"></div>
                        </div>
                        <div data-u="slides" class="img_slide">
                            <div data-p="112.50" class="divslide" style="display: none;">
                                <a href="{$url}{$slide[0]['sTieude_khongdau']}_{$slide[0]['PK_iMatin']}.html">
                                    <img class="imgslide" data-u="image" src="{$url}files/{if ($slide[0]['sAnhdaidien']!='')}{$slide[0]['sAnhdaidien']}{else}slide.jpg{/if}">
                                    <div class="captionslide">{$slide[0]['sTieude']}</div>
                                </a>
                            </div>
                            <div data-p="112.50" class="divslide" style="display: none;">
                                <a href="{$url}{$slide[1]['sTieude_khongdau']}_{$slide[1]['PK_iMatin']}.html">
                                    <img class="imgslide" data-u="image" src="{$url}files/{if ($slide[1]['sAnhdaidien']!='')}{$slide[1]['sAnhdaidien']}{else}slide.jpg{/if}">
                                    <div class="captionslide">{$slide[1]['sTieude']}</div>
                                </a>
                            </div>
                            <div data-p="112.50" class="divslide" style="display: none;">
                                <a href="{$url}{$slide[2]['sTieude_khongdau']}_{$slide[2]['PK_iMatin']}.html">
                                    <img class="imgslide" data-u="image" src="{$url}files/{if ($slide[2]['sAnhdaidien']!='')}{$slide[2]['sAnhdaidien']}{else}slide.jpg{/if}">
                                    <div class="captionslide">{$slide[2]['sTieude']}</div>
                                </a>
                            </div>
                            <div data-p="112.50" class="divslide" style="display: none;">
                                <a href="{$url}{$slide[3]['sTieude_khongdau']}_{$slide[3]['PK_iMatin']}.html">
                                    <img class="imgslide" data-u="image" src="{$url}files/{if ($slide[3]['sAnhdaidien']!='')}{$slide[3]['sAnhdaidien']}{else}slide.jpg{/if}">
                                    <div class="captionslide">{$slide[3]['sTieude']}</div>
                                </a>
                            </div>
                        </div>
                        <!-- Bullet Navigator -->
                        <div data-u="navigator" class="jssorb01" style="top: 16px; right: 16px;">
                            <div data-u="prototype" style="width: 12px; height: 12px;"></div>
                        </div>
                        <!-- Arrow Navigator -->
                        <span data-u="arrowleft" class="jssora05l" data-autocenter="2"></span>
                        <span data-u="arrowright" class="jssora05r" data-autocenter="2"></span>
                    </div>
                </div>
                {foreach $ctietleft as $key => $loaitin}
                {if $loaitin.iDouutien_lt==$maxleft.maxlt}
                <div class="col-md-12 col-xs-12 respon1">
                    <div class="col-md-5 col-xs-5 col-sm-3" style="padding-right: 0px;">
                        <span class="kedoc" style="background: {$loaitin.sMau};"></span>
                        <a href="{$url}{clean($loaitin.sTenloaitin)}_{$loaitin.PK_iMaloaitin}.html" title=""><span class="tieude">{$loaitin.sTenloaitin}</span></a>
                    </div>
                    <div style="background: {$loaitin.sMau};" class="col-md-7 col-xs-7 col-sm-9 kengang"></div>
                </div>
                <div class="col-md-12 col-xs-12 wrap2 respon1">
                    <div class="row">
                    {foreach $loaitin.baiviet as $key1 =>$chitiet}
                    {if $loaitin.PK_iMaloaitin==$chitiet.FK_iMaloaitin}
                        <div class="col-md-6 col-xs-12 col-sm-6 canduoi jsgiaoduc">
                            <a href="{if ($chitiet.iLienket==0)} {$url}{$chitiet.sTieude_khongdau}_{$chitiet.PK_iMatin}.html {else} {$chitiet.sNoidung}{/if}" class="agiaoduc">
                                <div class="col-md-4 col-xs-4" style="padding-right: 0px">
                                    <span class="chuyendong">
                                        {$loaitin.sTenloaitin}
                                    </span>
                                    <img src="{$url}files/{$chitiet.sAnhdaidien}" width="100%" class="anht1">
                                </div>
                                <div class="col-md-8 col-xs-8">
                                    <b class="chutiede">{$chitiet.sTieude}</b><br>
                                    <span class="ngay"><i class="fa fa-clock-o" aria-hidden="true"></i> {date('d/m/Y',strtotime($chitiet.dNgaydang))}</span>
                                </div>
                            </a>
                        </div>
                        {/if}
                        {/foreach}
                    </div>
                    <!--   end giao duc -->
                    {elseif $loaitin.iDouutien_lt==$maxleft.maxlt-1}
                        <div class="col-md-12 col-xs-12 canduoi" style="padding-top: 10px;">
                            <div class="col-md-5 col-xs-5 col-sm-3" style="padding-right: 0px; padding-left: 0px;">
                                <span class="kedoc" style="background: {$loaitin.sMau};"></span>
                                <a href="{$url}{clean($loaitin.sTenloaitin)}_{$loaitin.PK_iMaloaitin}.html" title=""><span class="tieude">{$loaitin.sTenloaitin}</span></a>
                            </div>
                            <div style="background: {$loaitin.sMau};" class="col-md-7 col-xs-7 col-sm-9 kengang"></div>
                        </div>
                        <div class="col-md-12 col-xs-12">
                        {foreach $loaitin.baiviet as $key2 => $chitiet}
                            {if $loaitin.PK_iMaloaitin==$chitiet.FK_iMaloaitin && $key2==0}
                                <a href="{if ($chitiet.iLienket==0)} {$url}{$chitiet.sTieude_khongdau}_{$chitiet.PK_iMatin}.html {else} {$chitiet.sNoidung}{/if}" class="asinhvien">
                                    <div class="col-md-5 col-xs-12 col-sm-5" style="padding-bottom: 20px">
                                        <img src="{$url}files/{$chitiet.sAnhdaidien}" width="100%" style="margin-bottom: 10px;">
                                        <b style="font-size: 15px" class="chutiede">{$chitiet.sTieude}</b>
                                        <br>
                                        <span class="ngay"><i class="fa fa-clock-o" aria-hidden="true"></i> {date('d/m/Y',strtotime($chitiet.dNgaydang))}</span>
                                    </div>
                                </a>
                            {elseif $loaitin.PK_iMaloaitin==$chitiet.FK_iMaloaitin}
                                <a href="{if ($chitiet.iLienket==0)} {$url}{$chitiet.sTieude_khongdau}_{$chitiet.PK_iMatin}.html {else} {$chitiet.sNoidung}{/if}" class="asinhvien">
                                    <div class="col-md-7 col-xs-12 col-sm-7 canduoi">
                                        <div class="col-md-4 col-xs-4">
                                            <img src="{$url}files/{$chitiet.sAnhdaidien}" width="100%" class="anht2">
                                        </div>
                                        <div class="col-md-8 col-xs-8">
                                            <b class="chutiede">{$chitiet.sTieude}</b>
                                            <br>
                                            <span class="ngay"><i class="fa fa-clock-o" aria-hidden="true"></i> {date('d/m/Y',strtotime($chitiet.dNgaydang))}</span>
                                        </div>
                                    </div>
                                </a>
                            {/if}
                        {/foreach}
                        </div>
                        <!-- end sinh vieen -->
                    {elseif $loaitin.iDouutien_lt==$maxleft.maxlt-2}
                    <div class="col-md-12 col-xs-12 canduoi" style="padding-top: 10px">
                        <div class="col-md-5 col-xs-7 col-sm-6" style="padding-right: 0px; padding-left: 0px">
                            <span class="kedoc" style="background: {$loaitin.sMau};"></span>
                            <a href="{$url}{clean($loaitin.sTenloaitin)}_{$loaitin.PK_iMaloaitin}.html" title=""><span class="tieude">{$loaitin.sTenloaitin}</span></a>
                        </div>
                        <div style="background: {$loaitin.sMau};" class="col-md-7 col-xs-5 col-sm-6 kengang"></div>
                    </div>
                    {foreach $loaitin.baiviet as $key2 => $chitiet}

                    {if $loaitin.PK_iMaloaitin==$chitiet.FK_iMaloaitin && $key2==0}
                    <a href="{if ($chitiet.iLienket==0)} {$url}{$chitiet.sTieude_khongdau}_{$chitiet.PK_iMatin}.html {else} {$chitiet.sNoidung}{/if}" class="attvh">
                        <div class="col-md-12 col-xs-12 canduoi">
                            <div class="col-md-5 col-xs-12 ttvh">
                                <div class="domau"></div>
                                <img class="anhttvh" src="{$url}files/{$chitiet.sAnhdaidien}" width="100%">
                            </div>
                            <div class="col-md-7 col-xs-12 xs-pad">
                                <b class="chutiede1">{$chitiet.sTieude}</b>
                                <br class="hidden-xs">
                                <br class="hidden-xs hidden-sm">
                                <span class="tomtattin">
                                        {$chitiet.sTomtatnoidung}
                                </span>
                                <br>
                                <span class="ngay ngaytd"><i class="fa fa-clock-o" aria-hidden="true"></i> {date('d/m/Y',strtotime($chitiet.dNgaydang))}</span>
                            </div>
                        </div>
                    </a>
                    <div class="col-md-12 col-xs-12 canduoi">
                    {elseif $loaitin.PK_iMaloaitin==$chitiet.FK_iMaloaitin}
                        <a href="{if ($chitiet.iLienket==0)} {$url}{$chitiet.sTieude_khongdau}_{$chitiet.PK_iMatin}.html {else} {$chitiet.sNoidung}{/if}" class="attvh">
                            <div class="col-md-4 col-xs-12 col-sm-4 delpad">
                                <div class="col-md-12 col-xs-12 ttvh ttvh2">
                                    <div class="domau"></div>
                                    <img src="{$url}files/{$chitiet.sAnhdaidien}" width="100%" class="anht3">
                                </div>
                                <div class="col-md-12 col-xs-12 thethao">
                                    <b class="chutiede">{$chitiet.sTieude}</b>
                                    <br>
                                    <span class="ngay"><i class="fa fa-clock-o" aria-hidden="true"></i> {date('d/m/Y',strtotime($chitiet.dNgaydang))}</span>
                                </div>
                            </div>
                        </a>
                        {/if}
                        {/foreach}
                    </div>
                    {else}
                    <div class="col-md-12 col-xs-12 canduoi" style="padding-top: 10px">
                        <div class="col-md-5 col-xs-7 col-sm-6" style="padding-right: 0px; padding-left: 0px">
                            <span class="kedoc" style="background: {$loaitin.sMau};"></span>
                            <a href="{$url}{clean($loaitin.sTenloaitin)}_{$loaitin.PK_iMaloaitin}.html" title=""><span class="tieude">{$loaitin.sTenloaitin}</span></a>
                        </div>
                        <div style="background: {$loaitin.sMau};" class="col-md-7 col-xs-5 col-sm-6 kengang"></div>
                    </div>
                    <div class="col-md-12 col-xs-12 col-sm-12">
                    {foreach $loaitin.baiviet as $key1 =>$chitiet}
                    {if $loaitin.PK_iMaloaitin==$chitiet.FK_iMaloaitin}
                        <div class="col-md-3 col-xs-12 col-sm-3" style="padding: 0px">
                            <a href="{if ($chitiet.iLienket==0)} {$url}{$chitiet.sTieude_khongdau}_{$chitiet.PK_iMatin}.html {else} {$chitiet.sNoidung}{/if}" class="goccuoi">
                                <div class="col-md-12 col-xs-12 col-sm-12 ">
                                    <div class="col-md-12 col-xs-12 col-sm-12 khoigoccuoi">
                                        <div class="tdcd col-md-12 hidden-xs">
                                            <div>{$chitiet.sTieude}</div>
                                        </div>
                                        <div class=" col-md-12 col-xs-5 dd">
                                            <img src="{$url}files/{$chitiet.sAnhdaidien}" width="100%" class="anht4">
                                        </div>
                                        <div class="col-md-12 col-xs-7 dd tin"><p>{$chitiet.sTieude}</p></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    {/if}
                    {/foreach}
                </div>
                    {/if}
                    {/foreach}
                </div>
                <!-- end cot1 -->
                <script type="text/javascript" src="{$url}public/js/jssor.slider.min.js"></script>
                <script type="text/javascript" src="{$url}public/js/slide.js"></script>
                <style>
                    .imgslide{
                        padding-right: 100px;
                    }
                </style>
          