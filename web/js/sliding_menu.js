$(document).ready(function(){
	var headArea ='#lsl_top_menu_wrap'; //상단 헤더
	var gnbArea ='#lsl_top_menu'; // 메인 메뉴 
	var submenuArea='#submenu1'; // 서브메뉴
	var downSpeed = 300; //서브메뉴 내려가는 속도(ms)
	var upSpeed = 600; //서브메뉴 올라가는 속도(ms)
	var subYmin = $(headArea).outerHeight()-$(submenuArea).outerHeight();
	var subYmax = $(headArea).outerHeight();
	var trgSnbEl = $(submenuArea);
	$(gnbArea).on('mouseenter',function(){subMove(subYmax,downSpeed);});	
	$(gnbArea).on('mouseleave',function(){subMove(subYmin,upSpeed);});
	trgSnbEl.on('mouseenter',function(){subMove(subYmax,downSpeed);});
	trgSnbEl.on('mouseleave',function(){subMove(subYmin,upSpeed);});
	function subMove(trgY,speed){
		trgSnbEl.stop().animate({'top':trgY+'px'},speed);
	};
});
