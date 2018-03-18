<div class="col-md-4 col-sm-4">
    <div class="x_title">
        <h2 style="font-weight: 500" id="tieudesua">Thêm loại tin</h2>
        <div class="clearfix"></div>
    </div>
    <br/>
    <form id="demo-form2" method="post" data-parsley-validate class="form-horizontal form-label-left" action="">
        <div class="form-group" style="display: none;">
            <label style="padding-left: 0px" class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name"></label>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <input type="text" id="malt"  class="form-control col-md-7 col-xs-12" name="maloaitin" value="">
            </div>
        </div>

        <div class="form-group">
            <label style="padding-left: 0px" class="control-label col-md-4 col-sm-4 col-xs-12" for="tenlt">Tên loại tin <span class="required">*</span></label>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <input type="text" id="tenlt" required="required" class="form-control col-md-7 col-xs-12" name="tenloaitin">
            </div>
        </div>
        <div class="form-group">
            <label style="padding-left: 0px" class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Tên thể loại <span class="required">*</span></label>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <select class="form-control" name="theloai" id="theloai">
                    {foreach $theloai as $key => $value}
                        <option value="{$value.PK_iMatheloai}">{$value.sTentheloai}</option>
                    {/foreach}
                </select>
            </div>
        </div>
        <div class="form-group">
            <label style="padding-left: 0px" class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Vị trí hiển thị <span class="required">*</span></label>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <select class="form-control" name="trangthai" id="ttlt">
                    <option value=""></option>
                    <option value="nav">Thanh menu con</option>
                    <option value="left">Menu trái</option>
                    <option value="right">Menu phải</option>
                </select>
            </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success" value="themloaitin" name="themloaitin" id="sua">Thêm</button>
                <button class="btn btn-primary" type="reset">Hủy</button>
            </div>
        </div>
    </form>
</div>
<div class="col-md-8 col-sm-8">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2 style="font-size: 20px;font-weight: bold;">Danh sách loại tin</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <th>STT</th>
                        <th>Tên loại tin</th>
                        <th>Tên thể loại</th>
                        <th>Vị trí</th>
                        <th>Tác vụ</th>
                    </thead>
                    <tbody>
                    {foreach $loaitin as $key => $value}
                    <tr>
                        <td>{$stt++}</td>
                        <td class="tieude">{$value.sTenloaitin}</td>
                        <td>{$value.sTentheloai}</td>
                        <td>
                            {if $value.sTrangthai=='nav'}
                            <span class="label label-success">Thanh menu con</span>
                            {elseif $value.sTrangthai=='left'}
                            <span class="label label-info">Thanh menu trái</span>
                            {else}
                            <span class="label label-primary">Thanh menu phải</span>
                            {/if}
                        </td>
                        <td>
                            <i value="{$value.PK_iMaloaitin}" style="cursor: pointer;font-size: 18px; " data-toggle="tooltip" data-placement="top" title="Sửa loại tin" class="fa fa-pencil-square-o tool sualt" aria-hidden="true" ></i>
                            {if $value.soluong<=0}
                            <a style="color: #676a6c; padding-left: 18px" href="{$url}loaitin?type=xoa&maloaitin={$value.PK_iMaloaitin}" title=""><i style="cursor: pointer;font-size: 18px;    color: #73879c;"  data-toggle="tooltip" data-placement="top" title="Xóa loại tin" class="fa fa-times tool" aria-hidden="true"></i></a>
                            {/if}
                        </td>
                    </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>