(function($){  
	 $.dropdown = function(selector) {		
		$(selector.id).children("ul").addClass("dropdown");
		// 타이틀 색상
		$(selector.id).find("ul.dropdown>li:first-child").css("color",selector.titlecolor);
		// 아이탬 색상
		$(selector.id).find("ul.dropdown>li").not(".dropdown>li:first-child").find("a").css("color",selector.itemcolor);
		// 아이탬 배경색상
		$(selector.id).find("ul.dropdown").css("background-color","#959595");
		$(selector.id).find("ul.dropdown>li").find("ul li").css("background-color","#959595");

		$(selector.id).find("ul.dropdown>li:first-child").addClass("selected");
		$(selector.id).find("ul.dropdown>li").not(".dropdown>li:first-child").addClass("drop");		

		$(selector.id).find("ul.dropdown").click(function() {
			var subitems = $(this).find(".drop ul li");
			var selecteditem = $(this).find(".selected");
			var tmpColor = subitems.css("background-color");
			subitems.slideToggle("fast", function() {				
				subitems.click(function() {				
					var selection = $(this).text();
					selecteditem.text(selection).fadeOut(5, function() {
						if (jQuery.browser.msie) {
							$(this).fadeIn(100);
						} else {
							$(this).fadeIn(400);
						}
					});					
					$(selector.save_id).val(selection);
					$(this).css("background-color","#959595");
				});				
			});
			// 선택아이탬 색상
			
			$(this).find(".drop ul li").hover(function(){
				$(this).css("background-color", "#959595");
			},function(){
				$(this).css("background-color", "#959595");
			});
		});
	};  
})(jQuery); 
