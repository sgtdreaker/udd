$(function() {
	$('#gph_menu > li').bind('mouseenter',function(){
		var $elem = $(this);
		$elem.find('img')
			 .stop(true)
			 .animate({
				'width':'130px',
				'height':'170px',
				'left':'0px'
			 },400,'easeOutBack')
			 .andSelf()
			 .find('.gph_wrap')
			 .stop(true)
			 .animate({'top':'140px'},500,'easeOutBack')
			 .andSelf()
			 .find('.gph_active')
			 .stop(true)
			 .animate({'height':'170px'},300,function(){
			var $sub_menu = $elem.find('.gph_box');
			if($sub_menu.length){
				var left = '130px';
				if($elem.parent().children().length == $elem.index()+1)
					left = '-130px';
				$sub_menu.show().animate({'left':left},200);
			}	
		});
	}).bind('mouseleave',function(){
		var $elem = $(this);
		var $sub_menu = $elem.find('.gph_box');
		if($sub_menu.length)
			$sub_menu.hide().css('left','0px');
		
		$elem.find('.gph_active')
			 .stop(true)
			 .animate({'height':'0px'},300)
			 .andSelf().find('img')
			 .stop(true)
			 .animate({
				'width':'0px',
				'height':'0px',
				'left':'85px'},400)
			 .andSelf()
			 .find('.gph_wrap')
			 .stop(true)
			 .animate({'top':'25px'},500);
	});
});