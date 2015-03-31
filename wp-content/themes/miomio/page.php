<?php get_header(); ?>

<section class="main-container">
    <div class="row">
        <div class="medium-8 columns">
            
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', 'page' );


				endwhile;
			?>

        </div>
        <div class="medium-4 columns">

            <?php get_sidebar(); ?>
        
        </div>
    </div>
</section> <!-- main wrapper -->

<?php get_footer(); ?>
