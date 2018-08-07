<?php
/**
 *This is a template part if the admin does not want to use a social media icons in the top bar of the header
 */
global $post;
$cws_topbar_bg_color = cws_confluence_get_option2( 'cws_confluence_topbar_bg_skin' );
$site_logo = cws_confluence_get_option2( 'cws_confluence_logo' );
$phone = cws_confluence_get_option2( 'cws_confluence_phone' );
$business_email = cws_confluence_get_option2( 'cws_confluence_email' );
$business_address = cws_confluence_get_option2( 'cws_confluence_address' );
?>
<div class="cws-navbar-inner">
    <div class="cws-top-bar">
        <div class="col-sm-6">
            <?php if ($business_email != '') {?>
                <div class="email-no-social">
                    <address class="contact-info"><span><span class="icon mdi mdi-email"></span><a href="#" class="text-middle p text-dark"><?= $business_email;?></a></span></address>
                </div>
            <?php } else { ?>
            Go to site options and add an email address
            <?php }; ?></span></address>
        </div>

        <div class="col-sm-6">
            <?php if ($phone != '') {?>
                <div class="phone">
                    <address class="contact-info"><span><span class="icon mdi mdi-cellphone-android"></span><a href="callto:<?= $phone;?>" class="text-middle p text-dark"><?= $phone;?></a></span></address>
                </div>
            <?php } else { ?>
            Go to site options and add a #
            <?php }; ?></span></address>
        </div>
    </div>
</div>
