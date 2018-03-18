<div style="padding: 50px;">
    <div class="x_title">
        <h2 style="font-size: 20px;font-weight: bold;">Quản lý ảnh banner</h2>
        <div class="clearfix"></div>
    </div>
    <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
            <h4 class="col-md-10" style="margin-bottom: 20px;">Chọn ảnh banner</h4>
            <button type="submit" style="margin-left: 70px;" value="savebanner" class="btn btn-success" name="savebanner" disabled>Lưu ảnh</button>
            <div class="inputanh col-md-12">
                <h1> + + Click hoặc kéo thả ảnh + + </h1>
            </div>
            <input class="col-md-12 addimage" type="file" name="anhbanner" id="anhbanner">
            <div class="col-md-12">
                <img src='{$url}files/{$banner}' id="banner" name="banner" width="100%">
            </div>
        </form>
    </div>
</div>