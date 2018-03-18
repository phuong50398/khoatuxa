<div style="padding: 50px;">
    <div class="x_title">
        <h2 style="font-size: 20px;font-weight: bold;">Đổi mật khẩu</h2>
        <div class="clearfix"></div>
    </div>
    <div class="col-md-12" style="margin-top: 30px;">
        <form method='POST' action="" class="form-horizontal form-label-left">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label col-md-5" for="username">Tên đăng nhập: </label>
                    <div class="col-md-7">
                        <input class="form-control" type='text' value="{$session['user']}" name='username' id='username' disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5" for="password">Mật khẩu hiện tại: </label>
                    <div class="col-md-7">
                        <input class="form-control" type='password' name='password' id='password'>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="control-label col-md-5" for="newpass">Mật khẩu mới: </label>
                    <div class="col-md-7">
                        <input class="form-control" type='password' name='newpass' id='newpass'>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="control-label col-md-5" for="renewpass">Nhập lại mật khẩu mới: </label>
                    <div class="col-md-7">
                        <input class="form-control" type='password' name='renewpass' id='renewpass'>
                    </div>
                </div>
                <div class="col-md-12 button-themcb">
                    <button class='btn btn-success' type='submit' name='doimatkhau' ID='doimatkhau' value="{$session['macb']}" onclick="return checkmatkhau()">Xác nhận</button>
                    <button class='btn btn-primary' type='submit' name='huy' ID='huy' value='huy'>Huỷ</button>
                </div>
            </div>
        </form>
    </div>
</div>