<?php get_header(); ?>

<section class="main-container">
    <div class="row">
        <div class="medium-9 columns">

            <header class="page-header">

				<h1 class="page-title"><?php _e( 'Error 404', 'miomio' ); ?></h1>
				
			</header> <!-- page-header -->

			<div class="page-content">
				
				<p><?php _e( 'Page not found', 'miomio') ?></p>

			</div> <!-- page-content -->
        
        </div>
        <div class="medium-3 columns">

            <?php get_sidebar(); ?>
        
        </div>
    </div>
</section> <!-- main-wrapper -->

<?php get_footer(); ?>