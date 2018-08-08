<?php
/**
 * CMB Tabbed Theme Options
 *
 * @author    Arushad Ahmed <@dash8x, contact@arushad.org>
 * @link      http://arushad.org/how-to-create-a-tabbed-options-page-for-your-wordpress-theme-using-cmb
 * @version   0.1.0
 */
class my_Admin {

    /**
     * Default Option key
     * @var string
     */
    private $key = 'my_options';

    /**
     * Array of metaboxes/fields
     * @var array
     */
    protected $option_metabox = array();

    /**
     * Options Page title
     * @var string
     */
    protected $title = '';

    /**
     * Options Tab Pages
     * @var array
     */
    protected $options_pages = array();

    /**
     * Constructor
     * @since 0.1.0
     */
    public function __construct() {
        // Set our title
        $this->title = __( 'Theme Options', 'theme_textdomain' );
    }

    /**
     * Initiate our hooks
     * @since 0.1.0
     */
    public function hooks() {
        add_action( 'admin_init', array( $this, 'init' ) );
        add_action( 'admin_menu', array( $this, 'add_options_page' ) ); //create tab pages
    }

    /**
     * Register our setting tabs to WP
     * @since  0.1.0
     */
    public function init() {
        $option_tabs = self::option_fields();
        foreach ($option_tabs as $index => $option_tab) {
            register_setting( $option_tab['id'], $option_tab['id'] );
        }
    }

    /**
     * Add menu options page
     * @since 0.1.0
     */
    public function add_options_page() {
        $option_tabs = self::option_fields();
        foreach ($option_tabs as $index => $option_tab) {
            if ( $index == 0) {
                $this->options_pages[] = add_menu_page( $this->title, $this->title, 'manage_options', $option_tab['id'], array( $this, 'admin_page_display' ) ); //Link admin menu to first tab
                add_submenu_page( $option_tabs[0]['id'], $this->title, $option_tab['title'], 'manage_options', $option_tab['id'], array( $this, 'admin_page_display' ) ); //Duplicate menu link for first submenu page
            } else {
                $this->options_pages[] = add_submenu_page( $option_tabs[0]['id'], $this->title, $option_tab['title'], 'manage_options', $option_tab['id'], array( $this, 'admin_page_display' ) );
            }
        }
    }

    /**
     * Admin page markup. Mostly handled by CMB
     * @since  0.1.0
     */
    public function admin_page_display() {
        $option_tabs = self::option_fields(); //get all option tabs
        $tab_forms = array();
        ?>
        <div class="wrap cmb_options_page <?php echo $this->key; ?>">
            <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

            <!-- Options Page Nav Tabs -->
            <h2 class="nav-tab-wrapper">
                <?php foreach ($option_tabs as $option_tab) :
                    $tab_slug = $option_tab['id'];
                    $nav_class = 'nav-tab';
                    if ( $tab_slug == $_GET['page'] ) {
                        $nav_class .= ' nav-tab-active'; //add active class to current tab
                        $tab_forms[] = $option_tab; //add current tab to forms to be rendered
                    }
                    ?>
                    <a class="<?php echo $nav_class; ?>" href="<?php menu_page_url( $tab_slug ); ?>"><?php esc_attr_e($option_tab['title']); ?></a>
                <?php endforeach; ?>
            </h2>
            <!-- End of Nav Tabs -->

            <?php foreach ($tab_forms as $tab_form) : //render all tab forms (normaly just 1 form) ?>
                <div id="<?php esc_attr_e($tab_form['id']); ?>" class="group">
                    <?php cmb2_metabox_form( $tab_form, $tab_form['id'] ); ?>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }

    /**
     * Defines the theme option metabox and field configuration
     * @since  0.1.0
     * @return array
     */
    public function option_fields() {

        // Only need to initiate the array once per page-load
        if ( ! empty( $this->option_metabox ) ) {
            return $this->option_metabox;
        }

        $this->option_metabox[] = array(
            'id'         => 'site_setup', //id used as tab page slug, must be unique
            'title'      => 'Required Site Set Up Fields',
            'show_on'    => array( 'key' => 'options-page', 'value' => array( 'site_setup' ), ), //value must be same as id
            'show_names' => true,
            'fields'     => array(
                array(
                    'name'    => 'Homepage Slider or Static Image',
                    'id'      => 'cws_confluence_homepage_layout',
                    'type'    => 'radio_inline',
                    'options' => array(
                        'slider' => __( 'Slider', 'cmb2' ),
                        'static_image'   => __( 'Static Image', 'cmb2' ),
                    ),
                    'default' => 'static_image',
                ),
                array(
                    'name'    => 'Promo Section',
                    'desc'    => 'Hide or show promo section',
                    'id'      => 'cws_confluence_promo',
                    'type'    => 'radio_inline',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'show' => __( 'Show', 'cmb2' ),
                        'hide'   => __( 'Hide', 'cmb2' ),
                    ),
                    'default' => 'hide',
                ),
            )
        );

