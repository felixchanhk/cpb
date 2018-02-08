<?php
/**
 * @package somalite
 */
?>

<footer>

    <div class="footer-social-email">
        <div class="footer-social-email-grid">
            <ul>
                <li class="email-sign-up">
                    <?php es_subbox( $namefield = "NO", $desc = "", $group = "public" ); ?>                    
                </li>
                <li class="social-button">
                    <ul id="footer-social">
                        <li>
                            <a href="https://www.facebook.com/customprintbox/" title="CPB Facebook" target="_blank">
                                <span><i class="icomoon icon-facebook-with-circle" style="color:#555656; font-size: 3em"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/customprintbox/" title="CPB Pinterest" target="_blank">
                                <span><i class="icomoon icon-pinterest-with-circle" style="color:#555656; font-size: 3em"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/in/customprintbox/" title="CPB Linkedin" target="_blank">
                                <span><i class="icomoon icon-linkedin-with-circle" style="color:#555656; font-size: 3em"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/Customprintbox" title="CPB Twitter" target="_blank">
                                <span><i class="icomoon icon-twitter-with-circle" style="color:#555656; font-size: 3em"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/customprintbox/" title="CPB Instagram" target="_blank">
                                <span><i class="icomoon icon-instagram-2016-with-circle" style="color:#555656; font-size: 3em"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/channel/UC7rHpUmoPYUAYRGZjvBGBeg" title="CPB Youtube" target="_blank">
                                <span><i class="icomoon icon-youtube-with-circle" style="color:#555656; font-size: 3em"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/105415355174262429956" title="CPB Google+" target="_blank">
                                <span><i class="icomoon icon-google-with-circle" style="color:#555656; font-size: 3em"></i></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div id="soma-footer-section">
        <div class="container">
            <div class="row">                
                <div class="col-md-2 col-sm-4">
                    <div class="section wow fadeInUp" data-wow-duration="1s" data-wow-delay="<?php echo 1 / 5; ?>s">
                        <?php
                        if (is_active_sidebar('footer-column1')) {
                            dynamic_sidebar('footer-column1');
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="section wow fadeInUp" data-wow-duration="1s" data-wow-delay="<?php echo 2 / 5; ?>s">
                        <?php
                        if (is_active_sidebar('footer-column2')) {
                            dynamic_sidebar('footer-column2');
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="section wow fadeInUp" data-wow-duration="1s" data-wow-delay="<?php echo 3 / 5; ?>s">
                        <?php
                        if (is_active_sidebar('footer-column3')) {
                            dynamic_sidebar('footer-column3');
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="section wow fadeInUp" data-wow-duration="1s" data-wow-delay="<?php echo 4 / 5; ?>s">
                        <?php
                        if (is_active_sidebar('footer-column4')) {
                            dynamic_sidebar('footer-column4');
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="section wow fadeInUp" data-wow-duration="1s" data-wow-delay="<?php echo 5 / 5; ?>s">
                        <?php
                        if (is_active_sidebar('footer-column5')) {
                            dynamic_sidebar('footer-column5');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="soma-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <p class="soma-copyright wow flipInX" data-wow-duration="2s" data-wow-delay="1s">

                            <?php echo esc_attr(get_theme_mod('sm_copyright_text', __('© 2017 CustomPrintBox.com. All Rights Reserved.', 'somalite'))); ?><br>
                            <span>
                                <?php _e('( Powered by', 'somalite') ?>
                                <a href="http://www.qpp.com/en/home" target="_blank">
                                    <?php _e('<b>QP Group</b> )', 'somalite') ?>
                                </a>

                            </span>
                        </p>
                    </div>
                </div>                
            </div>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
