<?php get_header(); ?>


<!-- Blog Details Hero Begin -->
<section class="blog-details-hero set-bg"
	style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/breadcrumb.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="blog__details__hero__text">
					<h2>
						<?php the_title(); ?>
					</h2>
					<ul>
						<li>By
							<?php
							$author_id = $post->post_author;
							echo get_the_author_meta('display_name', $author_id); ?>
						</li>
						<li>
							<?php echo get_the_date('F j, Y'); ?>
						</li>
						<li>
							<?php echo get_comments_number() . " " . __('Comments', 'organi'); ?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Blog Details Hero End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-5 order-md-1 order-2">
				<div class="blog__sidebar">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
			</div>
			<div class="col-lg-8 col-md-7 order-md-1 order-1">
				<div class="blog__details__text">
					<img src="<?php the_post_thumbnail_url(); ?>">
					<?php the_content(); ?>
				</div>
				<div class="blog__details__content">
					<div class="row">
						<div class="col-lg-6">
							<div class="blog__details__author">
								<div class="blog__details__author__pic">
									<img src="<?php echo get_avatar_url($author_id); ?>" alt="">
								</div>
								<div class="blog__details__author__text">
									<h6>
										<?php echo get_the_author_meta('display_name', $author_id); ?>
									</h6>
									<span>
										<?php
										$user_meta = get_userdata($author_id);
										echo $user_roles = $user_meta->roles[0]; ?>
									</span>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="blog__details__widget">
								<ul>
									<li><span>Categories:</span>
										<?php
										$cats = get_categories();
										foreach ($cats as $cat) {
											echo $cat->name . ', ';
											}
										?>
									</li>
									<li><span>Tags:</span>
										<?php
										$tags = get_the_tags();
										foreach ($tags as $tag) {
											echo $tag->name . ', ';
											}
										?>
									</li>
								</ul>
								<div class="blog__details__social">

									<a href="https://www.facebook.com/sharer/sharer.php?u=<?= get_permalink(); ?>"
										target="_blank"><i class="fa fa-facebook"></i></a>

									<a href="https://www.twitter.com/share?url=<?= get_permalink(); ?>&text=<?= get_the_title(); ?>"
										target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>

									<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= get_permalink(); ?>"
										target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>

									<a href="mailto:?subject=<?= get_the_title(); ?> - <?= site_url(); ?>&body=I found this post on <?= site_url(); ?> and thought it would interest you.%0D%0A%0D%0A<?= get_the_title(); ?>%0D%0A<?= get_permalink(); ?>"
										target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Blog Details Section End -->

<!-- Related Blog Section Begin -->
<section class="related-blog spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title related-blog-title">
					<h2>Post You May Like</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			$related_posts = get_posts(
				array(

					'category__in' => wp_get_post_categories($post->ID),
					'numberposts' => 3,
					'post__not_in' => array($post->ID)
				));

			//print_r($related_posts);
			foreach ($related_posts as $single) {
				?>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="blog__item">
						<div class="blog__item__pic">
							<?php echo get_the_post_thumbnail($single->ID, 'thumbnail'); ?>
						</div>
						<div class="blog__item__text">
							<ul>
								<li><i class="fa fa-calendar-o"></i>
									<?php echo $single->post_date; ?>
								</li>
								<li><i class="fa fa-comment-o"></i>
									<?php echo $single->comment_count; ?>
								</li>
							</ul>
							<h5><a href="<?php the_permalink($single->ID); ?>">
									<?php echo $single->post_title; ?>
								</a></h5>
							<?php echo $single->post_excerpt; ?>
						</div>
					</div>
				</div>
				<?php
				}
			?>
		</div>
	</div>
</section>
<!-- Related Blog Section End -->
<?php get_footer(); ?>