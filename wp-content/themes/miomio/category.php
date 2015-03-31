<?php get_header(); ?>

<section class="main-container">
    <div class="row">
        <div class="medium-8 columns">

            <?php if ( have_posts() ) : ?>

			<header class="page-header">

				<h1 class="page-title"><?php printf( __( 'Category Archives: %s', 'miomio' ), single_cat_title( '', false ) ); ?></h1>

				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>

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
