$(document).ready(function(){

$('.khoitl').slideUp();
    $(document).on('click', '.dong4 span',function () {
        $(this).children().toggleClass('quay');
        $(this).parent().next().slideToggle();
    });

    
    var url = location.origin;
    console.log(url);
    var rong = $(window).width();
    //code gui cau hoi
    $('#phanhoi').click(function(){
            $('#nenxam').addClass('hienra');
            $('#boxphanhoi').addClass('dixuong');
    });
    $('.close1').click(function(event) {
        $('#nenxam').removeClass('hienra');
            $('#boxphanhoi').removeClass('dixuong');
    });
    $('#nenxam').click(function(event) {
        $('#nenxam').removeClass('hienra');
        $('#boxphanhoi').removeClass('dixuong');
    });

    $('#frmcauhoi').submit(function(){
        
        $.ajax({
            url: url+"/cau-hoi.html",
            type: 'post',
            data: {'hoten': $('#ten').val(),
                    'sdt' : $('#sdt').val(),
                    'email' : $('#email').val(),
                    'noidung' :$('#nd').val()
            },
            success : function (value){
                if(value==1){
                    success('Câu hỏi của bạn đã được gửi đi!');
                } else{
                    error('Thất bại. Xin vui lòng gửi lại');
                }
                $('#nenxam').removeClass('hienra');
                $('#boxphanhoi').removeClass('dixuong');
            }
        });
        
        
        
        return false;
    });
   ///
    $(document).on('click', '.num', function (event) {
      
        x=$(this).attr('value');
        $('.num').removeClass('active1');
        $(this).addClass('active1');
        $.ajax({
            url: location,
            type : 'post',
            data: {'maloaitin': x},
            success: function (giatri) {
                giatri=JSON.parse(giatri);
                console.log(giatri);
                s=giatri.length;
                html='';
                for (var i = 0; i < s; i++) {
                    if(giatri[i]['sAnhdaidien']!=''){
                    html+='<div class="row" style="margin-bottom: 10px">';
                    html+='<div class="col-md-3 col-xs-4">';
                    html+='<img src="files/'+giatri[i]['sAnhdaidien']+'" width="100%" alt="">';
                    html+='</div>';
                    html+='<div class="col-md-9 col-xs-8">';
                    html+='<a href="'+url+'/'+giatri[i]['sTieude_khongdau']+'_'+giatri[i]['PK_iMatin']+'.html" title=""><b>'+giatri[i]['sTieude']+'</b></a><br>';
                    html+='<p>';
                    html+=giatri[i]['substr'];
                    html+='<p>';
                    html+='</div>';
                    html+='</div>';
                } else{
                    html+='<li class="tin">';
                    // html+='lll';
                    html+='<a href="'+url+'/'+giatri[i]['sTieude_khongdau']+'_'+giatri[i]['PK_iMatin']+'.html">'+giatri[i]['sTieude']+' </a>';
                    html+='</li>';
        
    
                    
                }
                $('.value_ajx').html(html);
                }
            }
        });
    });

    $(".tieude").parent().css('color','#333');
    $(".tieude").parent().mouseover().css('text-decoration','none');
    
    $('.tdvideo').click(function click_td() {
      
        $.ajax({
            url: url+"/",
            type: "post",
            data: {
                'ndvideo' : $(this).attr('value')
            },
            success: function thuchien(giatri) {
                 var i = giatri.substring(giatri.search('=')+1,giatri.length);
                // $('#vdeo').attr('src',giatri);
                $('#vdeo').attr('src','https://www.youtube.com/embed/' + i);
            }
        });
    });
    function resizeimg(rong) {
        var x = $('.anht1');
        var y = $('.anht2');
        var z = $('.anht3');
        var r = $('.anht4');
        if (rong >= 768) {
            for (let i=0;i<x.length;i++)
                x[i].height = 70;
            for (let i=0;i<y.length;i++)
                y[i].height = 70;
            for (let i=0;i<z.length;i++)
                z[i].height = 130;
            for (let i=0;i<r.length;i++)
                r[i].height = 130;
        }
        else if (rong >= 500){
            $('.anht2').parent().css('padding','0px');
            $('.anht2').parent().css('margin-top','10px');
            for (let i=0;i<y.length;i++)
                y[i].height = 55;
            for (let i=0;i<z.length;i++)
                z[i].height = 170;
            for (let i=0;i<r.length;i++)
                r[i].height = 100;
        }
        else if (rong >= 320){
            $('.anht2').parent().css('padding','0px');
            $('.anht2').parent().css('margin-top','10px');
            for (let i=0;i<y.length;i++)
                y[i].height = 55;
            for (let i=0;i<z.length;i++)
                z[i].height = 60;
            for (let i=0;i<r.length;i++)
                r[i].height = 80;
        }
        // var reh = $('.jsgiaoduc');
        // var max = reh[0].clientHeight;
        // for (let i=1;i<reh.length;i++)
        //     if (reh[i].clientHeight>max)
        //         max = reh[i].clientHeight;
        // for (let i=0;i<reh.length;i++){
        //     $('.jsgiaoduc').css('height',max);
        // }
    }
    resizeimg(rong);
    if (rong < 992) {
        $(".thongbao").insertAfter(".startslide");
        $(".thongbao").css('margin-bottom','20px');
    }
    $(window).resize(function(){
        var rong = $(window).width();
        resizeimg(rong);
        if (rong < 992) {
            $(".thongbao").insertAfter(".startslide");
            $(".thongbao").css('margin-bottom','20px');
        }
        if (rong >= 992){
            $(".thongbao").insertAfter("#thongbao");
            $(".thongbao").css('margin-bottom','0px');
        }
    });
    

    
});
