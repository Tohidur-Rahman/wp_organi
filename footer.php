<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ogani_Wcommerce
 */

?>

<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <?php
                        $footer_left = get_field('footer_left', 'option');
                        ?>
                        <a href="<?php echo site_url(); ?>"><img src="<?php echo $footer_left['footer_logo']['url']; ?>"
                                alt="<?php echo $footer_logo['footer_logo']['alt']; ?>"></a>
                    </div>
                    <ul>
                        <li>
                            <?php echo $footer_left['footer_address']; ?>
                        </li>
                        <li>
                            <?php echo $footer_left['footer_phone']; ?>
                        </li>
                        <li>
                            <?php echo $footer_left['footer_email']; ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <?php
                    dynamic_sidebar('footer');
                    ?>
                </div>
            </div>
            <!-- <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="footer__widget">
                <?php
                dynamic_sidebar('footer_shop');
                ?>
                </div>
            </div> -->
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <?php
                    $footer_right = get_field('footer_right', 'option');
                    ?>
                    <h6>
                        <?php echo $footer_right['newsletter_title']; ?>
                    </h6>
                    <p>
                        <?php echo $footer_right['newsletter_des']; ?>
                    </p>
                    <?php echo do_shortcode($footer_right['news_std_code']); ?>
                    <div class="footer__widget__social">
                        <?php
                        $footer_socials = $footer_right['footer_social'];
                        foreach ($footer_socials as $footer_social) {
                            ?>
                            <a href="<?php echo $footer_social['footer_social_link']; ?>"><i
                                    class="fa <?php echo $footer_social['footer_s_icon']; ?>"></i></a>
                            <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <?php
                        $footer_btm = get_field('footer_bottom', 'option');
                        ?>
                        <p>
                            <?php echo $footer_btm['copywrite_text']; ?>
                        </p>
                    </div>
                    <div class="footer__copyright__payment"><img
                            src="<?php echo $footer_btm['payment_get_image']['url']; ?>"
                            alt="<?php echo $footer_btm['payment_get_image']['alt']; ?>"></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>