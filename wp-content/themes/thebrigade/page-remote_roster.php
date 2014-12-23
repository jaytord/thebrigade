<?php
/*
 Template Name: Remote Roster Page
 *
 * This is the remove roster page template.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap cf">
		<div id="main" class="m-all cf" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				<header class="article-header">
					<?php 
						$pieces = explode("~", get_the_title() );
					?>
					<h1 class="page-title"><!--
						<?php foreach ($pieces as $key => $piece): ?>
						--><span><?php echo $piece; ?></span><!--
						<?php endforeach; ?>
					--></h1>
				</header>

				<section class="entry-content cf" itemprop="articleBody">
					<?php the_content(); ?>
				</section>

				<section class="entry-content cf" itemprop="articleBody">
					<h2>Member Login</h2>
					<form id="member_login_form">
						<fieldset><label for="email"><h3>Email</h3></label><input type="text" name="email"/></fieldset><!--
						--><fieldset><label for="password"><h3>Password</h3></label><input type="password" name="password"/></fieldset>
						<fieldset><input type="submit" value="Log In" /></fieldset>
					</form>
				</section>

				<section class="entry-content cf" itemprop="articleBody">
					<h2>Not a menber yet? Join The Roster!</h2>
					<p>Join Brigade's international roster of top-shelf designers, animators, programmers, and other digital experts today.</p>
					<p>The Brigade is a creative production company integrating live-action and post production. The studio is internationally known for creating original work by assembling custom creative teams from across the globe. Whether you're a remotist abroad or working from our own New York studio hub, not only do we find freelancers work, but we also help them build networks, portfolios, and industry contacts.</p>
					<form id="member_join_form">
						<fieldset><label for="email"><h3>First Name</h3></label><input type="text" name="first_name"/></fieldset><!--
						--><fieldset><label for="last_name"><h3>Last Name</h3></label><input type="text" name="last_name"/></fieldset><!--
						--><fieldset><label for="email"><h3>Email</h3></label><input type="text" name="email"/></fieldset><!--
						--><fieldset><label for="password"><h3>Pasword</h3></label><input type="password" name="password"/></fieldset>
						<fieldset><input type="submit" value="Join Now" /></fieldset>
					</form>
				</section>
			</article>

			<?php endwhile; else : ?>

			<article id="post-not-found" class="hentry cf">
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
