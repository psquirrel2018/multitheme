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

    // slider content
    //$slider_id = cws_confluence_get_option($post->ID, '_confluence_frontpage_slider_id');
    //one
    $slide_one_img = cws_confluence_get_option( 'cws_confluence_slider_one_image');
    $slide_one_title = cws_confluence_get_option( 'cws_confluence_slider_one_lgText');
    $slide_one_secondaryTitle = cws_confluence_get_option( 'cws_confluence_slider_one_mdText');
    $slide_one_sm_text = cws_confluence_get_option( 'cws_confluence_slider_one_smText');
    $slide_one_cta = cws_confluence_get_option( 'cws_confluence_slider_one_cta');
    $slide_one_ctaUrl = cws_confluence_get_option( 'cws_confluence_slider_one_cta_url');
    //two
    $slide_two_img = cws_confluence_get_option( 'cws_confluence_slider_two_image');
    $slide_two_title = cws_confluence_get_option( 'cws_confluence_slider_two_lgText');
    $slide_two_secondaryTitle = cws_confluence_get_option( 'cws_confluence_slider_two_mdText');
    $slide_two_sm_text = cws_confluence_get_option( 'cws_confluence_slider_two_smText');
    $slide_two_cta = cws_confluence_get_option( 'cws_confluence_slider_two_cta');
    $slide_two_ctaUrl = cws_confluence_get_option( 'cws_confluence_slider_two_cta_url');
    //three
    $slide_three_img = cws_confluence_get_option( 'cws_confluence_slider_three_image');
    $slide_three_title = cws_confluence_get_option( 'cws_confluence_slider_three_lgText');
    $slide_three_secondaryTitle = cws_confluence_get_option( 'cws_confluence_slider_three_mdText');
    $slide_three_sm_text = cws_confluence_get_option( 'cws_confluence_slider_three_smText');
    $slide_three_cta = cws_confluence_get_option( 'cws_confluence_slider_three_cta');
    $slide_three_ctaUrl = cws_confluence_get_option( 'cws_confluence_slider_three_cta_url');

    ?>
</head>

<header class="page-head">
    <!-- CWS Navbar Transparent-->
    <div class="cws-navbar-wrap">
        <nav>
            <div class="container">
                <?php
                if ($cws_navbar_inner === 'no-social') { get_template_part('templates/cws-navbar-inner'); }
                else { ?>
                <div class="cws-navbar-inner">
                    <div class="row cws-top-bar">
                        <div class="col-sm-4 left-side">
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
                        <div class="col-sm-4 text-center">
                            <!--<address class="contact-info text-left"><span><span class="icon mdi mdi-map-marker"></span><a href="#" class="text-middle p text-dark">4578 Marmora St, San Francisco D04 89GR</a></span></address>-->
                            <?php if ($business_email != '') {?>
                                    <div class="phone">
                                        <address class="contact-info text-left"><span><span class="icon mdi mdi-email"></span><a href="#" class="text-middle p text-dark"><?= $business_email;?></a></span></address>
                                    </div>
                                        <?php } else { ?>
                                        Go to site options and add an email address
                                    <?php }; ?></span></address>
                        </div>
                        <div class="col-sm-4 text-right">
                            <?php if ($phone != '') {?>
                            <div class="phone">
                                <address class="contact-info text-right"><span><span class="icon mdi mdi-cellphone-android"></span><a href="callto:<?= $phone;?>" class="text-middle p text-dark"><?= $phone;?></a></span></address>
                            </div>
                                <?php } else { ?>
                                        Go to site options and add a #
                                    <?php }; ?></span></address>
                        </div>
                    </div>
                    <hr>
                    <!-- RD Navbar Panel-->
                    <div class="row">
                        <div class="col-md-4 cws-navbar-panel">
                            <!--Navbar Brand-->
                            <div class="cws-navbar-brand">
                                    <?php if ($site_logo != '') {?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
                                            <img class="img-responsive" src='<?= $site_logo; ?>' alt='<?php bloginfo( 'name' ); ?>'/>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/cws_bikeshop_logo.png" alt="<?php bloginfo( 'name' ); ?>"  />
                                        </a>
                                    <?php }; ?>
                            </div>
                        </div>
                        <div class="col-md-8 cws-navbar-menu-wrap">
                            <div class="cws-navbar-nav-wrap">
                                <div class="cws-navbar-mobile-scroll">
                                    <!--Navbar Brand Mobile-->
                                    <div class="cws-navbar-mobile-brand"></div>
                                    <div class="navbar navbar-default collapse navbar-collapse" id="navbar">
                                        <?php echo cws_bike_nav(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </nav>
    </div>

    <div id="slider" style="max-height:600px !important;">
        
                <ul class="slides-container">
                    <!-- Slide container -->
                    <?php if($slide_one_img !='') { ?>
                    <li>
                        <img src="<?= $slide_one_img; ?>">
                        <div class="tint">
                            <div class="content text-center">
                                <h1>    <?= $slide_one_title; ?> </h1>
                                <h5><?= $slide_one_secondaryTitle; ?></h5>
                                <div class="small">--- <?= $slide_one_sm_text; ?></div>
                                <p><a href="<?= $slide_one_ctaUrl; ?>"
                                      class="btn btn-primary"><?= $slide_one_cta; ?></a></p>
                            </div>
                        </div>
                    </li>
                    <?php } else { ?>
                    <li><h4 style="padding: 60px;">You must enter at least on slide in the Theme Options panel of the admin and it has to be the first slife</h4></li>
                    <?php } ?>
                    <?php if($slide_two_img !='') { ?>
                    <li>
                        <img src="<?= $slide_two_img; ?>">
                        <div class="tint">
                            <div class="content text-center">
                                <h1>    <?= $slide_two_title; ?> </h1>
                                <h5><?= $slide_two_secondaryTitle; ?></h5>
                                <div class="small">--- <?= $slide_two_sm_text; ?></div>
                                <p><a href="<?= $slide_two_ctaUrl; ?>"
                                      class="btn btn-primary"><?= $slide_two_cta; ?></a></p>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                    <?php if($slide_three_img !='') { ?>
                    <li>
                        <img src="<?= $slide_three_img; ?>">
                        <div class="tint">
                            <div class="content text-center">
                                <h1>    <?= $slide_three_title; ?> </h1>
                                <h5><?= $slide_three_secondaryTitle; ?></h5>
                                <div class="small">--- <?= $slide_three_sm_text; ?></div>
                                <p><a href="<?= $slide_three_ctaUrl; ?>"
                                      class="btn btn-primary"><?= $slide_three_cta; ?></a></p>
                            </div>
                        </div>
                    </li>
                    <?php } ?>

                </ul>
          
        <nav class="slides-navigation" style="z-index:10000;margin:-100px 0 0 10px;position:relative;">
            <a href="#" class="prev"><i class="fa fa-angle-left fa-2x"></i></a>
            <a href="#" class="next"><i class="fa fa-angle-right fa-2x"></i></a>
        </nav>
    </div>
</header>
