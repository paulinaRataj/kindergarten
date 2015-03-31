
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="article-media">

		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-page'); ?></a> 	

	</div> <!-- article-media -->
	<header class="entry-header">
		<div class="article-title">

			<a href="<?php the_permalink(); ?>"><?php the_title('<h1>', '</h1>'); ?></a> 

		</div>
		
		<?php 

		if (is_single() || is_home()) {

			$categories = get_the_category();
				
			foreach($categories as $category) {
                
                $cat_link = get_category_link($category->cat_ID);

		?>

		<div class="article-meta">

			<span class="post-date">Posted on: <?php echo get_the_date(); ?></span>
			<span class="post-author">Posted by: <a href="<?php the_author_link(); ?>"><?php the_author(); ?></a></span>
			<span class="post-category">Category: <a href="<?php echo $cat_link; ?>"><?php echo $category->name; ?></a> </span>
			<span class="post-format">
				<a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'video' ) ); ?>"><?php echo get_post_format_string( 'video' ); ?></a>
			</span>
		
		</div>
		
		<?php 

			}

		}

		?>

	</header> <!-- entry-header -->
	<div class="article-content">
		
		<?php 

		if (is_archive() || is_search() || is_category() || is_tag() || is_author()) {
			
			the_excerpt();

		?>

		<div class="read-more"><a class="right" href="<?php the_permalink(); ?>">Read More</a></div>

		<?php

		}

		else {

			the_content(); 

		}
		
		?>
	
	</div> <!-- article-content -->
</article>