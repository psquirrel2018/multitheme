<?php
/**
 * CMB2 Theme Options
 * @version 0.1.0
 */


class cws_Admin {

	/**
 	 * Option key, and option page slug
 	 * @var string
 	 */
	private $key = 'cws_confluence_options';

	/**
 	 * Options page metabox id
 	 * @var string
 	 */
	private $metabox_id = 'cws_confluence_option_metabox';

	/**
	 * Options Page title
	 * @var string
	 */
	protected $title = '';

	/**
	 * Options Page hook
	 * @var string
	 */
	protected $options_page = '';

	/**
	 * Holds an instance of the object
	 *
	 * @var Myprefix_Admin
	 **/
	private static $instance = null;

	/**
	 * Constructor
	 * @since 0.1.0
	 */
	private function __construct() {
		// Set our title
		$this->title = __( 'Site Options', 'cws_confluence' );
	}

	/**
	 * Returns the running object
	 *
	 * @return Myprefix_Admin
	 **/
	public static function get_instance() {
		if( is_null( self::$instance ) ) {
			self::$instance = new cws_Admin();
			self::$instance->hooks();
		}
		return self::$instance;
	}

	/**
	 * Initiate our hooks
	 * @since 0.1.0
	 */
	public function hooks() {
		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'cmb2_admin_init', array( $this, 'add_options_page_metabox' ) );
	}


	/**
	 * Register our setting to WP
	 * @since  0.1.0
	 */
	public function init() {
		register_setting( $this->key, $this->key );
	}

	/**
	 * Add menu options page
	 * @since 0.1.0
	 */
	public function add_options_page() {
		$this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );

		// Include CMB CSS in the head to avoid FOUC
		add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
	}

	/**
	 * Admin page markup. Mostly handled by CMB2
	 * @since  0.1.0
	 */
	public function admin_page_display() {
		?>
		<div class="wrap cmb2-options-page <?php echo $this->key; ?>">
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			<?php cmb2_metabox_form( $this->metabox_id, $this->key ); ?>
		</div>
		<?php
	}

	/**
	 * Add the options metabox to the array of metaboxes
	 * @since  0.1.0
	 */
	function add_options_page_metabox() {

		// hook in our save notices
		add_action( "cmb2_save_options-page_fields_{$this->metabox_id}", array( $this, 'settings_notices' ), 10, 2 );

		$cmb = new_cmb2_box( array(
			'id'         => $this->metabox_id,
			'hookup'     => false,
			'cmb_styles' => false,
			'show_on'    => array(
				// These are important, don't remove
				'key'   => 'options-page',
				'value' => array( $this->key, )
			),
		) );

		// Set our CMB2 fields
		// LOGO file uploaders
		$cmb->add_field( array(
			'name'    => 'Your Site Logo',
			'desc'    => 'Upload an image or enter an URL.',
			'id'      => 'cws_confluence_logo',
			'type'    => 'file',
			// Optionally hide the text input for the url:
			'options' => array(
				'url' => false,
			),
		) );

		//Phone Number
        $cmb->add_field( array(
            'name'    => 'Business Phone',
            'desc'    => 'Phone Number you want displayed in the header of the site',
            'id'      => 'cws_confluence_phone',
            'type'    => 'text',
            // Optionally hide the text input for the url:
            'options' => array(
                'url' => false,
            ),
        ) );

		//Email address
        $cmb->add_field( array(
            'name'    => 'Business Email',
            'desc'    => 'info@, requests@, contactus@, etc',
            'id'      => 'cws_confluence_email',
            'type'    => 'text',
            // Optionally hide the text input for the url:
            'options' => array(
                'url' => false,
            ),
        ) );

		//address
		$cmb->add_field( array(
			'name'    => 'Business Address',
			'desc'    => 'Address you want displayed on the site',
			'id'      => 'cws_confluence_address',
			'type'    => 'wysiwyg',
			'options' => array('textarea_rows' => 5,),
		) );

		// Social Media toggle
		$cmb->add_field( array(
			'name'    => 'Hide Social Media icons and move the Email address over to the left',
			'id'      => 'cws_confluence_sm_layout',
			'type'    => 'radio_inline',
			'options' => array(
				'social' => __( 'Yes, Add my Social Media Icons to the Header', 'cmb2' ),
				'no-social'   => __( 'Not right now.', 'cmb2' ),
			),
			'default' => 'social',
		) );

		//Social Media Urls
		$cmb->add_field( array(
			'name' => esc_html__( 'Facebook URL', 'cmb2' ),
			'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
			'id'   => 'cws_confluence_fb_url',
			'type' => 'text_url',
		) );

		$cmb->add_field( array(
			'name' => esc_html__( 'Twitter URL', 'cmb2' ),
			'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
			'id'   => 'cws_confluence_twitter_url',
			'type' => 'text_url',
		) );

		$cmb->add_field( array(
			'name' => esc_html__( 'Google+ URL', 'cmb2' ),
			'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
			'id'   => 'cws_confluence_gplus_url',
			'type' => 'text_url',
		) );

		$cmb->add_field( array(
			'name' => esc_html__( 'Linkedin URL', 'cmb2' ),
			'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
			'id'   => 'cws_confluence_in_url',
			'type' => 'text_url',
		) );


		$cmb->add_field( array(
			'name' => esc_html__( 'oEmbed', 'cmb2' ),
			'desc' => sprintf(
			/* translators: %s: link to codex.wordpress.org/Embeds */
				esc_html__( 'Enter a youtube, twitter, or instagram URL. Supports services listed at %s.', 'cmb2' ),
				'<a href="https://codex.wordpress.org/Embeds">codex.wordpress.org/Embeds</a>'
			),
			'id'   => 'cws_confluence_embed_url',
			'type' => 'oembed',
		) );

		// Promo images
		$cmb->add_field( array(
			'name'    => 'First Promo/Featured Image',
			'desc'    => 'Upload an image or enter an URL.',
			'id'      => 'cws_confluence_promo1_img',
			'type'    => 'file',
			// Optionally hide the text input for the url:
			'options' => array(
				'url' => false,
			),
		) );
		$cmb->add_field( array(
			'name'    => 'Second Promo/Featured Image',
			'desc'    => 'Upload an image or enter an URL.',
			'id'      => 'cws_confluence_promo2_img',
			'type'    => 'file',
			// Optionally hide the text input for the url:
			'options' => array(
				'url' => false,
			),
		) );
		$cmb->add_field( array(
			'name'    => 'Third Promo/Featured Image',
			'desc'    => 'Upload an image or enter an URL.',
			'id'      => 'cws_confluence_promo3_img',
			'type'    => 'file',
			// Optionally hide the text input for the url:
			'options' => array(
				'url' => false,
			),
		) );

//slide_one_image

			$cmb->add_field(array(
				'name' => __('Slide one image', 'cmb2'),
				'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2'),
				'id' =>  'cws_confluence_slider_one_image',
				'type' => 'file',
			));

			$cmb->add_field(array(
				'name' => __('Slide One Big Text', 'cmb2'),
				'desc' => __('field description (optional)', 'cmb2'),
				'id' =>  'cws_confluence_slider_one_lgText',
				'type' => 'text'
			));

			$cmb->add_field(array(
				'name' => __('Slide One Medium Text', 'cmb2'),
				'desc' => __('field description (optional)', 'cmb2'),
				'id' =>  'cws_confluence_slider_one_mdText',
				'type' => 'text'
			));

			$cmb->add_field(array(
				'name' => __('Slide One Small Text', 'cmb2'),
				'desc' => __('field description (optional)', 'cmb2'),
				'id' =>  'cws_confluence_slider_one_smText',
				'type' => 'text'
			));

			$cmb->add_field(array(
				'name' => __('Slide One CTA Text', 'cmb2'),
				'desc' => __('Learn More, Book Now, etc.', 'cmb2'),
				'id' =>  'cws_confluence_slider_one_cta',
				'type' => 'text'
			));

			$cmb->add_field( array(
				'name' => esc_html__( 'Slide One CTA URL', 'cmb2' ),
				'desc' => esc_html__( 'What page should the CTA (Call to action) button go to?', 'cmb2' ),
				'id'   => 'cws_confluence_slider_one_ctaUrl',
				'type' => 'text_url',
				// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
				// 'repeatable' => true,
			) );

			//two

			$cmb->add_field(array(
				'name' => __('Slide Two image', 'cmb2'),
				'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2'),
				'id' =>  'cws_confluence_slider_two_image',
				'type' => 'file',
			));

			$cmb->add_field(array(
				'name' => __('Slide Two Big Text', 'cmb2'),
				'desc' => __('field description (optional)', 'cmb2'),
				'id' =>  'cws_confluence_slider_two_lgText',
				'type' => 'text'
			));

			$cmb->add_field(array(
				'name' => __('Slide Two Medium Text', 'cmb2'),
				'desc' => __('field description (optional)', 'cmb2'),
				'id' =>  'cws_confluence_slider_two_mdText',
				'type' => 'text'
			));

			$cmb->add_field(array(
				'name' => __('Slide Two Small Text', 'cmb2'),
				'desc' => __('field description (optional)', 'cmb2'),
				'id' =>  'cws_confluence_slider_two_smText',
				'type' => 'text'
			));

			$cmb->add_field(array(
				'name' => __('Slide Two CTA Text', 'cmb2'),
				'desc' => __('Learn More, Book Now, etc.', 'cmb2'),
				'id' =>  'cws_confluence_slider_two_cta',
				'type' => 'text'
			));

			$cmb->add_field( array(
				'name' => esc_html__( 'Slide Two CTA URL', 'cmb2' ),
				'desc' => esc_html__( 'What page should the CTA (Call to action) button go to?', 'cmb2' ),
				'id'   => 'cws_confluence_slider_two_ctaUrl',
				'type' => 'text_url',
				// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
				// 'repeatable' => true,
			) );

			//three

			$cmb->add_field(array(
				'name' => __('Slide Three image', 'cmb2'),
				'desc' => __('Upload an image or enter a URL.  This will be the image that shows up next to the Welcome Message - 1400x900', 'cmb2'),
				'id' =>  'cws_confluence_slider_three_image',
				'type' => 'file',
			));

			$cmb->add_field(array(
				'name' => __('Slide Three Big Text', 'cmb2'),
				'desc' => __('field description (optional)', 'cmb2'),
				'id' =>  'cws_confluence_slider_three_lgText',
				'type' => 'text'
			));

			$cmb->add_field(array(
				'name' => __('Slide Three Medium Text', 'cmb2'),
				'desc' => __('field description (optional)', 'cmb2'),
				'id' =>  'cws_confluence_slider_three_mdText',
				'type' => 'text'
			));

			$cmb->add_field(array(
				'name' => __('Slide Three Small Text', 'cmb2'),
				'desc' => __('field description (optional)', 'cmb2'),
				'id' =>  'cws_confluence_slider_three_smText',
				'type' => 'text'
			));

			$cmb->add_field(array(
				'name' => __('Slide Three CTA Text', 'cmb2'),
				'desc' => __('Learn More, Book Now, etc.', 'cmb2'),
				'id' =>  'cws_confluence_slider_three_cta',
				'type' => 'text'
			));

			$cmb->add_field( array(
				'name' => esc_html__( 'Slide Three CTA URL', 'cmb2' ),
				'desc' => esc_html__( 'What page should the CTA (Call to action) button go to?', 'cmb2' ),
				'id'   => 'cws_confluence_slider_three_ctaUrl',
				'type' => 'text_url',
				// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
				// 'repeatable' => true,
			) );


			// end slider fields




	}

	/**
	 * Register settings notices for display
	 *
	 * @since  0.1.0
	 * @param  int   $object_id Option key
	 * @param  array $updated   Array of updated fields
	 * @return void
	 */
	public function settings_notices( $object_id, $updated ) {
		if ( $object_id !== $this->key || empty( $updated ) ) {
			return;
		}

		add_settings_error( $this->key . '-notices', '', __( 'Settings updated.', 'bh' ), 'updated' );
		settings_errors( $this->key . '-notices' );
	}

	/**
	 * Public getter method for retrieving protected/private variables
	 * @since  0.1.0
	 * @param  string  $field Field to retrieve
	 * @return mixed          Field value or exception is thrown
	 */
	public function __get( $field ) {
		// Allowed fields to retrieve
		if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
			return $this->{$field};
		}

		throw new Exception( 'Invalid property: ' . $field );
	}

}

/**
 * Helper function to get/return the Myprefix_Admin object
 * @since  0.1.0
 * @return Myprefix_Admin object
 */
function cws_admin() {
	return cws_Admin::get_instance();
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function cws_confluence_get_option( $key = '' ) {
	return cmb2_get_option( cws_admin()->key, $key );
}

// Get it started
cws_admin();