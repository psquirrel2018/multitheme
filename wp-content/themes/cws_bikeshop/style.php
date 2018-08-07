<?php header("Content-type: text/css");
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php';

global $cwsStyles;

function cws_enqueue_dynamic_css() {

    ?>

<style type="text/css">
    a {
        color:<?php echo $data['link_color'];?>;
    }


/* > Global Elements
    -------------------------------------------------------------- */

    body {
    background: none #<?php echo $body_bg_color;?>;
    color:#<?php echo $font_color;?>;
    }


    h1 {color:#<?php echo $font_color;?>;margin-bottom: 25px;line-height: 170%}
    h2 {color:#<?php echo $font_color;?>; margin-top: -8px;margin-bottom: 25px;line-height: 170%}
    h3 {color:#<?php echo $font_color;?>;margin-bottom:15px;}
    h1, h1 a, h1 a:hover, h1 a:focus {font-size: 28px}
    h2, h2 a, h2 a:hover, h2 a:focus {font-size: 24px}
    h3, h3 a, h3 a:hover, h3 a:focus {font-size: 21px; margin-top: 3px;}
    h4, h4 a, h4 a:hover, h4 a:focus {font-size: 16px;margin-bottom: 15px}
    h5, h5 a, h5 a:hover, h5 a:focus {font-size: 14px;margin-bottom: 10px}
    h6, h6 a, h6 a:hover, h6 a:focus {font-size: 12px;margin-bottom: 10px}
    a {font-style:normal;color: #<?php echo $link_color;?>;text-decoration: none;padding: 1px 0}
    a:hover, a:active {color: #<?php echo $font_color;?>}
    a:focus {outline: none}

    body {
    font-family: "Open Sans", Helvetica, Arial, sans-serif;
    font-size: 15px;
    line-height: 1.6;
    color: #434345;
    background-color: #ffffff; }


hr {
    margin-top: 0;
    margin-bottom: 0;
    border: 0;
    border-top: 1px solid #f5f5f5; }

/** 1.4  Type */
h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6 {
    font-family: "Open Sans", Helvetica, Arial, sans-serif;
    font-weight: 700;
    line-height: 1.1;
    color: inherit; }

.navbar-default {
    background-color: #fff;
    border-color: #e7e7e7; }

.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
    color: #fff;
    background-color: #247eda; }

.navbar-default .navbar-link {
    color: #434345; }
.navbar-default .navbar-link:hover {
    color: #434345; }
.navbar-default .btn-link {
    color: #434345; }
.navbar-default .btn-link:hover, .navbar-default .btn-link:focus {
    color: #434345; }

/** 2.7  Dividers*/
.hr {
    height: 1px;
    padding: 0px;
    margin-top: 30px;
    margin-bottom: 30px;
    background: #f5f5f5;
    border: none; }

h1 a:hover, .h1 a:hover,
h2 a:hover, .h2 a:hover,
h3 a:hover, .h3 a:hover,
h4 a:hover, .h4 a:hover,
h5 a:hover, .h5 a:hover,
h6 a:hover, .h6 a:hover {
    color: #59a1ed; }

.btn-primary {
    color: #fff;
    background-color: #247eda;
    border-color: #247eda; }

.btn-info {
    color: #fff;
    background-color: #3695eb;
    border-color: #3695eb; }

/* 3. SLIDER
-------------------------------------------------------------------*/

#slider .tint {
    background: rgba(0,0,0,0.4);
    height: 100%;
}

/* 3.1. ARROWS & PAGINATION
---------------------------------------------------------------*/

.slides-navigation a {
    background: rgba(0,0,0,0.4);
    color: #fff;
    opacity: 0.4;
    padding: 10px 20px 10px 15px;
}

.slides-navigation a:hover {
    opacity: 1;
}

.slides-pagination {
    bottom: 15px;
}

.slides-pagination a {
    border: 1px solid #fff;
}

.slides-pagination a.current {
    background: #fff;
}

#slider .content h1,
#slider .content h5 {
    color: #fff;
}


.phone .contact-info .icon{
    color: #3695eb;
    font-size: 24px;
}

.phone {color:#3695eb;text-align: right;}

.email .contact-info .icon{
    color: #3695eb;
    font-size: 24px;
}

.email {color:#3695eb;text-align: center;}

[class*='fa-']:before {
    color: #5eaaef;
}

.navbar-default {
    background-color: #fff;
    border:0;
}

.page {
    overflow: auto;
    background-color: #fff;
}

.navbar-default .navbar-nav>li>a {
    font-size: 18px;
    color: #737373;
    font-family: "Open Sans", Helvetica, Arial, sans-serif;
    text-transform: uppercase;
    padding: 14px 15px;
    font-weight: bold;
}

.dropdown-menu > li > a {
    font-weight: 400;
    padding: 5px 20px;
    font-family: "Open Sans", Helvetica, Arial, sans-serif;
}

.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
    background-color: #5eaaef;
    color: #fff;
}

</style>

    <?php
}


    /** ***
    overwrite css area adding  **/
    <?php
    do_action('cc_pro_add_styles');
} //end of get_css

/**
 * This function generates dynamic styles
 */
function cc_dysplay_dynamic_css(){
    global $cap;
    ob_start();
    ?>
    <style type="text/css" title="here they are">
        div{

        }
        <?php
        get_css();
        if($cap->overwrite_css){
            echo stripslashes($cap->overwrite_css);
        }
        ?>
    </style>
    <?php
    $dynamic_styles = ob_get_contents();
    ob_end_clean();
    echo compress($dynamic_styles);
}

/**
 * This function ...
 */
function cc_style_switcher(){
    global $cap;

    if( $cap->static_css == 'no' || !defined('is_pro') && defined('CC_MAIN_CSS_FILE_PATH') && defined('CC_CUSTOM_CSS_FILE_PATH')){
        $names_arr = array(
            CC_MAIN_CSS_FILE_PATH,
            CC_CUSTOM_CSS_FILE_PATH
        );
        cc_remove_static_css_files($names_arr);
    }
    elseif( $cap->static_css == 'yes' && defined('is_pro') && function_exists('cc_create_static_css_files')){
        cc_create_static_css_files();
    }
}
add_action('cc_after_theme_settings_saved', 'cc_style_switcher');

/**
 * This function ...
 */
function cc_print_styles(){
    if( defined('is_pro') && defined('CC_MAIN_CSS_FILE_PATH') && file_exists(CC_MAIN_CSS_FILE_PATH)){
        echo '<link type="text/css" rel="stylesheet" href="'.CC_MAIN_CSS_FILE_URL.'" />';
        if(file_exists(CC_CUSTOM_CSS_FILE_PATH)){
            echo '<link type="text/css" rel="stylesheet" href="'.CC_CUSTOM_CSS_FILE_URL.'" />';
        }
    }
    elseif( (defined('CC_MAIN_CSS_FILE_PATH') && !file_exists(CC_MAIN_CSS_FILE_PATH)) || !defined('is_pro') ){
        cc_dysplay_dynamic_css();
    }
}
add_action('wp_head', 'cc_print_styles', 100);


?>
