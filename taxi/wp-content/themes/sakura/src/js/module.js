$(function(){
	/*================================================
	back to top
	================================================*/
	$('.scroll-to-top').hide();
	$(window).scroll(function () {
		if ($(this).scrollTop() > 500) {
			$('.scroll-to-top').fadeIn();
		}else{
			$('.scroll-to-top').fadeOut();
		}
	});
	$('.scroll-to-top').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 200);
		return false;
	});

	/*================================================
	スマホヘッダー、フッター調整
	================================================*/
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('.visible-xs h1').fadeOut();
		}else{
			$('.visible-xs h1').fadeIn();
		}
	});

$('.navbar-collapse a').click(function() {
	$(this).parents('.navbar-collapse').removeClass('in');
	$('.navbar-header button').removeClass('collapsed');
			console.log('clicked');
})


	/*================================================
	page link scroll
	================================================*/
	$('a[href*="#"]:not([href="#"])').click(function(){
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $("[name=' + this.hash.slice(1) +']");
			if (target.length){
				var headerHeight = $('.navbar').height(); //固定ヘッダーの高さ
				var position = target.offset().top - headerHeight; //ターゲットの座標からヘッダの高さ分引く
				$('html,body').animate({
					scrollTop: position},
					200
				);
				return false;
			}
		}
	});

	/*================================================
	form input style
	================================================*/
	$('form input[type="text"], input[type="email"], form textarea').addClass('form-control');

	/*================================================
	nav fix
	================================================*/
	var nav    = $('.navbar'),
			offset = nav.offset();

	$(window).scroll(function () {
		if($(window).scrollTop() > offset.top) {
			nav.addClass('fixed');
		} else {
			nav.removeClass('fixed');
		}
	});

});