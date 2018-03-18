<div class="col-md-4 col-sm-4">
    <div class="x_title">
        <h2 style="font-weight: 500" id="tieudesua">Thêm quảng cáo</h2>
        <div class="clearfix"></div>
    </div>
    <br/>
    <form id="demo-form2" method="post" data-parsley-validate class="form-horizontal form-label-left" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label style="padding-left: 0px" class="control-label col-md-4 col-sm-4 col-xs-12" for="link">Liên kết <span class="required">*</span></label>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <input type="text" id="link" required="required" class="form-control col-md-7 col-xs-12" name="link">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ảnh </label>
            <div class="col-md-9 col-sm-9 col-xs-12" style="margin-top: 7px;">
                <input required="required" type="file" id="up_anh" name="ads">
            </div>
            <br>
            <img id="here" width="100%" src="" alt="">
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success" value="themads" name="themads" id="suaqc">Thêm</button>
                <button class="btn btn-primary" type="reset">Hủy</button>
            </div>
        </div>
    </form>
</div>
<div class="col-md-8 col-sm-8">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2 style="font-size: 20px;font-weight: bold;">Danh sách quảng cáo</h2>
                <div class="clearfix"></div>
            </div>
            {$stt=1}
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Liên kết</th>
                        <th>Tác vụ</th>
                    </thead>
                    <tbody>
                    {foreach $ads as $key => $value}
                    <tr>
                        <td>{$stt++}</td>
                        <td class="tieude" style="text-align: center;"><img src="{$url}files/{$value.sAnh}" style="width: 150px; height: 150px;"></td>
                        <td>{$value.sNoidung}</td>
                        <td>
                            <i value="{$value.PK_Maquangcao}" style="cursor: pointer;font-size: 18px; " data-toggle="tooltip" data-placement="top" title="Sửa quảng cáo" class="fa fa-pencil-square-o tool suaqc" aria-hidden="true" ></i>
                            <a style="color: #676a6c; padding-left: 18px" href="{$url}ads?delete={$value.PK_Maquangcao}" title=""><i style="cursor: pointer;font-size: 18px;    color: #73879c;"  data-toggle="tooltip" data-placement="top" title="Xóa quảng cáo" class="fa fa-times tool" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>