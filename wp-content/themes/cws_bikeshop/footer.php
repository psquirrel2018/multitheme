<?php

$officeOneAddress = cws_confluence_get_option2( 'cws_confluence_address' );
$phone = cws_confluence_get_option2( 'cws_confluence_phone' );

?>

<!--Main Footer-->
<footer class="main-footer" style="padding-top: 60px;background-color:#191919;">

    <!--Footer Upper-->
    <div class="footer-upper" style="padding-bottom:60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 column">
                    <div class="footer-widget about-widget">
                        <h4>Contact Us</h4>
                        <?php echo $officeOneAddress; ?><br>
                        <div class="phone">
                            <address class="contact-info text-left"><span><span class="icon mdi mdi-cellphone-android"></span><a href="callto:<?= $phone;?>" class="text-middle p text-dark"><?= $phone;?></a></span></address>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 column">
                    <div class="footer-widget links">
                        <?php if ( ! dynamic_sidebar('footer2')) : ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 column">
                    <div class="footer-widget newsletter-widget">
                        <?php if ( ! dynamic_sidebar('footer4')) : ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Footer Bottom-->
    <div class="footer-bottom" style="padding-top: 10px;background-color: #000;">
        <div class="container">
            <!--Copyright-->
            <div class="copyright">2017 &copy; Your Company Name. Designed with &ensp;<span class="fa fa-heart"></span>&ensp; by RepairTraq.com</div>
            <div class="social-links">
                <!--<a href="https://www.facebook.com/Brush-Creek-Landscaping-1432630706980539" class="icon fa fa-facebook-f"></a>-->
                <!--<a href="" class="icon fa fa-pinterest"></a>
                <a href="" class="icon fa fa-youtube-play"></a>
                <a href="mailto:" class="icon fa fa-envelope"></a>-->
            </div>
        </div>
    </div>

</footer>


</div>
<!--End pagewrapper-->


<!-- ============ FOOTER END ============ -->

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-xxxxxx-1', 'auto');
    ga('send', 'pageview');

</script>

<?php wp_footer(); ?>
</body>
</html>
