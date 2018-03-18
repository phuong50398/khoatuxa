{if $trangthai == 'timkiem'}
    <div class="col-md-12 col-xs-12 canduoi" style="padding-top: 10px">
        <div class="col-md-12 col-xs-12 col-sm-12" style="padding-right: 0px; padding-left: 0px">
            <span class="tieude">Tin tức với từ khóa "{$sTentags}"</span>
        </div>
        <div style="background: #F90667" class="col-md-12 col-xs-12 col-sm-12 kengang1"></div>
    </div>

    <div class="col-md-12 col-xs-12 col-sm-12 listtin value_ajx">
    <ul>
    {foreach $timkiem as $key => $listtin}
	    <li class="tin">
	        <a href="{$url}{$listtin.sTieude_khongdau}_{$listtin.PK_iMatin}.html">{$listtin.sTieude} </a>
	    </li>
    {/foreach}
    </ul>
    </div>
    {/if}