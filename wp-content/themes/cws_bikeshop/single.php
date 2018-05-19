<?php
/*
Default blog post page
*/

get_header();

global $post;

//$review_id = get_post_meta($post->ID, '_be_confluence_frontpage_review_id', true);
//$page_hero = get_post_meta($post->ID, '_be_confluence_secondary_hero', true);
$header_text = get_post_meta($post->ID, '_be_confluence_secondary_header_text', true);
$intro_text = get_post_meta($post->ID, '_be_confluence_secondary_intro_text', true);

$header_img = get_the_post_thumbnail_url($post->ID, 'full' );
?>

<!--</header>-->

<!--<div id="Subheader" style="padding:100px 0;">
    <div class="container">
        <div class="column one">
            <h1 class="title">From the Blog</h1>
        </div>
    </div>
</div>-->

<div id="Content">
    <div class="content_wrapper clearfix">
        <div class="sections_group">
            <div class="entry-content" itemprop="mainContentOfPage">
                <div class="section mcb-section equal-height-wrap full-width " style="padding-top:0px; padding-bottom:0px; background-color:">
                    <div class="section_wrapper mcb-section-inner">
                        <div class="wrap mcb-wrap one-second  valign-top clearfix" style="background-image:url(<?= $header_img; ?>); background-size:cover;  ">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one column_divider ">
                                    <hr class="no_line" style="margin: 0 auto 300px;" />
                                </div>
                            </div>
                        </div>
                        <div class="wrap mcb-wrap one-second  valign-top clearfix" style="padding:80px 40px 20px; background-color:#353535">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one column_column ">
                                    <div class="column_attr">
                                        <h2 style="color: #c8beaf;"><?php the_title(); ?></h2>
                                        <hr class="no_line" style="margin: 0 auto 25px;" />
                                        <hr class="no_line" style="margin: 0 auto 25px;" />
                                        <p class="big" style="color: #fff;"><?= $intro_text; ?> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section mcb-section" style="padding-top:50px; padding-bottom:20px; color:#555555;">
                    <div class="section_wrapper mcb-section-inner">
                        <div class="wrap mcb-wrap one  valign-top clearfix">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one column_column ">
                                    <div class="column_attr">
                                        <?php while ( have_posts() ) : the_post(); ?>
                                            <p><?= the_content(); ?></p>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section mcb-section   " style="padding-top:50px; padding-bottom:50px; background-color:#62859f;  ">
                    <div class="section_wrapper mcb-section-inner">
                        <div class="wrap mcb-wrap one  column-margin-0px valign-top clearfix">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one-fourth column_placeholder">
                                    <div class="placeholder">
                                &nbsp;   </div>
                                </div>
                                <div class="column mcb-column one-second column_hover_color ">
                                    <div class="hover_color" style="background:#62859f;border-color:62859f;" ontouchstart="this.classList.toggle('hover');">
                                        <div class="hover_color_bg" style="background:#314451;border-color:#314451;">
                                            <a href="/schedule-your-arrival/">
                                                <div class="hover_color_wrapper" style="padding:20px 30px;">
                                                    <h4 style="margin: 0; color: #fff;">SCHEDULE YOUR NEXT VISIT</h4>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php get_footer(); ?>
