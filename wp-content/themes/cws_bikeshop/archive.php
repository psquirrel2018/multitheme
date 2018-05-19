<?php
/*
Template Name: Blog Page
*/
/**
 * @author Scott Taylor
 * @package bunkhouse
 * @subpackage Customizations
 */
get_header('two'); 	?>

    <!-- ============ BLOG START ============ -->

    <section id="blog" style="padding-bottom: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center" style="padding-bottom: 30px;">
                    <h5> </h5>
                    <h1>Blog</h1>
                </div>
            </div>
            <?php $loop = new WP_Query(array('post_type' => 'post', 'posts_per_page' => -1, 'orderby'=> 'ASC')); ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php
            $postTitle = get_the_title();
            $thumb = get_post_thumbnail_id();
            $img_url = wp_get_attachment_url( $thumb,'medium'); //get img URL
            $image = aq_resize( $img_url, 450, 310, true ); //resize & crop img
            $excerpt = get_the_excerpt();
            $excerpt = substr($excerpt, 0, 300);
            if( strlen($excerpt) >= 250 ){
                $excerpt .= '... <a href="'. get_permalink($post->ID) .'">More</a>';}
            ?>
            <div class="row">

                <div class="col-xs-6">
                    <div class="latest-post" style="padding-bottom:20px;">
                        <a title="<?= $postTitle; ?>" href="<?php print  get_permalink($post->ID) ?>"><img class="img-responsive" src="<?= $image; ?>"></a>
                    </div>
                </div>
                <div class="col-xs-6">
                    <h4><a title="<?= $postTitle; ?>" href="<?php print  get_permalink($post->ID) ?>"><?= $postTitle; ?></a></h4>
                    <?= $excerpt; ?>
                </div>
            </div>
            <?php endwhile; ?>
    </section>

    <!-- ============ BLOG END ============ -->

<?php get_footer(); ?>