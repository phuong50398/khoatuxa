
<div class="col-md-12 col-sm-12">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2 style="font-size: 20px;font-weight: bold;">Danh sách câu hỏi</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

				{foreach $cauhoi as $key =>$value}
					<div class="row user1">
					{if empty($value.traloi)}
					<span class="label label-warning">Chưa trả lời</span>
					
					<span class="xoach" value="{$value.PK_iMacauhoi}"><i  class="fa fa-times" data-toggle="tooltip" data-placement="top" title="Xóa" aria-hidden="true"></i></span>
					{else}
					<span class="xoach" style="visibility: hidden;" value="{$value.PK_iMacauhoi}"><i  class="fa fa-times" data-toggle="tooltip" data-placement="top" title="Xóa" aria-hidden="true"></i></span>
					<span class="label label-info">Đã trả lời</span>
					{/if}
						<div class="col-md-1 col-xs-3">
							<img src="{$url}public/image/us.png" width="100%" alt="">
						</div>
						<div class="col-md-10 col-xs-9">
							<div class="dong1">
								<b class="hoten">{$value.sHoten}</b>
								<span class="ngay">{date('d/m/Y',strtotime({$value.dNgayhoi}))}</span>
							</div>
							<div class="dong2">
								<span><i class="fa fa-phone" aria-hidden="true"></i> {$value.sSdt}</span> 
								{if !empty($value.sEmail)}
								<span><i class="fa fa-envelope-o" aria-hidden="true"></i> {$value.sEmail}</span>
								{/if}
							</div>
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
								<span class="xoatl" value="{$value1.PK_Matraloi}"><i  class="fa fa-times" data-toggle="tooltip" data-placement="top" title="Xóa" aria-hidden="true"></i></span>
									<div class="col-md-1 col-xs-3">
										<img src="{$url}public/image/hou.png" width="140%" alt="">
									</div>
									<div class="col-md-8 col-xs-7">
										<div class="dong1">
											<b class="hoten">Khoa đào tạo từ xa</b>
											<span class="ngay">{date('d/m/Y',strtotime({$value1.sNgaytraloi}))}</span>
										</div>
										<div class="dong3">
											<p>{$value1.sNoidung}</p>
										</div>
										
									</div>
								</div>
								{/foreach}
								</div>
								<div class="col-md-8 col-xs-12">
									<div class="texttl">
										<textarea name="txttraloi" id="" class="form-control txttraloi" rows="5"></textarea>
									</div>
									<div class="nuttl">
										<button type="button"  id="{$value.PK_iMacauhoi}" class="btn btn-warning btntraloi">Trả lời</button>
									</div>
								</div>
							</div>
						</div>
					</div>

				{/foreach}

                
            </div>
            <nav aria-label="" class="text-right">
			  <ul class="pagination">
			    {for $i=0; $i < $tong/5 ;$i++}
			    {if $i==0}
			    <li class="nut {if $start==$i} active {/if}"><a href="{$url}dscauhoi?trang={$i}">{$i+1} <span class="sr-only"></span></a></li>
			    {else}
			    <li class="nut {if $start==$i} active {/if}"><a href="{$url}dscauhoi?trang={$i}">{$i+1} <span class="sr-only"></span></a></li>
			    {/if}
			    {/for}
			  </ul>
			</nav>
        </div>
    </div>


</div>