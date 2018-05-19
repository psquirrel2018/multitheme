<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
    require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
    require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

add_action( 'cmb2_admin_init', 'be_confluence_register_packages_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function be_confluence_register_packages_metabox()
{

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_be_confluence_packages_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box(array(
        'id' => $prefix . 'metabox',
        'title' => __('Packages Page Custom Fields', 'cmb2'),
        'object_types' => array('page',), // Post type
        'show_on'      => array( 'key' => 'page-template', 'value' => 'packages.php' ),
        //'show_on_cb' => '_be_confluence_frontpage_show_if_front_page', // function should return a bool value
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
    ));

    //Static Banner CMBs

    /*$cmb_demo->add_field(array(
        'name' => __('Secondary page Static Hero image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'static_hero',
        'type' => 'file',
    ));*/

    $cmb_demo->add_field(array(
        'name' => __('Header Text', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'header_text',
        'type' => 'text'
    ));

    $cmb_demo->add_field(array(
        'name' => __('Intro Copy', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'intro_text',
        'type' => 'wysiwyg',
        'options' => array('textarea_rows' => 5,),
    ));
    /*$cmb_demo->add_field(array(
        'name' => __('CTA url one', 'cmb2'),
        //'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id' => $prefix . 'cta_url_one',
        'type' => 'text_url'
    ));


    $cmb_demo->add_field(array(
        'name' => __('CTA one', 'cmb2'),
        //'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id' => $prefix . 'cta_one',
        'type' => 'text'
    ));

    $cmb_demo->add_field(array(
        'name' => __('Secondary page Static Hero image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'hero2',
        'type' => 'file',
    ));*/

    $cmb_demo->add_field(array(
        'name' => __('Secondary header Text', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'header_text2',
        'type' => 'text'
    ));

    $cmb_demo->add_field(array(
        'name' => __(' Secondary Intro Copy', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'intro_text2',
        'type' => 'wysiwyg',
        'options' => array('textarea_rows' => 5,),
    ));


    //end Static Banner CMBs

    //Start Package CMBs
    //one

    $cmb_demo->add_field(array(
        'name' => __('Package One Image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Rooms Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'package_1_img',
        'type' => 'file',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Package One Title', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'package_1_text',
        'type' => 'text',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Package One Snippet', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'package_1_desc',
        'type' => 'text',
    ));

    $cmb_demo->add_field(array(
        'name' => __('Package One URL', 'cmb2'),
        //'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id' => $prefix . 'package_1_url',
        'type' => 'text'
    ));

    //two

    $cmb_demo->add_field(array(
        'name' => __('Package Two Image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Rooms Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'package_2_img',
        'type' => 'file',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Package Two Title', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'package_2_text',
        'type' => 'text',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Package Two Snippet', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'package_2_desc',
        'type' => 'text',
    ));


    $cmb_demo->add_field(array(
        'name' => __('Package Two URL', 'cmb2'),
        //'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id' => $prefix . 'package_2_url',
        'type' => 'text'
    ));

    //three

    $cmb_demo->add_field(array(
        'name' => __('Package Three Image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Rooms Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'package_3_img',
        'type' => 'file',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Package Three Title', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'package_3_text',
        'type' => 'text',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Package Three Snippet', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'package_3_desc',
        'type' => 'text',
    ));


    $cmb_demo->add_field(array(
        'name' => __('Package Three URL', 'cmb2'),
        //'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id' => $prefix . 'package_3_url',
        'type' => 'text'
    ));

    //Four

    $cmb_demo->add_field(array(
        'name' => __('Package Four Image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Rooms Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'package_4_img',
        'type' => 'file',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Package Four Title', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'package_4_text',
        'type' => 'text',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Package Four Snippet', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'package_4_desc',
        'type' => 'text',
    ));


    $cmb_demo->add_field(array(
        'name' => __('Package Four URL', 'cmb2'),
        //'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id' => $prefix . 'package_4_url',
        'type' => 'text'
    ));

    //Five

    $cmb_demo->add_field(array(
        'name' => __('Package Five Image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Rooms Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'package_5_img',
        'type' => 'file',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Package Five Title', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'package_5_text',
        'type' => 'text',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Package Five Snippet', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'package_5_desc',
        'type' => 'text',
    ));


    $cmb_demo->add_field(array(
        'name' => __('Package Five URL', 'cmb2'),
        //'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id' => $prefix . 'package_5_url',
        'type' => 'text'
    ));

    //six

    $cmb_demo->add_field(array(
        'name' => __('Package Six Image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Rooms Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'package_6_img',
        'type' => 'file',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Package Six Title', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'package_6_text',
        'type' => 'text',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Package Six Snippet', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'package_6_desc',
        'type' => 'text',
    ));


    $cmb_demo->add_field(array(
        'name' => __('Package Six URL', 'cmb2'),
        //'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id' => $prefix . 'package_6_url',
        'type' => 'text'
    ));

    //End Packages CMBs


    //Start Promo CMBs
    //one

    $cmb_demo->add_field(array(
        'name' => __('Promo One Image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that displays', 'cmb2'),
        'id' => $prefix . 'promo_1_img',
        'type' => 'file',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Box One Title', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'promo_1',
        'type' => 'text',
    ));

    //two

    $cmb_demo->add_field(array(
        'name' => __('Promo Two Image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that displays', 'cmb2'),
        'id' => $prefix . 'promo_2_img',
        'type' => 'file',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Box Two Title', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'promo_2',
        'type' => 'text',
    ));


    // end promo boxes

}

//Probably need a var & CMB for copy and or form shortcode...

//End Get Quote Vars


/*$cmb_demo->add_field( array(
    'name' => __( 'Offers Post ID', 'cmb2' ),
    'desc' => __( 'Enter the post id of the Offers data', 'cmb2' ),
    'id'   => $prefix . 'offer_id',
    'type' => 'text',
) );

$cmb_demo->add_field( array(
    'name' => __('Reviews Post ID', 'cmb2' ),
    'desc' => __( 'Enter the post id of the Reviews data', 'cmb2' ),
    'id'   => $prefix . 'review_id',
    'type' => 'text',
) );

$cmb_demo->add_field( array(
    'name' => __( 'Slider Post ID', 'cmb2' ),
    'desc' => __( 'Enter the post id of the Slider to use on the homepage', 'cmb2' ),
    'id'   => $prefix . 'slider_id',
    'type' => 'text',
) );*/


//$cmb_demo->add_field( array(
//	'name'         => 'Testing Field Parameters',
//	'id'           => $prefix . 'parameters',
//	'type'         => 'text',
//	'before_row'   => 'yourprefix_before_row_if_2', // callback
//	'before'       => '<p>Testing <b>"before"</b> parameter</p>',
//	'before_field' => '<p>Testing <b>"before_field"</b> parameter</p>',
//	'after_field'  => '<p>Testing <b>"after_field"</b> parameter</p>',
//	'after'        => '<p>Testing <b>"after"</b> parameter</p>',
//	'after_row'    => '<p>Testing <b>"after_row"</b> parameter</p>',
//) );

//}

/**
 * Metabox to be displayed on a single page ID
 */
//$cmb_about_page = new_cmb2_box( array(
//	'id'           => $prefix . 'metabox',
//	'title'        => __( 'About Page Metabox', 'cmb2' ),
//	'object_types' => array( 'page', ), // Post type
//	'context'      => 'normal',
//	'priority'     => 'high',
//	'show_names'   => true, // Show field names on the left
//	'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
//) );

//}
