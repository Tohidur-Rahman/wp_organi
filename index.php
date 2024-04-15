<?php

get_header();
?>


<!-- Breadcrumb Section Begin -->

<section class="breadcrumb-section set-bg"
    style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/breadcrumb.jpg);">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
                <h2>
                    <?php wp_title(''); ?>
                </h2>
                <div class="breadcrumb__option">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                    <span>
                        <?php wp_title('/ ', true, 'left'); ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="blog__sidebar">
                     <?php get_sidebar(); ?>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    
                        <?php while (have_posts()):
                            the_post(); ?>
                            <?php get_template_part('template-parts/content', get_post_format()); ?>
                        <?php endwhile; ?>
                    <div class="col-lg-12">
                        <div class="product__pagination blog__pagination">
                        <?php
            the_posts_pagination([
              'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
              'next_text' => '<i class="fa fa-long-arrow-right"></i>',
              'screen_reader_text' => ' '
            ]);
          ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->

<?php get_footer(); ?>