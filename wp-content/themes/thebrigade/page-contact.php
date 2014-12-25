<?php
/*
 Template Name: Contact Page
 *
 * This is the contact page template.
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
				$googlemap = get_field('google_map'); 
				$contacts = get_field('contacts');
			?>
			<article id="post-<?php the_ID(); ?>" class="clearfix" role="article" itemscope itemtype="http://schema.org/BlogPosting">
				<header class="article-header hidden" data-transition-delay="0">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header>

				<section class="entry-content hidden" itemprop="articleBody" data-transition-delay="0">
				<p><?php echo $googlemap["address"]; ?></p>
				</section>

				<section class="entry-content hidden" data-transition-delay="1">
					<div id="map"></div>
				</section>

				<ul class="horizontal-list contacts-list">
					<?php $i=2; foreach ($contacts as $contact) : ?>
					<?php 
						$post = $contact["contact"];
						$post_fields = get_field_objects( $post->ID ); 
						$name = $post_fields["name"];
						$email = $post_fields["email"];
						$phone = $post_fields["phone"];
					?>
					<li class="contact hidden" data-transition-delay="<?php echo $i; ?>">
					<h2><?php echo $post->post_title; ?></h2>
					<h3><?php echo $name["value"]; ?></h3>
					<p><a href="mailto:<?php echo $email["value"]; ?>"><?php echo $email["value"]; ?></a>, <?php echo $phone["value"]; ?></p>
					</li>
					<?php $i++; endforeach; ?>
				</ul>
			</article>

			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCN2nH7ceViSI2udqlJHcM1kqD-f9m9K_Y&sensor=false"></script>
        
	        <script type="text/javascript">
	            // When the window has finished loading create our google map below
	            google.maps.event.addDomListener(window, 'load', init);

	            function init() {
	                // Basic options for a simple Google Map
	                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
	                var mapOptions = {
	                    // How zoomed in you want the map to start at (always required)
	                    zoom: 15,
	                    backgroundColor:"#336699",
	                    zoomControl: false,
						scaleControl: false,
						scrollwheel: false,
						disableDoubleClickZoom: true,
	                    // The latitude and longitude to center the map (always required)
	                    center: new google.maps.LatLng(<?php echo $googlemap["lat"]; ?>, <?php echo $googlemap["lng"]; ?>), // New York

	                    // How you would like to style the map. 
	                    // This is where you would paste any style found on Snazzy Maps.
	                    styles: [
	                    	{
	                    		featureType:"administrative",
	                    		elementType:"all",
	                    		stylers:[
	                    			{visibility:"on"},
	                    			{saturation:-100},
	                    			{lightness:20}
	                    		]
	                    	},
	                    	{
	                    		featureType:"road",
	                    		elementType:"all",
	                    		stylers:[
	                    			{visibility:"on"},
	                    			{saturation:-100},
	                    			{lightness:10}
	                    		]
	                    	},
	                    	{
	                    		featureType:"water",
	                    		elementType:"all",
	                    		stylers:[
	                    			{visibility:"on"},
	                    			{color:"#336699"},
	                    			{lightness:0}
	                    		]
	                    	},
	                    	{
	                    		featureType:"landscape.man_made",
	                    		elementType:"all",
	                    		stylers:[
	                    			{visibility:"simplified"},
	                    			{saturation:-100},
	                    			{lightness:10}
	                    		]
	                    	},
	                    	{
	                    		featureType:"landscape.natural",
	                    		elementType:"all",
	                    		stylers:[
	                    			{visibility:"simplified"},
	                    			{saturation:-100},
	                    			{lightness:10}
	                    		]
	                    	},	
	                    	{
	                    		featureType:"poi",
	                    		elementType:"all",
	                    		stylers:[
	                    			{visibility:"off"},
	                    			{saturation:-100},
	                    			{lightness:10}
	                    		]
	                    	},
	                    	{
	                    		featureType:"transit",
	                    		elementType:"all",
	                    		stylers:[
	                    			{visibility:"off"},
	                    			{saturation:-100},
	                    			{lightness:10}
	                    		]
	                    	}
	                    ]
	                };

	                // Get the HTML DOM element that will contain your map 
	                // We are using a div with id="map" seen below in the <body>
	                var mapElement = document.getElementById('map');

	                var myLatlng = new google.maps.LatLng(<?php echo $googlemap["lat"]; ?>,<?php echo $googlemap["lng"]; ?>);

	                // Create the Google Map using out element and options defined above
	                var map = new google.maps.Map(mapElement, mapOptions);
	                var image = {
						url: '<?php echo get_template_directory_uri(); ?>/library/images/marker.png',
						size: new google.maps.Size(70, 88),
						anchor: new google.maps.Point(22, 86),
						scaledSize: new google.maps.Size(70, 88)
					};
					var shape = {
				    	coords: [1, 1, 1, 60, 44, 60, 44 , 1],
      					type: 'poly'
					};
	                var marker = new google.maps.Marker({
						position: myLatlng,
						map: map,
						animation: google.maps.Animation.DROP,
						title:"Hello World!",
						icon:image,
						shape:shape
					});
	            }
	        </script>

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
