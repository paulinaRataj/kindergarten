
<?php get_header(); ?>
<section class="main-container">
    <div class="row">
        <div class="medium-8 columns">

		    <section class="ff-container">
				<div class="row">
					<div class="medium-7 columns">
						<a href="<?php echo get_post_meta(get_the_ID(), 'portfolio_link', true); ?>" target="_blank">
			                <?php the_post_thumbnail('single-project'); ?>
			            </a>
					</div>

					<div class="medium-5 columns">
						<span class="proj-spec">Project Name: </span><?php the_title(); ?>
						<div class="divider"></div>
						<?php 
						$terms = get_the_terms(get_the_ID(), "type");

	            		if ( !empty( $terms ) && !is_wp_error( $terms ) ){

	               		foreach ( $terms as $term ) { 
	               		?>

	               		<span class="proj-spec">Project Category: </span><?php echo $term->name; ?>	

		            	<?php
	              	  	}
	            		}
						?>
						<div class="divider"></div>
						<span class="proj-spec">Skills Needed: </span><?php echo get_post_meta(get_the_ID(), 'project_skills', true); ?>
						<div class="divider"></div>
						<span class="proj-spec">Project Description: </span>
						<?php while ( have_posts() ) : the_post(); 

							the_content(); 

						endwhile; ?>
					</div>
				</div>

		    </section>
        
        </div>
        <div class="medium-4 columns">

            <?php get_sidebar(); ?>
        
        </div>
    </div>
</section> <!-- main-wrapper -->

<?php get_footer(); ?>