$(document).ready(function() {
	//nestable
    $('[name=sx]').click(function(event) {
        var s=$('.dd-item');
        var mang=[];

        for(var i=0; i<s.length ; i++ ){
            mang[i]=$(s[i]).attr('primarykey');
        }
        console.log(mang);
        $.ajax({
            url : location.href,
            type : "post",
            data : {
                'mang' : mang
            },
            success : function thuchien(giatri) {
                let rs = JSON.parse(giatri);

                if(rs>0){
                    success('Đã lưu thay đổi');
                } else {
                    error('Thất bại');
                }
            }
        });
    });

    $(document).on('change', '[name=chon]', function(event) {

     	var x = $(this).val();
     	$.ajax({
     		url : location.href,
     		type : "post",

     		data :{
     			'matl' : x
     		},
     		success : function (giatri) {
     			giatri=JSON.parse(giatri);
     			console.log(giatri);
     			html='';
     			s=giatri.length;

     			for(let i=0; i< s ; i++){
     				html+='<li class="dd-item" primarykey="'+giatri[i]['PK_iMaloaitin']+'" style="cursor: move" data-id="3">';
     				html+='<div class="dd-handle">';
     				html+=giatri[i]['sTenloaitin'];
     				html+='</div>';
     				html+='</li>';
     			}

     			$('.dd-list').html(html);
     			sapxep();
     		}
     	});
    });

    $(document).on('change', '[name=chonlt]', function(event){
     	var x = $(this).val();
     	$.ajax({
     		url : location.href,
     		type : "post",

     		data :{
     			'malt' : x
     		},
     		success : function (giatri) {
     			giatri=JSON.parse(giatri);
     			console.log(giatri);
     			html='';
     			s=giatri.length;

     			for(let i=0; i< s ; i++){
     				html+='<li class="dd-item" primarykey="'+giatri[i]['PK_iMatin']+'" style="cursor: move" data-id="3">';
     				html+='<div class="dd-handle">';
     				html+=giatri[i]['sTieude'];
     				html+='</div>';
     				html+='</li>';
     			}

     			$('.dd-list').html(html);
     			sapxep();
     		}
     	});
    });
});

function sapxep() {
    $('.dd').nestable({
        onDragStart: function (l, e) {
            // get type of dragged element
            var type = $(e).data('type');

            // based on type of dragged element add or remove no children class
            switch (type) {
                case 'type1':
                    // element of type1 can be child of type2 and type3
                    l.find("[data-type=type2]").removeClass('dd-nochildren');
                    l.find("[data-type=type3]").removeClass('dd-nochildren');
                    break;
                case 'type2':
                    // element of type2 cannot be child of type2 or type3
                    l.find("[data-type=type2]").addClass('dd-nochildren');
                    l.find("[data-type=type3]").addClass('dd-nochildren');
                    break;
                case 'type3':
                    // element of type3 cannot be child of type2 but can be child of type3
                    l.find("[data-type=type2]").addClass('dd-nochildren');
                    l.find("[data-type=type3]").removeClass('dd-nochildren');
                    break;
            }
        }
    });
}
