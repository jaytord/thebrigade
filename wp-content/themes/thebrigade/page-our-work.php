<?php
/*
 Template Name: Our Work Page
 *
 * This is the our work page template.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap">
		<div id="main" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" class="clearfix" role="article" itemscope itemtype="http://schema.org/BlogPosting">
				<header class="article-header hidden" data-transition-delay="0">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header>

				<section class="entry-content hidden" itemprop="articleBody" data-transition-delay="0">
				<?php the_content(); ?>
				</section>

				<section class="entry-content" itemprop="ourwork">
					<?php
						$args = array(
							'posts_per_page'   => 50,
							'offset'           => 0,
							'category'         => '',
							'category_name'    => '',
							'orderby'          => 'post_date',
							'order'            => 'DESC',
							'include'          => '',
							'exclude'          => '',
							'meta_key'         => '',
							'meta_value'       => '',
							'post_type'        => 'project',
							'post_mime_type'   => '',
							'post_parent'      => '',
							'post_status'      => 'publish',
							'suppress_filters' => true
						);
						$projects = get_posts( $args );
					?> 
					<ul class="projects-list"><!--
						<?php $i=1; foreach($projects as $pk=>$project) : ?>
						<?php 
							$pid 		= $project->ID;
							$image_id 	= get_post_thumbnail_id( $pid );
							$image 		= wp_get_attachment_image_src( $image_id, 'full' ); 
							$src 		= $image[0];
							$width		= $image[1];
							$height 	= $image[2];

							$client = get_field_object('client',$pid);
						?>
						--><li class="project hidden" data-transition-delay="<?php echo $i; ?>"><a href="<?php echo get_permalink($pid); ?>" class="project-inner" style="background-image:url(<?php echo $src; ?>)">
							<!-- <div class="big-play-button"><div class="big-play-button-inner"><i class="arrow"></i></div></div> -->
							<div class="project-label">
								<div class="project-label-inner">
									<div class="next-arrow"><span>learn more</span><i></i></div>
									<h2><?php echo $project->post_title; ?></h2>
									<h3><?php echo $client['value']; ?></h3>
								</div>
							</div>
						</a></li><!--
						<?php $i++; endforeach; ?>
					--></ul>
				</section>

				<footer class="article-footer">
  				<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>
				</footer>
			</article>

			<?php endwhile; else : ?>

			<article id="post-not-found" class="hentry">
					<header class="article-header">
						<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
				</header>
					<section class="entry-content">
						<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
				</section>
				<footer class="article-footer">
						<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
				</footer>
			</article>

			<?php endif; ?>

		</div>
	</div>
</div>

<?php get_footer(); ?>
