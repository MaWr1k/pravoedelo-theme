<?php
/*
Template Name: Blog Article
*/
get_header();
?>

<section class="blog-article-page">
	<div class="container">
		<div class="blog-container">
			<div class="blog-title"><? the_title() ?></div>
			<div class="blog-date"><?=get_the_date()?></div>
			<div class="blog-page-img">
				<img src="<? echo get_field('img')['url']; ?>" alt="">
			</div>
			<div class="blog-text">
                <? the_field('main-text'); ?>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();