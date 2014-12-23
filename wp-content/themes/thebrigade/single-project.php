<?php
/*
 * CUSTOM POST TYPE TEMPLATE
 *
 * This is the custom post type post template. If you edit the post type name, you've got
 * to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is "register_post_type( 'bookmarks')",
 * then your single template should be single-bookmarks.php
 *
 * Be aware that you should rename 'project_cat' and 'project_tag' to the appropiate custom
 * category and taxonomy slugs, or this template will not finish to load properly.
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

								<header class="article-header">
									<h1 class="single-title custom-post-type-title"><?php the_title(); ?></h1>
								</header>

								<section class="entry-content cf">
									<?php
										$fields = get_field_objects();

										$vimeo_id_field = $fields["vimeo_id"];
										$thumb_src = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

										$description_field = $fields["description"];
										$client_field = $fields["client"];

										$credit_fields = $fields["credits"];
										$credit_fields = $credit_fields["value"];

										$motion_style = $fields["motion_style"];
										$motion_style = $motion_style['value'];

										$categories = get_categories( array('taxonomy'=>'project_cat') );
									?>
									<div class="vimeo-player">
										<iframe id="vimeo-<?php echo $vimeo_id_field['value']; ?>" width="960" height="540" src="//player.vimeo.com/video/<?php echo $vimeo_id_field['value']; ?>?player_id=vimeo-<?php echo $vimeo_id_field['value']; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
										<div class="poster" style="background-image:url(<?php echo $thumb_src; ?>)"><div class="big-play-button"><div class="big-play-button-inner"><i class="arrow"></i></div></div></div>
									</div>
									<?php if(!empty($description_field["value"])) :?>
									<p><?php echo $description_field['value']; ?></p>
									<?php endif; ?>
									<section class="whatwedid">
										<h3>What we did</h3>
										<ul class="category-list"><!--
										<?php foreach ($categories as $ck=>$cat) : ?>
										--><li>
											<h2><a><?php echo $cat->cat_name; ?></a></h2>
										</li><!--
										<?php endforeach; ?>
										--></ul>
									</section>
									<section class="credits">
										<ul class="credits-list"><li>
											<h3><?php echo $client_field['label']; ?></h3>
											<p class="no-ital-block"><?php echo $client_field['value']; ?></p>
										</li><!--
										<?php foreach ($credit_fields as $fk=>$field) : ?>
										--><li>
											<h3><?php echo $field['label']; ?></h3>
											<p class="no-ital-block"><?php echo $field['value']; ?></p>
										</li><!--
										<?php endforeach; ?>
										--></ul>
									</section>
								</section> <!-- end article section -->
								<?php if(count($motion_style) > 0) : ?>
								<h4><span class="label">Motion & Style</span><br><hr></h4>
								<?php endif; ?>
								<?php foreach($motion_style as $msk=>$image) : ?>
								<img src="<?php echo $image["style_image"]; ?>" width="100%" />
								<?php endforeach; ?>
								<footer class="article-footer">
									<p class="tags"><?php echo get_the_term_list( get_the_ID(), 'project_tag', '<span class="tags-title">' . __( 'Custom Tags:', 'bonestheme' ) . '</span> ', ', ' ) ?></p>
								</footer>

							</article>

							<?php endwhile; ?>

							<?php else : ?>
									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single-project.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>
				</div>

			</div>

<?php get_footer(); ?>
