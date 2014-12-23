			<footer class="footer" role="contentinfo">
				<div id="inner-footer" class="wrap cf">
					<?php
						$args = array(
							'posts_per_page'   => 50,
							'offset'           => 0,
							'contact_cat'      => 'footer',
							'orderby'          => 'post_date',
							'order'            => 'DESC',
							'include'          => '',
							'exclude'          => '',
							'meta_key'         => '',
							'meta_value'       => '',
							'post_type'        => 'contact',
							'post_mime_type'   => '',
							'post_parent'      => '',
							'post_status'      => 'publish',
							'suppress_filters' => true
						);
						$contacts = get_posts( $args );
					?> 

					<ul class="horizontal-list contacts-list"><!--
						<?php foreach ($contacts as $post) : ?>
						<?php 
							$post_fields = get_field_objects( $post->ID ); 
							$name = $post_fields["name"];
							$address = $post_fields["address"];
							$city = $post_fields["city"];
							$state = $post_fields["state"];
							$zipcode = $post_fields["zipcode"];
							$email = $post_fields["email"];
							$phone = $post_fields["phone"];
						?>
						--><li class="contact">
							<h3><?php echo $post->post_title; ?></h3><p>
							<?php if($name && !empty($name["value"])): ?>
							<?php echo $name["value"]; ?><br />
							<?php endif; if($address && !empty($address["value"])): ?>
							<?php echo $address["value"]; ?><br />
							<?php endif; if($city && !empty($city["value"])): ?>
							<?php echo $city["value"]; ?>, <?php echo $state["value"]; ?> <?php echo $zipcode["value"]; ?><br />
							<?php endif; if($email && !empty($email["value"])): ?>
							<a href="mailto:<?php echo $email["value"]; ?>"><?php echo $email["value"]; ?></a><br />
							<?php endif; if($phone && !empty($phone["value"])): ?>
							<?php echo $phone["value"]; ?>
							<?php endif; ?></p>
						</li><!--
						<?php endforeach; ?>
					--></ul>

					<a href="<?php echo home_url(); ?>" rel="nofollow" class="logo">
						<img class="clearfix" src="<?php echo get_template_directory_uri(); ?>/library/images/footer_logo.png" />
					</a>

					<nav role="navigation">
						<?php wp_nav_menu(array(
	    					'container' => '',                              // remove nav container
	    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
	    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
	    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
	    					'theme_location' => 'footer-links',             // where it's located in the theme
	    					'before' => '',                                 // before the menu
	        				'after' => '',                                  // after the menu
	        				'link_before' => '',                            // before each link
	        				'link_after' => '',                             // after each link
	        				'depth' => 0,                                   // limit the depth of the nav
	    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</nav>

					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>
				</div>
			</footer>
		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
