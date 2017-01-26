<?php $page_title = (isset($title) & !empty($title) ) ? $title." | Walktopus" : "Walktopus"; ?>
<!DOCTYPE html>
<html>
<head>
	<!--∆∆ METAS ∆∆-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title><?php echo $page_title ?></title>

    <!--∆∆ HELPERS & FONTS  ∆∆-->

	<link rel="icon" type="image/png" href="<?php bloginfo('template_url') ?>/assets/images/wt-icon.png">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet"



    <!--∆∆ JQUERY ∆∆-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  
   <?php wp_head(); ?>
</head>

<body>
	
	<div class="header bgBlog" id="header">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_navbar" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">
						<img alt="Brand" src="<?php bloginfo('template_url') ?>/assets/images/logo-walktopus.png"> <strong id="slahs">|</strong><span class="titleBlog" id ="titleBlog">blog</span>
					</a>
				</div>

				<div class="collapse navbar-collapse" id="main_navbar">
					<ul class="nav navbar-nav navbar-right">
						<li class="">
							<a href="index.php" class="active">Aprende</a>
						</li>
						<li class="">
							<a href="experto.php">Enseña</a>
						</li>
						<li class="">
							<a href="/" class="btn btn-login"><i class="wt-login" aria-hidden="true"></i> Iniciar sesión</a>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container -->
		</nav>
	</div>

	<script>

jQuery(document).ready(function($) {

		$(window).scroll(function(){
			if($(window).width() > 768){
				var s = $(window).scrollTop();
				var slahs = $('#slahs');
				var titleBlog = $('#titleBlog');
				if(s > 100){
					$(".navbar").addClass('fixed-nav');
					$(".navbar-brand>img").attr('src', '<?php bloginfo('template_url') ?>/assets/images/logo-walktopus-alt.png');
					slahs.css({'color':'rgba( 57, 35, 84, 1)'});
					titleBlog.css({'color': 'rgba( 57, 35, 84, 1)'});
				}
				else{
					$(".navbar").removeClass('fixed-nav');
					$(".navbar-brand>img").attr('src', '<?php bloginfo('template_url') ?>/assets/images/logo-walktopus.png');
					slahs.css({'color':'white'});
					titleBlog.css({'color': 'white'});
				}
			}
		});

		if($(window).width() > 768){
			var s = $(window).scrollTop();
			if(s > 100){
				$(".navbar").addClass('fixed-nav');
				$(".navbar-brand>img").attr('src', '<?php bloginfo('template_url') ?>/assets/images/logo-walktopus-alt.png');
			}
			else{
				$(".navbar").removeClass('fixed-nav');
				$(".navbar-brand>img").attr('src', '<?php bloginfo('template_url') ?>/assets/images/logo-walktopus.png');
			}
		}
	});

</script>