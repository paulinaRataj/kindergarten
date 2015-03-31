<?php get_header(); ?>

<section class="main-container">
    <div class="row">
        <div class="medium-8 columns">

            <?php if ( have_posts() ) : ?>

			<header class="page-header">

				<h1 class="page-title">

					<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'miomio' ), get_the_date() );

						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'miomio' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'miomio' ) ) );

						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'miomio' ), get_the_date( _x( 'Y', 'yearly archives date format', 'miomio' ) ) );

						else :
							_e( 'Archives', 'miomio' );

						endif;
					?>

				</h1>

			</header> <!-- page-header -->

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
</section> <!-- main wrapper -->

<?php get_footer(); ?>
