<?php
/**
 * Created by PhpStorm.
 * User: circdominic
 * Date: 8/14/17
 * Time: 3:26 PM
 */


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();
    $site_logo = cws_confluence_get_option( 'cws_confluence_logo' );
    $denver_phone = cws_confluence_get_option( 'cws_confluence_phone1' );
    $vail_phone = cws_confluence_get_option( 'cws_confluence_phone2' );
    $aspen_phone = cws_confluence_get_option( 'cws_confluence_phone3' );
    $denver_email = cws_confluence_get_option( 'cws_confluence_email1' );
    $vail_email = cws_confluence_get_option( 'cws_confluence_email2' );
    $aspen_email = cws_confluence_get_option( 'cws_confluence_email3' );
    $denver_logo = cws_confluence_get_option( 'cws_confluence_logo_d' );
    $vail_logo = cws_confluence_get_option( 'cws_confluence_logo_v' );
    $aspen_logo = cws_confluence_get_option( 'cws_confluence_logo_a' );

    // slider content
    $slider_id = get_post_meta($post->ID, '_confluence_frontpage_slider_id', true);
    $slide_one_img = get_post_meta($post->ID, '_confluence_slide_one_image', true);
    $slide_one_bg = get_post_meta($post->ID, '_confluence_slide_one_bg', true);
    $slide_two_img = get_post_meta($post->ID, '_confluence_slide_two_image', true);
    $slide_three_img = get_post_meta($post->ID, '_confluence_slide_three_image', true);

    $slide_one_lg_text = get_post_meta($post->ID, '_confluence_slide_one_lgText', true);
    $slide_one_md_text = get_post_meta($post->ID, '_confluence_slide_one_mdText', true);
    $slide_one_sm_text = get_post_meta($post->ID, '_confluence_slide_one_smText', true);
    $slide_one_cta = get_post_meta($post->ID, '_confluence_slide_one_cta', true);

    $slide_two_lg_text = get_post_meta($post->ID, '_confluence_slide_two_lgText', true);
    $slide_two_md_text = get_post_meta($post->ID, '_confluence_slide_two_mdText', true);
    $slide_two_sm_text = get_post_meta($post->ID, '_confluence_slide_two_smText', true);
    $slide_two_cta = get_post_meta($post->ID, '_confluence_slide_two_cta', true);

    $slide_three_lg_text = get_post_meta($post->ID, '_confluence_slide_three_lgText', true);
    $slide_three_md_text = get_post_meta($post->ID, '_confluence_slide_three_mdText', true);
    $slide_three_sm_text = get_post_meta($post->ID, '_confluence_slide_three_smText', true);
    $slide_three_cta = get_post_meta($post->ID, '_confluence_slide_three_cta', true);

    //$slide_three_img = get_post_meta($post->ID, '_confluence_slide_three_image', true);
    ?>
</head>

