<div class="col-lg-6 col-md-6 col-sm-6">
<div class="blog__item">
	<div class="blog__item__pic">
		<img src="<?php the_post_thumbnail_url(); ?>">
	</div>
	<div class="blog__item__text">
		<ul>
			<li><i class="fa fa-calendar-o"></i> <?php the_time('d, F, Y'); ?></li>
			<li><i class="fa fa-comment-o"></i> <?php echo get_comments_number(); ?></li>
		</ul>
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<p><?php echo wp_trim_words(get_the_content(), 30, ''); ?></p>
		<a href="<?php the_permalink(); ?>" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
	</div>
</div>
</div>