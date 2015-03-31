<?php get_header(); ?>

<section class="main-container">
    <div class="row">
        <div class="medium-8 columns">
			<?php             
                
				$paged = get_query_var('paged') ? get_query_var('paged') : 1;

				if ($paged == 1 && $global_theme_options['opt-switch-slideshow'] == 1) {
	            ?>
	        	<div class="row">
	        		<div class="small-12 columns slideshow">
	        			<ul class="example-orbit" data-orbit>
	        				<?php 

	    					$args = array(
				            'post_type' => 'post',
				            'posts_per_page' => -1
					        );

					        $the_query = new  WP_Query($args);

	        				?>
							<?php if ( $the_query -> have_posts() ) : while ( $the_query -> have_posts() ) : $the_query -> the_post();

							if (get_post_meta(get_the_ID(), 'featured_post', true)) {

							?>
								  <li>
								    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('single-page'); ?></a>
								    <div class="orbit-caption">
								        <a href="<?php the_permalink(); ?>"><?php the_title( '<h4>', '</h4>' ); ?></a>	
								    </div>
								  </li>
						    <?php 
							}
					    	endwhile;
					    	endif;
						    ?>
						</ul>
	        		</div>
	        	</div>
				
			<?php } ?>
            
            <?php if ( have_posts() ) : ?>

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );


				endwhile;

				/*add pagination here*/

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>

			<div class="pagination">
		        <?php my_pagination(); ?>
		    </div>
        
        </div>
        <div class="medium-4 columns">

            <?php get_sidebar(); ?>
        
        </div>
    </div>
</section> <!-- main-wrapper -->

<?php get_footer(); ?>