<?php

/*
Template Name: Checkout
*/

get_header();?>

<section class="breadcrumb-section set-bg" style="background-image: url(<?php echo get_template_directory_uri();?>/img/breadcrumb.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2><?php the_title(); ?></h2>
					<div class="breadcrumb__option">
						<?php do_action('woocommerce_before_main_content'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php echo do_shortcode('[woocommerce_checkout]');?>
            </div>
        </div>
    </div>
</section>
 <?php get_footer();?>