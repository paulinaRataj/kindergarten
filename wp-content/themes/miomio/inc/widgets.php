<?php 

function ths_enqueue_widget_scripts() {
    wp_enqueue_media();
    wp_enqueue_script('widget', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);
}
add_action('admin_enqueue_scripts', 'ths_enqueue_widget_scripts');

// Image Widget
class ths_image_widget extends WP_Widget {

    // constructor
    public function __construct()
    {
        parent::__construct(
            'ths_image_widget',
            __('Image Widget', 'miomio'),
            array('description' => __('Shows image widget.', 'miomio'),) // Args
        );
    }

    // widget form creation
    public function form($instance) {
        // Check values
        if( $instance) {
            $title = esc_attr($instance['title']);
            $width = esc_attr($instance['width']);
            $height = esc_attr($instance['height']);
            $image_link = esc_attr($instance['image_link']);
            $image_uri = esc_attr($instance['image_uri']);
        } else {
            $title = '';
            $width = '';
            $height = '';
            $image_link = '';
            $image_uri = '';
        }
        ?>
        
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'miomio'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width', 'miomio'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" />
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Height', 'miomio'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('image_link'); ?>"><?php _e('Link', 'miomio'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('image_link'); ?>" name="<?php echo $this->get_field_name('image_link'); ?>" type="text" value="<?php echo $image_link; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'miomio'); ?></label><br />
            <?php
                if ( $instance['image_uri'] != '' ) :
                    echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
                endif;
            ?>
            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="Upload Image" style="margin-top:5px;" />
        </p>

    <?php }

    // widget update
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        // Fields
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['width'] = strip_tags($new_instance['width']);
        $instance['height'] = strip_tags($new_instance['height']);
        $instance['image_link'] = strip_tags($new_instance['image_link']);
        $instance['image_uri'] = strip_tags( $new_instance['image_uri'] );
        return $instance;
    }

    // widget display
    function widget($args, $instance) {
        extract( $args );
        // these are the widget options
        $title = apply_filters('widget_title', $instance['title']);
        $width = $instance['width'];
        $height = $instance['height'];
        $image_link = $instance['image_link'];
        $image_uri = $instance['image_uri'];
        echo $before_widget;
        // Display the widget

        // Check if title is set
        if ( $title ) {
            echo $before_title . $title . $after_title;
        }

        ?>
        
        <div class="image-widget">
            <a href="<?php echo $image_link ?>">
                <img src="<?php echo $image_uri ?>" alt="<?php echo $title ?>" style="width:<?php echo $width ?>; height:<?php echo $height ?>;">
            </a>    
        </div>

        <?php
        echo $after_widget;
    }
}

// register widget
register_widget('ths_image_widget');

//social widget
class ths_social_widget extends WP_Widget {

    // constructor
    public function __construct()
    {
        parent::__construct(
            'ths_social_widget',
            __('Social Widget', 'miomio'),
            array('description' => __('Shows social widget.', 'miomio'),) // Args
        );
    }

    // widget form creation
    public function form($instance) {
        // Check values
        if( $instance) {
            $title = esc_attr($instance['title']);
            $facebook = esc_attr($instance['facebook']);
            $twitter = esc_attr($instance['twitter']);
            $youtube = esc_attr($instance['youtube']);
            $linkedin = esc_attr($instance['linkedin']);
            $googleplus = esc_attr($instance['googleplus']);
        } else {
            $title = '';
            $facebook = '';
            $twitter = '';
            $youtube = '';
            $linkedin = '';
            $googleplus = '';
        }
        ?>
        
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'miomio'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook', 'miomio'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter', 'miomio'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Youtube', 'miomio'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo $youtube; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin', 'miomio'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo $linkedin; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('googleplus'); ?>"><?php _e('GooglePlus', 'miomio'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" name="<?php echo $this->get_field_name('googleplus'); ?>" type="text" value="<?php echo $googleplus; ?>" />
        </p>

    <?php }

    // widget update
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        // Fields
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['facebook'] = strip_tags($new_instance['facebook']);
        $instance['twitter'] = strip_tags($new_instance['twitter']);
        $instance['youtube'] = strip_tags($new_instance['youtube']);
        $instance['linkedin'] = strip_tags($new_instance['linkedin']);
        $instance['googleplus'] = strip_tags($new_instance['googleplus']);
        return $instance;
    }

    // widget display
    function widget($args, $instance) {
        extract( $args );
        // these are the widget options
        $title = apply_filters('widget_title', $instance['title']);
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $youtube = $instance['youtube'];
        $linkedin = $instance['linkedin'];
        $googleplus = $instance['googleplus'];
        echo $before_widget;
        // Display the widget

        // Check if title is set
        if ( $title ) {
            echo $before_title . $title . $after_title;
        }

        ?>
        
        <div class="social">
            <ul>
                <li><a href="<?php echo $facebook ?>" target="_blank"></a></li>
                <li><a href="<?php echo $twitter ?>" target="_blank"></a></li>
                <li><a href="<?php echo $youtube ?>" target="_blank"></a></li>
                <li><a href="<?php echo $linkedin ?>" target="_blank"></a></li>
                <li><a href="<?php echo $googleplus ?>" target="_blank"></a></li>
            </ul>
        </div>

        <?php
        echo $after_widget;
    }
}

// register widget
register_widget('ths_social_widget');