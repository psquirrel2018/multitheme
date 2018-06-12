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

add_action( 'cmb2_admin_init', 'multi_confluence_register_secondary_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function multi_confluence_register_secondary_metabox()
{

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_be_confluence_secondary_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box(array(
        'id' => $prefix . 'metabox',
        'title' => __('Secondary Page Custom Fields', 'cmb2'),
        'object_types' => array('page',), // Post type
        'show_on'      => array( 'key' => 'page-template', 'value' =>  'secondary.php' ),
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
        'name' => __('Secondary page Static Hero Image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'header_bg',
        'type' => 'file',
    ));

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
    ));*/


    //end Static Banner CMBs

    //Start Box CMBs
    //one

    /*$cmb_demo->add_field(array(
        'name' => __('Box One Image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Rooms Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'box_1_img',
        'type' => 'file',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Box One Title', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'box_1_title',
        'type' => 'text',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Box One Text', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'box_1_text',
        'type' => 'text',
    ));*/

    /*$cmb_demo->add_field(array(
        'name' => __('Service One Copy', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'service_copy_one',
        'type' => 'wysiwyg',
        'options' => array('textarea_rows' => 5,),
    ));
    $cmb_demo->add_field(array(
        'name' => __('Services One URL', 'cmb2'),
        //'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id' => $prefix . 'services_url_one',
        'type' => 'text_url'
    ));*/

    //two

    /*$cmb_demo->add_field(array(
        'name' => __('Box Two Image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Rooms Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'box_2_img',
        'type' => 'file',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Box Two Title', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'box_2_title',
        'type' => 'text',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Box Two Text', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'box_2_text',
        'type' => 'wysiwyg',
        'options' => array('textarea_rows' => 5,),
    ));*/

    /*$cmb_demo->add_field(array(
        'name' => __('Service Two Copy', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'service_copy_two',
        'type' => 'wysiwyg',
        'options' => array('textarea_rows' => 5,),
    ));
    $cmb_demo->add_field(array(
        'name' => __('Services Two URL', 'cmb2'),
        //'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id' => $prefix . 'services_url_two',
        'type' => 'text_url'
    ));*/

    //three

    /*$cmb_demo->add_field(array(
        'name' => __('Box Three Image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Rooms Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'box_3_img',
        'type' => 'file',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Box Three Title', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'box_3_title',
        'type' => 'text',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Box Three Text', 'cmb2'),
        //'desc' => __( 'optional', 'cmb2' ),
        'id' => $prefix . 'box_3_text',
        'type' => 'text',
    ));*/

    /*$cmb_demo->add_field(array(
        'name' => __('Service Three Copy', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'service_copy_three',
        'type' => 'wysiwyg',
        'options' => array('textarea_rows' => 5,),
    ));
    $cmb_demo->add_field(array(
        'name' => __('Services Three URL', 'cmb2'),
        //'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id' => $prefix . 'services_url_three',
        'type' => 'text_url'
    ));*/

    //End Services CMBs


    //Start Promo CMBs
    //one

    /*$cmb_demo->add_field(array(
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
    ));*/

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
