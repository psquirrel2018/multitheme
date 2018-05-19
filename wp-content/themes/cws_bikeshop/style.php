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

    hr {
    background-color:#<?php echo $font_color;?>;
    }

    #header div#logo h1 a, #header div#logo h4 a {
    color: #<?php echo $font_color;?>;
    font-size: 37px;
    line-height: 130%;
    }

    /* > Navigation
    -------------------------------------------------------------- */

    ul#nav {
    background:url("") no-repeat scroll 0 0 transparent;
    bottom:2px;
    list-style:none outside none;
    margin:15px 0 0;
    max-width:100%;
    min-width:100%;
    padding:45px 0 5px 0;
    position:relative;
    left: 20px;
    right: 15px;
    }

    ul#nav li {
    float:left;
    margin:0;
    padding:6px 28px 0 0;
    }

    ul#nav li a {
    -moz-background-inline-policy:continuous;
    -moz-border-radius-topleft:3px;
    border-top-left-radius:3px;
    -webkit-border-top-left-radius:3px;
    -moz-border-radius-topright:3px;
    border-top-right-radius:3px;
    -webkit-border-top-right-radius:3px;
    background:none repeat scroll 0 0 transparent;
    color:#<?php echo $font_color;?>;
    display:block;
    font-size:13px;
    font-weight:bold;
    padding:0;
    }

    ul#nav li.selected, ul#nav li.selected a, ul#nav li.current_page_item a {
    background:none repeat scroll 0 0;
    color: #<?php echo $link_color;?>;
    }

    ul#nav a:focus {outline: none}

    #nav-home {
    float:left;
    }
    <?php if($cap->menu_x ==__("right",'cc')){?>
        #nav-home {
        float: right;
        }
    <?php } ?>
    #nav-community {
    float:left;
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
