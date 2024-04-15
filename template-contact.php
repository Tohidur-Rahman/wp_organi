<?php
/*
  Template Name: Contact
*/
get_header();

?>
<!-- Hero Section Begin -->
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg"
    style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/breadcrumb.jpg);">
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
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <?php
            $contact_ctns = get_field('contact_content', 'option');
            foreach ($contact_ctns as $contact_ctn) {
                ?>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span><i class="fa <?php echo $contact_ctn['contact_icon']; ?>"></i></span>
                        <h4><?php echo $contact_ctn['contact_title']; ?></h4>
                        <p><?php echo $contact_ctn['contact_desc']; ?></p>
                    </div>
                </div>
                
                <?php
                }
            ?>
           
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Map Begin -->
<div class="map">
    <iframe
        src="<?php echo the_field('contact_map', 'option'); ?>"
        height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    
</div>
<!-- Map End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Leave Message</h2>
                </div>
            </div>
        </div>
        <?php $ctf= the_field('contact_form', 'option');?>
        <?php echo do_shortcode($ctf); ?>
    </div>
</div>
<!-- Contact Form End -->
<?php get_footer(); ?>