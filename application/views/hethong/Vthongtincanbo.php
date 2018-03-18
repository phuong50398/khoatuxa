<div style="padding: 50px;">
    <div class="x_title">
        <h2 style="font-size: 20px;font-weight: bold;">Danh sách cán bộ</h2>
        <div class="clearfix"></div>
    </div>
    <table id="datatable-buttons" class="table table-striped table-bordered" style="width: 100%;">
        <thead>
            <td>STT</td>
            <td>Tên cán bộ</td>
            <td>Ngày sinh</td>
            <td>Giới tính</td>
            <td>Số điện thoại</td>
            <td>Email</td>
            <td>Tác vụ</td>
        </thead>
        <tbody>
            {foreach $thongtin as $val}
            <tr>
                <td>{$stt++}</td>
                <td>{$val.sTencanbo}</td>
                <td>{date('d/m/Y',strtotime($val.dNgaysinh))}</td>
                <td>{$val.sGioitinh}</td>
                <td>{$val.sSdt}</td>
                <td>{$val.sEmail}</td>
                <td>
                    <form action="" method="post">
                        <i value="{$val.PK_iMacanbo}" data-toggle="modal" data-target="#myModal" title="{if ($session['maquyen']==1)}Sửa{else}Xem{/if}" class="fa fa-pencil-square-o tool suatt buttonsua" aria-hidden="true"></i>
                        {if ($session['maquyen']==1)}
                        <button title="Xoá" class="buttonxoa" name="delete" type="submit" value="{$val.PK_iMacanbo}" onclick="return confirm('Bạn chắc chăn muốn xoá cán bộ?');"><i data-toggle="tooltip" title="Xóa" class="fa fa-times tool" aria-hidden="true"></i></button>
                        {/if}
                    </form>
                </td>
            </tr>
            {/foreach}
        </tbody>
    </table>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thông tin cá nhân</h4>
                </div>
            <form action="" method="post" class="form-group">
                <div class="modal-body">
                        <label for="tencb">Họ và tên: </label>
                        <input id="tencb" name="tencb" type="text" class="form-control" required><br>
                        <label for="ngaysinh">Ngày sinh: </label>
                        <input id="ngaysinh" name="ngaysinh" type="date" class="form-control"><br>
                        <label>Giới tính: </label>
                        <input type='radio' name='gt' id='nam' value='Nam'>
                        <label for="nam">Nam</label>
                        <input type='radio' name='gt' id='nu' value='Nữ'>
                        <label for="nu">Nữ</label><br><br>
                        <label for="sdt">Số điện thoại: </label>
                        <input id="sdt" name="sdt" type="text" class="form-control" maxlength="11"><br>
                        <label for="email">Email: </label>
                        <input id="email" name="email" type="email" class="form-control" required>
                   
                </div>

                <div class="modal-footer">
                        {if ($session['maquyen']==1)}
                        <button id="suattcb" style="margin-bottom: 5px;" type="submit" class="btn btn-warning suacb" name="suattcb">Sửa</button>
                        {/if}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Huỷ</button>
                    
                </div>
            </form>
            </div>

        </div>
    </div>
</div>