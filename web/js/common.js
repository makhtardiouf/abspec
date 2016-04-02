	//메인 비쥬얼 슬라이드
	$(document).ready(function () {
			$('.bxslider').bxSlider({
			 auto: true,
			 autoHover:true,
			 speed:1000
				});
			});

//상단 배너 슬라이드
	$(document).ready(function() {
			$("#x_box").click(function() {
				$("#banner_wrap").slideUp('slow');
				});
			});

//서치_취급분야 선택
$(document).ready(function(){
    $("#lm_search_field #search_field_choice>li>a").click(function(){
        $(this).addClass("color");
    });
	 $("#lm_search_field #search_field_choice>li>a").click(function(){
        $("#lm_search_field #search_field_choice>li>a.color").removeClass("color");
		$(this).addClass("color");
		event.preventDefault();
    });
});

//지역 변호사 소개 
		$("#spec_two_area li a").click( function() {
			$(this).css(
			"background-color","#fff"
			);
			event.preventDefault();
			});


//드롭다운
	$(document).ready(function() {
		$.dropdown({
			id:"#select1",
			save_id:"#sel_1",
			titlecolor:"#ffffff",
			bgcolor:"#263b5a",
			itemcolor:"#ffffff",
			itembgcolor:"#06f"
		});
	});

//체크박스 2개이하 선택
function remain_two_obj(prefix){

	this.old = new Array();
	this.prefix = prefix;
	
	this.remain_two = function(cur){
	
		items = document.getElementsByName(this.prefix + '[]');
		for( i = 0, count = 0 ; i < items.length; i++ )
			if( items[i].checked )
				count++;
				
		if( count > 0 && cur.checked == false && this.old[0] == cur.value )
			this.old[0] = this.old[1];
			
		if( cur.checked == false )
			return;
			
		if( count < 2 )
			this.old[count] = cur.value;
			
		else {
			this.old[0] = this.old[1];
			this.old[1] = cur.value;
			
			items = document.getElementsByName(this.prefix + '[]');
			for( j = 0 ; j < items.length ; j++ ){
				if( items[j].value != this.old[0] && items[j].value != this.old[1] )
					items[j].checked = false;
			}
		}
	}
}

var cbox = new remain_two_obj('cbox');

