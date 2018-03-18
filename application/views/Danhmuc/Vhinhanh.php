<div class="col-md-12 col-xs-12" style="min-height: 700px;">
    <div class="col-md-6 col-xs-6">
        <div class="x_panel">
            <div class="x_title">
                <h2> Upload ảnh </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Upload ảnh</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Thư mục ảnh</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Xóa ảnh</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Chọn thư mục
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="form-control" name="thumuc" required="required">
                                            <option value="">---Chọn thư mục---</option>
                                            {foreach $thumuc as $key =>$value}
                                            <option value="{$value.sTenthumuc}">{$value.sTencodau}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Chọn ảnh
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input required="required" type="file" id="up_anh" name="userfile[]" multiple>
                                    </div>
                                    <img id="here"  width="100%" src="" alt="">
                                </div> <br>
                                <button type="submit"  name="themanh" class="btn btn-success" value="themanh" style="float: right;">Lưu</button>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <form class="form-horizontal form-label-left" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tên thư mục
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input required="required" type="text" name="newfolder" id="newfolder" class="form-control col-md-7 col-xs-12" value="">
                                    </div>
                                </div>
                                <button style="float: right;" id="luufolder" type="submit" name="folder" value="folder" class="btn btn-success">Lưu</button>
                            </form>
                            <table class="table-bordered table table-hover">
                                <thead>
                                    <th>Tên thư mục</th>
                                    <th>Tác vụ</th>
                                </thead>
                                <tbody>
                                {foreach $dsanh as $key => $value}
                                <tr>
                                    <td>{$value.sTencodau}</td>
                                    <td>
                                        <i value="{$value.PK_iMathumuc}" style="cursor: pointer;font-size: 18px; padding-right: 18px" data-toggle="tooltip" data-placement="top" title="Sửa" class="fa fa-pencil-square-o tool suatm" aria-hidden="true"></i>
                                        <a style="color: #676a6c" href="{$url}hinhanh?type=xoa&matm={$value.PK_iMathumuc}" title=""><i style="cursor: pointer;font-size: 18px;    color: #73879c;"  data-toggle="tooltip" data-placement="top" title="Xóa" class="fa fa-times tool" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                {/foreach}
                                </tbody>
                            </table>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <div class="form-group" style="    padding-bottom: 26px">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Chọn thư mục
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select class="form-control" name="thumucchon" required="required">
                                        <option value="">---Chọn thư mục---</option>
                                        {foreach $thumuc as $key =>$value}
                                        <option value="{$value.PK_iMathumuc}">{$value.sTencodau}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div id="listanh" class="form-group" style="padding-top: 15px">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-6">
        <div class="x_panel">
            <div class="x_title">
                <h2> Hình ảnh </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <script src="{$url}src/images-grid.js"></script>
                <link rel="stylesheet" href="{$url}src/images-grid.css">

                {foreach $dsanh as $key => $value}
                <div class="col-md-12 col-xs-12 canduoi" style="padding-top: 10px; margin-bottom: 10px">
                    <div class="col-md-4 col-xs-7 col-sm-6" style="padding-right: 0px; padding-left: 0px">
                        <span class="tieude" style="font-size: 18px"><i class="fa fa-folder-open" aria-hidden="true"></i> {$value.sTencodau}</span>
                    </div>
                    <div style="background: #F90667; margin-top: 13px" class="col-md-8 col-xs-5 col-sm-6 kengang"></div>
                </div>
                <div>
                </div>
                <div class="{$value.sTenthumuc}"></div>
                <script>
                    $('.{$value.sTenthumuc}').prev().imagesGrid({
                        images: [
                            {foreach $value.listimg as $key1 => $value1}
                    { src: 'files/{$value.sTenthumuc}/{$value1.sTenanh}'},

                    {/foreach}
                    ],
                    align: true
                    });
                </script>
                {/foreach}
            </div>

        </div>
    </div>