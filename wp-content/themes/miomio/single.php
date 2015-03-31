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
					get_template_part( 'content', get_post_format() );


				endwhile;
			?>

			<div class="comment-section">
				<div class="row">
					<div class="small-12 columns">
						<?php 

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
						
						?>
					</div>
				</div>

			</div> <!-- comment-section -->

        </div>
        <div class="medium-4 columns">

            <?php get_sidebar(); ?>
        
        </div>
    </div>
</section> <!-- main wrapper -->

<?php get_footer(); ?>
