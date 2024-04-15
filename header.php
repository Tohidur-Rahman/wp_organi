<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ogani_Wcommerce
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
                                <li><i class="fa fa-envelope"></i> hello@.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
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
                        <a href="./index.html"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png"
                                alt=""></a>
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
    <!-- Header Section End -->
    <section class="hero hero-normal">
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
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>