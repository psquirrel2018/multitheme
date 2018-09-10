<?php
require_once( dirname(__FILE__) . '/lib/theme-options-cmb.php');
//require_once( dirname(__FILE__) . '/lib/theme-options-cmb-old.php');
require_once( dirname(__FILE__) . '/lib/front-page-functions.php');
require_once( dirname(__FILE__) . '/lib/secondary-functions.php');
require_once( dirname(__FILE__) . '/lib/slider-functions.php');
//require_once( dirname(__FILE__) . '/lib/offer-functions.php');
//require_once( dirname(__FILE__) . '/lib/project-functions.php');
require_once( dirname(__FILE__) . '/lib/review-functions.php');
require_once( dirname(__FILE__) . '/lib/widgets.php');
require_once( dirname(__FILE__) . '/lib/aq_resizer.php');
require_once( dirname(__FILE__) . '/lib/wp-bootstrap-navwalker.php');
require_once( dirname(__FILE__) . '/lib/tgm-plugin-activation/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'cws_bike_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function cws_bike_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'CMB2',
            'slug'      => 'cmb2',
            'required'  => true,
        ),
        array(
            'name'        => 'WordPress SEO by Yoast',
            'slug'        => 'wordpress-seo',
            'is_callable' => 'wpseo_init',
        ),

    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

    );

    tgmpa( $plugins, $config );
}

/**
 * Remove Page Templates
 * @author Scott Taylor
 * @param array $page_templates
 * @return array
 */
function confluence_remove_page_templates( $page_templates ) {
    unset( $page_templates['page_archive.php'] );
    unset( $page_templates['page_blog.php'] );
    return $page_templates;
}
add_filter( 'theme_page_templates', 'confluence_remove_page_templates' );


// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

////////////////////////////////////////////////////////////////////
// Enqueue Styles (normal style.css and bootstrap.css)
////////////////////////////////////////////////////////////////////

add_action( 'wp_enqueue_scripts', 'cws_bike_scripts');
function cws_bike_scripts(){
    //wp_register_script('jquery', get_template_directory_uri() .'/js/jquery.js', array(), '1.0.0', true);
    //wp_enqueue_script( 'jquery' );
    wp_enqueue_script('owl', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('core', get_template_directory_uri() . '/js/core.min.js', array(), '1.0.0', true );
    wp_enqueue_script('shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array(), '1.0.0', true );
    wp_enqueue_script('superslides', get_template_directory_uri() . '/js/jquery.superslides.min.js', array(), '1.0.0', true );
    //wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCSe_J0iYuFqJiHPBOY63Ti_BNmM1LzLik&sensor=false');
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true );
}


function cws_bike_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '1', 'all' );
    //wp_register_style('animate',  get_template_directory_uri() .'/css/animate.css', array(), null, 'all' );
    wp_register_style('superslides', get_template_directory_uri() .'/css/superslides.css', array(), null, 'all' );
    wp_register_style('icons', get_template_directory_uri() .'/css/icons.css', array(), null, 'all' );
    wp_register_style('owl-carousel', get_template_directory_uri() .'/css/owl.carousel.css', array(), null, 'all' );
    //wp_register_style('styles', get_stylesheet_uri(), array(), null, 'all' );
    wp_register_style('styles', get_stylesheet_uri(), array(), null, 'all' );
    wp_register_style('cwsCustom', get_template_directory_uri(). '/cwsDynamicStyles.php', array(), null, 'all' );
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'owl-carousel' );
    // wp_enqueue_style( 'animate' );
    wp_enqueue_style( 'superslides' );
    wp_enqueue_style( 'icons' );
    wp_enqueue_style( 'styles' );
    wp_enqueue_style( 'cwsCustom');
}
add_action( 'wp_enqueue_scripts', 'cws_bike_styles' );

add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
function enqueue_load_fa() {
    wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
}

/**
 * Wrapper function around cmb_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function cws_confluence_get_option2( $key = '' ) {
    global $my_Admin;
    return cmb2_get_option( $my_Admin->get_option_key($key), $key );
}

/**
 * function to setup default theme menu
 */
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'cws_bike' ),
    'top-menu' => __( 'Top Menu', 'cws_bike' ),
) );
function confluence_default_menu() {

    $menuname = 'Primary Menu';
    $menulocation = 'top-menu';
}