        $this->option_metabox[] = array(
            'id'         => 'general_options', //id used as tab page slug, must be unique
            'title'      => 'General Options',
            'show_on'    => array( 'key' => 'options-page', 'value' => array( 'general_options' ), ), //value must be same as id
            'show_names' => true,
            'fields'     => array(
                array(
                    'name'    => 'Your Site Logo',
                    'desc'    => 'Upload an image or enter an URL.',
                    'id'      => 'cws_confluence_logo',
                    'type'    => 'file',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name'    => 'Business Phone',
                    'desc'    => 'Phone Number you want displayed in the header of the site',
                    'id'      => 'cws_confluence_phone',
                    'type'    => 'text',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name'    => 'Business Email',
                    'desc'    => 'info@, requests@, contactus@, etc',
                    'id'      => 'cws_confluence_email',
                    'type'    => 'text',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name'    => 'Business Address',
                    'desc'    => 'Address you want displayed on the site',
                    'id'      => 'cws_confluence_address',
                    'type'    => 'wysiwyg',
                    'options' => array('textarea_rows' => 5,),
                ),
            )
        );

        $this->option_metabox[] = array(
            'id'         => 'social_options',
            'title'      => 'Social Media Settings',
            'show_on'    => array( 'key' => 'options-page', 'value' => array( 'social_options' ), ),
            'show_names' => true,
            'fields'     => array(
                array(
                    'name'    => 'Hide Social Media icons and move the Email address over to the left',
                    'id'      => 'cws_confluence_sm_layout',
                    'type'    => 'radio_inline',
                    'options' => array(
                        'social' => __( 'Yes, Add my Social Media Icons to the Header', 'cmb2' ),
                        'no-social'   => __( 'Not right now.', 'cmb2' ),
                    ),
                    'default' => 'social',
                ),
                array(
                    'name' => __('Facebook Username', 'theme_textdomain'),
                    'desc' => __('Username of Facebook page.', 'theme_textdomain'),
                    'id' => 'cws_confluence_fb_url',
                    'default' => '',
                    'type' => 'text_url'
                ),
                array(
                    'name' => __('Twitter Username', 'theme_textdomain'),
                    'desc' => __('Username of Twitter profile.', 'theme_textdomain'),
                    'id' => 'cws_confluence_twitter_url',
                    'default' => '',
                    'type' => 'text_url'
                ),
                array(
                    'name' => __('Youtube Username', 'theme_textdomain'),
                    'desc' => __('Username of Youtube channel.', 'theme_textdomain'),
                    'id' => 'cws_confluence_embed_url',
                    'default' => '',
                    'type' => 'text_url'
                ),
                array(
                    'name' => __('Google+ Profile ID', 'theme_textdomain'),
                    'desc' => __('ID of Google+ profile.', 'theme_textdomain'),
                    'id' => 'cws_confluence_gplus_url',
                    'default' => '',
                    'type' => 'text_url'
                ),
                array(
                    'name' => __('LinkedIn', 'theme_textdomain'),
                    'desc' => __('LinkedIn Url', 'theme_textdomain'),
                    'id' => 'cws_confluence_in_url',
                    'default' => '',
                    'type' => 'text_url'
                ),
            )
        );

