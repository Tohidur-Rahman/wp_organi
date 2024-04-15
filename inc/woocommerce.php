<?php

function organi_woocommerce_setup() {
    add_theme_support(
        'woocommerce',
        array(
            'thumbnail_image_width' => 150,
            'single_image_width'    => 300,
            'product_grid'          => array(
                'default_rows'    => 3,
                'min_rows'        => 1,
                'default_columns' => 3,
                'min_columns'     => 1,
                'max_columns'     => 4,
            ),
        )
    );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'organi_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function organi_woocommerce_scripts() {
    wp_enqueue_style( 'organi-woocommerce-style', get_template_directory_uri() . '/woocommerce/woocommerce.css', array(), _S_VERSION );

    $font_path = WC()->plugin_url() . '/assets/fonts/';
    $inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

    wp_add_inline_style( 'organi-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'organi_woocommerce_scripts' );

function display_percentage_on_sale_badge( $html, $post, $product ) {
    $percentage = '';

    if ( $product->is_type( 'variable' ) ) {
        $percentages = array();

        // Get all the variation prices and loop through them
        $prices = $product->get_variation_prices();

        foreach ( $prices['price'] as $key => $price ) {
            // Only on sale variations
            if ( $prices['regular_price'][$key] !== $price ) {
                // Calculate and set in the array the percentage for each variation on sale
                $percentages[] = round( 100 - ( floatval( $prices['sale_price'][$key] ) / floatval( $prices['regular_price'][$key] ) * 100 ) );
            }
        }

        // Displays maximum discount value
        $percentage = $percentages ? max( $percentages ) . '%' : '';

    } elseif ( $product->is_type( 'grouped' ) ) {
        $percentages = array();

        // Get all the child products and loop through them
        $children_ids = $product->get_children();

        foreach ( $children_ids as $child_id ) {
            $child_product = wc_get_product( $child_id );

            // Check if $child_product is a valid product
            if ( is_a( $child_product, 'WC_Product' ) ) {
                $regular_price = (float) $child_product->get_regular_price();
                $sale_price = (float) $child_product->get_sale_price();

                if ( $sale_price != 0 || !empty( $sale_price ) ) {
                    // Calculate and set in the array the percentage for each child on sale
                    $percentages[] = round( 100 - ( $sale_price / $regular_price * 100 ) );
                }
            }
        }

        // Displays maximum discount value
        $percentage = $percentages ? max( $percentages ) . '%' : '';

    } else {
        $regular_price = (float) $product->get_regular_price();
        $sale_price = (float) $product->get_sale_price();

        if ( $sale_price != 0 || !empty( $sale_price ) ) {
            $percentage = round( 100 - ( $sale_price / $regular_price * 100 ) ) . '%';
        }
    }

    // If percentage is not empty, return the HTML with the discount percentage
    if ( !empty( $percentage ) ) {
        return '<div class="product__discount__percent">' . esc_html__( '-', 'woocommerce' ) . $percentage . '</div>';
    }

    // If no sale price or discount percentage, return the original HTML
    return $html;
}
add_filter( 'woocommerce_sale_flash', 'display_percentage_on_sale_badge', 20, 3 );

function custom_woocommerce_result_count() {
    global $wp_query;

    // Get the total number of products
    $total_count = $wp_query->found_posts;

    // Return the total number of products within your HTML structure
    return '<span class="product-count">' . esc_html( $total_count ) . '</span>';
}

add_filter( 'woocommerce_result_count', 'custom_woocommerce_result_count', 10 );

function custom_woocommerce_loop_shop_columns( $columns ) {
    // Get the number of columns from the Customizer setting
    $customizer_columns = get_theme_mod( 'products_per_row', 3 );

    // If the Customizer setting is valid, use it; otherwise, use the default
    $columns = is_numeric( $customizer_columns ) && $customizer_columns > 0 ? absint( $customizer_columns ) : $columns;

    return $columns;
}

add_filter( 'loop_shop_columns', 'custom_woocommerce_loop_shop_columns' );

// Apply the selected value from the Customizer to the loop_shop_columns filter
function custom_loop_columns( $columns ) {
    $custom_columns = get_theme_mod( 'products_per_row', 3 );

    if ( is_numeric( $custom_columns ) && $custom_columns > 0 ) {
        return absint( $custom_columns );
    }

    return $columns;
}

add_filter( 'loop_shop_columns', 'custom_loop_columns', 999 );

//Wishlist

if ( defined( 'YITH_WCWL' ) && !function_exists( 'yith_wcwl_get_items_count' ) ) {
    function yith_wcwl_get_items_count() {
        ob_start();
        ?>
<a class="yith-wcwl-items-count" href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url() ); ?>">
    <i class="yith-wcwl-icon fa fa-heart"></i><span><?php echo esc_html( yith_wcwl_count_all_products() ); ?>
    </span>
</a>
<?php
return ob_get_clean();
    }

    add_shortcode( 'yith_wcwl_items_count', 'yith_wcwl_get_items_count' );
}

if ( defined( 'YITH_WCWL' ) && !function_exists( 'yith_wcwl_ajax_update_count' ) ) {
    function yith_wcwl_ajax_update_count() {
        wp_send_json( array(
            'count' => yith_wcwl_count_all_products(),
        ) );
    }

    add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
    add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
}

if ( defined( 'YITH_WCWL' ) && !function_exists( 'yith_wcwl_enqueue_custom_script' ) ) {
    function yith_wcwl_enqueue_custom_script() {
        wp_add_inline_script(
            'jquery-yith-wcwl',
            "
          jQuery( function( $ ) {
            $( document ).on( 'added_to_wishlist removed_from_wishlist', function() {
              $.get( yith_wcwl_l10n.ajax_url, {
                action: 'yith_wcwl_update_wishlist_count'
              }, function( data ) {
                $('.yith-wcwl-items-count').children('span').html( data.count );
              } );
            } );
          } );
        "
        );
    }

    add_action( 'wp_enqueue_scripts', 'yith_wcwl_enqueue_custom_script', 20 );
}

add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();?>


<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' );?>"><i
        class="fa fa-shopping-bag"></i><span><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>


<?php
$fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}

