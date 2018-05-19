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

add_action( 'cmb2_admin_init', 'cws_confluence_register_slider_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function cws_confluence_register_slider_metabox()
{

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_confluence_slider_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box(array(
        'id' => $prefix . 'metabox',
        'title' => __('Homepage Slider Custom Fields', 'cmb2'),
        'object_types' => array('slides',), // Post type
        //'show_on'      => array( 'key' => 'page-template', 'value' => 'packages.php' ),
        //'show_on_cb' => '_be_confluence_frontpage_show_if_front_page', // function should return a bool value
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
    ));

    //static image if that option has been selected, but still need to code this option
    /*$cmb_demo->add_field(array(
        'name' => __('Front page Static Hero image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'static_hero',
        'type' => 'file',
    ));*/

//slide_one_image

    $cmb_demo->add_field(array(
        'name' => __('Slide one image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'one_image',
        'type' => 'file',
    ));

    $cmb_demo->add_field(array(
        'name' => __('Slide One Big Text', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'one_lgText',
        'type' => 'text'
    ));

    $cmb_demo->add_field(array(
        'name' => __('Slide One Medium Text', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'one_mdText',
        'type' => 'text'
    ));

    $cmb_demo->add_field(array(
        'name' => __('Slide One Small Text', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'one_smText',
        'type' => 'text'
    ));

    $cmb_demo->add_field(array(
        'name' => __('Slide One CTA Text', 'cmb2'),
        'desc' => __('Learn More, Book Now, etc.', 'cmb2'),
        'id' => $prefix . 'one_cta',
        'type' => 'text'
    ));

    $cmb_demo->add_field( array(
        'name' => esc_html__( 'Slide One CTA URL', 'cmb2' ),
        'desc' => esc_html__( 'What page should the CTA (Call to action) button go to?', 'cmb2' ),
        'id'   => $prefix . 'one_ctaUrl',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );

    //two

    $cmb_demo->add_field(array(
        'name' => __('Slide Two image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'two_image',
        'type' => 'file',
    ));

    $cmb_demo->add_field(array(
        'name' => __('Slide Two Big Text', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'two_lgText',
        'type' => 'text'
    ));

    $cmb_demo->add_field(array(
        'name' => __('Slide Two Medium Text', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'two_mdText',
        'type' => 'text'
    ));

    $cmb_demo->add_field(array(
        'name' => __('Slide Two Small Text', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'two_smText',
        'type' => 'text'
    ));

    $cmb_demo->add_field(array(
        'name' => __('Slide Two CTA Text', 'cmb2'),
        'desc' => __('Learn More, Book Now, etc.', 'cmb2'),
        'id' => $prefix . 'two_cta',
        'type' => 'text'
    ));

    $cmb_demo->add_field( array(
        'name' => esc_html__( 'Slide Two CTA URL', 'cmb2' ),
        'desc' => esc_html__( 'What page should the CTA (Call to action) button go to?', 'cmb2' ),
        'id'   => $prefix . 'two_ctaUrl',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );

    //three

    $cmb_demo->add_field(array(
        'name' => __('Slide Three image', 'cmb2'),
        'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2'),
        'id' => $prefix . 'three_image',
        'type' => 'file',
    ));

    $cmb_demo->add_field(array(
        'name' => __('Slide Three Big Text', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'three_lgText',
        'type' => 'text'
    ));

    $cmb_demo->add_field(array(
        'name' => __('Slide Three Medium Text', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'three_mdText',
        'type' => 'text'
    ));

    $cmb_demo->add_field(array(
        'name' => __('Slide Three Small Text', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id' => $prefix . 'three_smText',
        'type' => 'text'
    ));

    $cmb_demo->add_field(array(
        'name' => __('Slide Three CTA Text', 'cmb2'),
        'desc' => __('Learn More, Book Now, etc.', 'cmb2'),
        'id' => $prefix . 'three_cta',
        'type' => 'text'
    ));

    $cmb_demo->add_field( array(
        'name' => esc_html__( 'Slide Three CTA URL', 'cmb2' ),
        'desc' => esc_html__( 'What page should the CTA (Call to action) button go to?', 'cmb2' ),
        'id'   => $prefix . 'three_ctaUrl',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );


    // end slider fields

}
