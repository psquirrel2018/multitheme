<?php
/**
 * Created by PhpStorm.
 * User: Scott Taylor
 * Date: 2/25/18
 * Time: 11:11 AM
 */
global $post;
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
//four
$slide_four_img = cws_confluence_get_option2( 'cws_confluence_slider_four_image');
$slide_four_title = cws_confluence_get_option2( 'cws_confluence_slider_four_lgText');
$slide_four_secondaryTitle = cws_confluence_get_option2( 'cws_confluence_four_three_mdText');
$slide_four_sm_text = cws_confluence_get_option2( 'cws_confluence_slider_four_smText');
$slide_four_cta = cws_confluence_get_option2( 'cws_confluence_slider_four_cta');
$slide_four_ctaUrl = cws_confluence_get_option2( 'cws_confluence_slider_four_cta_url');


?>

<section id="flick-container" class="flickity">
    <div id="flick" style="max-height:600px;" class="main-carousel">
        <?php if($slide_one_img !='') { ?>
            <div class="carousel-cell" style="background: url('<?= $slide_one_img; ?>'); background-size: cover;">
                <!--<img class="" src="" data-src="<?//= $slide_one_img; ?>">-->

                <div class="tint">
                    <div class="content text-center">

                        <h1 style="color:#ffffff;">    <?= $slide_one_title; ?> </h1>
                        <h5 style="color:#ffffff;"><?= $slide_one_secondaryTitle; ?></h5>
                        <div class="small" style="color:#ffffff;">--- <?= $slide_one_sm_text; ?></div>
                        <p><a href="<?= $slide_one_ctaUrl; ?>"
                              class="btn btn-primary"><?= $slide_one_cta; ?></a></p>

                    </div>
                </div>
            </div>
        <?php if($slide_two_img !='') { ?>
            <div class="carousel-cell" style="background: url('<?= $slide_two_img; ?>'); background-size: cover;">
                <!--<img class="lazy2" src="" data-src="<?//= $slide_two_img; ?>">-->
                <div class="tint">
                    <div class="content text-center">
                        <h1 style="color:#ffffff;">    <?= $slide_two_title; ?> </h1>
                        <h5 style="color:#ffffff;"><?= $slide_two_secondaryTitle; ?></h5>
                        <div class="small" style="color:#ffffff;">--- <?= $slide_two_sm_text; ?></div>
                        <p><a href="<?= $slide_two_ctaUrl; ?>"
                              class="btn btn-primary"><?= $slide_two_cta; ?></a></p>
                    </div>
                </div>
            </div>
                <?php } ?>
                <?php if($slide_three_img !='') { ?>
            <div class="carousel-cell" style="background: url('<?= $slide_three_img; ?>'); background-size: cover;">
                <!--<img class="lazy2" src="" data-src="<?//= $slide_three_img; ?>">-->
                <div class="tint">
                    <div class="content text-center">
                        <?php if($slide_three_title !='') { ?> <h1><?= $slide_three_title; ?></h1> <?php } ?>
                        <?php if($slide_three_secondaryTitle !='') { ?><h5><?= $slide_three_secondaryTitle; ?></h5><?php } ?>
                        <?php if($slide_three_sm_text !='') { ?><div class="small">--- <?= $slide_three_sm_text; ?></div><?php } ?>
                        <?php if($slide_three_cta !='') { ?><p><a href="<?= $slide_three_ctaUrl; ?>"
                                                                  class="btn btn-primary"><?= $slide_three_cta; ?></a></p><?php } ?>
                    </div>
                </div>
            </div>
                <?php } ?>

                <?php if($slide_four_img !='') { ?>
                <div class="carousel-cell" style="background: url('<?= $slide_four_img; ?>'); background-size: cover;">
                    <div class="tint">
                        <div class="content text-center">
                            <?php if($slide_four_title !='') { ?> <h1><?= $slide_four_title; ?></h1> <?php } ?>
                            <?php if($slide_four_secondaryTitle !='') { ?><h5><?= $slide_four_secondaryTitle; ?></h5><?php } ?>
                            <?php if($slide_four_sm_text !='') { ?><div class="small">--- <?= $slide_four_sm_text; ?></div><?php } ?>
                            <?php if($slide_four_cta !='') { ?><p><a href="<?= $slide_four_ctaUrl; ?>"
                                                                     class="btn btn-primary"><?= $slide_four_cta; ?></a></p><?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>

        <?php } else { ?>
            <span><h4 style="padding: 60px;">You must enter at least one slide in the Theme Options panel of the admin and it has to be the first slide</h4></span>
        <?php } ?>

    </div>

</section>
