<?php
/*
Template Name: Blog main
*/
get_header();
//$get
?>

<section class="blog-page">
    <div class="container">
        <div class="common-title">
            <? the_field('title'); ?>
        </div>
        <div class="blog-subtitle">
            <? the_field('subtitle'); ?>
	        
        </div>
				<div class="blog-container">
				
				</div>

	    <div class="show-posts" data-page="2">
			    <div class="basic-btn dark-btn">
              <?=myLanguage('view-more-btn')?>
			    </div>
	    </div>

    </div>
</section>
<?php
get_footer();