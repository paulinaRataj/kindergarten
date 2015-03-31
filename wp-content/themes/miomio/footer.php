<?php global $global_theme_options; ?>

<footer class="footer">
    <div class="footer-wrapper">
        <div class="row">
            <div class="medium-6 columns small-text-center medium-text-left">

                <h6>
                    <?php
                    
                    if( $global_theme_options['opt-switch-copyright'] == 1 ){

                        echo $global_theme_options['opt-copyright'];

                    }                
                    
                    ?>
                </h6>

                <p class="created-by"><a href="http://manoolia.com" target="_blank" >Created by Manoolia</a></p>

            </div>
            <div class="medium-6 columns">
                
            <!-- footer menu -->
            <?php

            $main_menu_args = array(
                'theme_location'  => 'footer-menu',
                'menu'            => 'footer-menu',
                'container'       => 'div',
                'container_class' => 'footer-menu',
                'menu_class'      => 'footer-menu'
            );

            wp_nav_menu( $main_menu_args );

            ?>    

            </div>
        </div>
    </div> <!-- footer-wrapper -->
</footer>

<?php wp_footer(); ?>

<script>

    jQuery(document).ready(function($) {

        $(document).foundation();

    });

</script>

<!--custom footer styles-->
<style>

    <?php echo $global_theme_options['opt-custom-css']; ?>

</style>

<!--custom footer scripts-->
<script>

    <?php echo $global_theme_options['opt-custom-js']; ?>

</script>

</body>
</html>