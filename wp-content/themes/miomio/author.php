<?php get_header(); ?>

<section class="main-container">
    <div class="row">
        <div class="medium-8 columns">

            <?php if ( have_posts() ) : ?>

			<header class="page-header">

				<h1 class="page-title">

					<?php
						/*
						 * Queue the first post, that way we know what author
						 * we're dealing with (if that is the case).
						 *
						 * We reset this later so we can run the loop properly
						 * with a call to rewind_posts().
						 */
						the_post();

						printf( __( 'All posts by %s', 'miomio' ), get_the_author() );
					?>

				</h1>

				<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<div class="author-description"><?php the_author_meta( 'description' ); ?></div>
				<?php endif; ?>
		
			</header> <!-- page-header -->

			<?php

				/*
				 * Since we called the_post() above, we need to rewind
				 * the loop back to the beginning that way we can run
				 * the loop properly, in full.
				 */
				rewind_posts();

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
</section> <!-- main wrapper -->

<?php get_footer(); ?>
