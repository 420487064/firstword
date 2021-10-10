$(document).ready(function () {
	$('.tsbnmd').css({ "opacity": "1", "transform": "none" });

	$('.tsbnmd').click(function () {
		$('.main_zt').css("margin-left", "0px");

		$('.tsbnmd').css({ "opacity": "0", "transform": "scale(0)" });
	});

	$('.main_ll').click(function () {
		$('.main_zt').css("margin-left", "100%");
		$('.main_bn').css("margin-left", "0");
		$('.tsbnmd').css({ "opacity": "1", "transform": "none" });
	});
	$('.main_enter').click(function () {
		var a = -parseInt($(".main_zt").css('width'));
		//console.log(a);
	//	var b="../img/main_ll2.png";
		$('.main_ll').addClass('main_ll_img');
		$('.main_d_j1').addClass('main_dj1');
			$('.main_d_j2').addClass('main_dj2');
		$('.main_bn').stop().css("margin-left", a + 'px');
		;
	});
	
 $('.main_content').on('click','.main_mo div',function(){
         $(this).siblings('div').fadeToggle();
		// $(this).siblings('div').toggle();
		$('.')
 
 });
	
	
})