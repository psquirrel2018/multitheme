<?php
/*
Template Name: Secondary Pages
*/

get_header();

global $post;

//$review_id = get_post_meta($post->ID, '_be_confluence_frontpage_review_id', true);
$page_hero = get_post_meta($post->ID, '_be_confluence_secondary_header_bg', true);
$postTitle = get_the_title();
$header_text = get_post_meta($post->ID, '_be_confluence_secondary_header_text', true);
$intro_text = get_post_meta($post->ID, '_be_confluence_secondary_intro_text', true);
$box_1_img = get_post_meta($post->ID, '_be_confluence_secondary_box_1_img', true);
$box_1_title = get_post_meta($post->ID, '_be_confluence_secondary_box_1_title', true);
$box_1_text = get_post_meta($post->ID, '_be_confluence_secondary_box_1_text', true);
$box_2_img = get_post_meta($post->ID, '_be_confluence_secondary_box_2_img', true);
$box_2_title = get_post_meta($post->ID, '_be_confluence_secondary_box_2_title', true);
$box_2_text = get_post_meta($post->ID, '_be_confluence_secondary_box_2_text', true);
$box_3_img = get_post_meta($post->ID, '_be_confluence_secondary_box_3_img', true);
$box_3_title = get_post_meta($post->ID, '_be_confluence_secondary_box_3_title', true);
$box_3_text = get_post_meta($post->ID, '_be_confluence_secondary_box_3_text', true);
$header_img = get_the_post_thumbnail_url($post->ID, 'full' );
?>

<!-- Page Contents-->
<main class="page-content">
    <!-- Breadcrumbs-->
    <section class="context-dark">
        <!-- RD Parallax-->
        <div data-on="false" data-md-on="true" class="cws-parallax">
            <div data-speed="0.35" data-type="media" data-url="<?= $page_hero; ?>" class="cws-parallax-layer"></div>
            <div data-speed="0" data-type="html" class="cws-parallax-layer">
                <div class="bg-overlay-info">
                    <div class="shell section-34 section-sm-85 text-md-left">
                        <div class="veil reveal-sm-block reveal-md-inline-block">
                            <h1><?= $postTitle; ?></h1>
                        </div>
                        <div class="pull-md-right offset-sm-top-10 offset-md-top-20">
                            <ul class="p list-inline list-inline-dashed">
                                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                                <li><?= $postTitle; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Who We Are-->
    <section class="section-98 section-sm-110">
        <div class="shell">
            <div class="range range-xs-center">
                <?php while ( have_posts() ) : the_post(); ?>

                <?php
                $postThumbID = get_post_thumbnail_id( get_the_ID() );
                $image_attributes = wp_get_attachment_image_src( $postThumbID, 'full' );
                if ( $image_attributes ) : ?>

                <?php endif; ?>
                <div class="cell-sm-3 cell-sm-push-6"><img class="img-responsive" src="<?php echo $image_attributes[0]; ?>" width="100%" /></div>
                <div class="cell-sm-9 cell-sm-pull-6 text-left offset-top-66 offset-lg-top-0 inset-sm-right-30">


                    <?php print the_content(); ?>

                    <!-- ============ CONTENT END ============ -->
                    <?php endwhile; ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
