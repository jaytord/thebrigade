<?php
/*
 Template Name: Home Page
 *
 * This is the home page template.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap">
		<div id="main" role="main">
			<div class="vimeo-overlay"></div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" class="clearfix" role="article" itemscope itemtype="http://schema.org/BlogPosting">
				<header class="article-header hidden" data-transition-delay="0">
					<?php 
						$pieces = explode("~", get_the_title() );
					?>
					<h1 class="page-title"><!--
						<?php foreach ($pieces as $key => $piece): ?>
						--><span><?php echo $piece; ?></span><!--
						<?php endforeach; ?>
					--></h1>
					<?php the_content(); ?>
				</header>

				<section class="entry-content hidden" itemprop="reel" data-transition-delay="1">
					<?php
						$fields = get_field_objects();
						$vimeo_id_field = $fields["reel_vimeo_id"];
						$reel_title = $fields["reel_title"];
						$thumb_src = $fields["reel_poster_image"];
						$featured_work = $fields["featured_work"];
					?>
					<h2><?php echo $reel_title['value']; ?></h2>
					<p></p>
					<div class="vimeo-player">
						<iframe id="vimeo-<?php echo $vimeo_id_field['value']; ?>" width="960" height="540" src="//player.vimeo.com/video/<?php echo $vimeo_id_field['value']; ?>?player_id=vimeo-<?php echo $vimeo_id_field['value']; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						<div class="poster" style="background-image:url(<?php echo $thumb_src['value']; ?>)"><div class="big-play-button"><div class="big-play-button-inner"><i class="arrow"></i></div></div></div>
					</div>
				</section><!-- end article section -->

				<section class="hidden" data-transition-delay="2">
					<h4><span class="label"><?php echo $featured_work["label"]; ?></span><br>
					<hr></h4>
				</section>

				<section class="entry-content" itemprop="featured_work">
					<ul class="featured-projects-list">
						<?php $i=2; foreach ($featured_work["value"] as $key => $project_object):?>
						<?php 
							$project = $project_object[""]; 
							$post_fields = get_field_objects($project->ID); 
							$post_vimeo_id  = $post_fields["vimeo_id"];
							$post_thumb  = wp_get_attachment_url( get_post_thumbnail_id($project->ID) );
							$post_client = $post_fields["client"];
							$post_short_description = $project_object["short_description"];
						?><!--
						--><li class="featured-project hidden" data-transition-delay="<?php echo $i; ?>">
							<a class="featured-project-label" href="<?php echo get_permalink($project->ID); ?>">
								<h2><?php echo $project->post_title; ?></h2>
								<h3><?php echo $post_client["value"]; ?></h3>
								<div class="next-arrow"><span>learn more</span><i></i></div>
								<p><?php echo $post_short_description; ?></p>
							</a>
							<div class="vimeo-player">
								<iframe id="vimeo-<?php echo $post_vimeo_id['value']; ?>" width="960" height="540" src="//player.vimeo.com/video/<?php echo $post_vimeo_id['value']; ?>?player_id=vimeo-<?php echo $post_vimeo_id['value']; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
								<div class="poster" style="background-image:url(<?php echo $post_thumb; ?>)"><div class="big-play-button"><div class="big-play-button-inner"><i class="arrow"></i></div></div></div>
							</div>
						</li>
						<?php $i++; endforeach; ?><!--
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
