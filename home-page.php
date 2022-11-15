<?php
/*
Template Name: Home
*/
get_header();
?>
	<div class="first-screen">
		<img src="<? echo get_field('fs-img', 'option')['url']; ?>" alt="" class="desktop-img">
		<img src="<? echo get_field('fs-mobile-img', 'option')['url']; ?>" alt="" class="mobile-img">
		<div class="content">
			<div class="container">
				<div class="name">
					<h1 class="top-name-title"><? the_field('name'); ?></h1>
				</div>
				<div class="position">
            <? the_field('subtitle'); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="quote" style="display: none;">
		<div class="container">
			<div class="quote-block">
          <? the_field('first-quote'); ?>
			</div>
		</div>
	</div>
	<section class="services-section" id="services-menu">
		<div class="container">
			<div class="service-title common-title">
          <? the_field('service-title'); ?>
			</div>
		</div>
      <?
      $serviceList = get_field('services-list');
      ?>
		<div class="container">
			<div class="services-mobile-slider">
				<div class="swiper">
					<div class="swiper-wrapper">
              <?
              $counter = 1;
              foreach ($serviceList as $serviceItem):
                  ?>
								<div class="swiper-slide">
									<div class="service-item">
										<div class="service-content">
											<div class="number"><?=$counter?>.</div>
											<div class="text"><?=$serviceItem['main-text']?></div>
											<div class="open-service-block">
												<div class="more-info">
                            <?=$serviceItem['additional-text']?>
												</div>
											</div>
											<div class="btn-detail">
							<span class="is-close">
								<?=myLanguage('service-detail-show')?>
							</span>
												<span class="is-open">
	                            <?=myLanguage('service-detail-hide')?>
							</span>
											</div>
										</div>
										<div class="bg-icon">
											<img src="<?=get_template_directory_uri()?>/assets/image/domino/<?=$counter?>.svg" alt="">
										</div>
										<div class="bg-gradient"></div>
									</div>
								</div>
                  <?
                  $counter++;
              endforeach; ?>

					</div>

				</div>
				<!--			<div class="swiper-nav-block">-->
				<!--				<div class="swiper-button-prev swiper-serv-button-prev"></div>-->
				<!--				<div class="swiper-button-next swiper-serv-button-next"></div>-->
				<!--			</div>-->
				<div class="swiper-pagination"></div>
			</div>
		</div>
		<div class="container">
			<div class="row services-row">
          <?
          $counter = 1;
          foreach ($serviceList as $serviceItem):
              ?>
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
							<div class="service-item-wrapper">
								<div class="service-item">
									<div class="service-content">
										<div class="number"><?=$counter?>.</div>
										<div class="text"><?=$serviceItem['main-text']?></div>
										<div class="open-service-block">
											<div class="more-info">
                          <?=$serviceItem['additional-text']?>
											</div>
										</div>
										<div class="btn-detail">
							<span class="is-close">
								<?=myLanguage('service-detail-show')?>
							</span>
											<span class="is-open">
	                            <?=myLanguage('service-detail-hide')?>
							</span>
										</div>
									</div>


									<div class="bg-icon">
										<img src="<?=get_template_directory_uri()?>/assets/image/domino/<?=$counter?>.svg" alt="">
									</div>
									<div class="bg-gradient"></div>
								</div>
							</div>
						</div>
              <?
              $counter++;
          endforeach; ?>

			</div>
		</div>
	</section>
	<section class="quote-min">
		<div class="quote-block">
        <? the_field('second-quote'); ?>
		</div>
	</section>

	<section class="about-section" id="about-menu">
		<div class="container">
			<div class="common-title">
          <? the_field('about-title'); ?>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<div class="text-about">
              <? the_field('about-text'); ?>
					</div>
				</div>
				<div class="col-lg-4">
					<img src="<? echo get_field('first-about-img')['url']; ?>" alt="" class="about-img">
				</div>
			</div>
			<div class="row second-about-row">
				<div class="col-lg-4">
					<img src="<? echo get_field('second-about-img')['url']; ?>" alt="" class="about-img">
				</div>
				<div class="col-lg-8">
            <?
            
            $aboutList = get_field('about-list');
            if($aboutList):
                ?>
							<div class="about-list">
                  <?
                  foreach ($aboutList as $item):
                      ?>
										<div class="item">
											<div class="name"><?=$item['title']?></div>
											<div class="text">
                          <?=$item['text']?>
											</div>
										</div>
                  <? endforeach; ?>

							</div>
            <? endif; ?>
				</div>
			</div>
		</div>
	</section>
