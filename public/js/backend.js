$(function() {
    var bien;
    $('.khoitl').slideUp();
    $(document).on('click', '.dong4 span',function () {
        $(this).children().toggleClass('quay');
        $(this).parent().next().slideToggle();
    });
    $(document).on('click', '.btntraloi', function(event) {
        noidung=$(this).parent().prev().find('.txttraloi').val();
        id=$(this).attr('id');
        var isclick=$(this);
       var html='';
       if(noidung!=''){
            $.ajax({
            url: location.href,
            type: 'post',
            data: {'noidung': noidung, 'id' : id},
            success: function(value) {
                var d= new Date();
                ngay=d.getDate();
                if(ngay<10){
                    ngay='0'+ngay;
                }
                thang=d.getMonth()+1;
                if(thang<10){
                    thang='0'+thang;
                }
                            html+='<div class="row" style="display: none">';
                            html+='<span class="xoatl" value='+value+'><i class="fa fa-times" data-toggle="tooltip" data-placement="top"  aria-hidden="true"></i></span>';
                            html+='<div class="col-md-1 col-xs-3">';
                            html+='<img src="'+location.origin+'/public/image/hou.png" width="140%" alt="">';
                            html+='</div>';
                            html+='<div class="col-md-8 col-xs-7">';
                            html+='<div class="dong1">';
                            html+='<b class="hoten">Khoa đào tạo từ xa</b>';
                            html+='<span class="ngay">'+ngay+'/'+thang+'/'+d.getFullYear()+'</span>';
                            html+='</div>';
                            html+='<div class="dong3">';
                            html+='<p>'+noidung+'</p>';
                            html+='</div>';
                            html+='</div>';
                            html+='</div>';
                $(html).appendTo(isclick.parent().parent().prev()).fadeIn('slow');
                // $(this).parent().parent().prev().append(html);
                isclick.parent().prev().find('.txttraloi').val('');
                isclick.parent().parent().parent().parent().parent().find('.label.label-warning').attr('class','label label-info');
                isclick.parent().parent().parent().parent().parent().find('.label.label-info').html('Đã trả lời');
                isclick.parent().parent().parent().parent().parent().find('.xoach').css('visibility', 'hidden');
            }

        });

        

        $('.xoatl').hide();
        $('.append>.row').mouseover(function() {
        $(this).find('.xoatl').show();
        });
        $('.append>.row').mouseleave(function() {
            $(this).find('.xoatl').hide();
        });
       }
        
    });
    $('.xoatl,.xoach').hide();
    $('.append>.row').mouseover(function() {
        $(this).find('.xoatl').show();
    });
    $('.append>.row').mouseleave(function() {
        $(this).find('.xoatl').hide();
    });

    $('.xoach').parent().mouseover(function() {
        $(this).find('.xoach').show();
    });
    $('.xoach').parent().mouseleave(function() {
        $(this).find('.xoach').hide();
    });



    $(document).on('click', '.xoatl', function() {
        matraloi=$(this).attr('value');
        var isclick=$(this);
        console.log(isclick);
        $.ajax({
            url: location.href,
            type: 'post',
            data: {'matraloi': matraloi},
            success : function(kq) {
             
                if(kq>0){
                   success("Xóa thành công!");
                    isclick.parent().hide(500);
                    // $(this).parents(5).find('.xoach').css('visibility', 'hidden');
                }
                if(kq==2){
                    
                    isclick.parent().parent().parent().parent().parent().find('.label.label-info').attr('class','label label-warning');
                    isclick.parent().parent().parent().parent().parent().find('.label.label-warning').html('Chưa trả lời');
                    isclick.parent().parent().parent().parent().parent().find('.xoach').css('visibility', 'visible');
                }
            }

        });
        // alert(kq);
        
        // $(this).parent().hide(500);
        
    });
     $(document).on('click', '.xoach', function(event) {
        macauhoi=$(this).attr('value');
        var isclick=$(this);
        $.ajax({
            url: location.href,
            type: 'post',
            data: {'macauhoi': macauhoi},
            success : function(kq) {
             if(kq==1){
               success("Xóa thành công!");
                isclick.parent().hide(500);
            }
                
            }
        });
        
        
    });

     //qc
     $('.suaqc').click(function sua_ajax() {
        $.ajax({
            url: location.href,
            type: "post",
            data: {
                masuaqc: $(this).attr('value')
            },
            success: function kq_sua(value) {
                var ketquasua=JSON.parse(value);
                $('#suaqc').html('Cập nhật');
                $('#link').val(ketquasua['sNoidung']);
                $('#here').attr('src',location.origin+'/files/'+ketquasua['sAnh']);
                $('#suaqc').attr('name','suaqc');
                $('#suaqc').attr('value',ketquasua['PK_Maquangcao']);
                $('#up_anh').removeAttr('required');
            }
        });
    });
});
//end

