<?php
/**
Template Name: Front Page
 **/
/**
 * Created by PhpStorm.
 * User: circdominic
 * Date: 8/14/17
 * Time: 3:28 PM
 */
global $post;
$welcomeTitle = get_post_meta($post->ID, '_confluence_welcome_title', true);
$featuredTitle = get_post_meta($post->ID, '_confluence_featured_title', true);

$promoOneImg = get_post_meta($post->ID, '_confluence_promo_one_image', true);
$promoTwoImg = get_post_meta($post->ID, '_confluence_promo_two_image', true);
$promoThreeImg = get_post_meta($post->ID, '_confluence_promo_three_image', true);

$promoOneTitle = get_post_meta($post->ID, '_confluence_promo_one_title', true);
$promoOneText = get_post_meta($post->ID, '_confluence_promo_one_text', true);
$promoTwoTitle = get_post_meta($post->ID, '_confluence_promo_two_title', true);
$promoTwoText = get_post_meta($post->ID, '_confluence_promo_two_text', true);

$promoThreeTitle = get_post_meta($post->ID, '_confluence_promo_three_title', true);
$promoThreeText = get_post_meta($post->ID, '_confluence_promo_three_text', true);

//$promoThreeImg = get_post_meta($post->ID, '_confluence_promo_two_img', true);
//$promoThreeImg = get_post_meta($post->ID, '_confluence_promo_two_img', true);

$lifestyle_bg = get_post_meta($post->ID, '_confluence_lifestyle_bg', true);

$lifestyleTagline = get_post_meta($post->ID, '_confluence_lifestyle_tagline', true);
$lifestyleText = get_post_meta($post->ID, '_confluence_lifestyle_text', true);
$lifestyleCta = get_post_meta($post->ID, '_confluence_lifestyle_cta', true);
$lifestyleUrl = get_post_meta($post->ID, '_confluence_lifestyle_url', true);

get_header();
?>
<?php while ( have_posts() ) : the_post(); ?>

    <main class="page-content">
        <!-- Welcome content-->
        <section class="bg-polar" style="padding:60px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">

                            <h1><?= $welcomeTitle; ?></h1>
                            <hr class="divider">
                            <p class=""><?php the_content(); ?></p>


                    </div>
                </div>
            </div>
        </section>

        <!-- Promo or Featured Section-->

        <section class="section-98 section-sm-110" style="padding:60px 0;">
            <div class="container">
                <h1><?= $featuredTitle; ?></h1>
                <hr class="divider">
                <div class="row">
                    <div class="col-sm-4">
                        <!-- Icon Box Type 3-->
                        <?php $promoOneImg_resized = aq_resize( $promoOneImg, 280, 180, true ); //resize & crop img ?>
                        <img src="<?= $promoOneImg_resized; ?>" class="img-responsive">
                        <h4 class=""><?= $promoOneTitle; ?></h4>
                        <p class="">  <?= $promoOneText; ?>   </p>
                    </div>
                    <div class="col-sm-4">
                        <!-- Icon Box Type 3-->
                        <?php $promoTwoImg_resized = aq_resize( $promoTwoImg, 280, 180, true ); //resize & crop img ?>
                        <img src="<?= $promoTwoImg_resized; ?>">
                        <h4 class=""><?= $promoTwoTitle; ?></h4>
                        <p class=""><?= $promoTwoText; ?></p>

                    </div>
                    <div class="col-sm-4">
                        <!-- Icon Box Type 3-->
                        <img src="<?= $promoThreeImg; ?>">
                        <h4 class=""><?= $promoThreeTitle; ?></h4>

                        <p class=""><?= $promoThreeText; ?></p>

                    </div>
                </div>
        </section>
        </div>
        <!-- Our Services-->
        <?php endwhile; ?>
        <section class="shell-wide">
            <hr class="hr bg-gray">
        </section>
        <!-- Testimonials-->

        <!-- How we can help?-->
        <section class="context-dark">
            <!-- RD Parallax-->
            <div data-on="false" data-md-on="true" class="cws-parallax">
                <div data-speed="0.35" data-type="media" data-url="<?= $lifestyle_bg; ?>" class="cws-parallax-layer"></div>
                <div data-speed="0" data-type="html" class="cws-parallax-layer">
                    <div class="bg-overlay-info">
                        <div class="shell section-top-66 section-bottom-66 section-lg-bottom-0">
                            <div class="range range-xs-center range-xs-middle">
                                <div class="col-sm-10 col-md-11 col-lg-4 text-sm-left section-lg-bottom-85">
                                  </div>
                                <div class="col-lg-4"><img src="" width="332" height="418" alt="" class="veil reveal-lg-block"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Featured News-->
        <section id="blog" class="bg-polar" style="padding:60px 0;">
            <div class="container">
                <h1>Featured News</h1>
                <hr class="divider">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="owl-carousel" style="padding-bottom:30px;">
                            <!-- Latest Post 1 -->
                            <?php $loop = new WP_Query(array('post_type' => 'post', 'posts_per_page' => -1, 'orderby'=> 'ASC')); ?>
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <div class="latest-post">
                                    <?php
                                    $postTitle = get_the_title();
                                    $post_image = the_post_thumbnail();

                                    $source_image = $post_image; // let's assume this image has the size 100x100px
                                    $width = 280; // note, how this exceeds the original image size
                                    $height = 180; // some pixel less than the original
                                    $crop = true; // if this would be false, You would get a 90x90px image. For users of prior
                                    // Aqua Resizer users, You would have get a 100x90 image here with $crop = true
                                    $resized_image = aq_resize( $source_image, 280, 180, true ); //resize & crop img
                                    ?>

                                    <a title="<?= $postTitle; ?>" href="<?php print  get_permalink($post->ID) ?>">
                                        <?= $post_image; ?></a>
                                    <h4><?= $postTitle; ?></h4>
                                    <?php print the_excerpt(); ?>
                                    <p><a class="btn btn-default" href="<?php print  get_permalink($post->ID) ?>">More</a></p>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <a href="blog.html" class="btn btn-primary">Read All Posts</a>
                    </div>
                </div
            </div>
        </section>

    </main>



<?php get_footer(); ?>