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

add_action( 'cmb2_admin_init', 'multitheme_register_custom_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function multitheme_register_custom_metabox()
{

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_confluence_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box(array(
        'id' => $prefix . 'metabox',
        'title' => __('Homepage Custom Fields', 'cmb2'),
        'object_types' => array('page',), // Post type
        //'show_on'      => array( 'key' => 'page-template', 'value' => 'front-page.php' ),
        'show_on_cb' => '_multitheme_frontpage_show_if_front_page', // function should return a bool value
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
    ));

    $cmb_demo->add_field(array(
        'name' => __('Homepage Welcome Title', 'cmb2'),
        'desc' => __('Welcome to...', 'cmb2'),
        'id' => $prefix . 'welcome_title',
        'type' => 'text',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Homepage Featured Section Title', 'cmb2'),
        'desc' => __('Featured Services, Featured Brands, Featured Specials...', 'cmb2'),
        'id' => $prefix . 'featured_title',
        'type' => 'text',
    ));

    $cmb_demo->add_field(array(
        'name' => __('Promo one image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'promo_one_image',
        'type' => 'file',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Promo one title', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'promo_one_title',
        'type' => 'text',
    ));
    $cmb_demo->add_field( array(
        'name' => __( 'Promo one text', 'cmb2' ),
        'desc' => __( 'Enter a tagline or welcome message for the second text block under the boxes', 'cmb2' ),
        'id'   => $prefix . 'promo_one_text',
        'type' => 'wysiwyg',
        'options' => array('textarea_rows' => 5,),
    ) );

    $cmb_demo->add_field(array(
        'name' => __('Promo two image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'promo_two_image',
        'type' => 'file',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Promo two title', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'promo_two_title',
        'type' => 'text',
    ));
    $cmb_demo->add_field( array(
        'name' => __( 'Promo two text', 'cmb2' ),
        'desc' => __( 'Enter a tagline or welcome message for the second text block under the boxes', 'cmb2' ),
        'id'   => $prefix . 'promo_two_text',
        'type' => 'wysiwyg',
        'options' => array('textarea_rows' => 5,),
    ) );
    $cmb_demo->add_field(array(
        'name' => __('Slide three ', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'promo_three_image',
        'type' => 'file',
    ));
    $cmb_demo->add_field(array(
        'name' => __('Promo three title', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'promo_three_title',
        'type' => 'text',
    ));
    $cmb_demo->add_field( array(
        'name' => __( 'Promo three text', 'cmb2' ),
        'desc' => __( 'Enter a tagline or welcome message for the second text block under the boxes', 'cmb2' ),
        'id'   => $prefix . 'promo_three_text',
        'type' => 'wysiwyg',
        'options' => array('textarea_rows' => 5,),
    ) );

    // Slider Background image
    /*$cmb_demo->add_field(array(
        'name' => __('Slide one background', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'slide_one_bg',
        'type' => 'file',
    ));*/

    $cmb_demo->add_field(array(
        'name' => __('Homepage Slider ID', 'cmb2'),
        'desc' => __('', 'cmb2'),
        'id' => $prefix . 'frontpage_slider_id',
        'type' => 'text',
    ));

    /*$cmb_demo->add_field( array(
        'name' => __( 'Tagline One Text', 'cmb2' ),
        'desc' => __( 'Enter a tagline or welcome message for the first text block under the main hero image', 'cmb2' ),
        'id'   => $prefix . 'tagline_1',
        'type' => 'text',
    ) );
    $cmb_demo->add_field( array(
        'name' => __( 'Tagline Two Text', 'cmb2' ),
        'desc' => __( 'Enter a tagline or welcome message for the second text block under the boxes', 'cmb2' ),
        'id'   => $prefix . 'tagline_2',
        'type' => 'wysiwyg',
        'options' => array('textarea_rows' => 5,),
    ) );*/

    //Lifestyle BG image

    $cmb_demo->add_field(array(
        'name' => __('Lifestyle background Image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Rooms Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'lifestyle_bg',
        'type' => 'file',
    ));

    $cmb_demo->add_field(array(
        'name' => __('Lifestyle Tagline/Heading', 'cmb2'),
        'desc' => __('', 'cmb2'),
        'id' => $prefix . 'lifestyle_tagline',
        'type' => 'text',
    ));

    $cmb_demo->add_field(array(
        'name' => __('Lifestyle Test/Sub-Heading', 'cmb2'),
        'desc' => __('', 'cmb2'),
        'id' => $prefix . 'lifestyle_text',
        'type' => 'text',
    ));

    $cmb_demo->add_field(array(
        'name' => __('Lifestyle Button Label', 'cmb2'),
        'desc' => __('', 'cmb2'),
        'id' => $prefix . 'lifestyle_cta',
        'type' => 'text',
    ));

    $cmb_demo->add_field(array(
        'name' => __('Lifestyle Button URL', 'cmb2'),
        'desc' => __('', 'cmb2'),
        'id' => $prefix . 'lifestyle_url',
        'type' => 'text_url',
    ));


    // End Lifestyle vars



    $cmb_demo->add_field(array(
        'name' => __('Contact Image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that displays', 'cmb2'),
        'id' => $prefix . 'contact_img',
        'type' => 'file',
    ));

    $cmb_demo->add_field(array(
        'name' => __('Contact Heading', 'cmb2'),
        'desc' => __('', 'cmb2'),
        'id' => $prefix . 'contact_title',
        'type' => 'text',
    ));

    $cmb_demo->add_field(array(
        'name' => __('Contact us copy', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Rooms Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'contact_text',
        'type' => 'wysiwyg',
        'options' => array('textarea_rows' =>3,),
    ));
}

    //Probably need a var & CMB for copy and or form shortcode...

//End Get Quote Vars

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
