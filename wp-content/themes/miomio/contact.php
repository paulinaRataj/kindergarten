<?php 

  /**
   * Template Name: Contact
   */

?>

<?php get_header(); ?>

<section class="main-container">
    <div class="row">
        <div class="medium-8 columns">

        	<header class="page-header">

				<h1 class="page-title"><?php the_title(); ?></h1>

			</header> <!-- page-header -->

		    <section class="contact-container">
				
				<div class="row">

					<div class="small-12 medium-8 columns">
						<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
						<script>

							/*google map*/     
							function initialize() {
							var myLatlng = new google.maps.LatLng(<?php echo $global_theme_options['opt-latitude']; ?>, <?php echo $global_theme_options['opt-longitude']; ?>);
							var mapOptions = {
							        center:myLatlng,
							        zoom:16,
							        disableDefaultUI:true,
							        mapTypeId:google.maps.MapTypeId.ROADMAP
							        }
							var map = new google.maps.Map(document.getElementById("map"), mapOptions);

							var marker = new google.maps.Marker({
							        position: myLatlng,
							        map: map,
							        icon: "<?php echo $global_theme_options['opt-map-marker']['url']; ?>"
							        });
							}

							google.maps.event.addDomListener(window, 'load', initialize);

						</script>
						<div id="map"></div>
					</div>
					<div class="small-12 medium-4 columns">
						<?php

							while ( have_posts() ) : the_post();
					        
					        the_content();

							endwhile;

		        		?>
					</div>
					
				</div>

				<div class="contact-form">

					<?php 
					
                		echo do_shortcode( $global_theme_options['opt-contact-sc'] );

               		 ?>
					
				</div>

		    </section>
        
        </div>
        <div class="medium-4 columns">

            <?php get_sidebar(); ?>
        
        </div>
    </div>
</section> <!-- main-wrapper -->

<?php get_footer(); ?>