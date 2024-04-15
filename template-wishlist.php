<?php

/*
Template Name: Contact Us
*/

get_header();?>

<section class="breadcrumb-section set-bg" data-setbg="<?php echo get_template_directory_uri(); ?>/img/breadcrumb.jpg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2>
						<?php the_title(); ?>
					</h2>
					<div class="breadcrumb__option">
						<?php do_action('woocommerce_before_main_content'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <?php echo do_shortcode('[yith_wcwl_wishlist]');?>
            </div>
        </div>
    </div>
 <?php get_footer();?>