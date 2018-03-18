<div style="padding: 50px;">
    <div class="x_title">
        <h2 style="font-size: 20px;font-weight: bold;">Quản lý ảnh nền</h2>
        <div class="clearfix"></div>
    </div>
    <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
            <h4 class="col-md-10" style="margin-bottom: 20px;">Chọn ảnh nền</h4>
            <button type="submit" style="margin-left: 70px;" value="savebg" class="btn btn-success" name="savebg" disabled>Lưu ảnh</button>
            <div class="inputanh col-md-12">
                <h1> + + Click hoặc kéo thả ảnh + + </h1>
            </div>
            <input type="file" class="col-md-12 addimage" name="anhbg" id="anhbg">
            <div class="col-md-12">
                <img src='{$url}files/{$bg}' id="bg" name="bg" width="100%">
            </div>
        </form>
    </div>
</div>