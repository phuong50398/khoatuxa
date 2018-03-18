</div>

<div class="col-md-4 col-xs-12" style="padding:0px; margin: 0px;">

    <div id="thongbao">
    </div>
        <div class="col-md-12 col-xs-12 col-sm-12 thongbao">
            <div class="col-md-12 col-xs-12 col-sm-12 khoitb">
                <div class="ok1"><i>T</i><i>i</i><i>n</i><i> &nbsp;</i><i>M</i><i>ớ</i><i>i</i><i> &nbsp;</i><i>N</i><i>h</i><i>ấ</i><i>t</i><i>!</i></div>
                <div class="ketb"></div>
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12 listtin">
                <ul>
                {foreach $tinmoi as $key => $value}
                            {if (int)(time()-strtotime($value.dNgaydang))/86400 <= 3}
                            <li class="tin" style="list-style: none;">
                                <span style="margin-left: -25px"><img width="35px" height="35px" src="{$url}src/img/g1.gif"></span>
                                <a href="{if ($value.iLienket==0)}{$url}{$value.sTieude_khongdau}_{$value.PK_iMatin}.html{else}{$value.sNoidung}{/if}"><b>{$value.sTieude}</b></a>
                            </li>
                            {else}
                            <li class="tin">
                                <a href="{if ($value.iLienket==0)}{$url}{$value.sTieude_khongdau}_{$value.PK_iMatin}.html{else}{$value.sNoidung}{/if}"><b>{$value.sTieude}</b> </a>
                            </li>
                            {/if}
                {/foreach}
                </ul>
            </div>
        </div>


{foreach $loaitinright as $key => $value}
<!-- {if $value.sTenloaitin=='Video'}
     <div class="col-md-12 col-xs-12 tieuderight respon1">
        <div class="col-md-4 col-lg-4 col-xs-5 col-sm-4" style="padding-right: 0px">
            <span class="kedoc kd" style="background: {$value.sMau};"></span>
            <span class="tieude td">Video</span>
        </div>
        <div style="background: {$value.sMau};" class="col-lg-8 col-md-8 col-xs-7 col-sm-7 kengang kn"></div>
    </div>
    <div class="col-md-12 col-xs-12 respon1">
        <div class="col-md-12 col-xs-12 "><br>
            {foreach $value.ctiet as $key1 => $value1}
            {if $value.PK_iMaloaitin==$value1.FK_iMaloaitin}
                {if $tam==1}
                    {$tam=2}
                    <div class="col-md-12 col-xs-12 ">
                        <iframe id="vdeo" width="100%" src="{$value1.link}" frameborder="0" allowfullscreen></iframe><br>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="col-md-12 col-xs-12">
                {/if}
                            <i class="fa fa-youtube-play video" aria-hidden="true"></i>&nbsp;
                            <span class="tdvideo" value="{$value1.sNoidung}">{$value1.sTieude}</span>
                            <br>
            {/if}
            {/foreach}
                        </div>
                    </div>
        </div>
    </div>
    {else} -->
                <div class="col-md-12 col-xs-12 respon1" style="padding-top: 20px">
                    <div class="col-md-9 col-lg-8 col-xs-6 col-sm-6" style="padding-right: 0px">
                        <span class="kedoc kd" style="background: {$value.sMau};"></span>
                        <a href="{$url}{clean($value.sTenloaitin)}_{$value.PK_iMaloaitin}.html"><span class="tieude td">{$value.sTenloaitin}</span></a>
                    </div>
                    <div style="background: {$value.sMau};" class="col-lg-4 col-md-3 col-xs-6 col-sm-6 kengang kn"></div>
                </div>
                <div class="col-md-12 col-xs-12 dc respon1">
                {foreach $value.ctiet as $key1 => $value1}
                    {if $value.PK_iMaloaitin==$value1.FK_iMaloaitin}
                        <a href="{if ($value1.iLienket==0)}{$url}{$value1.sTieude_khongdau}_{$value1.PK_iMatin}.html {else}{$value1.sNoidung}{/if}">
                            <p class="list col-md-12">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;{$value1.sTieude}
                            </p>
                        </a><br class="hidden-xs hidden-sm">
                    {/if}
                {/foreach}
                </div>
   <!--  {/if} -->
{/foreach}


    
    <div class="fb col-md-12 col-xs-12">
        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FDaoTaoTuXahou&tabs&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=649670395229002" width="100%" height="196" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
    </div>
    <div class="tracuu col-md-12 col-xs-12">
        <span class="label label-info col-md-12 col-xs-12" style="font-size: 100%;"><a href="{$url}tracuudiem">Tra cứu điểm đào tạo từ xa</a></span>
    </div>
    <div class="fb col-md-12 col-xs-12">
    {if isset($quangcao)}
    {foreach $quangcao as $key =>$value}
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-top: 10px">
            <center>
            <a href="{$value.sNoidung}" class="thumbnail" target="_blank" style="width: 80%"><img src="{$url}files/{$value.sAnh}" width="100%" alt=""></a>
            </center>
        </div>
      
    {/foreach}
    {/if}
    
