<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

?>

<section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
						<?php
                                $attachment_ids = $product->get_gallery_image_ids();
                                foreach( $attachment_ids as $attachment_id ) {
                                $image_link = wp_get_attachment_url( $attachment_id );
                            ?>
                                <img data-imgbigurl="<?php echo $image_link;?>"
                                src="<?php echo $image_link;?>" alt="">
                            <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
					   <?php woocommerce_template_single_title();?>
						<?php woocommerce_template_single_rating();?>
                        <div class="product__details__price"><?php woocommerce_template_single_price();?></div>
                        <?php woocommerce_template_single_excerpt();?>
                        <?php woocommerce_template_single_add_to_cart();?>
                       
                        <div class="heart-icon"><?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?></div>
                        <ul>
                            <li><b><?php echo __('Availability', 'organi'); ?></b> <span><?php echo $product->get_stock_status(); ?></span></li>
                            <li><b><?php echo __('Shipping', 'organi'); ?></b> <span><?php echo __('01 day shipping.', 'organi'); ?> <samp><?php echo __('Free pickup today', 'organi'); ?></samp></span></li>
                            <li><b><?php echo __('Weight', 'organi'); ?></b> <span><?php echo $product->get_weight();?> <?php echo get_option('woocommerce_weight_unit');?></span></li>
                            <li><b><?php echo __('Share on', 'organi'); ?></b>
                                <div class="share">
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?= get_permalink(); ?>" title="Share on Facebook" target="_blank"><i class="fa fa-facebook-f"></i></a>

                                <a href="https://www.twitter.com/share?url=<?= get_permalink(); ?>&text=<?= get_the_title(); ?>" title="Share on Twitter" target="_blank"><i class="fa fa-twitter"></i></a>

                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= get_permalink(); ?>" title="Share on Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>

                                <a href="mailto:?subject=<?= get_the_title(); ?> - <?= site_url(); ?>&body=I found this post on <?= site_url(); ?> and thought it would interest you.%0D%0A%0D%0A<?= get_the_title(); ?>%0D%0A<?= get_permalink(); ?>" title="Send to an E-mail" target="_blank"><i class="fa fa-envelope"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <?php woocommerce_output_product_data_tabs(); ?>
                </div>
            </div>
        </div>
</section>


<?php woocommerce_output_related_products(); ?>

<?php do_action( 'woocommerce_after_single_product' ); ?>