//add_filter('wp_page_menu', 'one_add_menuclass');

function cws_bike_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'top-menu',
                        'menu_class' => 'nav navbar-nav navbar-right',
                        'menu_id' => 'main_menu',
                        'container' => false,
                        'container_class' => '',
                        'depth' => 2,
                        'fallback_cb' => 'cws_bike_nav_fallback',
                        'walker' => new wp_bootstrap_navwalker()));
    else
        cws_bike_nav_fallback();
}

function cws_bike_nav_fallback() {
    ?><ul class="nav navbar-nav navbar-right sf-menu" id="cws_bike_menu">
    <li>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Home', 'cws_bike'); ?></a>
    </li>
    <li class="page-scroll">
        <a href="/about/"><?php _e('About', 'cws_bike'); ?></a>
    </li>
    <li class="page-scroll">
        <a href="/location/"><?php _e('Location', 'cws_bike'); ?></a>
    </li>
    <li class="page-scroll">
        <a href="/services/"><?php _e('Services', 'cws_bike'); ?></a>
    </li>
    <li class="page-scroll">
        <a href="/news/"><?php _e('News', 'cws_bike'); ?></a>
    </li>
    <li class="page-scroll">
        <a href="/contact-us/"><?php _e('Contact Us', 'cws_bike'); ?></a>
    </li>
    </ul>
    <?php
}

// add title tag support
//add_theme_support( 'title-tag' );

/* Changed excerpt length to 100 words*/
function cws_bike_excerpt_length($length) {
    return 100;
}
add_filter('excerpt_length', 'cws_bike_excerpt_length');