</div>
</div>
</section>
</div>




<style>
    @import url(https://fonts.googleapis.com/css?family=Signika:700,300,600);

    .ok11{ height: 100%; }
    .ok11{ display: flex; justify-content: center; align-items: center; margin:20px 0; text-align:center; overflow:hidden; }

    .ok1 {
        font-size:5em;
        font:bold 7.5vw/1.6 'Signika', sans-serif;
        user-select:none;
    }
    .ok1 i {
        font-size: 30px;
    }
    .ok1{
        margin-bottom: -35px;
        margin-top: -100px;
    }
    .ok1 > i { display:inline-block; animation:float .2s ease-in-out infinite; }
    @keyframes float {
        0%,100%{ transform:none; }
        33%{ transform:translateY(-1px) rotate(-2deg); }
        66%{ transform:translateY(1px) rotate(2deg); }
    }
    .ok1:hover i { animation:bounce .6s; }
    @keyframes bounce {
        0%,100%{ transform:translate(0); }
        25%{ transform:rotateX(20deg) translateY(2px) rotate(-3deg); }
        50%{ transform:translateY(-20px) rotate(3deg) scale(1.1);  }
    }

    .ok1 i:nth-child(4n) { color:#E20000; text-shadow:1px 1px #E20000, 2px 2px #BA0909, 3px 3px #BA0909, 4px 4px #BA0909; }
    .ok1 i:nth-child(4n-1) { color:#E20000; text-shadow:1px 1px #E20000, 2px 2px#E20000, 3px 3px #BA0909, 4px 4px #BA0909; }
    .ok1 i:nth-child(4n-2) { color:#E20000; text-shadow:1px 1px #E20000, 2px 2px #E20000, 3px 3px #BA0909, 4px 4px #BA0909; }
    .ok1 i:nth-child(4n-3) { color:#E20000; text-shadow:1px 1px #E20000, 2px 2px #BA0909, 3px 3px #BA0909, 4px 4px #BA0909; }

    .ok1 i:nth-child(2){ animation-delay:.05s; }
    .ok1 i:nth-child(3){ animation-delay:.1s; }
    .ok1 i:nth-child(4){ animation-delay:.15s; }
    .ok1 i:nth-child(5){ animation-delay:.2s; }
    .ok1 i:nth-child(6){ animation-delay:.25s; }
    .ok1 i:nth-child(7){ animation-delay:.3s; }
    .ok1 i:nth-child(8){ animation-delay:.35s; }
    .ok1 i:nth-child(9){ animation-delay:.4s; }
    .ok1 i:nth-child(10){ animation-delay:.5s; }
    .ok1 i:nth-child(11){ animation-delay:.55s; }
    .ok1 i:nth-child(12){ animation-delay:.6s; }
    .ok1 i:nth-child(13){ animation-delay:.65s; }
</style>

