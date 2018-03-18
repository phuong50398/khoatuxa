<div style="padding: 50px;">
    <div class="x_title">
        <h2 style="font-size: 20px;font-weight: bold;">Thêm cán bộ</h2>
        <div class="clearfix"></div>
    </div>
    <div class="col-md-12">
        <form action="" method="post" class="form-horizontal form-label-left">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4" for="username">Tên đăng nhập <span class="required">*</span></label>
                    <div class="col-md-8">
                        <input id="username" name="username" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="password">Mật khẩu <span class="required">*</span></label>
                    <div class="col-md-8">
                        <input id="newpass" name="password" type="password" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="repassword">Nhập lại mật khẩu <span class="required">*</span></label>
                    <div class="col-md-8">
                        <input id="renewpass" name="repassword" type="password" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="quyen">Quyền <span class="required">*</span></label>
                    <div class="col-md-8">
                        <select class="form-control" name="quyen">
                            <option value="1">Admin</option>
                            <option value="2">Đăng bài</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-4" for="tencb">Họ và tên <span class="required">*</span></label>
                    <div class="col-md-8">
                        <input id="tencb" name="tencb" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="ngaysinh">Ngày sinh </label>
                    <div class="col-md-8">
                        <input id="ngaysinh" name="ngaysinh" type="date" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4">Giới tính </label>
                    <div class="col-md-8" style="padding-top: 8px;">
                        <input type='radio' name='gt' id='nam' value='Nam' checked>
                        <label for="nam">Nam</label>
                        <input type='radio' name='gt' id='nu' value='Nữ'>
                        <label for="nu">Nữ</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="sdt">Số điện thoại </label>
                    <div class="col-md-8">
                        <input id="sdt" name="sdt" type="text" class="form-control" maxlength="11">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="email">Email <span class="required">*</span></label>
                    <div class="col-md-8">
                        <input id="email" name="email" type="email" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col-md-12 button-themcb">
                <button type="submit" class="btn btn-success themcb" value="them" name="themcanbo" onclick="checkmatkhau()">Thêm</button>
                <button type="reset" class="btn btn-primary">Huỷ</button>
            </div>
        </form>
    </div>
</div>