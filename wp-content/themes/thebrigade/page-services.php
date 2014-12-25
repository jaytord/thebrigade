<?php
/*
 Template Name: Services Page
 *
 * This is the services page template.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap">
		<div id="main" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php 
				$services = get_field('services');
				print_r($specialties);
			?>
			<article id="post-<?php the_ID(); ?>" class="clearfix" role="article" itemscope itemtype="http://schema.org/BlogPosting">
				<header class="article-header hidden" data-transition-delay="0">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header>

				<section class="entry-content hidden" itemprop="articleBody" data-transition-delay="0">
				<?php the_content(); ?>
				</section>
				<h4><span class="label">Specialties</span><br><hr></h4>
				<ul class="horizontal-list services-list">
					<?php $i=1; foreach ($services as $service) : ?>
					<li class="service hidden" data-transition-delay="<?php echo $i; ?>">
						<div class="service-inner">
							<!-- <div class="service-image" style="background-image:url(<?php echo $service['image']; ?>)"></div> -->
							<h2><?php echo $service['title']; ?></h2>
							<p class="no-ital-block"><?php echo $service['description']; ?></p>
						</div>
					</li>
					<?php $i++; endforeach; ?>
				</ul>
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
