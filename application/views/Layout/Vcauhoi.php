<div class="col-md-12 col-xs-12">
<div class="col-md-12 col-xs-12">


	<div class="row">
		<div class="col-md-12 col-xs-12 canduoi" style="padding-top: 10px">
	        <div class="col-md-12 col-xs-12 col-sm-12" style="padding-right: 0px; padding-left: 0px">
	          
	            <span class="tieude">Giải đáp thắc mắc</span>
	        </div>
	        <div style="background: #F90667" class="col-md-12 col-xs-12 col-sm-12 kengang1"></div>
    	</div>
	</div>
	
	

				{foreach $cauhoi as $key =>$value}
					<div class="row user1">
					{if empty($value.traloi)}
					<span class="label label-warning">Chưa trả lời</span>
					{else}
					<span class="label label-info">Đã trả lời</span>
					{/if}
						<div class="col-md-1 col-xs-3 col-sm-3">
							<img src="{$url}public/image/us.png" width="100%" alt="">
						</div>
						<div class="col-md-10 col-xs-9 col-sm-9">
							<div class="dong1">
								<b class="hoten">{$value.sHoten}</b>
								<!-- <span class="ngay">{date('d/m/Y',strtotime({$value.dNgayhoi}))}</span> -->
							</div>
							<span class="ngay">{date('d/m/Y',strtotime({$value.dNgayhoi}))}</span><br>
							<div class="dong3">
								<p>{$value.sNoidung}</p>
							</div>
							<div class="dong4">
								<span>Trả lời <i class="fa fa-angle-down" aria-hidden="true"></i></span>
							</div>
	
							<div class="khoitl">
							<div class="append">
								{foreach $value.traloi as $key1 => $value1}
								<div class="row">
								
									<div class="col-md-1 col-xs-3 col-sm-3">
										<img src="{$url}public/image/hou.png" width="100%" alt="">
									</div>
									<div class="col-md-8 col-xs-7 col-sm-7">
										<div class="dong1">
											<b class="hoten">Khoa đào tạo từ xa</b>
											<!-- <span class="ngay1 ngay">{date('d/m/Y',strtotime({$value1.sNgaytraloi}))}</span> -->
										</div>
										<span class="ngay1 ngay">{date('d/m/Y',strtotime({$value1.sNgaytraloi}))}</span><br>
										<div class="dong3">
											<p>{$value1.sNoidung}</p>
										</div>
										
									</div>
								</div>
								{/foreach}
								</div>
								
							</div>
						</div>
					</div>

				{/foreach}

                
            
            <nav aria-label="" class="text-right">
			  <ul class="pagination  pagination-sm">
			    {for $i=0; $i < $tong/10 ;$i++}
			    {if $i==0}
			    <li class="nut {if $start==$i} active {/if}"><a href="{$url}cau-hoi.html?trang={$i}">{$i+1} <span class="sr-only"></span></a></li>
			    {else}
			    <li class="nut {if $start==$i} active {/if}"><a href="{$url}cau-hoi.html?trang={$i}">{$i+1} <span class="sr-only"></span></a></li>
			    {/if}
			    {/for}
			  </ul>
			</nav>

</div>
</div>