function checkmatkhau() {
    let newpass = $('#newpass').val();
    let renewpass = $('#renewpass').val();
    if (newpass != renewpass) {
        alert('Mật khẩu nhập lại không chính xác');
    }
    else
        return true;
    return false;
}
$(function() {
    $('#cp2').colorpicker();
});
$(document).ready(function(){
    var url = location.href;
    function readURL(input,doianh) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(doianh).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).on('change','#dm_anh',function(){
        $('#thayanh').removeAttr('disabled');
        readURL(this,'#anhsua');
        console.dir(this.files[0].name);
    });
    $(document).on('change','#anhbanner',function(){
        $('button[name="savebanner"]').removeAttr('disabled');
        readURL(this,'#banner');
        console.dir(this.files[0].name);
    });
    $(document).on('change','#anhbg',function(){
        $('button[name="savebg"]').removeAttr('disabled');
        readURL(this,'#bg');
        console.dir(this.files[0].name);
    });
    $(document).on('change','#themanh',function(){
        $('button[name="them"]').click() = true;
    });
    $('.form-anh').hide();
    $(document).on('mouseout','.divanh',function(){
        $(this).find('.form-anh').hide();
    });
    $(document).on('mouseover','.divanh',function(){
        $(this).find('.form-anh').show();
    });
    $('.suaanh').click(function(){
        // alert(url); return false;
        $.ajax({
            type: "post",
            data: {
                ma_anh: $(this).attr('value')
            },
            url: url,
            success: function kq_sua(value) {
                var ketquasua=JSON.parse(value);
                $('#anhsua').attr('src',"http://ffcteam.com/tienganh/files/"+ketquasua['sTenanh']);
                $('#thayanh').val(ketquasua['iMaanh']);
            }
        });
    });
    $('.sualt').click(function sualt_ajax(){
        $.ajax({
            url: url,
            type:"post",
            data: {
                'ma_sua': $(this).attr('value')
            },
            success: function kqsua(value) {
                var kqsua=JSON.parse(value);
                $('#sua').html('Sửa');
                $('#sua').attr('name','sualoaitin');
                $('#sua').attr('value',kqsua['PK_iMaloaitin']);
                $('#tenlt').attr('value',kqsua['sTenloaitin']);
                $('#theloai').val(kqsua['FK_iMatheloai']);
                $('#ttlt').val(kqsua['sTrangthai']);
            }
        });
    });
    $('.suatl').click(function sua_ajax() {
        $.ajax({
            url: url,
            type: "post",
            data: {
                ma_sua: $(this).attr('value'),
            },
            success: function kq_sua(value) {
                var ketquasua=JSON.parse(value);
                $('#tieudesua').html('Sửa thể loại');
                $('#tentl').val(ketquasua['sTentheloai']);
                $('#tttl').val(ketquasua['iTrangthai']);
                $('#mau').val(ketquasua['sMau']);
                $('#suatheloai').html('Sửa');
                $('#suatheloai').attr('name','suatheloai');
                $('#suatheloai').attr('value',ketquasua['PK_iMatheloai']);
            }
        });
    });
    $("#uploadanh").change(function(){
        $('#blah').show();
        readURL(this,'#blah');
        console.dir(this.files[0].name);
    });
    $('.suatt').click(function() {
        $.ajax({
            type: "post",
            data: {
                ma_sua: $(this).attr('value')
            },
            url: url,
            success: function kq_sua(value) {
                var ketquasua=JSON.parse(value);
                $('#tencb').val(ketquasua['sTencanbo']);
                $('#ngaysinh').val(ketquasua['dNgaysinh']);
                if (ketquasua['sGioitinh']=="Nữ")
                    $('#nu').attr('checked','true');
                else
                    $('#nam').attr('checked','true');
                $('#sdt').val(ketquasua['sSdt']);
                $('#email').val(ketquasua['sEmail']);
                $('#suattcb').val(ketquasua['PK_iMacanbo']);
            }
        });
    });
    $('#suattcb').click(function() {
        $.ajax({
            type: "post",
            data: {
                suattcb:    $(this).val(),
                tencb:      $('#tencb').val(),
                ngaysinh:   $('#ngaysinh').val(),
                gt:         $("input[name='gt']").val(),
                sdt:        $('#sdt').val(),
                email:      $('#email').val()
            },
            url: url,
            success: location.reload()
        });
    });
    $("#up_anh").change(function(){
        readURL(this,'#here');
        console.dir(this.files[0].name);
    });
    $(document).on('click','.suatm',function() {
        $.ajax({
            url: url,
            type: "post",
            data: {
                'folder_sua' : $(this).attr('value')
            },
            success: function sua_folder(giatri) {
                giatri=JSON.parse(giatri);
                $('#luufolder').html('Sửa');
                $('#luufolder').val(giatri['PK_iMathumuc']);
                $('#luufolder').attr('name','sua_folder');
                $('#newfolder').val(giatri['sTencodau']);
            }
        });
    });

    $(document).on('change','select[name="thumucchon"]',function xoafile() {
        $.ajax({
            url : url,
            type : "post",
            data: {
                'ajaxfile' : $(this).val()
            },
            success : function(giatri) {
                giatri=$.parseJSON(giatri);
                let html='';
                var k=0;
                var dem = 1;
                for (let i=0 ; i<giatri.length ; i++){
                    if(i%4==0)
                        html+='<div class="row">';
                    html+='<div class="col-md-3 col-xs-3">';
                    html+='<img class="anh" src="files/'+giatri[i]['sTenthumuc']+'/'+giatri[i]['sTenanh']+'" width="100%" alt="">';
                    html+='<span class="nutxoa"><a href="hinhanh?mafile='+giatri[i]['iMaanh']+'"><i class="fa fa-times" aria-hidden="true"></i></a></span>'
                    html+='</div>';
                    if(dem%4==0)
                        html+='</div>';
                    dem=dem+1;
                }
                $('#listanh').html(html);
            }
        });
    });
    $('.suask').click(function(){
        $.ajax({
            url: url,
            type:"post",
            data: {
                'masua': $(this).attr('value')
            },
            success: function kqsua(value){
                var kqsua=JSON.parse(value);
                $('#addevent').html('Sửa');
                $('#addevent').attr('name','suasukien');
                $('#addevent').attr('value',kqsua['PK_iMasukien']);
                $('#tensukien').attr('value',kqsua['sTensukien']);
            }
        });
    });
    $(document).on('click', '#suaslide', function() {
        $('select[name="tintuc"]').attr('disabled', 'disabled');
    });
});