add_shortcode( 'cart_contents_count', 'get_cart_contents_count_shortcode' );
function get_cart_contents_count_shortcode() {
    ob_start();?>
<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' );?>"><i
        class="fa fa-shopping-bag"></i><span><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
<?php
return ob_get_clean();
}

add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_total' );
function woocommerce_header_add_to_cart_total( $total ) {
    ob_start();?>

<div class="header__cart__price">
    <?php _e( 'item: ', 'organi' );
    echo WC()->cart->get_cart_total();?>
</div>
<?php
$total['.header__cart__price'] = ob_get_clean();
    return $total;
}
add_shortcode( 'cart_contents_total_count', 'get_cart_contents_count_total_shortcode' );
function get_cart_contents_count_total_shortcode() {
    ob_start();?>
<div class="header__cart__price">
    <?php _e( 'item: ', 'organi' );
    echo WC()->cart->get_cart_total();?>
</div>

<?php
return ob_get_clean();
}

function wocommerce_shope_product_add_to_cart_text( $text ) {
    return '<i class="fa fa-shopping-cart"></i>';
}
add_filter( 'woocommerce_product_add_to_cart_text', 'wocommerce_shope_product_add_to_cart_text' );

//add_filter( 'wp_calculate_image_sizes', '__return_empty_array' );

//add_filter( 'wp_calculate_image_srcset', '__return_empty_array' );


/// Quantity Pluse Minus Button

add_action( 'wp_head' , 'custom_quantity_fields_css' );
function custom_quantity_fields_css(){
    ?>
    <style>
    .quantity input::-webkit-outer-spin-button,
    .quantity input::-webkit-inner-spin-button {
        display: none;
        margin: 0;
    }
    .quantity input.qty {
        appearance: textfield;
        -webkit-appearance: none;
        -moz-appearance: textfield;
    }
    </style>
    <?php
}

add_action( 'wp_footer' , 'custom_quantity_fields_script' );
function custom_quantity_fields_script(){
    ?>
    <script type='text/javascript'>
    jQuery( function( $ ) {
        if ( ! String.prototype.getDecimals ) {
            String.prototype.getDecimals = function() {
                var num = this,
                    match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                if ( ! match ) {
                    return 0;
                }
                return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
            }
        }
        // Quantity "plus" and "minus" buttons
        $( document.body ).on( 'click', '.plus, .minus', function() {
            var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
                currentVal  = parseFloat( $qty.val() ),
                max         = parseFloat( $qty.attr( 'max' ) ),
                min         = parseFloat( $qty.attr( 'min' ) ),
                step        = $qty.attr( 'step' );

            // Format values
            if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
            if ( max === '' || max === 'NaN' ) max = '';
            if ( min === '' || min === 'NaN' ) min = 0;
            if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

            // Change the value
            if ( $( this ).is( '.plus' ) ) {
                if ( max && ( currentVal >= max ) ) {
                    $qty.val( max );
                } else {
                    $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            } else {
                if ( min && ( currentVal <= min ) ) {
                    $qty.val( min );
                } else if ( currentVal > 0 ) {
                    $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            }

            // Trigger change event
            $qty.trigger( 'change' );
        });
    });
    </script>
    <?php
}


add_filter( 'woocommerce_checkout_coupon_message', 'organi_have_coupon_message');
 
function organi_have_coupon_message() {    
   return '<i class="fa fa-tag" aria-hidden="true"></i>'. esc_html__( 'Have a coupon?', 'woocommerce' ) . ' <a href="#" class="showcoupon">' . esc_html__( 'Click here ', 'woocommerce' ) . '</a>'.esc_html__( 'to enter your code', 'woocommerce' );
}
