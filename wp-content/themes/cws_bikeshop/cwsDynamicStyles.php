<?php header("Content-type: text/css");
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php';


$body_bg_color = cws_confluence_get_option2( 'cws_confluence_bg_color' );
$font_color = cws_confluence_get_option2( 'cws_confluence_font_color' );
$link_color = cws_confluence_get_option2( 'cws_confluence_link_color' );
$button_color = cws_confluence_get_option2( 'cws_confluence_button_color' );
$cta_color = cws_confluence_get_option2( 'cws_confluence_cta_color' );
?>

<style type="text/css">
    /*a {
        color:<?php //echo ;?>;
    }*/

/* > Global Elements
-------------------------------------------------------------- */

    body {
    background: none #<?php echo $body_bg_color;?>;
    color:#<?php echo $font_color;?>;
    }

    h1 {color:<?php echo $font_color;?>;margin-bottom: 25px;line-height: 170%}
    h2 {color:<?php echo $font_color;?>; margin-top: -8px;margin-bottom: 25px;line-height: 170%}
    h3 {color:<?php echo $font_color;?>;margin-bottom:15px;}
    a {font-style:normal;color: <?php echo $link_color;?>;text-decoration: none;padding: 1px 0}
    a:hover, a:active {color: <?php echo $font_color;?>}
    a:focus {outline: none}

    hr {
    background-color:#<?php echo $font_color;?>;
    }

    #header div#logo h1 a, #header div#logo h4 a {
    color: #<?php echo $font_color;?>;
    }

    .btn-primary {

        background-color: <?php echo $button_color;?>;
        border-color: <?php echo $button_color;?>;
    }

</style>