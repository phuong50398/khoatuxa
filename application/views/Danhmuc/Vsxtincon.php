 <div class="col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title" style="font-size: 25px">
                Sắp xếp tin tức
            </div>
            <div class="clearfix"></div>
            <div class="x_content">
				<div class="form-group">
	            	<label style="padding-left: 0px; text-align: right;" class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Chọn loại tin <span class="required">*</span></label>
	            	<div class="col-md-5 col-sm-5 col-xs-12">
		                <select class="form-control" name="chonlt" id="ttlt">
		                    <option value="">-----Chọn loại tin-----</option>
		                    {foreach $loaitin as $key => $value}
		                    <option value="{$value.PK_iMaloaitin}">{$value.sTenloaitin}</option>
		                    {/foreach}
		                </select>
	            	</div>
        		</div>
            </div>
            <br>
            <div class="clearfix"></div>
            <div class="clearfix"></div>
            <div id="chosx" class="col-md-10 col-md-push-2">
            	<div class="dd">
            		<ol class="dd-list" style="margin-right: -30px">

            		</ol>
            	</div>
            	<center><button type="button" name="sx" class="btn btn-success" >Lưu</button></center>
            </div>
        </div>
    </div>
     <script src="{$url}public/js/sapxep.js"></script>