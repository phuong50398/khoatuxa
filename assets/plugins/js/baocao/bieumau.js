/**
* Created by Minh DUy on 9/14/2016.
*/
$(document).ready(function () {
    // tính tỷ giá quy đổi
    $("input[name='ODA_USD[]']").change(function () {
        var tygia = parseInt($('input[name=tygia]').val());
        $('#tableId tbody tr').each(function() {
           var ODA_USD = ($(this).find('input[name^=ODA_USD]').val());
            var Tong = tygia*ODA_USD;
            //alert(Tong)
            $("input[name='ODA_VND[]']").val(Tong);
        });
        // var ODA = $("input[name='ODA_USD[]']").val();
        // var Tong1 = tygia*ODA;
        // $("input[name='ODA_VND[]']").val(Tong1);

    });
    $("#tableId tbody tr .one").change(function () {
        var tygia = parseInt($('input[name=tygia]').val());
        var ODA = ($(this).find('input[name^=ODA_USD]').val());
        var Tong1 = tygia*ODA;
        $(".ODA_VND1").val(Tong1);
    });
$('#nam').addClass('hidden');
testYear();
});
/** Kiem tra nam bat dau phai nho hon nam ket thuc */
function testYear() {
    $("select[name=nambd],select[name=namkt]").change(function () {
     var nambatdau = $("select[name=nambd]").val();
     var namketthuc = $("select[name=namkt]").val();
     var nam = $("select[name='nam[]']").val();
     //alert(nam);
     //kiem tra ngay
     if(nambatdau > namketthuc){
            $("#nam").html("<i class='text-danger'>Năm bắt đầu phải nhỏ hơn năm kết thúc!</i>");
            $('button[name=submit]').addClass('disabled');
            $('#nam').removeClass('hidden');
         //(1);
     }else {
            $("#nam").html("");
            $('button[name=submit]').removeClass('disabled');
            $('#nam').addClass('hidden');
     }
     $("select[name='nam[]']").val(nambatdau);

 });
    $("select[name='nam[]']").change(function () {
        $(this).val() < $("select[name=nambd]").val()
            ?
        $('button[name=submit]').addClass('disabled') && $(this).addClass('text-danger')
            :
        $('button[name=submit]').removeClass('disabled') && $(this).removeClass('text-danger');
    });
}