        $this->option_metabox[] = array(
            'id'         => 'slider_options', //id used as tab page slug, must be unique
            'title'      => 'Slider Options',
            'show_on'    => array( 'key' => 'options-page', 'value' => array( 'slider_options' ), ), //value must be same as id
            'show_names' => true,
            'fields'     => array(
                array(
                    'name'    => 'Slide One',
                    'desc'    => 'Upload an image or enter an URL.',
                    'id'      => 'cws_confluence_slider_one_image',
                    'type'    => 'file',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name' => __('Slide One Big Text', 'cmb2'),
                    'desc' => __('field description (optional)', 'cmb2'),
                    'id' =>  'cws_confluence_slider_one_lgText',
                    'type' => 'text',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name' => __('Slide One Medium Text', 'cmb2'),
                    'desc' => __('field description (optional)', 'cmb2'),
                    'id' =>  'cws_confluence_slider_one_mdText',
                    'type' => 'text',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name' => __('Slide One Small Text', 'cmb2'),
                    'desc' => __('field description (optional)', 'cmb2'),
                    'id' =>  'cws_confluence_slider_one_smText',
                    'type' => 'text',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name' => __('Slide One CTA Text', 'cmb2'),
                    'desc' => __('Learn More, Book Now, etc.', 'cmb2'),
                    'id' =>  'cws_confluence_slider_one_cta',
                    'type' => 'text',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name' => esc_html__( 'Slide One CTA URL', 'cmb2' ),
                    'desc' => esc_html__( 'What page should the CTA (Call to action) button go to?', 'cmb2' ),
                    'id'   => 'cws_confluence_slider_one_ctaUrl',
                    'type' => 'text_url',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name'    => 'Slide Two',
                    'desc'    => 'Upload an image or enter an URL.',
                    'id'      => 'cws_confluence_slider_two_image',
                    'type'    => 'file',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name' => __('Slide Two Big Text', 'cmb2'),
                    'desc' => __('field description (optional)', 'cmb2'),
                    'id' =>  'cws_confluence_slider_two_lgText',
                    'type' => 'text',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name' => __('Slide Two Medium Text', 'cmb2'),
                    'desc' => __('field description (optional)', 'cmb2'),
                    'id' =>  'cws_confluence_slider_two_mdText',
                    'type' => 'text',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name' => __('Slide Two Small Text', 'cmb2'),
                    'desc' => __('field description (optional)', 'cmb2'),
                    'id' =>  'cws_confluence_slider_two_smText',
                    'type' => 'text',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name' => __('Slide Two CTA Text', 'cmb2'),
                    'desc' => __('Learn More, Book Now, etc.', 'cmb2'),
                    'id' =>  'cws_confluence_slider_two_cta',
                    'type' => 'text',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name' => esc_html__( 'Slide Two CTA URL', 'cmb2' ),
                    'desc' => esc_html__( 'What page should the CTA (Call to action) button go to?', 'cmb2' ),
                    'id'   => 'cws_confluence_slider_two_ctaUrl',
                    'type' => 'text_url',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name'    => 'Slide Three',
                    'desc'    => 'Upload an image or enter an URL.',
                    'id'      => 'cws_confluence_slider_three_image',
                    'type'    => 'file',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name' => __('Slide Three Big Text', 'cmb2'),
                    'desc' => __('field description (optional)', 'cmb2'),
                    'id' =>  'cws_confluence_slider_three_lgText',
                    'type' => 'text',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name' => __('Slide Three Medium Text', 'cmb2'),
                    'desc' => __('field description (optional)', 'cmb2'),
                    'id' =>  'cws_confluence_slider_three_mdText',
                    'type' => 'text',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name' => __('Slide Three Small Text', 'cmb2'),
                    'desc' => __('field description (optional)', 'cmb2'),
                    'id' =>  'cws_confluence_slider_three_smText',
                    'type' => 'text',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name' => __('Slide Three CTA Text', 'cmb2'),
                    'desc' => __('Learn More, Book Now, etc.', 'cmb2'),
                    'id' =>  'cws_confluence_slider_three_cta',
                    'type' => 'text',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
                array(
                    'name' => esc_html__( 'Slide Three CTA URL', 'cmb2' ),
                    'desc' => esc_html__( 'What page should the CTA (Call to action) button go to?', 'cmb2' ),
                    'id'   => 'cws_confluence_slider_three_ctaUrl',
                    'type' => 'text_url',
                    // Optionally hide the text input for the url:
                    'options' => array(
                        'url' => false,
                    ),
                ),
            )
        );

        $this->option_metabox[] = array(
            'id'         => 'advanced_options',
            'title'      => 'Advanced Settings',
            'show_on'    => array( 'key' => 'options-page', 'value' => array( 'advanced_options' ), ),
            'show_names' => true,
            'fields'     => array(
                array(
                    'name' => __('Color Scheme', 'theme_textdomain'),
                    'desc' => __('Main theme color.', 'theme_textdomain'),
                    'id' => 'color_scheme',
                    'default' => '',
                    'type' => 'colorpicker',
                ),
                array(
                    'name' => __('Custom CSS', 'theme_textdomain'),
                    'desc' => __('Enter any custom CSS you want here.', 'theme_textdomain'),
                    'id' => 'new_custom_css',
                    'default' => '',
                    'type' => 'textarea',
                ),
            )
        );

        //insert extra tabs here

        return $this->option_metabox;
    }

    /**
     * Returns the option key for a given field id
     * @since  0.1.0
     * @return array
     */
    public function get_option_key($field_id) {
        $option_tabs = $this->option_fields();
        foreach ($option_tabs as $option_tab) { //search all tabs
            foreach ($option_tab['fields'] as $field) { //search all fields
                if ($field['id'] == $field_id) {
                    return $option_tab['id'];
                }
            }
        }
        return $this->key; //return default key if field id not found
    }

    /**
     * Public getter method for retrieving protected/private variables
     * @since  0.1.0
     * @param  string  $field Field to retrieve
     * @return mixed          Field value or exception is thrown
     */
    public function __get( $field ) {

        // Allowed fields to retrieve
        if ( in_array( $field, array( 'key', 'fields', 'title', 'options_pages' ), true ) ) {
            return $this->{$field};
        }
        if ( 'option_metabox' === $field ) {
            return $this->option_fields();
        }

        throw new Exception( 'Invalid property: ' . $field );
    }

}

// Get it started
$my_Admin = new my_Admin();
$my_Admin->hooks();


?>