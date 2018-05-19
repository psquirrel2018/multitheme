<?php /**
* Created by PhpStorm.
* User: circdominic
* Date: 8/14/17
* Time: 3:28 PM
*/

if ( is_front_page() && is_home() ) {

    // Default homepage

} elseif ( is_front_page()){

    //Static homepage

} elseif ( is_home()){

    //Blog page

} else {

    //everything else

}

global $post;
$welcomeTitle = get_post_meta($post->ID, '_confluence_welcome_title', true);

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
<h1><?php bloginfo('name'); ?></h1>
<?php
get_footer();
?>