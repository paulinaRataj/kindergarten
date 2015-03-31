<?php 

  /**
   * Template Name: Portfolio
   */

?>

<?php get_header(); ?>

<section class="main-container">
    <div class="row">
        <div class="medium-8 columns">

        	<header class="page-header">

				<h1 class="page-title"><?php the_title(); ?></h1>

			</header> <!-- page-header -->

		    <section class="ff-container">

		        <input id="select-type-all" name="radio-set-1" type="radio" class="ff-selector-type-all" checked="checked" />
		        <label for="select-type-all" class="ff-label-type-all">All</label>

			        <?php

	            		$terms = get_terms("type");

	            		if ( !empty( $terms ) && !is_wp_error( $terms ) ){

	               		foreach ( $terms as $term ) { ?>

	               		<input id="select-type-<?php echo $term->term_id; ?>" name="radio-set-1" type="radio" class="ff-selector-type-<?php echo $term->term_id; ?>"/>
			       		<label for="select-type-<?php echo $term->term_id; ?>" class="ff-label-type-<?php echo $term->term_id; ?>"><?php echo $term->name; ?></label>

	              	<?php 
	              	  	}
	            		}
					?>

		        <div class="clearfix"></div>

		        <ul class="ff-items port-col-3">
					
			        <?php

				        $args = array(
				            'post_type' => 'project',
				            'posts_per_page' => -1
				        );

				        $the_query = new  WP_Query($args);

				        
				        if ( $the_query -> have_posts() ) : while ( $the_query -> have_posts() ) : $the_query -> the_post();
			        ?>

					<?php

	            		$terms = get_the_terms(get_the_ID(), "type");

	            		if ( !empty( $terms ) && !is_wp_error( $terms ) ){

	               		foreach ( $terms as $term ) { ?>

	               		<li class="ff-item-type-<?php echo $term->term_id; ?>">
			                <a href="<?php the_permalink(); /*echo get_post_meta(get_the_ID(), 'portfolio_link', true);*/ ?>">
			                    <span><?php the_title(); ?></span>
			                    <?php the_post_thumbnail('project'); ?>
			                </a>
		            	</li>

	              	<?php 
	              	  	}
	            		}
					?>

		            <?php

		            endwhile;

		            else : echo "No projects found";

		            endif;

		            ?>
		        </ul>
		    </section>
        
        </div>
        <div class="medium-4 columns">

            <?php get_sidebar(); ?>
        
        </div>
    </div>
</section> <!-- main-wrapper -->

<?php get_footer(); ?>