<?php
$clientLogos = get_field('clients-logo');
if($clientLogos):
    ?>
	<section class="clients-logo-section">
		<div class="container">
			<div class="common-title">
          <? the_field('clients-title'); ?>
			</div>
			<div class="swiper swiper-client-logos">
				<div class="swiper-wrapper">
            <?
            foreach($clientLogos as $logo):
                ?>
							<div class="swiper-slide">
                  <?
                  
                  //						print_r($logo['sizes']);
                  ?>
								<img src="<?=$logo['sizes']['medium_large']?>" alt="">
							</div>
            <? endforeach; ?>
				</div>
				<div class="swiper-nav-block">
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php

$reviewList = get_field('review-list');

if($reviewList):
    ?>
	<div id="review-menu">
		<section class="review-section">
			<div class="container">

				<div class="common-title">
            <? the_field('review-title'); ?>
				</div>

				<div class="swiper-block">
            <? if(count($reviewList) > 1): ?>
							<div class="swiper-thumbs">
								<div class="swiper">
									<div class="swiper-wrapper">
                      <? foreach ($reviewList as $revItem): ?>
												<div class="swiper-slide">
													<img src="<?=$revItem['img']['url']?>" alt="">
												</div>
                      <? endforeach; ?>
									</div>
								</div>
							</div>
            <? endif; ?>
					<div class="swiper-main <? if(count($reviewList) == 1): ?> only_one <? endif; ?>" style="">
						<div class="swiper">
							<div class="swiper-wrapper">
                  <? foreach ($reviewList as $revItem): ?>
										<div class="swiper-slide">
                        
                        <? if($revItem['video']): ?>
													<a href="<?=$revItem['video']?>" data-fancybox="gallery" class="video-rev">
                                            <span class="rev-name">
                                                <?=$revItem['name-rev']?>
                                            </span>
														<div class="img-container">
															<img src="<?=$revItem['img']['url']?>" alt="">
															<svg width="66" height="64" viewBox="0 0 66 64" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M64.5894 31.942C64.5894 49.2982 50.2514 63.3841 32.5447 63.3841C14.8381 63.3841 0.5 49.2982 0.5 31.942C0.5 14.5859 14.8381 0.5 32.5447 0.5C50.2514 0.5 64.5894 14.5859 64.5894 31.942Z" stroke="white"/>
																<path d="M27.9221 25.0889L40.0289 32.5447L27.9221 40.0006L27.9221 25.0889Z" stroke="white"/>
															</svg>
														</div>

													</a>
                        <? else: ?>
													<a href="<?=$revItem['img']['url']?>" data-fancybox="gallery" class="img-rev">
                                            <span class="rev-name">
                                                <?=$revItem['name-rev']?>
                                            </span>
														<div class="img-container">
															<img src="<?=$revItem['img']['url']?>" alt="">
															<svg width="66" height="64" viewBox="0 0 66 64" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M64.5894 31.942C64.5894 49.2982 50.2514 63.3841 32.5447 63.3841C14.8381 63.3841 0.5 49.2982 0.5 31.942C0.5 14.5859 14.8381 0.5 32.5447 0.5C50.2514 0.5 64.5894 14.5859 64.5894 31.942Z" stroke="white"/>
																<circle cx="30.5" cy="29.5" r="8" stroke="white"/>
																<line x1="36.3536" y1="34.6464" x2="44.3536" y2="42.6464" stroke="white"/>
															</svg>
														</div>
													</a>
                        
                        
                        <? endif; ?>


										</div>
                  <? endforeach; ?>
							</div>


						</div>
              <? if(count($reviewList) > 1): ?>
								<div class="swiper-nav-block">
									<div class="swiper-button-prev swiper-button-rev-prev"><?=myLanguage('swiper-prev')?></div>
									<div class="swiper-button-next swiper-button-rev-next"><?=myLanguage('swiper-next')?></div>
								</div>
              <? endif; ?>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php endif; ?>

