$(document).ready(function(){
    var url = $('base').attr('href');
    var rq = null;
    $(document).on("click","#checkUser",function () {
        var Username = $('#txtTentaikhoan').val();

        if(Username == "")
        {
            $('#error').css("color","red");
            $('#error').html("Tên tài khoản không được để trống");
        }
        else
        {
            if(rq != null)
            {
                rq.abort();
            }
            rq = $.ajax({
                type: 'GET',
                data: {'action': 'checkUser', 'Username': Username},
                url: url + "danhsachtaikhoan",
                success: function (data) {
                    var array = JSON.parse(data);
                    if (array == "true") {
                        $('#error').css("color", "green");
                        $('#error').html("Tên tài khoản có thể được sử dụng!");
                    }
                    else {
                        $('#error').css("color", "red");
                        $('#error').html("Tên tài khoản đã bị trùng, vui lòng chọn tên khác!");
                    }
                }
            })//end ajax
        }
    })

    var userLevel;

    $($('select[name="txtQuyen"]')).on('change',function(){
        userLevel = $(this).val();
        userLevel == 2 ? $('select[name="txtTinh"]').removeAttr('disabled'): $('select[name="txtTinh"]').attr('disabled', 'disabled').prop('selectedIndex',0);;
    });
});