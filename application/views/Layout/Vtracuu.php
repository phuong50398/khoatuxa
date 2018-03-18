    <style type="text/css">
        table{
            font-size: 14px;
            width: 100%;
        }
    </style>
    {if isset($uri)}
    <script type="text/javascript">
        // function filterdata(event) {
        //     var filter = new RegExp(event.val(),'i');
        //     var cols = event.closest('th').index();
        //     $("table tbody tr").filter(function(){
        //         if ($(this).index()==cols) {
        //             $(this).each(function () {
        //                 found = false;
        //                 $(this).each(function () {
        //                     content = $(this).html();
        //                     if (content.match(filter)) {
        //                         found = true;
        //                     }
        //                 });
        //                 if (!found) {
        //                     $(this).parent().hide();
        //                 }
        //                 else {
        //                     $(this).parent().show();
        //                 }
        //             });
        //         }
        //     });
        // }
        $(document).ready(function () {
            var result = JSON.stringify({$uri});
            var url = location.origin + '/tracuudiem';
            var html = '';
            res = JSON.parse(result);
            $.each(res, function (key, val) {
                html += '<tr>';
                html += '<td>' + (key+1) + '</td>';
                html += '<td>' + val.hoten_sv + '</td>';
                html += '<td>' + val.ngaysinh_sv + '</td>';
                html += '<td>' + val.gioitinh_sv + '</td>';
                html += '<td>' + val.dienthoai_sv + '</td>';
                html += '<td><a href="' + url + '?ma=' + val.ma_sv + '" class="xemchitiet">Chi tiết</a></td>';
                html += '</tr>';
            });
            $('#datatable-buttons tbody').html(html);
            // $(document).on('keyup','input[name=filter]',function(){
            //     var event = $(this);
            //     filterdata(event);
            // });
        });
    </script>
    {/if}
    {if isset($info)}
    <script type="text/javascript">
        $(document).ready(function () {
            var result = JSON.stringify({$info});
            var url = location.href;
            var html = '';
            res = JSON.parse(result);
            $.each(res, function (key, val) {
                html += '<tr><th style="width: 35%;">Họ và tên</th><td>' + val.ten_sv + '</td></tr>';
                html += '<tr><th>Ngày sinh</th><td>' + val.ngaysinh + '</td></tr>';
                html += '<tr><th>Lớp</th><td>' + val.lop + '</td></tr>';
                html += '<tr><th>Đơn vị</th><td>' + val.donvi + '</td></tr>';
                $.each(val.point, function (key2, value) {
                    html += '<tr><th>' + value.ten_mon + '</th><td>' + value.diem + '</td></tr>';
                    length = key2+1;
                });
            });
            $('#infostudent').html(html);
            if (length == 1)
            {
                html = '<div class="alert alert-danger" role="alert">Sinh viên chưa có điểm!!!</div>';
                $('#infostudent').after(html);
            }
        });
    </script>
    {/if}
    <form action="" method="post" enctype="multipart/form-data" style="margin-left: 10px;">
        <div class="input-group" style="margin-bottom: 10px;">
            <span class="input-group-addon" id="basic-addon3">Tra cứu điểm</span>
            <input type="text"  style="width: 85%;" name="tensv" id="tensv" class="form-control" placeholder="Nhập tên sinh viên..." aria-describedby="basic-addon3">
            <button type="submit" value="ok" name="search" class="btn btn-success">Tìm kiếm</button>
        </div>
    </form>
    {if (!empty($uri))}
        <div class="tieude">Danh sách sinh viên</div>
        <!-- <input type="text" name="filter" id="filter" placeholder="Lọc..."> -->
        <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>SĐT</th>
                <th style="width: 10%;">Tác vụ</th>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    {/if}
    {if (!empty($info))}
        <div class="tieude">Thông tin chi tiết</div>
        <table class="table table-bordered table-hover" id="infostudent">
        </table>
    {/if}