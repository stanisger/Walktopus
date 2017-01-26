
jQuery(document).ready(function($) {

		$(window).scroll(function(){
			if($(window).width() > 768){
				var s = $(window).scrollTop();
				var slahs = $('#slahs');
				var titleBlog = $('#titleBlog');
				if(s > 100){
					$(".navbar").addClass('fixed-nav');
					$(".navbar-brand>img").attr('src', '/blog/assets/images/logo-walktopus-alt.png');
					slahs.css({'color':'rgba( 57, 35, 84, 1)'});
					titleBlog.css({'color': 'rgba( 57, 35, 84, 1)'});
				}
				else{
					$(".navbar").removeClass('fixed-nav');
					$(".navbar-brand>img").attr('src', '/blog/assets/images/logo-walktopus.png');
					slahs.css({'color':'white'});
					titleBlog.css({'color': 'white'});
				}
			}
		});

		if($(window).width() > 768){
			var s = $(window).scrollTop();
			if(s > 100){
				$(".navbar").addClass('fixed-nav');
				$(".navbar-brand>img").attr('src', '/blog/assets/images/logo-walktopus-alt.png');
			}
			else{
				$(".navbar").removeClass('fixed-nav');
				$(".navbar-brand>img").attr('src', '/blog/assets/images/logo-walktopus.png');
			}
		}
	});

