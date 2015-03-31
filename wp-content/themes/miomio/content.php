
<article id="post-<?php the_ID(); ?>" <?php post_class('feed-item'); ?>>
		<div class="row">
		    <div class="<?php if(is_single() || is_page()): echo 'large-12'; else: echo 'large-5'; endif;  ?> columns">
		        <div class="img-holder">
		          	
		          	<?php 

		            if (is_single() || is_page()) {
		            	?>
		            	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('single-page'); ?></a>
		            	<?php
		            }

		            else {
		            	?>
		            	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog', array( 'class' => "feed-img")); ?></a>
		            	<?php
		            }

		            ?>

		        </div>
		        <!-- img holder -->
		    </div>
		    <div class="<?php if(is_single() || is_page()): echo 'large-12'; else: echo 'large-7'; endif;  ?> columns">
		        <div class="feed-content ">
		            <a href="<?php the_permalink(); ?>"><?php the_title('<h2>', '</h2>'); ?></a> 

		            <div class="post-meta">

		           		<?php 

						if (!is_page()) {

						?>

						<ul>
		                    <li><?php echo get_the_date(); ?></li>
		                    <li>
		                    <?php 
                				$categories = get_the_category();
                					
                				foreach($categories as $category) {
                	                
		                    	    $cat_link = get_category_link($category->cat_ID);
		                    ?>
		                    <a href="<?php echo $cat_link; ?>"><?php echo $category->name; ?></a>
		                    <?php } ?>
		                    </li>
		                    <li><?php comments_number(); ?> </li>
		                </ul>

						<?php 

						}

						?>
		                <div class="clearfix"></div>
		            </div>

		            <div class="feed-excerpt">
		                <?php 

							if (is_archive() || is_search() || is_category() || is_tag() || is_author() || is_home()) {
								
								the_excerpt();

							?>

							<a class="read-more button" href="<?php the_permalink(); ?>">Read More</a>

							<?php

							}

							else {

								the_content(); 

							}

						?>

		                <div class="clearfix"></div>
		            </div>
		            <!-- feed excerpt -->

		        </div>
		        <!-- feed content -->
		    </div>
    </div>
</article>