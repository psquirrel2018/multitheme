<?php
/* *
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 */

if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && ( strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== false ) ) {
    header( 'X-UA-Compatible: IE=edge,chrome=1' );
} ?>
<!doctype html>
<!--[if !IE]>
<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>
<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>
<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>
<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="<?php //echo of_get_option2( 'nav_bg_color' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head();
    global $post;
    $site_logo = cws_confluence_get_option2( 'cws_confluence_logo' );
    $phone = cws_confluence_get_option2( 'cws_confluence_phone' );
    $business_email = cws_confluence_get_option2( 'cws_confluence_email' );
    $business_address = cws_confluence_get_option2( 'cws_confluence_address' );

    //Control for the layout of the top navbar
    $cws_navbar_inner = cws_confluence_get_option2( 'cws_confluence_sm_layout' );
    //Control for the pricing option
    $cws_pricing_option = cws_confluence_get_option2( 'cws_confluence_pricing_layout' );

    //Social Media Icons
    $fb_url = cws_confluence_get_option2( 'cws_confluence_fb_url' );
    $twitter_url = cws_confluence_get_option2( 'cws_confluence_twitter_url' );
    $youtube_url = cws_confluence_get_option2( 'cws_confluence_youtube_url' );
    $in_url = cws_confluence_get_option2( 'cws_confluence_in_url' );
    $gplus_url = cws_confluence_get_option2( 'cws_confluence_gplus_url' );
    $wildcarld_icon = cws_confluence_get_option2( 'cws_confluence_wild_icon' );
    $wildcard_url = cws_confluence_get_option2( 'cws_confluence_wild_url' );

    // slider content
    //$slider_id = cws_confluence_get_option($post->ID, '_confluence_frontpage_slider_id');
    //one
    $slide_one_img = cws_confluence_get_option2( 'cws_confluence_slider_one_image');
    $slide_one_title = cws_confluence_get_option2( 'cws_confluence_slider_one_lgText');
    $slide_one_secondaryTitle = cws_confluence_get_option2( 'cws_confluence_slider_one_mdText');
    $slide_one_sm_text = cws_confluence_get_option2( 'cws_confluence_slider_one_smText');
    $slide_one_cta = cws_confluence_get_option2( 'cws_confluence_slider_one_cta');
    $slide_one_ctaUrl = cws_confluence_get_option2( 'cws_confluence_slider_one_cta_url');
    //two
    $slide_two_img = cws_confluence_get_option2( 'cws_confluence_slider_two_image');
    $slide_two_title = cws_confluence_get_option2( 'cws_confluence_slider_two_lgText');
    $slide_two_secondaryTitle = cws_confluence_get_option2( 'cws_confluence_slider_two_mdText');
    $slide_two_sm_text = cws_confluence_get_option2( 'cws_confluence_slider_two_smText');
    $slide_two_cta = cws_confluence_get_option2( 'cws_confluence_slider_two_cta');
    $slide_two_ctaUrl = cws_confluence_get_option2( 'cws_confluence_slider_two_cta_url');
    //three
    $slide_three_img = cws_confluence_get_option2( 'cws_confluence_slider_three_image');
    $slide_three_title = cws_confluence_get_option2( 'cws_confluence_slider_three_lgText');
    $slide_three_secondaryTitle = cws_confluence_get_option2( 'cws_confluence_slider_three_mdText');
    $slide_three_sm_text = cws_confluence_get_option2( 'cws_confluence_slider_three_smText');
    $slide_three_cta = cws_confluence_get_option2( 'cws_confluence_slider_three_cta');
    $slide_three_ctaUrl = cws_confluence_get_option2( 'cws_confluence_slider_three_cta_url');
    // Featured Image
    //$featuredImg = get_the_post_thumbnail_url($post->ID);
    ?>

</head>

<body <?php body_class(); ?>>
<header id="masthead" class="site-header" role="banner" style="height:130px;">
    <div class="container-fluid nav-top">
        <div class="row">
            <?php
            if ($cws_navbar_inner === 'no-social') { get_template_part('template-parts/cws-navbar-inner'); }
            else { ?>
                <div class="cws-navbar-inner">
                    <div class="cws-top-bar">
                        <div class="col-sm-4 left-side hidden-xs">
                            <ul class="list-inline list-inline-sm list-inline-white text-darker">
                                <?php if ($fb_url != '') {?>
                                    <li><a href="<?= $fb_url; ?>" class="fa fa-facebook top-bar-font3"></a></li>
                                <?php }; ?>
                                <?php if ($twitter_url != '') {?>
                                    <li><a href="<?= $twitter_url; ?>" class="fa fa-twitter top-bar-font3"></a></li>
                                <?php }; ?>

                                <?php if (empty($fb_url) && empty($twitter_url) ) {?>
                                    <li>Add Social Media Urls to the Site Options</li>
                                <?php }; ?>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <?php if ($business_email != '') {?>
                                <div class="email">
                                    <address class="contact-info"><a href="emailto:<?= $business_email; ?>" class="fa fa-envelope-o text-middle top-bar-font3"> <span class="top-bar-font"><?= $business_email; ?></span></a></address>
                                </div>
                            <?php } else { ?>
                            Go to site options and add an email address
                            <?php }; ?></span></address>
                        </div>
                        <div class="col-sm-4 signup-btn">
                            <a href="/newsletter-sign-up/" class="text-dark fa fa-newspaper-o news-signup"> <span class="top-bar-font2">Newsletter Sign Up</span></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
    <nav class="container-fluid navbar navbar-default navbar-fixed-top head-room" role="navigation">

        <div class="row">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php if ($site_logo != '') {?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
                        <img class="img-responsive logo" src='<?= $site_logo; ?>' alt='<?php bloginfo( 'name' ); ?>'/>
                    </a>
                <?php } else { ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/cws_bikeshop_logo.png" alt="<?php bloginfo( 'name' ); ?>"  />
                    </a>
                <?php }; ?>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <?php echo cws_bike_nav(); ?>
            </div>
        </div>
        <div class="row search-bar">
            <div class="col-md-4 col-md-offset-8 col-lg-3 col-lg-offset-9">
                <?php //get_search_form(); ?>
            </div><!--  .col-md-8 -->
        </div><!--  .row -->
    </nav>

</header><!-- #masthead -->

<?php

//if($headerType === 'slider') { get_template_part('template-parts/slider'); }

if ( is_front_page() ) {

    // If homepage is set in site Settings to a static page

    get_template_part('template-parts/flickity');

} else { // Everything else ?>


<?php } ?>
