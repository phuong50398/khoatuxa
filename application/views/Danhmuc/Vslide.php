<div class="col-md-12 col-sm-12 ">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2 style="font-size: 20px;font-weight: bold;">Danh mục slide</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-4 col-sm-4">
                    <form action="" method="post">
                        {if !empty($tinslideId)}
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tiêu đề</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea name="tieude" id="" cols="30" rows="4" class="form-control" readonly="">{$tinslideId[0]['sTieude']}</textarea><br>
                            </div>
                        </div>
                        {else}
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tiêu đề</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" name="tintuc" required="">
                                    <option value="" disabled selected hidden>-- Tiêu đề slide --</option>
                                    {foreach $tintuc as $key => $value}
                                    <option value="{$value.PK_iMatin}">{$value.sTieude}</option>
                                    {/foreach}
                                </select><br>
                            </div>
                        </div>
                        {/if}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vị trí</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" name="slide" required="">
                                    <option value="" disabled selected hidden>-- Vị trí slide-- </option>
                                    {foreach $slide as $key => $value}
                                        {if !empty($tinslideId) && $tinslideId[0]['slide'] == $value}
                                        <option value="{$value}" selected="">{$value}</option>
                                        {else}
                                        <option value="{$value}">{$value}</option>
                                        {/if}
                                    {/foreach}
                                </select><br>
                            </div>
                        </div>
                        <div class="form-group" style="text-align: center;">
                            <button type="submit" class="btn btn-success" name="{$btn_name}" value="{$btn_value}">Lưu</button>
                            {if !empty($tinslideId)}
                            <a href="{$url}slide" class="btn btn-default pull-right">Quay lại</a>
                            {/if}
                        </div>
                    </form>
                </div>
                <div class="col-md-8 col-sm-8">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Ngày đăng</th>
<!--                            <th>Trạng thái</th>-->
                            <th>Slide</th>
                            <th>Tác vụ</th>
                        </thead>
                        <tbody>
                            {foreach $tinslide as $key => $value}
                            <tr>
                                <td>{$key+1}</td>
                                <td class="tieude">{$value.sTieude}</td>
                                <td>{date('d/m/Y',strtotime($value.dNgaydang))}</td>
<!--                                <td style="text-align: center;">{if $value.iTrangthai==0 } <span class="label label-danger">Ẩn</span> {else} <span class="label label-success">Hiện</span> {/if}</td>-->
                                <td class="text-center">{$value.iSlide}</td>
                                <td class="text-center">
                                    <a href="{$url}slide?sua={$value.PK_iMatin}" id="suaslide" title="">
                                        <i value="{$value.PK_iMatin}" style="cursor: pointer;font-size: 18px;" data-toggle="tooltip" data-placement="top" title="Sửa tin" class="fa fa-pencil-square-o tool sualt" aria-hidden="true" ></i>
                                    </a>
                                    <a style="color: #676a6c" href="{$url}slide?xoa={$value.PK_iMatin}" title=""><i style="cursor: pointer;font-size: 18px;    color: #73879c;"  data-toggle="tooltip" data-placement="top" title="Xóa slide" onclick="return confirm('Xác nhận xóa slide ?')" class="fa fa-times tool" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            {/foreach}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>