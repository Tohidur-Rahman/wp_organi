<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
	exit;
	}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
	echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
	return;
	}

?>

<form name="checkout checkout__form" method="post" class="checkout woocommerce-checkout"
	action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12">
			<?php if (wc_ship_to_billing_address_only() && WC()->cart->needs_shipping()): ?>

				<h4>
					<?php esc_html_e('Billing &amp; Shipping', 'woocommerce'); ?>
				</h4>

			<?php else: ?>

				<h4 class="billing">
					<?php esc_html_e('Billing Details', 'woocommerce'); ?>
				</h4>

			<?php endif; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-7 col-md-6">
			<?php if ($checkout->get_checkout_fields()): ?>

				<?php do_action('woocommerce_checkout_before_customer_details'); ?>

				<div class="col2-set" id="customer_details">
					<?php do_action('woocommerce_checkout_billing'); ?>
					<?php do_action('woocommerce_checkout_shipping'); ?>
				</div>

				<?php do_action('woocommerce_checkout_after_customer_details'); ?>

			<?php endif; ?>
		</div>
		<div class="col-lg-5 col-md-6">
			<div class="checkout__order">
				<?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

				<h3 class="order" id="order_review_heading">
					<?php esc_html_e('Your order', 'woocommerce'); ?>
				</h3>

				<?php do_action('woocommerce_checkout_before_order_review'); ?>

				<div id="order_review" class="woocommerce-checkout-review-order">
					<?php do_action('woocommerce_checkout_order_review'); ?>
				</div>

				<?php do_action('woocommerce_checkout_after_order_review'); ?>
			</div>

		</div>
	</div>
</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>