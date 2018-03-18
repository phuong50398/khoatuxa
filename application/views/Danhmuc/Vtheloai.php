<div class="clearfix"></div>
<div class="col-md-12 col-xs-12" style="margin-top: 50px">
    <div class="col-md-5 col-xs-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="">
                    <div class="x_title">
                        <h2 style="font-weight: 500" id="tieudesua">Thêm thể loại</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form id="demo-form2" method="post" data-parsley-validate class="form-horizontal form-label-left" action="">
                            <div class="form-group">
                                <label style="padding-left: 0px" class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên thể loại <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="tentl" required="required" class="form-control col-md-7 col-xs-12" name="tentheloai">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Trạng thái <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="trangthai" id="tttl">
                                        <option value="1">Không có menu con</option>
                                        <option value="0">Có menu con</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mã màu </label>
                                <div id="cp2" class="input-group colorpicker-component col-md-6 col-sm-6 col-xs-12" style="padding: 0px 14px">
                                    <input type="text" id="mau" name="mamau" value="#00AABB" class="form-control">
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success" value="themtheloai" name="themtheloai" id="suatheloai">Thêm</button>
                                    <button class="btn btn-primary" type="reset">Hủy</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7 col-xs-12">
        <div class="col-md-12 col-xs-12">
            <h2 style="font-weight: 600">Danh sách thể loại</h2><br>
            <table class="table table-hover table-bordered" style="text-align: center;">
                <thead>
                    <th style="text-align: center;">STT</th>
                    <th style="text-align: center;">Tên thể loại</th>
                    <th style="text-align: center;">Trạng thái</th>
                    <th style="text-align: center;">Màu sắc</th>
                    <th style="text-align: center;">Tác vụ</th>
                </thead>
                <tbody >
                {foreach $theloai as $key => $value}
                    <tr>
                        <td>{$stt++}</td>
                        <td style="text-align: left;">{$value.sTentheloai}</td>
                        <td>
                            {if $value.iTrangthai==0}
                            <span class="label label-success">Có menu con</span>
                            {else}
                            <span class="label label-warning">Không có menu con</span>
                            {/if}
                        </td>
                        <td style="text-align: left; background-color: {$value.sMau};"></td>
                        <td>
                            <i value="{$value.PK_iMatheloai}" data-toggle="tooltip" data-placement="top" title="Sửa" class="fa fa-pencil-square-o tool suatl buttonsua" aria-hidden="true"></i>
                            {if $value.soluong<=0}
                            <a style="color: #676a6c" href="{$url}theloai?type=xoa&matheloai={$value.PK_iMatheloai}" title=""><i style="cursor: pointer;font-size: 18px;    color: #73879c;"  data-toggle="tooltip" data-placement="top" title="Xóa thể loại" class="fa fa-times tool" aria-hidden="true"></i></a>
                            {/if}
                        </td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </div>
</div>