//Creating Custom Post types for Reviews
function setup_reviews_cpt(){
    $labels = array(
        'name' => _x('reviews', 'post type general name'),
        'singular_name' => _x('Review', 'post type singular name'),
        'add_new' => _x('Add New', 'Review'),
        'add_new_item' => __('Add New Review'),
        'edit_item' => __('Edit Review'),
        'new_item' => __('New Review'),
        'all_items' => __('All Reviews'),
        'view_item' => __('View Review'),
        'search_items' => __('Search Reviews'),
        'not_found' => __('No Reviews Found'),
        'not_found_in_trash' => __('No Reviews found in the trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Reviews'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'The Bunkhouse Reviews',
        'rewrite' => array('slug' => 'reviews'),
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'has_archive' => true,
        'taxonomies' => array(''),
        'menu_icon' => 'dashicons-welcome-write-blog',
    );
    register_post_type('reviews', $args);
}
add_action('init', 'setup_reviews_cpt');

//Creating Custom Post types for the homepage slider
/*function setup_slides_cpt(){
    $labels = array(
        'name' => _x('slides', 'post type general name'),
        'singular_name' => _x('Slide', 'post type singular name'),
        'add_new' => _x('Add New', 'slide'),
        'add_new_item' => __('Add New Slide'),
        'edit_item' => __('Edit Slide'),
        'new_item' => __('New Slide'),
        'all_items' => __('All Slides'),
        'view_item' => __('View Slide'),
        'search_items' => __('Search Slides'),
        'not_found' => __('No Slides Found'),
        'not_found_in_trash' => __('No Slides found in the trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Slides'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'The homepage slides',
        'rewrite' => array('slug' => 'slides'),
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive' => true,
        'taxonomies' => array(''),
        'menu_icon' => 'dashicons-images-alt2',
    );
    register_post_type('slides', $args);
}
add_action('init', 'setup_slides_cpt');
*/

//Creating Custom Post types for Team
/*
function setup_team_cpt(){
    $labels = array(
        'name' => _x('team', 'post type general name'),
        'singular_name' => _x('Team', 'post type singular name'),
        'add_new' => _x('Add New', 'Team Member'),
        'add_new_item' => __('Add New Member'),
        'edit_item' => __('Edit Team Member'),
        'new_item' => __('New Team Member'),
        'all_items' => __('All Team Members'),
        'view_item' => __('View Team Member'),
        'search_items' => __('Search Team'),
        'not_found' => __('No Team Member Found'),
        'not_found_in_trash' => __('No Team Member found in the trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Team'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'RMVG Team',
        'rewrite' => array('slug' => 'team'),
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'has_archive' => true,
        'taxonomies' => array(''),
        'menu_icon' => 'dashicons-welcome-write-blog',
    );
    register_post_type('team', $args);
}
add_action('init', 'setup_team_cpt');

function team_taxonomy() {
    register_taxonomy(
        'team_categories',  //The taxonomy name
        'team',        //post type name
        array(
            'hierarchical' => true,
            'label' => 'Team Categories',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'team', // base slug that will display before each term
                'with_front' => false // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'team_taxonomy');
*/

//Creating Custom Post types for Announcements
function setup_announcement_cpt(){
    $labels = array(
        'name' => _x('announcements', 'post type general name'),
        'singular_name' => _x('Announcement', 'post type singular name'),
        'add_new' => _x('Add New', 'Announcement'),
        'add_new_item' => __('Add New Announcement'),
        'edit_item' => __('Edit Announcement'),
        'new_item' => __('New Announcement'),
        'all_items' => __('All Announcements'),
        'view_item' => __('View Announcement'),
        'search_items' => __('Search Announcements'),
        'not_found' => __('No Announcements Found'),
        'not_found_in_trash' => __('No Announcements found in the trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Announcements'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'The Important Announcements',
        'rewrite' => array('slug' => 'announcements'),
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', ),
        'has_archive' => true,
        'taxonomies' => array(''),
        'menu_icon' => 'dashicons-welcome-write-blog',
    );
    register_post_type('announcements', $args);
}
add_action('init', 'setup_announcement_cpt');

//Creating Custom Post types for Brands
/*
function setup_brands_cpt(){
    $labels = array(
        'name' => _x('brands', 'post type general name'),
        'singular_name' => _x('Brand', 'post type singular name'),
        'add_new' => _x('Add New', 'Brand'),
        'add_new_item' => __('Add New Brand'),
        'edit_item' => __('Edit Brand'),
        'new_item' => __('New Brand'),
        'all_items' => __('All Brands'),
        'view_item' => __('View Brand'),
        'search_items' => __('Search Brands'),
        'not_found' => __('No Brand Found'),
        'not_found_in_trash' => __('No Brand found in the trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Brands'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'The Brands',
        'rewrite' => array('slug' => 'brands'),
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', ),
        'has_archive' => true,
        'taxonomies' => array(''),
        'menu_icon' => 'dashicons-welcome-write-blog',
    );
    register_post_type('brands', $args);
}
add_action('init', 'setup_brands_cpt');
*/

//Adding Featured Image Support to all Custom Post Types
add_theme_support( 'post-thumbnails', array( 'team', 'brands', 'post', 'page' ) ); // support for these post types

$args = array(
    'header-text' => array(
        'site-title',
        'site-description',
    ),
    'size' => 'full',
);
add_theme_support( 'site-logo', $args );

function remove_default_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    //unregister_widget('WP_Widget_Search');
    // unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_Categories');
    //unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    //unregister_widget('WP_Nav_Menu_Widget');
}
add_action('widgets_init', 'remove_default_widgets', 11);


// Remove meta generator (WP version) from site and feed
if ( ! function_exists( 'mywp_remove_version' ) ) {

    function mywp_remove_version() {
        return '';
    }
    add_filter('the_generator', 'mywp_remove_version');
}

// Clean header from unneeded links
if ( ! function_exists( 'mywp_head_cleanup' ) ) {

    function mywp_head_cleanup() {
        remove_action('wp_head', 'feed_links', 2);  // Remove Post and Comment Feeds
        remove_action('wp_head', 'feed_links_extra', 3);  // Remove category feeds
        remove_action('wp_head', 'rsd_link'); // Disable link to Really Simple Discovery service
        remove_action('wp_head', 'wlwmanifest_link'); // Remove link to the Windows Live Writer manifest file.
        /*remove_action( 'wp_head', 'index_rel_link' ); */ // canonic link
        remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
        remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);  // Remove relation links for the posts adjacent to the current post.
        remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);



        add_action('init', 'mywp_head_cleanup');
    } }


