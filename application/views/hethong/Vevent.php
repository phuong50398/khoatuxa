<div class="col-md-4 col-sm-4">
    <div class="x_title">
        <h2 style="font-weight: 500" id="tieudesua">Thêm sự kiện</h2>
        <div class="clearfix"></div>
    </div>
    <br/>
    <form id="demo-form2" method="post" data-parsley-validate class="form-horizontal form-label-left" action="">
        <div class="form-group">
            <label style="padding-left: 0px;" class="control-label col-md-4 col-sm-4 col-xs-12" for="tensukien">Tên sự kiện <span class="required">*</span></label>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" id="tensukien" name="tensukien" value="">
            </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success" value="themsukien" name="themsukien" id="addevent">Thêm</button>
                <button class="btn btn-primary" type="reset">Hủy</button>
            </div>
        </div>
    </form>
</div>
<div class="col-md-8 col-sm-8">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2 style="font-size: 20px;font-weight: bold;">Danh sách sự kiện</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <th>STT</th>
                    <th>Tên sự kiện</th>
                    <th>Tác vụ</th>
                    </thead>
                    <tbody>
                    {foreach $sukien as $value}
                    <tr>
                        <td>{$stt++}</td>
                        <td style="text-align: left; padding-left: 15px;">{$value.sTensukien}</td>
                        <td>
                            <i value="{$value.PK_iMasukien}" style="cursor: pointer;font-size: 18px;" data-toggle="tooltip" data-placement="top" title="Sửa sự kiện" class="fa fa-pencil-square-o tool suask" aria-hidden="true" ></i>
                            {if $value.soluong<=0}
                            <a style="color: #676a6c; padding-left: 18px;" href="{$url}sukien?masukien={$value.PK_iMasukien}" title=""><i style="cursor: pointer;font-size: 18px;    color: #73879c;"  data-toggle="tooltip" data-placement="top" title="Xóa sự kiện" class="fa fa-times tool" aria-hidden="true"></i></a>
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