<?php
if(false):
    $reviewList = get_field('review-list');
    if($reviewList):
        ?>
			<div id="review-menu">
				<section class="review-section review-desktop">
					<div class="container">
						<div class="common-title">
                <? the_field('review-title'); ?>
						</div>
						<div class="swiper swiper-review">
							<div class="swiper-wrapper">
                  <?
                  foreach($reviewList as $revItem):
                      if(isset($revItem['logo']['url'])):
                          ?>
												<div class="swiper-slide">
													<div class="review-logo <? if(!$revItem['text']): ?> un-open <? endif; ?>">
														<img src="<?=$revItem['logo']['url']?>" alt="">
													</div>
												</div>
                      <? endif; ?>
                  <? endforeach; ?>
							</div>
						</div>
						<div class="review-contents">
                <?
                $revCount = 0;
                foreach($reviewList as $revItem):
                    if(isset($revItem['logo']['url'])):
                        ?>
											<div class="review-item <? if(!$revItem['text']): ?> un-open <? endif; ?>"  data-testimonial="<?=$revCount?>">
												<div class="review-media">
                            
                            <? if($revItem['video-file']): ?>
															<video src="<?=$revItem['video-file']?>" style="width: 100%;" controls>
																<source src="<?=$revItem['video-file']?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
															</video>
                            <? else: ?>
                                <? if(isset($revItem['img']['url'])): ?>
																<img src="<?=$revItem['img']['url']?>" alt="" data-url="">
                                <? endif; ?>
                            <? endif; ?>

												</div>
                          <? if($revItem['text']): ?>
														<div class="review-info-block">
															<div class="review-text">
                                  <?=$revItem['text']?>
															</div>
															<div class="review-name"><?=$revItem['name']?></div>
														</div>
                          <? endif; ?>
											</div>
                        <?
                        $revCount++;
                    endif;
                endforeach; ?>

						</div>
					</div>
				</section>

				<section class="review-mobile">
					<div class="container">
						<div class="common-title">
                <? the_field('review-title'); ?>
						</div>
						<div class="review-list">
                <?
                $revCount = 0;
                foreach($reviewList as $revItem):
                    if(isset($revItem['logo']['url'])):
                        ?>
											<div class="review-item">
												<div class="review-content">
													<div class="review-media">
                              <? if($revItem['video-file']): ?>
																<video src="<?=$revItem['video-file']?>" style="width: 100%;" controls>
																	<source src="<?=$revItem['video-file']?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
																</video>
                              <? else: ?>
                                  <? if(isset($revItem['img']['url'])): ?>
																	<img src="<?=$revItem['img']['url']?>" alt="" data-url="">
                                  <? endif; ?>
                              <? endif; ?>
													</div>
													<div class="review-text">
                              <?=$revItem['text']?>
													</div>
													<div class="review-name">
                              <?=$revItem['name']?>
													</div>
												</div>
												<div class="review-logo <? if(!$revItem['text']): ?> un-open <? endif; ?>">
													<img src="<?=$revItem['logo']['url']?>" alt="">
												</div>

											</div>
                    <? endif; ?>
                <? endforeach; ?>
						</div>
					</div>
				</section>
			</div>
    <?php
    endif;
    ?>


<? endif;
?>


<?php
$pageID = myLanguage('blog-page');

?>
	<section class="blog-last" id="blog-menu">
		<div class="container">
			<div class="common-title">
          <? the_field('title', $pageID); ?>
			</div>
			<div class="blog-subtitle">
          <? the_field('subtitle', $pageID); ?>
			</div>

			<div class="blog-grid blog-last-slider">


			</div>
			<div class="blog-view-all">
          <? if(get_field('telegram', 'option')): ?>
						<a href="<? the_field('telegram', 'option'); ?>"><?=myLanguage('view-all-btn')?></a>
          <? else: ?>
						<a href="<?=get_permalink(myLanguage('blog-page'))?>"><?=myLanguage('view-all-btn')?></a>
          <? endif; ?>
			</div>

		</div>
	</section>

<?php
get_footer();