<header class="page-head">
    <!-- RD Navbar Transparent-->
    <div class="cws-navbar-wrap">
        <nav data-lg-stick-up-offset="79px" data-md-device-layout="cws-navbar-fixed" data-lg-device-layout="cws-navbar-static" class="cws-navbar cws-navbar-top-panel cws-navbar-light" data-lg-auto-height="true" data-md-layout="cws-navbar-fixed" data-lg-layout="cws-navbar-static" data-lg-stick-up="true">
            <div class="container">
                <div class="cws-navbar-inner">
                    <div class="cws-navbar-top-panel">
                        <div class="left-side">
                            <ul class="list-inline list-inline-sm list-inline-white text-darker">
                                <li><a href="#" class="text-dark fa fa-facebook"></a></li>
                                <li><a href="#" class="text-dark fa fa-twitter"></a></li>
                                <li><a href="#" class="text-dark fa fa-google-plus"></a></li>
                                <li><a href="#" class="text-dark fa fa-youtube"></a></li>
                                <li><a href="#" class="text-dark fa fa-linkedin"></a></li>
                            </ul>
                        </div>
                        <div class="center">
                            <!--<address class="contact-info text-left"><span><span class="icon mdi mdi-map-marker"></span><a href="#" class="text-middle p text-dark">4578 Marmora St, San Francisco D04 89GR</a></span></address>-->
                            <address class="contact-info text-left"><span><span class="icon mdi mdi-cellphone-android"></span><?php if ($denver_phone != '') {?>
                                        <address class="contact-info text-left"><span><span class="icon mdi mdi-cellphone-android"></span><a href="callto:<?= $denver_phone;?>" class="text-middle p text-dark">Denver: <?= $denver_phone;?></a></span></address>
                                    <?php } else { ?>
                                        Go to site options and add a #
                                    <?php }; ?></span></address>
                        </div>
                        <div class="right-side">
                            <address class="contact-info text-left"><span><span class="icon mdi mdi-cellphone-android"></span><?php if ($denver_phone != '') {?>
                                        <address class="contact-info text-left"><span><span class="icon mdi mdi-cellphone-android"></span><a href="callto:<?= $denver_phone;?>" class="text-middle p text-dark">Denver: <?= $denver_phone;?></a></span></address>
                                    <?php } else { ?>
                                        Go to site options and add a #
                                    <?php }; ?></span></address>
                        </div>
                    </div>
                    <!-- RD Navbar Panel-->
                    <div class="range">
                        <div class="cell-md-4 cws-navbar-panel">
                            <!-- RD Navbar Toggle-->
                            <button data-cws-navbar-toggle=".cws-navbar, .cws-navbar-nav-wrap" class="cws-navbar-toggle"><span></span></button>
                            <!-- RD Navbar Top Panel Toggle-->
                            <button data-cws-navbar-toggle=".cws-navbar, .cws-navbar-top-panel" class="cws-navbar-top-panel-toggle"><i class="fa fa-mobile fa-3x" aria-hidden="true"></i></button>
                            <!--Navbar Brand-->
                            <div class="cws-navbar-brand"><a href="http://rmvg.dev">
                                    <?php if ($site_logo != '') {?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
                                            <img class="img-responsive" src='<?= $site_logo; ?>' alt='Rocky Mountain Vision Group Logo'/>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/cws_bikeshop_logo.png" alt="<?php bloginfo( 'name' ); ?>"  />
                                        </a>
                                    <?php }; ?>
                            </div>
                        </div>
                        <div class="cell-md-8 rd-navbar-menu-wrap">
                            <div class="cws-navbar-nav-wrap">
                                <div class="cws-navbar-mobile-scroll">
                                    <!--Navbar Brand Mobile-->
                                    <div class="cws-navbar-mobile-brand"></div>

                                    <div class="collapse navbar-collapse" id="navbar">
                                        <?php echo cws_bike_nav(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- RD Parallax-->
    <div data-on="false" data-md-on="true" class="cws-parallax">
        <div data-speed="0.35" data-type="media" data-url="<?= $slide_one_bg; ?>" class="cws-parallax-layer"></div>
        <div data-speed="0" data-type="html" class="cws-parallax-layer">
            <div class="bg-overlay-info">
                <div class="shell-wide">
                    <!--Swiper-->
                    <div data-loop="true" data-height="500px" data-dragable="false" data-min-height="480px" class="swiper-container swiper-slider">
                        <div id="page-loader" class="swiper-wrapper text-center">
                            <?php $hpSlider = get_post_meta( $slider_id, '_rmvg_slides_group_', true );
                            foreach ( (array) $hpSlider as $slide ) {
                                $img = $title = $secondaryTitle = $tertiaryTitle = $cta = $ctaUrl = $cta2 = $ctaUrl2 = '';
                                if ( isset( $slide['message'] ) )
                                    $title = esc_html( $slide['message'] );
                                if ( isset( $slide['secondary-message'] ) )
                                    $secondaryTitle = esc_html( $slide['secondary-message'] );
                                if ( isset( $slide['tertiary-message'] ) )
                                    $tertiaryTitle = esc_html( $slide['tertiary-message'] );
                                if ( isset( $slide['cta'] ) )
                                    $cta = esc_html( $slide['cta'] );
                                if ( isset( $slide['cta-url'] ) )
                                    $ctaUrl = esc_html( $slide['cta-url'] );
                                if ( isset( $slide['cta2'] ) )
                                    $cta2 = esc_html( $slide['cta2'] );
                                if ( isset( $slide['cta-url2'] ) )
                                    $ctaUrl2 = esc_html( $slide['cta-url2'] );
                                if ( isset( $slide['image_id'] ) ) {
                                    $img = wp_get_attachment_image( $slide['image_id'], 'share-pick', null, array(
                                        'class' => 'thumb img-responsive',
                                    ) );
                                } ?>
                                <div class="swiper-slide">
                                    <div class="swiper-caption swiper-parallax">
                                        <div class="swiper-slide-caption">
                                            <div class="range range-xs-center range-xs-middle">
                                                <div class="cell-lg-7 cell-xl-5 section-lg-top-15"><?= $img; ?></div>
                                                <div class="cell-sm-10 cell-lg-5 cell-xl-4 text-lg-left offset-top-0">
                                                    <blockquote class="quote">
                                                        <h2><?= $title; ?></h2>
                                                        <div class="unit unit-lg unit-lg-horizontal unit-spacing-xs offset-top-20">
                                                            <div class="unit-left">
                                                                <hr style="margin-bottom: 3px;" class="divider bg-white veil reveal-lg-inline-block">
                                                            </div>
                                                            <div class="unit-body">
                                                                <div>
                                                                    <h5><?= $secondaryTitle; ?></h5>
                                                                </div>
                                                                <div class="offset-top-10 veil reveal-xs-block">
                                                                    <p style="color: #e8e8e8;"><?= $tertiaryTitle; ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </blockquote>
                                                    <div class="range range-xs-center range-lg-left offset-top-20 offset-xs-top-50">
                                                        <div class="cell-xs-10 cell-sm-6 cell-md-5 cell-lg-7"><a href="<?= $ctaUrl; ?>" class="btn btn-block btn-primary"><?= $cta; ?></a></div>
                                                        <?php if($cta2) { ?>
                                                            <div class="cell-xs-10 cell-sm-5 cell-md-3 cell-lg-5 offset-top-10 offset-sm-top-0"><a href="<?= $ctaUrl2; ?>" class="btn btn-block btn-default"><?= $cta2; ?></a></div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="swiper-button swiper-button-prev swiper-parallax mdi mdi-chevron-left"></div>
                        <div class="swiper-button swiper-button-next swiper-parallax mdi mdi-chevron-right"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
