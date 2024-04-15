<?php
/*
  Template Name: Home
*/

global $woocommerce;
global $current_user;
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Page Preloder
    <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="<?php echo get_template_directory_uri(); ?>/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <?php
                if (is_user_logged_in()) {
                    $current_user = wp_get_current_user(); ?>
                    <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"><i
                            class="fa fa-user"></i>
                        <?php echo $current_user->display_name; ?>
                    </a>
                    <?php
                    }
                else {
                    ?>
                    <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"><i
                            class="fa fa-user"></i>
                        <?php _e('Login', 'organi'); ?>
                    </a>
                    <?php
                    }
                ?>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <?php
            wp_nav_menu(
                array(
                    'menu' => "main_menu",
                )
            )
                ?>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@demo.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i>
                                    <?php the_field('email', 'option'); ?>
                                </li>
                                <li>
                                    <?php the_field('shipping_offer', 'option'); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <?php
                                $socials = get_field('header_social', 'option');
                                foreach ($socials as $social) {
                                    ?>
                                    <a href="<?php echo $social['social_link']; ?>"><i
                                            class="fa <?php echo $social['social_icon']; ?>"></i></a>
                                    <?php
                                    }
                                ?>
                            </div>
                            <div class="header__top__right__language">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <?php
                                if (is_user_logged_in()) {
                                    $current_user = wp_get_current_user(); ?>
                                    <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"><i
                                            class="fa fa-user"></i>
                                        <?php echo $current_user->display_name; ?>
                                    </a>
                                    <?php
                                    }
                                else {
                                    ?>
                                    <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"><i
                                            class="fa fa-user"></i>
                                        <?php _e('Login', 'organi'); ?>
                                    </a>
                                    <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <?php
                        $logo = get_field('logo', 'option');
                        ?>
                        <a href="<?php echo site_url(); ?>"><img src="<?php echo $logo['url']; ?>"
                                alt="<?php echo $logo['alt']; ?>"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <?php
                        wp_nav_menu(
                            array(
                                'menu' => "main_menu",
                            )
                        )
                            ?>

                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li>
                                <?php echo do_shortcode('[yith_wcwl_items_count]'); ?>
                            </li>

                            <li>
                                <?php echo do_shortcode('[cart_contents_count]'); ?>
                            </li>
                        </ul>
                        <?php echo do_shortcode('[cart_contents_total_count]'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <?php
                            $args = array(
                                'taxonomy' => 'product_cat',
                                'hide_empty' => true
                            );
                            $p_cats = get_categories($args);
                            foreach ($p_cats as $p_cat) {
                                ?>
                                <li><a href="<?php echo get_term_link($p_cat->slug, 'product_cat'); ?>">
                                        <?php echo $p_cat->cat_name; ?>
                                    </a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                        <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?" value="<?php echo get_search_query(); ?>" name="s">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>
                                    <?php the_field('phone', 'option'); ?>
                                </h5>
                                <span>
                                    <?php echo __("support 24/7 time", "organi"); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php
                    $bannar = get_field('banner');
                    ?>
                    <div class="hero__item set-bg"
                        style="background-image: url(<?php echo esc_url($bannar['banner_img']['url']); ?>)">
                        <div class="hero__text">
                            <span>
                                <?php echo $bannar['banner_title']; ?>
                            </span>
                            <h2>
                                <?php echo $bannar['banner_subtitle']; ?>
                            </h2>
                            <p>
                                <?php echo $bannar['banner_desc']; ?>
                            </p>
                            <a href="<?php echo esc_url($bannar['banner_button_link']); ?>" class="primary-btn">
                                <?php echo $bannar['banner_button_text']; ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php
                    $cats = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'ASC'));
                    foreach ($cats as $cat) {
                        $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
                        $cat_image = wp_get_attachment_url($thumbnail_id);
                        $cat_link = get_term_link($cat);
                        ?>
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" style="background-image:url(<?php echo $cat_image; ?>)"
                                data-setbg="<?php echo $cat_image; ?>">
                                <h5><a href="<?php echo $cat_link; ?>">
                                        <?php echo $cat->name; ?>
                                    </a></h5>
                            </div>
                        </div>
                        <?php
                        }
                    ?>

                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <?php
                            $cats = get_terms('product_cat', array('hide_empty' => false, 'orderby' => 'ASC'));
                            foreach ($cats as $cat) {
                                $cat_name = $cat->name
                                    ?>
                                <li data-filter=".<?php echo $cat->slug; ?>">
                                    <?php echo $cat_name; ?>
                                </li>
                                <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 8,
                );
                $loop = new WP_Query($args);
                if ($loop->have_posts()) {
                    while ($loop->have_posts()):
                        $loop->the_post();


                        $cats = get_the_terms($post->ID, 'product_cat');
                        foreach ($cats as $cat) {
                            $cat_slug = $cat->slug;
                            }
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo $cat_slug; ?>">
                            <?php wc_get_template_part('content', 'product'); ?>
                        </div>
                        <?php
                    endwhile;
                    }
                else {
                    echo __('No products found');
                    }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <?php $ads_one = get_field('adds_one'); ?>
                        <img src="<?php echo $ads_one['url']; ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <?php $ads_two = get_field('adds_two'); ?>
                        <img src="<?php echo $ads_two['url']; ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <?php
                                $args = array(
                                    'post_type' => 'product',
                                    'posts_per_page' => 3
                                );
                                $loop = new WP_Query($args);
                                if ($loop->have_posts()) {
                                    while ($loop->have_posts()):
                                        $loop->the_post();
                                        ?>
                                        <a href="<?php echo get_permalink($product->ID); ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>"
                                                    alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>
                                                    <?php echo $product->get_name(); ?>
                                                </h6>
                                                <?php echo $product->get_price_html(); ?>
                                            </div>
                                        </a>
                                        <?php
                                    endwhile;
                                    }
                                else {
                                    echo __('No products found');
                                    }
                                wp_reset_postdata();
                                ?>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <?php
                                $args = array(
                                    'post_type' => 'product',
                                    'posts_per_page' => 3,
                                    'offset' => 3
                                );
                                $loop = new WP_Query($args);
                                if ($loop->have_posts()) {
                                    while ($loop->have_posts()):
                                        $loop->the_post();
                                        ?>
                                        <a href="<?php echo get_permalink($product->ID); ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>"
                                                    alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>
                                                    <?php echo $product->get_name(); ?>
                                                </h6>
                                                <?php echo $product->get_price_html(); ?>
                                            </div>
                                        </a>
                                        <?php
                                    endwhile;
                                    }
                                else {
                                    echo __('No products found');
                                    }
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <?php
                                $args = array(
                                    'post_type' => 'product',
                                    'posts_per_page' => 3,
                                    'orderby' => 'meta_value_num',
                                    'meta_key' => 'total_sales',
                                );
                                $loop = new WP_Query($args);
                                if ($loop->have_posts()) {
                                    while ($loop->have_posts()):
                                        $loop->the_post();
                                        ?>
                                        <a href="<?php echo get_permalink($product->ID); ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>"
                                                    alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>
                                                    <?php echo $product->get_name(); ?>
                                                </h6>
                                                <span>
                                                    <?php echo $product->get_price_html(); ?>
                                                </span>
                                            </div>
                                        </a>
                                        <?php
                                    endwhile;
                                    }
                                else {
                                    echo __('No products found');
                                    }
                                wp_reset_postdata();
                                ?>

                            </div>
                            <div class="latest-prdouct__slider__item">
                                <?php
                                $args = array(
                                    'post_type' => 'product',
                                    'posts_per_page' => 3,
                                    'offset' => 3,
                                    'orderby' => 'meta_value_num',
                                    'meta_key' => 'total_sales',
                                );
                                $loop = new WP_Query($args);
                                if ($loop->have_posts()) {
                                    while ($loop->have_posts()):
                                        $loop->the_post();
                                        ?>
                                        <a href="<?php echo get_permalink($product->ID); ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>"
                                                    alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>
                                                    <?php echo $product->get_name(); ?>
                                                </h6>
                                                <span>
                                                    <?php echo $product->get_price_html(); ?>
                                                </span>
                                            </div>
                                        </a>
                                        <?php
                                    endwhile;
                                    }
                                else {
                                    echo __('No products found');
                                    }
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <?php
                                $args = array(
                                    'post_type' => 'product',
                                    'posts_per_page' => 3,
                                    'orderby' => 'meta_value_num',
                                    'meta_key' => '_wc_average_rating',
                                );

                                $loop = new WP_Query($args);

                                if ($loop->have_posts()) {
                                    while ($loop->have_posts()):
                                        $loop->the_post();
                                        global $product;
                                        
                                        $product_id = $product->get_id();

                                        // Get product reviews
                                        $product_reviews = get_comments(
                                            array(
                                                'post_id' => $product_id,
                                                'status' => 'approve',
                                            )
                                        );
                                        if ($product_reviews) : 
                                        ?>
                                        <a href="<?php echo esc_url(get_permalink($product_id)); ?>"
                                            class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <?php echo $product->get_image(); ?>
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>
                                                    <?php echo esc_html($product->get_name()); ?>
                                                </h6>
                                                <span>
                                                    <?php echo $product->get_price_html(); ?>
                                                </span>

                                            </div>
                                        </a>
                                        <?php
                                        endif;
                                    endwhile;
                                    wp_reset_postdata(); // Reset product query
                                    }
                                else {
                                    echo __('No products found');
                                    }
                                ?>
                            </div>

                            <div class="latest-prdouct__slider__item">
                                <?php
                                $args = array(
                                    'post_type' => 'product',
                                    'posts_per_page' => 3,
                                    'orderby' => 'meta_value_num',
                                    'meta_key' => '_wc_average_rating',
                                    'offset'         => 3,
                                );

                                $loop = new WP_Query($args);

                                if ($loop->have_posts()) {
                                    while ($loop->have_posts()):
                                        $loop->the_post();
                                        global $product;
                                        
                                        $product_id = $product->get_id();

                                        // Get product reviews
                                        $product_reviews = get_comments(
                                            array(
                                                'post_id' => $product_id,
                                                'status' => 'approve',
                                            )
                                        );
                                        if ($product_reviews) : 
                                        ?>
                                        <a href="<?php echo esc_url(get_permalink($product_id)); ?>"
                                            class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <?php echo $product->get_image(); ?>
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>
                                                    <?php echo esc_html($product->get_name()); ?>
                                                </h6>
                                                <span>
                                                    <?php echo $product->get_price_html(); ?>
                                                </span>

                                            </div>
                                        </a>
                                        <?php
                                        endif;
                                    endwhile;
                                    wp_reset_postdata(); // Reset product query
                                    }
                                else {
                                    echo __('No products found');
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3
                    );
                    $query = new WP_Query($args);
                    while($query->have_posts()) {
                        $query->the_post();
                    ?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="<?php the_post_thumbnail_url();?>" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> <?php echo get_the_date( 'F j, Y' );?></li>
                                    <li><i class="fa fa-comment-o"></i> <?php echo get_comments_number();?></li>
                                </ul>
                                <h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                <?php the_excerpt();?>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                ?>
                
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <?php
    get_footer();
