<?
if(get_locale() == 'uk'){
    $langPrefix = '-ua';
}else{
    $langPrefix = '-ru';
}
header('Access-Control-Allow-Origin: *');
?>
<!doctype html>
<html lang="<?=get_locale()?>" data-test="<?=get_home_url()?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<meta name="google-site-verification" content="9nahhx9on9jrHDs-0NDe-hc2UADr1bsFUMe4rjNud6o" />

	<title><? wp_title() ?></title>
    <?php if(isset($post)): ?>
			<meta name="description"  content="<?php $my_descr = get_post_meta($post->ID, "_yoast_wpseo_metadesc", true);
      if ($my_descr){
          echo $my_descr;
      }
      ?>" />
    <?php else: ?>
			<meta name="description"  content="<?=myLanguage('page404-title')?>" />
    <?php endif; ?>
	<link rel="shortcut icon" href="<?=get_template_directory_uri()?>/assets/image/fav.ico" type="image/x-icon">
	<link
					rel="stylesheet"
					href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"
	/>
	<link rel="stylesheet" href="<?=get_template_directory_uri()?>/assets/css/style.css?v=3.21">
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MT8ZQ87');</script>
	<!-- End Google Tag Manager -->
</head>
<body class="<? if (get_page_template_slug() == 'home-page.php'){ echo 'home-page';}else if(get_page_template_slug() == 'blog-page.php'){ echo 'blog-page'; }else{ echo 'page404-template';} ?>">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MT8ZQ87"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header class="">
	<div class="container">
		<div class="my-row">
			<div class="col-mobile-phone">
				<a href="tel:<? the_field('phone', 'option') ?>"></a>
			</div>
			<div class="col-logo">
				<a href="https://pravoedelo.ua/" target="_blank">
					<img src="<?=get_template_directory_uri()?>/assets/image/logo<?=$langPrefix?>.svg" alt="" class="logo-white">
					<img src="<?=get_template_directory_uri()?>/assets/image/logo-black<?=$langPrefix?>.svg" alt="" class="logo-black">
				</a>
			</div>
			<div class="col-right">

				<div class="col-menu">
					<nav>
              <?php
              wp_nav_menu( array(
                  'menu_class'=>'menu',
                  'theme_location'=>'top',
              ) );
              ?>

					</nav>
				</div>
				<div class="col-logo">
					<a href="https://pravoedelo.ua/" target="_blank">
						<img src="<?=get_template_directory_uri()?>/assets/image/logo.svg" alt="" class="logo-white">
					</a>
				</div>
				<div class="col-btn">
					<a href="tel:<? the_field('phone', 'option'); ?>" class="basic-btn white-btn">
              <?=myLanguage('call-btn')?>
					</a>
				</div>
			</div>
			<div class="col-mobile-btn">
				<span></span>
				<span></span>
				<span></span>
			</div>

		</div>


	</div>
</header>

