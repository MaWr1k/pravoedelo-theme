<?php

?>
<footer id="contact-menu">
	<div class="container">
		<div class="col-footer-contact">
			<!--            <div class="common-title footer-title">-->
			<!--                --><?//=myLanguage('footer-title')?>
			<!--            </div>-->
			<div class="footer-group">
				<div class="subtitle"><?=myLanguage('footer-phone-title')?></div>
				<a href="tel:<? the_field('phone', 'option'); ?>" class="footer-link">
            <? the_field('phone', 'option'); ?>
				</a>
				<div class="decor-icons">
					<img src="<?=get_template_directory_uri()?>/assets/image/telegram.svg" alt="">
					<img src="<?=get_template_directory_uri()?>/assets/image/whatsapp.svg" alt="">
					<img src="<?=get_template_directory_uri()?>/assets/image/viber.svg" alt="">
				</div>
			</div>
			<? if(get_field('facebook', 'option') || get_field('instagram', 'option') || get_field('telegram', 'option')): ?>
			<div class="footer-group social-line">
				<div class="subtitle"><?=myLanguage('footer-social')?></div>
          <? if(get_field('facebook', 'option')): ?>
						<a href="<? the_field('facebook', 'option'); ?>" class="footer-link" target="_blank">
							Facebook
						</a>
          <? endif; ?>
          <? if(get_field('instagram', 'option')): ?>
						<a href="<? the_field('instagram', 'option'); ?>" class="footer-link" target="_blank">
							Instagram
						</a>
          <? endif; ?>
          <? if(get_field('telegram', 'option')): ?>
						<a href="<? the_field('telegram', 'option'); ?>" class="footer-link" target="_blank">
                <?=myLanguage('footer-telega')?>
						</a>
          <? endif; ?>
			</div>
				<? endif; ?>
        <? if(get_field('address', 'option')): ?>
            <?
            if(get_locale() == 'uk'){
                $langPrefix = '-ua';
            }else{
                $langPrefix = '-ru';
            }
            ?>
					<div class="footer-group half-footer">
						<div class="subtitle"><?=myLanguage('footer-address')?></div>
						<div class="text-city">
                <?=get_field('city'.$langPrefix, 'option')?>
						</div>
						<div class="footer-link" >
                <?=get_field('address'.$langPrefix, 'option')?>
						</div>
						<a href="<? the_field('google-map-link', 'option'); ?>" class=" basic-btn white-btn" target="_blank">
                <?=myLanguage('footer-map-link')?>
						</a>

					</div>
        <? endif; ?>
			<div class="footer-group website-btn half-footer">
				<div class="subtitle "><?=myLanguage('footer-detail')?></div>
				<a href="https://pravoedelo.ua" class=" basic-btn white-btn" target="_blank">
            <?=myLanguage('footer-detail-btn')?>
				</a>

			</div>
		</div>
	</div>
	<!--    <div class="footer-img">-->
	<!--        <img src="--><?//=get_field('footer-img', 'option')['url']; ?><!--" alt="">-->
	<!--    </div>-->
</footer>
<script>
  const LANG_ARR = {};
  if(document.querySelector('html').getAttribute('lang') === 'ru_RU'){
    LANG_ARR['show_all'] = 'Развернуть';
    LANG_ARR['hide_all'] = 'Свернуть';
  }else{
    LANG_ARR['show_all'] = 'Розгорнути';
    LANG_ARR['hide_all'] = 'Згорнути';
  }
</script>
<script src="<?=get_template_directory_uri()?>/assets/js/jquery-3.6.0.min.js"></script>
<script src="<?=get_template_directory_uri()?>/assets/js/swiper-bundle.min.js"></script>
<!--<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="<?=get_template_directory_uri()?>/assets/js/common.js?v=3.2"></script>
</body>
</html>