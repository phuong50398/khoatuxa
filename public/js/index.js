$(function(){
    $(document).on('mouseover','.tag-list',function(){
        $(this).addClass("change");
        $(document).on('mouseover','.youtube',function(){
            $(this).addClass("ytb");
        });
        $(document).on('mouseover','.google',function(){
            $(this).addClass("gg");
        });
    });
    $(document).on('mouseout','.tag-list',function(){
        $(this).removeClass("change");
        $(document).on('mouseout','.youtube',function(){
            $(this).removeClass("ytb");
        });
        $(document).on('mouseout','.google',function(){
            $(this).removeClass("gg");
        });
    });
    $("#jssor_1").mouseover(function(){
        $(".jssora05l,.jssora05r").addClass("arrowslide");
    });
    $("#jssor_1").mouseout(function(){
        $(".jssora05l,.jssora05r").removeClass("arrowslide");
    });

    $('.muiten').slideUp();
    $(window).scroll(function (event) {
        var vitri=$('body').scrollTop();
        if(vitri>=100){
            $('.muiten').slideDown();
        } else{
            $('.muiten').slideUp();
        }
    });

    $('.dautrang').click(function () {
        $('body').animate({scrollTop:0}, 1000);
        return false;
    });

    
});