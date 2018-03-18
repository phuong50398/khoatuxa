<div class="col-md-12 col-sm-12 ">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <a href="{$url}themtin" title=""><button type="button" class="btn btn-primary" style="float: right;">Thêm tin</button></a>
            <div class="x_title">
                <h2 style="font-size: 20px;font-weight: bold;">Danh sách tin tức</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <th>STT</th>
                        <th>Tên loại tin</th>
                        <th>Tiêu đề</th>
                        <th>Ngày đăng</th>
                        <th>Trạng thái</th>
                        <th>Tác vụ</th>
                    </thead>
                    <tbody>
                    {foreach $tintuc as $key => $value}
                        <tr>
                            <td>{$stt++}</td>
                            <td class="tieude">{$value.sTenloaitin}</td>
                            <td class="tieude">{$value.sTieude}</td>
                            <td>{date('d/m/Y',strtotime($value.dNgaydang))}</td>
                            <td style="text-align: center;">{if $value.iTrangthai==0 } <span class="label label-danger">Ẩn</span> {else} <span class="label label-success">Hiện</span> {/if}

                            </td>
                            <td class="tacvu">
                                <a href="{$url}themtin?type=sua&matin={$value.PK_iMatin}" title="">
                                    <i value="{$value.PK_iMatin}" style="cursor: pointer;font-size: 18px; padding-right: 18px" data-toggle="tooltip" data-placement="top" title="Sửa tin" class="fa fa-pencil-square-o tool sualt" aria-hidden="true" ></i>
                                </a>
                                <a style="color: #676a6c" href="{$url}danhsachtin?type=xoa&matin={$value.PK_iMatin}" title=""><i style="cursor: pointer;font-size: 18px;    color: #73879c;"  data-toggle="tooltip" data-placement="top" title="Xóa tin" class="fa fa-times tool" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>