<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php wp_title("-", true, "right"); ?> - <?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();
    global $post;
    $site_logo = cws_confluence_get_option( 'cws_confluence_logo' );
    $business_phone = cws_confluence_get_option( 'cws_confluence_phone' );
    $phone = cws_confluence_get_option( 'cws_confluence_phone' );
    $business_email = cws_confluence_get_option( 'cws_confluence_email' );
    $business_address = cws_confluence_get_option( 'cws_confluence_address' );

    //Control for the layout of the top navbar
    $cws_navbar_inner = cws_confluence_get_option( 'cws_confluence_sm_layout' );

    //Social Media Icons
    $fb_url = cws_confluence_get_option( 'cws_confluence_fb_url' );
    $twitter_url = cws_confluence_get_option( 'cws_confluence_twitter_url' );
    $youtube_url = cws_confluence_get_option( 'cws_confluence_youtube_url' );
    $in_url = cws_confluence_get_option( 'cws_confluence_in_url' );
    $gplus_url = cws_confluence_get_option( 'cws_confluence_gplus_url' );
    $wildcarld_icon = cws_confluence_get_option( 'cws_confluence_wild_icon' );
    $wildcard_url = cws_confluence_get_option( 'cws_confluence_wild_url' );

    ?>
</head>

<body <?php body_class(); ?>>
<header id="masthead" class="site-header" role="banner">
    <nav class="container navbar navbar-default" role="navigation">
        <div class="row">
            <?php
            if ($cws_navbar_inner === 'no-social') { get_template_part('templates/cws-navbar-inner'); }
            else { ?>
                <div class="cws-navbar-inner">
                    <div class="cws-top-bar">
                        <div class="col-sm-4 left-side hidden-xs">
                            <ul class="list-inline list-inline-sm list-inline-white text-darker">
                                <?php if ($fb_url != '') {?>
                                    <li><a href="#" class="text-dark fa fa-facebook"></a></li>
                                <?php }; ?>
                                <?php if ($twitter_url != '') {?>
                                    <li><a href="#" class="text-dark fa fa-twitter"></a></li>
                                <?php }; ?>
                                <?php if ($gplus_url != '') {?>
                                    <li><a href="#" class="text-dark fa fa-google-plus"></a></li>
                                <?php }; ?>
                                <?php if ($youtube_url != '') {?>
                                    <li><a href="#" class="text-dark fa fa-youtube"></a></li>
                                <?php }; ?>
                                <?php if ($in_url != '') {?>
                                    <li><a href="#" class="text-dark fa fa-linkedin"></a></li>
                                <?php }; ?>
                                <?php if (empty($in_url) && empty($fb_url) && empty($youtube_url) && empty($gplus_url) && empty($twitter_url) ) {?>
                                    <li>Add Social Media Urls to the Site Options</li>
                                <?php }; ?>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <?php if ($business_email != '') {?>
                                <div class="email">
                                    <address class="contact-info"><span class="icon mdi mdi-email"></span><a href="" class="text-middle"><?= $business_email; ?></a></address>
                                </div>
                            <?php } else { ?>
                            Go to site options and add an email address
                            <?php }; ?></span></address>
                        </div>
                        <div class="col-sm-4">
                            <?php if ($phone != '') {?>
                                <div class="phone">
                                    <address class="contact-info"><span class="icon mdi mdi-cellphone-android"></span><a href="callto:<?= $phone; ?>" class="text-middle"><?= $phone; ?></a></address>
                                </div>
                            <?php } else { ?>
                            Go to site options and add a #
                            <?php }; ?></span></address>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <hr>
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
    </nav>
</header><!-- #masthead -->

