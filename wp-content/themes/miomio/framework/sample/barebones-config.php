<?php

/**
  ReduxFramework Sample Config File
  For full documentation, please visit: https://docs.reduxframework.com
 * */

if (!class_exists('Redux_Framework_sample_config')) {

    class Redux_Framework_sample_config {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }

        }

        public function initSettings() {

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 3);

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        function compiler_action($options, $css, $changed_values) {
            global $wp_filesystem;

            $filename = dirname(__FILE__) . '../../../css/custom-style.css';

            if( empty( $wp_filesystem ) ) {
                require_once( ABSPATH .'/wp-admin/includes/file.php' );
                WP_Filesystem();
            }

            if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
            }
        }

        public function setSections() {

            // ACTUAL DECLARATION OF SECTIONS
            $this->sections[] = array(
                'title'     => __('General Settings', 'redux-framework-demo'),
                'icon' => 'el-icon-cogs',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    array(
                        'id'        => 'opt-logo',
                        'type'      => 'media',
                        'title'     => __('Theme Logo', 'redux-framework-demo'),
                        'compiler'  => 'true',
                        'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'      => __('Basic media uploader with disabled URL input field.', 'redux-framework-demo'),
                        'subtitle'  => __('Upload the logo using the WordPress native uploader', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-favicon',
                        'type'      => 'media',
                        'title'     => __('Theme Favicon', 'redux-framework-demo'),
                        'compiler'  => 'true',
                        'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'      => __('Basic media uploader with disabled URL input field.', 'redux-framework-demo'),
                        'subtitle'  => __('Upload the favicon using the WordPress native uploader', 'redux-framework-demo'),
                    ),
                )
            );

            $this->sections[] = array(
                'title'     => __('Home Options', 'redux-framework-demo'),
                'icon' => 'el-icon-screen',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    array(
                        'id'       => 'opt-switch-slideshow',
                        'type'     => 'switch', 
                        'title'    => __('Slideshow Visibility', 'redux-framework-demo'),
                        'subtitle' => __('Toggle slideshow area on or off.', 'redux-framework-demo'),
                        'default'  => true,
                    ),
                )
            );

            $this->sections[] = array(
                'title'     => __('Footer Options', 'redux-framework-demo'),
                'icon' => 'el-icon-arrow-down',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(

                    array(
                        'id'       => 'opt-switch-copyright',
                        'type'     => 'switch', 
                        'title'    => __('Footer Copyright Visibility', 'redux-framework-demo'),
                        'subtitle' => __('Toggle footer copyright area on or off.', 'redux-framework-demo'),
                        'default'  => true,
                    ),
                    array(
                        'id'        => 'opt-copyright',
                        'type'      => 'textarea',
                        'title'     => __('Footer Text', 'redux-framework-demo'),
                        'subtitle'  => __('Insert text for your theme footer copyright.', 'redux-framework-demo'),
                        'default'   => 'Copyright',
                    ),
                )
            );

            $this->sections[] = array(
                'title'     => __('Style Options', 'redux-framework-demo'),
                'icon' => 'el-icon-brush',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    array(         
                    'id' => 'opt-background',
                    'type'     => 'background',
                    'title'    => __('Body Background', 'redux-framework-demo'),
                    'subtitle' => __('Body background with image, color, etc.', 'redux-framework-demo'),
                    'desc'     => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
                    'background-attachment' => false,
                    'background-position' => false,
                    'background-size' => false,
                    'default'  => array(
                    'background-color' => '#F1F1F1',
                        )
                    ),
                    array(
                        'id'        => 'opt-color-theme',
                        'type'      => 'color',
                        'title'     => __('Theme Color', 'redux-framework-demo'),
                        'subtitle'  => __('Pick a main color for the theme (default: #672d82).', 'redux-framework-demo'),
                        'default'   => '#672d82',
                        'validate'  => 'color',
                        'output'    => array(
                            'border-top-color' => '.header',
                            'background'       => '.right-sidebar .side-item ul li:before',
                            'color'            => '.post-meta ul li a, .footer-menu ul li a:hover, .created-by a, .footer a'
                        )
                    ),
                    array(
                        'id'        => 'opt-button-color',
                        'type'      => 'color',
                        'title'     => __('Buttons Color', 'redux-framework-demo'),
                        'subtitle'  => __('Pick a main color for buttons (default: #672d82).', 'redux-framework-demo'),
                        'default'   => '#672d82',
                        'validate'  => 'color',
                        'output'    => array(
                            'background'       => '.read-more.button, .search-form input[type="submit"], input[type="submit"], .pagination .current',
                            'border-color'            => 'textarea:focus, input[type="search"]:focus, input[type="text"]:focus, input[type="email"]:focus'
                        )
                    ),
                    array(
                        'id'        => 'opt-button-color-hover',
                        'type'      => 'color',
                        'title'     => __('Buttons Hover Color', 'redux-framework-demo'),
                        'subtitle'  => __('Pick a main color for buttons hover (default: #672d82).', 'redux-framework-demo'),
                        'default'   => '#672d82',
                        'validate'  => 'color',
                        'output'    => array(
                            'background'       => '.read-more.button:hover, .search-form input[type="submit"]:hover, input[type="submit"]:hover, .pagination .current:hover, .pagination a:hover'
                        )
                    ),
                    array(
                        'id'        => 'opt-menu-color-active',
                        'type'      => 'color',
                        'title'     => __('Active Menu Color', 'redux-framework-demo'),
                        'subtitle'  => __('Pick a main color for active menu color (default: #511C69).', 'redux-framework-demo'),
                        'default'   => '#511C69',
                        'validate'  => 'color',
                        'output'    => array(
                            'background'       => '.top-bar-section ul.dropdown .back, .top-bar-section li.active:not(.has-form) a:not(.button), .top-bar-section li.active:not(.has-form) a:hover:not(.button)'
                        )
                    ),
                    array(
                        'id'        => 'opt-menu-color-hover',
                        'type'      => 'color',
                        'title'     => __('Hover Menu Color', 'redux-framework-demo'),
                        'subtitle'  => __('Pick a main color for hover menu color (default: #511C69).', 'redux-framework-demo'),
                        'default'   => '#511C69',
                        'validate'  => 'color',
                        'output'    => array(
                            'background'       => '.top-bar-section li:not(.has-form) a:hover:not(.button), .top-bar-section ul li:hover:not(.has-form) > a'
                        )
                    ),
                    array(
                        'id'        => 'opt-submenu-color',
                        'type'      => 'color',
                        'title'     => __('Submenu Color', 'redux-framework-demo'),
                        'subtitle'  => __('Pick a main color for submenu color (default: #6A437C).', 'redux-framework-demo'),
                        'default'   => '#6A437C',
                        'validate'  => 'color',
                        'output'    => array(
                            'background'       => '.top-bar-section .dropdown li:not(.has-form):not(.active) > a:not(.button)'
                        )
                    ),
                    array(
                        'id'        => 'opt-submenu-color-hover',
                        'type'      => 'color',
                        'title'     => __('Hover Submenu Color', 'redux-framework-demo'),
                        'subtitle'  => __('Pick a main color for subhover menu color (default: #511C69).', 'redux-framework-demo'),
                        'default'   => '#511C69',
                        'validate'  => 'color',
                        'output'    => array(
                            'background'       => '.top-bar-section .dropdown li:not(.has-form):not(.active) > a:hover:not(.button)'
                        )
                    ),
                )
            );

            $this->sections[] = array(
                'title'     => __('Typography Options', 'redux-framework-demo'),
                'icon' => 'el-icon-font',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    array(
                    'id'          => 'opt-typography',
                    'type'        => 'typography', 
                    'title'       => __('Typography', 'redux-framework-demo'),
                    'google'      => true, 
                    'font-backup' => false,
                    'output'      => array('body, p'),
                    'units'       =>'px',
                    'subtitle'    => __('Typography option with each property can be called individually.', 'redux-framework-demo'),
                    'default'     => array(
                        'color'       => '#333', 
                        'font-style'  => '700', 
                        'font-family' => 'Abel', 
                        'google'      => true,
                        'font-size'   => '16px', 
                        'line-height' => '24px'
                    ),
                    ),
                    array(
                    'id'          => 'opt-h1',
                    'type'        => 'typography', 
                    'title'       => __('H1 Font', 'redux-framework-demo'),
                    'google' => false,
                    'font-family' => false,
                    'font-style' => false,
                    'font-weight' => false,
                    'line-height' => false,
                    'text-align' => false,
                    'color'=> false,
                    'preview'=> false,
                    'output'      => array('h1'),
                    'units'       =>'px',
                    'subtitle'    => __('Specify the H1 font and color.', 'redux-framework-demo'),
                    'default'     => array(
                        'color'       => '#333',
                        'font-size'   => '40px', 
                    ),
                    ),
                    array(
                    'id'          => 'opt-h2',
                    'type'        => 'typography', 
                    'title'       => __('H2 Font', 'redux-framework-demo'),
                    'google' => false,
                    'font-family' => false,
                    'font-style' => false,
                    'font-weight' => false,
                    'line-height' => false,
                    'text-align' => false,
                    'color'=> false,
                    'preview'=> false,
                    'output'      => array('h2'),
                    'units'       =>'px',
                    'subtitle'    => __('Specify the H2 font and color.', 'redux-framework-demo'),
                    'default'     => array(
                        'color'       => '#333',
                        'font-size'   => '32px', 
                    ),
                    ),
                    array(
                    'id'          => 'opt-h3',
                    'type'        => 'typography', 
                    'title'       => __('H3 Font', 'redux-framework-demo'),
                    'google' => false,
                    'font-family' => false,
                    'font-style' => false,
                    'font-weight' => false,
                    'line-height' => false,
                    'text-align' => false,
                    'color'=> false,
                    'preview'=> false,
                    'output'      => array('h3'),
                    'units'       =>'px',
                    'subtitle'    => __('Specify the H3 font and color.', 'redux-framework-demo'),
                    'default'     => array(
                        'color'       => '#333',
                        'font-size'   => '28px', 
                    ),
                    ),
                    array(
                    'id'          => 'opt-h4',
                    'type'        => 'typography', 
                    'title'       => __('H4 Font', 'redux-framework-demo'),
                    'google' => false,
                    'font-family' => false,
                    'font-style' => false,
                    'font-weight' => false,
                    'line-height' => false,
                    'text-align' => false,
                    'color'=> false,
                    'preview'=> false,
                    'output'      => array('h4'),
                    'units'       =>'px',
                    'subtitle'    => __('Specify the H4 font and color.', 'redux-framework-demo'),
                    'default'     => array(
                        'color'       => '#333',
                        'font-size'   => '24px', 
                    ),
                    ),
                    array(
                    'id'          => 'opt-h5',
                    'type'        => 'typography', 
                    'title'       => __('H5 Font', 'redux-framework-demo'),
                    'google' => false,
                    'font-family' => false,
                    'font-style' => false,
                    'font-weight' => false,
                    'line-height' => false,
                    'text-align' => false,
                    'color'=> false,
                    'preview'=> false,
                    'output'      => array('h5'),
                    'units'       =>'px',
                    'subtitle'    => __('Specify the H5 font and color.', 'redux-framework-demo'),
                    'default'     => array(
                        'color'       => '#333',
                        'font-size'   => '20px', 
                    ),
                    ),
                    array(
                    'id'          => 'opt-h6',
                    'type'        => 'typography', 
                    'title'       => __('H6 Font', 'redux-framework-demo'),
                    'google' => false,
                    'font-family' => false,
                    'font-style' => false,
                    'font-weight' => false,
                    'line-height' => false,
                    'text-align' => false,
                    'color'=> false,
                    'preview'=> false,
                    'output'      => array('h6'),
                    'units'       =>'px',
                    'subtitle'    => __('Specify the H6 font and color.', 'redux-framework-demo'),
                    'default'     => array(
                        'color'       => '#333',
                        'font-size'   => '16px', 
                    ),
                    ),
                )
            );
            
            $this->sections[] = array(
                'title'     => __('Contact', 'redux-framework-demo'),
                'icon' => 'el-icon-envelope',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    array(
                        'id'        => 'opt-contact-sc',
                        'type'      => 'text',
                        'title'     => __('Contact Shortcode', 'redux-framework-demo'),
                        'subtitle'  => __('Insert contact shortcode here.', 'redux-framework-demo'),
                    ),
                    array(
                        'id'        => 'opt-latitude',
                        'type'      => 'text',
                        'title'     => __('Latitude', 'redux-framework-demo'),
                        'subtitle'  => __('Insert map latitude here.', 'redux-framework-demo'),
                        'default'   => '41.321968',
                    ),
                    array(
                        'id'        => 'opt-longitude',
                        'type'      => 'text',
                        'title'     => __('Longitude', 'redux-framework-demo'),
                        'subtitle'  => __('Insert map longitude here.', 'redux-framework-demo'),
                        'default'   => '19.82307',
                    ),
                     array(
                        'id'        => 'opt-map-marker',
                        'type'      => 'media',
                        'title'     => __('Map Marker', 'redux-framework-demo'),
                        'compiler'  => 'true',
                        'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'      => __('Basic media uploader with disabled URL input field.', 'redux-framework-demo'),
                        'subtitle'  => __('Upload the map marker using the WordPress native uploader', 'redux-framework-demo'),
                    ),
                )
            );

            $this->sections[] = array(
                'title'     => __('Scripts and Styles', 'redux-framework-demo'),
                'icon'      => 'el-icon-cog',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    array(
                        'id'        => 'opt-custom-css',
                        'type'      => 'textarea',
                        'title'     => __('Custom CSS', 'redux-framework-demo'),
                        'subtitle'  => __('Quickly add some CSS to your theme by adding it to this block.', 'redux-framework-demo'),
                        'validate'  => 'css',
                    ),
                    array(
                        'id'        => 'opt-custom-js',
                        'type'      => 'textarea',
                        'title'     => __('Custom JAVASCRIPT', 'redux-framework-demo'),
                        'subtitle'  => __('Quickly add some JAVASCRIPT to your theme by adding it to this block.', 'redux-framework-demo'),
                        'validate'  => 'js',
                    ),
                )
            );
            $this->sections[] = array(
                'title'     => __('Google Analytics', 'redux-framework-demo'),
                'icon'      => 'el-icon-globe',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields'    => array(
                    array(
                        'id'        => 'opt-google-analytics',
                        'type'      => 'text',
                        'title'     => __('Google Analytics', 'redux-framework-demo'),
                        'subtitle'  => __('Quickly add Google Analytics code.', 'redux-framework-demo'),
                        'validate'  => 'js',
                    ),
                )
            );
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-1',
                'title'     => __('Theme Information 1', 'redux-framework-demo'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
            );

            $this->args['help_tabs'][] = array(
                'id'        => 'redux-help-tab-2',
                'title'     => __('Theme Information 2', 'redux-framework-demo'),
                'content'   => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo');
        }

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'          => 'global_theme_options',            // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'      => 'Theme Options',     // Name that appears at the top of your panel
                /*'display_version'   => $theme->get('Version'),  // Version that appears at the top of your panel*/
                'menu_type'         => 'menu',                  //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'    => true,                    // Show the sections below the admin menu item or not
                'menu_title'        => __('Theme Options', 'redux-framework-demo'),
                'page_title'        => __('Theme Options', 'redux-framework-demo'),
                
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => 'AIzaSyB_ESOc7330YZdZ5iBEmRTY-9Hgr50WJIE', // Must be defined to add google fonts to the typography module
                
                'async_typography'  => false,                    // Use a asynchronous font on the front end or font string
                'admin_bar'         => true,                    // Show the panel pages on the admin bar
                'global_variable'   => '',                      // Set a different name for your global variable other than the opt_name
                'dev_mode'          => false,                    // Show the time the page took to load, etc
                'customizer'        => true,                    // Enable basic customizer support
                
                // OPTIONAL -> Give you extra features
                'page_priority'     => null,                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'       => 'themes.php',            // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions'  => 'manage_options',        // Permissions needed to access the options panel.
                'menu_icon'         => '',                      // Specify a custom URL to an icon
                'last_tab'          => '',                      // Force your panel to always open to a specific tab (by id)
                'page_icon'         => 'icon-themes',           // Icon displayed in the admin panel next to your menu_title
                'page_slug'         => '_options',              // Page slug used to denote the panel
                'save_defaults'     => true,                    // On load save the defaults to DB before user clicks save or not
                'default_show'      => false,                   // If true, shows the default value next to each field that is not the default value.
                'default_mark'      => '',                      // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => false,                   // Shows the Import/Export panel when not used as a field.
                
                // CAREFUL -> These options are for advanced use only
                'transient_time'    => 60 * MINUTE_IN_SECONDS,
                'output'            => true,                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag'        => true,                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
                
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database'              => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info'           => false, // REMOVE

                // HINTS
                'hints' => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'         => 'light',
                        'shadow'        => true,
                        'rounded'       => false,
                        'style'         => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'mouseover',
                        ),
                        'hide'      => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                )
            );

            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace('-', '_', $this->args['opt_name']);
                }
                /*$this->args['intro_text'] = sprintf(__('<p> The global variable is  <strong>$%1$s</strong></p>', 'redux-framework-demo'), $v);*/
            } else {
                /*$this->args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo');*/
            }

            // Add content after the form.
            /*$this->args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo');*/
        }

    }
    
    global $reduxConfig;
    $reduxConfig = new Redux_Framework_sample_config();
}