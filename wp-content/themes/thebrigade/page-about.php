<?php
/*
 Template Name: About Page
 *
 * This is the about page template.
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
								<header class="hidden article-header" data-transition-delay="0">
									<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
								</header>

								<section class="entry-content hidden" itemprop="articleBody" data-transition-delay="1">
									<?php the_content(); ?>
								</section>

								<section class="hidden" data-transition-delay="2">
									<h4><span class="label">In Command</span><hr></h4>
									<ul><li class="hidden" data-transition-delay="3">
									<h2>David Dimeola</h2>
									<h3>CEO, Founder</h3>
									David founded The Brigade in 2006, and has served as both CEO and Creative Managing Director since. Thousands of freelancers and business owners use The Brigade to find projects, as well as track and find top talent across the creative industries.
									<p class="no-ital-block">David is fascinated by creativity, in particular how creativity manifests itself in the wide variety of people he has meet or learned about. He has committed his professional life to assembling creative individuals, teams, and networks for the purpose of crafting visual content.</p>
									</li><li class="hidden" data-transition-delay="4">
									<h2>Sean Broughton</h2>
									<h3>Creative Director, Partner</h3>
									Sean Broughton is a muti-award winning Visual Effects director and Supervisor. He has worked on film, commercial and music video projects over the last 20+ years winning MTV, Creative Circle, NY Festival, D&amp;AD awards. Those who have worked with Sean consider him the go to guy for post production and effects consulting work. Until selling it last year, Sean was creative director of Smoke &amp; Mirrors, a company he started in 1995, both in London and NY
									<p class="no-ital-block">Sean has collaborated many filmmakers, including Stanley Kubrick, David Slade, Jonathan Glazer, Spike Jonze, Spike Lee, Daniel Kleinman, Chris Cunningham, Walter Stern, and Joachim Back.</p>
									</li></ul>
								</section>
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
										<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
								</footer>
							</article>

							<?php endif; ?>

						</div>
				</div>

			</div>

<?php get_footer(); ?>
