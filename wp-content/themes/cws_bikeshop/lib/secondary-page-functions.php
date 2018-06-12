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

add_action( 'cmb2_admin_init', 'multi_register_secondary_custom_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function multi_register_secondary_custom_metabox()
{

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_cws_confluence_secondary_';

    $cmb_demo = new_cmb2_box(array(
        'id' => $prefix . 'metabox',
        'title' => __('Secondary Page Custom Fields', 'cmb2'),
        'object_types' => array('page',), // Post type
        'show_on'      => array( 'key' => 'page-template', 'value' => array('vail-secondary.php', 'secondary.php' )),
        //'show_on_cb' => '_bcl_frontpage_show_if_front_page', // function should return a bool value
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
    ));

    //Secondary Page Static Banner CMBs

    $cmb_demo->add_field(array(
        'name' => __('Secondary page Static Hero image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'header_bg',
        'type' => 'file',
    ));



    $cmb_demo->add_field(array(
        'name' => __('Top Title - First Row', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'top_title',
        'type' => 'text'
    ));
    $cmb_demo->add_field(array(
        'name' => __('Big Title Second Row', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'secondary_bigger_title',
        'type' => 'text'
    ));
    $cmb_demo->add_field( array(
        'name' => __( 'Intro Copy', 'cmb2' ),
        'desc' => __( 'This is the: Welcome To... copy', 'cmb2' ),
        'id'   => $prefix . 'secondary_page_intro',
        'type' => 'wysiwyg',
        'options' => array('textarea_rows' => 5,),
        // 'repeatable' => true,
    ) );

    //These are the right column custom fields

    // Image one
    $cmb_demo->add_field(array(
        'name' => __('Right Sidebar Top Image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Rooms Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'right_sb_image_one',
        'type' => 'file',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Right sidebar title one', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'right_sb_title_one',
        'type' => 'text'
    ));
    $cmb_demo->add_field(array(
        'name' => __('Right sidebar copy one', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'right_sb_copy_one',
        'type' => 'wysiwyg',
        'options' => array('textarea_rows' => 5,),
    ));

    // Image two
    $cmb_demo->add_field(array(
        'name' => __('Right Sidebar bottom Image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Rooms Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'right_sb_image_two',
        'type' => 'file',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Right sidebar title Two', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'right_sb_title_two',
        'type' => 'text'
    ));
    $cmb_demo->add_field(array(
        'name' => __('Right sidebar copy Two', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'right_sb_copy_two',
        'type' => 'wysiwyg',
        'options' => array('textarea_rows' => 5,),
    ));
}

