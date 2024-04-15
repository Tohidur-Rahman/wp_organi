<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */


?>
<section class="breadcrumb-section set-bg" style="background-image: url(<?php echo get_template_directory_uri();?>/img/breadcrumb.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2><?php woocommerce_page_title(); ?></h2>
					<div class="breadcrumb__option">
						<?php do_action('woocommerce_before_main_content'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="product spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-5">
				<div class="sidebar">
					<div class="sidebar__item">
						<?php do_action('woocommerce_sidebar'); ?>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-7">
				<div class="product__discount">
					<div class="section-title product__discount__title">
						<h2>Sale Off</h2>
					</div>
					<div class="row">
						<div class="product__discount__slider owl-carousel">
							<?php
							$args = array(
								'post_type' => 'product',
								'posts_per_page' => -1,
								'meta_query'     => array(
									'relation' => 'AND',
									array(
										'key'     => '_sale_price',
										'value'   => '',
										'compare' => '!=', // Check if sale price is not empty.
									),
									array(
										'key'     => '_price',
										'value'   => 0,
										'compare' => '>', // Check if regular price is greater than 0.
									),
								)
							);
							$query = new WP_Query($args);
							while ($query->have_posts()) {
								$query->the_post(); ?>
								<div class="col-lg-4">
								<?php wc_get_template_part( 'content', 'product' ); ?>
								</div>
							<?php   }
							wp_reset_postdata();
							?>

						</div>
					</div>
				</div>
				<div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <?php woocommerce_catalog_ordering(); ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><?php echo custom_woocommerce_result_count(); _e('Products found', 'organi');?> </h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span id="icon_grid" class="icon_grid-2x2"></span>
                                    <span id="icon_list" class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php
				if (woocommerce_product_loop()) {

					woocommerce_product_loop_start();

					if (wc_get_loop_prop('total')) {
						while (have_posts()) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action('woocommerce_shop_loop');

							wc_get_template_part('content', 'product');
						}
					}

					woocommerce_product_loop_end();

					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action('woocommerce_after_shop_loop');
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action('woocommerce_no_products_found');
				}
				?>
			</div>
		</div>
	</div>
</section>

<?php

get_footer('shop');
