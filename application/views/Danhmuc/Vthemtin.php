<script src="{$url}ckeditor/ckeditor.js"></script>
<script src="{$url}ckfinder/ckfinder.js"></script>
<div class="col-md-12 col-xs-12">
	<div class="col-md-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title" style="font-size: 25px">
				{(isset($tinsua.PK_iMatin)) ? 'Sửa tin tức' : 'Thêm tin tức'}
			</div>
			<div class="clearfix"></div>
			<div class="x_content">
				<form action="{$url}themtin" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
					<div class="col-md-7 col-xs-7">
						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tieude">Tiêu đề</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="tieude" id="tieude" class="form-control col-md-7 col-xs-12" value="{(isset($tinsua.sTieude)) ? $tinsua.sTieude : NULL} ">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Loại tin</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="loaitin">
                          	<option value=""></option>
                          	  {foreach $loaitin as $key => $value}
                                    <option value="{$value.PK_iMaloaitin}" {(isset($tinsua.FK_iMaloaitin)) ? (($tinsua.FK_iMaloaitin==$value.PK_iMaloaitin) ? 'selected' : null) : null} >
                                        {$value.sTenloaitin}
                                    </option>
                                    {/foreach}
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sự kiện</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="sukien">
                          	<option value=""></option>
                          	{foreach $sukien as $key =>$value}
                          	<option value="{$value.PK_iMasukien}" {(isset($tinsua.FK_iSukien)) ? (($tinsua.FK_iSukien==$value.PK_iMasukien) ? 'selected' : null) :null }>{$value.sTensukien}</option>
                          	{/foreach}
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                          <div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="trangthai" style="padding: 0px">Trạng thái</label>
                              <div class="col-md-9 col-xs-9">
                                  <input type="radio" value="1" name="trangthai" class="flat" required="required" {(isset($tinsua.iTrangthai)) ? (($tinsua.iTrangthai==1) ? 'checked' : null ) : null} > Hiện
                                  <input type="radio" required="required" value="0" name="trangthai" class="flat" {(isset($tinsua.iTrangthai)) ? (($tinsua.iTrangthai==0) ? 'checked' : null ) : null}> Ẩn
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                            <div>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding: 0px">Liên kết trang</label>
                                <div class="col-md-9 col-xs-9 lienket">
                                    <input type="radio" value="1" id="colk" name="lienket" class="lienket" {(isset($tinsua.iLienket)) ? (($tinsua.iLienket==1) ? 'checked' : null ) : null}> Có liên kết trang
                                    <input type="radio" value="0" id="khonglk" name="lienket" class="lienket" {(isset($tinsua.iLienket)) ? (($tinsua.iLienket!=1) ? 'checked' : null ) : checked}> Không có liên kết trang
                                </div>
                            </div>
                        </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tomtat">Tóm tắt nội dung</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                              <textarea name="tomtat" id="tomtat" class="form-control" rows="5">{(isset($tinsua.sTomtatnoidung)) ? $tinsua.sTomtatnoidung : null}</textarea>
                          </div>
                      </div>
					</div>
					<div class="col-md-5 col-xs-5">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tags">Tags</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" name="tags" id="tags" class="form-control col-md-7 col-xs-12" value="{(isset($tinsua.sTags)) ? $tinsua.sTags : NULL} ">
                  <div class="vd">Nhập tags cho bài viết,các tags cách nhau bởi dấu phẩy. VD: hội thảo, sinh viên</div>
              </div>

            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mota">Mô tả</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                  <textarea name="mota" id="mota" class="form-control" rows="6">{(isset($tinsua.sMota)) ? $tinsua.sMota : null}</textarea>
              </div>
            </div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3" for="uploadanh" style="text-align: right; padding-bottom: 10px">Ảnh đại diện</label><br>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="file" id="uploadanh" name="userfile">
                <div class="vd">Cỡ ảnh phù hợp: 700x300(pixel)</div>
              </div>
              <br>
							<img id="blah" width="100%" src="{if (isset($tinsua.sAnhdaidien) && !empty($tinsua.sAnhdaidien))}{$url}files/{$tinsua.sAnhdaidien}{/if}">
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
                            <button style="margin-left: 150px;" type="submit" value="{(isset($tinsua.PK_iMatin)) ? $tinsua.PK_iMatin : 'upload'}" class="btn btn-success" name="{(isset($tinsua.PK_iMatin)) ? 'suatin' : 'luutin'}">{(isset($tinsua.PK_iMatin)) ? 'Sửa tin' : 'Lưu tin'}</button>
                            <label class="control-label col-md-12 col-sm-12 col-xs-12 left" for="noidung" style="text-align: left;">Nội dung</label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea name="noidung" rows="8" id="noidung" required="required" class="form-control">{(isset($tinsua.sNoidung)) ? $tinsua.sNoidung : null}</textarea>
                                {if (isset($tinsua.sNoidung))}
                                    <script>
                                        CKEDITOR.replace('noidung');
                                    </script>
                                {/if}
                            </div>
                        </div>
                    <script>
                        function replace() {
                            if ($("input[name='lienket']")[1].checked == true) {
                                $('label[for="noidung"]').html("Nội dung ");
                                CKEDITOR.replace('noidung');
                            }
                            else {
                                $('label[for="noidung"]').html("Liên kết: ");
                                $('#noidung').replaceWith('<input id="noidung" name="noidung" required class="form-control" value="{(isset($tinsua.sNoidung)) ? {$tinsua.sNoidung} : null}">');
                                $('#cke_noidung').hide();
                            }
                        }
                        $(document).ready(function(){
                            replace();
                            $(document).on('change','input[name="lienket"]',function(){
                                replace();
                            });
                        });
                    </script>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>