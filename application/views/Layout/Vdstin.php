<div class="col-md-12 col-xs-12">
    {if $trangthai=='loaitin'}
    <div class="col-md-12 col-xs-12 canduoi" style="padding-top: 10px">
        <div class="col-md-12 col-xs-12 col-sm-12" style="padding-right: 0px; padding-left: 0px">
            <!-- <span class="kedoc" style="background: #F90667"></span> -->
            {if isset($dstin[0].sTenloaitin)}<a href="{$url}{clean($dstin[0].sTenloaitin)}_{$dstin[0].FK_iMaloaitin}.html"><span class="tieude"> {$dstin[0].sTenloaitin}</span></a> {/if}
        </div>
        <div style="background: #F90667" class="col-md-12 col-xs-12 col-sm-12 kengang1"></div>
    </div>
    
    <div class="col-md-12 col-xs-12 col-sm-12 listtin value_ajx">
    <ul>
    {foreach $dstin as $key => $listtin}
    {if !empty($listtin.sAnhdaidien)}
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-3 col-xs-4">
            <img src="{$url}files/{$listtin.sAnhdaidien}" width="100%" alt="">
        </div>
        <div class="col-md-9 col-xs-8">
            <a href="{if ($listtin.iLienket==0)}{$url}{$listtin.sTieude_khongdau}_{$listtin.PK_iMatin}.html {else}{$listtin.sNoidung}{/if}" title=""><b>{$listtin.sTieude}</b></a><br>

            <p>
                {$listtin.substr}
            </p>
        </div>
    </div>
    {else}
    <li class="tin">
        <a href="{$url}{$listtin.sTieude_khongdau}_{$listtin.PK_iMatin}.html">{$listtin.sTieude} </a>
    </li>
    {/if}
    {/foreach}
    </ul>
    </div>


    <nav aria-label="Page navigation" style="float: right;">
        <ul class="pagination pagination-sm">
            {for $i=0; $i < $tongtin/10 ; $i++}
            <li><span style="cursor: pointer;"  class="num {($i==0) ? active1 : ''}" value="{$i}">{$i+1}</span></li>
            {/for}
        </ul>
    </nav>
    {/if}

    {if $trangthai=='tinctiet'}
    <div class="col-md-12 col-xs-12 canduoi" style="padding-top: 10px">
        <div class="col-md-12 col-xs-12 col-sm-12" style="padding-right: 0px; padding-left: 0px">
            <!-- <span class="kedoc" style="background: #F90667"></span> -->
            <a href="{$url}{clean($chitiet['sTenloaitin'])}_{$chitiet.FK_iMaloaitin}.html"><span class="tieude">{$chitiet['sTenloaitin']}</span></a> 
        </div>
        <div style="background: #F90667" class="col-md-12 col-xs-12 col-sm-12 kengang1"></div>
    </div>
    <div class="col-md-12 col-xs-12">
        <h3 style="text-align: center;font-weight: 600;font-size: 29px;">{$chitiet.sTieude}</h3>
        <span style="float: right !important; padding-bottom: 10px" class="ngay"><i class="fa fa-clock-o" aria-hidden="true"></i> {date('d/m/Y',strtotime($chitiet.dNgaydang))}</span><br>
        {if !empty($chitiet.sTomtatnoidung)}
        <p><i>{$chitiet.sTomtatnoidung}</i></p>
        {/if}
        

       <!--  {if !empty($chitiet.sAnhdaidien)}
        <div class="col-ms-12 col-xs-12" style="margin-bottom: 20px">
            <img src="{$url}files/{$chitiet.sAnhdaidien}" width="30%" alt="">
        </div>
        {/if} -->

        <div style="padding-top: 10px" class="isnoidung">{$chitiet.sNoidung}</div>

        
        <div class="tag">
            <b>Tags:</b> 
            {foreach $chitiet.sTags as $key2 => $tag}

                {if $key2 != 0}, {/if}<a href="{$url}{clean($tag)}.tag">{$tag}</a>
                
            {/foreach}
        </div>
         <br>
        


        <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fffcteam.com&width=68&layout=button_count&action=like&size=small&show_faces=true&share=false&height=21&appId=649670395229002" width="68" height="21" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        <script>
        $('.isnoidung').find('p img').css('width','100%');
        $('.isnoidung').find('p img').css('height','');
            
        </script>
    </div>

    {/if}



    





    {if $trangthai=='tin_nav'}
    <div class="col-md-12 col-xs-12 canduoi" style="padding-top: 10px">
        <div class="col-md-12 col-xs-12 col-sm-12" style="padding-right: 0px; padding-left: 0px">
            <!-- <span class="kedoc" style="background: #F90667"></span> -->
            <span class="tieude">{$ltin.sTenloaitin}</span>
        </div>
        <div style="background: #F90667" class="col-md-12 col-xs-12 col-sm-12 kengang1"></div>
    </div>
    <div class="col-md-12 col-xs-12 col-sm-12 listtin">
        <ul>
            {if isset($dstin[0]['sTieude'])}
                {if $dstin[0]['sTieude'] != ''}
                    {foreach $dstin as $key1 =>$value1}
                    <li class="tin">
                        <a href="{$url}{$value1.sTieude_khongdau}_{$value1.PK_iMatin}.html">{$value1.sTieude} </a>
                    </li>
                    {/foreach}
                {/if}
            {/if}
        </ul>
    </div>
    {/if}
    {if $trangthai=='tin_theloai'}
    <div class="col-md-12 col-xs-12 canduoi" style="padding-top: 10px">
        <div class="col-md-12 col-xs-12 col-sm-12" style="padding-right: 0px; padding-left: 0px">
            <span class="tieude">{if isset($dstin[0].sTenloaitin)} {$dstin[0].sTenloaitin} {/if}</span>
        </div>
        <div style="background: #F90667" class="col-md-12 col-xs-12 col-sm-12 kengang1"></div>
    </div>
    <div class="col-md-12 col-xs-12 col-sm-12 listtin">
        <div>{$dstin[0].sNoidung}</div>
       
    </div>
    {/if}

    <!-- su kien  -->
    {if $chitiet.FK_iSukien != ""}
    <div class="col-md-12 col-xs-12 canduoi" style="padding-top: 10px">
        <div class="col-md-12 col-xs-12 col-sm-12 khoitb">
            <span class="tb" ><b ><span class="">Tin Liên Quan </span></b></span>
            <div class="ketb"></div>
        </div>

        <div class="row">
            {foreach $danhsach as $key => $val}
                {if $val.PK_iMatin != $chitiet.PK_iMatin }
                    {if $val.FK_iSukien==$chitiet.FK_iSukien}
                    <div class="col-md-12" style="margin-bottom: 14px;">
                        <div class="col-md-12 col-xs-12 canduoi " style="padding-top: 10px">
                            <li class="kengang1">
                                <a href="{$url}{$val.sTieude_khongdau}_{$val.PK_iMatin}.html ">{$val.sTieude} </a>
                            </li>
                        </div>
                    </div>
                    {/if}
                {/if}
            {/foreach}
        </div>
    </div>
    {/if}
</div>