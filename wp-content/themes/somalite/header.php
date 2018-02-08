<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package somalite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>
		<script type="application/ld+json">
			{ "@context" : "http://schema.org",
  			  "@type" : "Organization",
  			  "name" : "Customprintbox",
  			  "url" : "http://customprintbox.com",
  		 	  "logo": "http://customprintbox.com/wp-content/uploads/2017/09/cropped-customprintboxlogoFINAL_black-1.png",
  			  "sameAs" : [ "http://www.facebook.com/customprintbox",
    		  "http://instagram.com/customprintbox"] 
			}
		</script>
    </head>

    <body <?php body_class(); ?>>

        <?php
        if (true === get_theme_mod('sm_preloader_display', true)) {
            ?>
            <!-- Begin Preloader -->
            <div class="loader-wrapper">
                <div id="pre-loader"></div>
            </div>
            <!-- End Preloader -->
            <?php
        }
        ?>

        <!-- Header Styles -->
        <?php
        /**
         * Hook - somalite_action_header.
         *
         * @hooked somalite_header_default_style - 10
         * @hooked somalite_header_shop_style - 10
         */
        do_action('somalite_action_header');
        ?>    

        <!-- Main section -->
        <?php if (is_front_page()) {
            ?>
            <section id="slider">
                <?php
                /* if("slider" != esc_attr(get_theme_mod( 'sm_slide_option1_radio' ))) { orginal */
                /* check for parallax */
                if ("slider" === esc_attr(get_theme_mod('sm_slide_option1_radio'))) {
                    if (true === get_theme_mod('sm_home_parallax', true)) {
                        ?>
                        <div id="slider-inner" class="home-bg-item" data-parallax="scroll" data-image-src="<?php echo esc_url(get_theme_mod('sm_theme_home_bg', get_template_directory_uri() . '/img/start-bg.jpg')); ?>">
                            <div class="inner-overlay">
                                <?php
                            } else {
                                ?>
                                <div id="slider-inner" class="home-bg-item" style="background:url('<?php echo esc_url(get_theme_mod('sm_theme_home_bg', get_template_directory_uri() . '/img/start-bg.jpg')); ?>') no-repeat;">
                                    <div class="inner-overlay">
                                        <?php
                                    }
                                    ?>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="promo-section">
                                                    <div class="promo-text">
                                                        <h1 class="wow fadeInDown" data-wow-duration="2s" data-wow-delay="1s">
                                                            <?php
                                                            $home_heading_text = esc_attr(get_theme_mod('sm_home_heading_text'));
                                                            if (!empty($home_heading_text)) {
                                                                echo $home_heading_text;
                                                            } else {
                                                                echo esc_attr(bloginfo('name'));
                                                            }
                                                            ?>                                                        
                                                        </h1>
                                                        <p class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s"><?php echo esc_attr(get_theme_mod('sm_home_subheading_text', get_bloginfo('description', 'display'))); ?></p>                                                    
                                                        <?php
                                                        $home_button_text = esc_attr(get_theme_mod('sm_home_button_text'));
                                                        if (!empty($home_button_text)) {
                                                            if (false !== strpos(esc_url(get_theme_mod('sm_home_button_url')), 'youtube') || false !== strpos(esc_url(get_theme_mod('sm_home_button_url')), 'vimeo')) {
                                                                ?>
                                                                <div class="read-more">
                                                                    <a class="btn video-popup-link" href="<?php echo esc_url(get_theme_mod('sm_home_button_url')); ?>"><?php echo esc_attr(get_theme_mod('sm_home_button_text')); ?> <i class="fa fa-angle-double-right"></i>
                                                                    </a>
                                                                </div>  
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <div class="read-more">
                                                                    <a class="btn" href="<?php echo esc_url(get_theme_mod('sm_home_button_url')); ?>"><?php echo esc_attr(get_theme_mod('sm_home_button_text')); ?> <i class="fa fa-angle-double-right"></i>
                                                                    </a>
                                                                </div>
                                                                <?php
                                                            }
                                                        }

                                                        $home_button2_text = esc_attr(get_theme_mod('sm_home_button2_text'));
                                                        if (!empty($home_button2_text)) {
                                                            if (false !== strpos(esc_url(get_theme_mod('sm_home_button2_url')), 'youtube') || false !== strpos(esc_url(get_theme_mod('sm_home_button2_url')), 'vimeo')) {
                                                                ?>
                                                                <div class="read-more">
                                                                    <a class="btn video-popup-link" href="<?php echo esc_url(get_theme_mod('sm_home_button2_url')); ?>"><?php echo esc_attr(get_theme_mod('sm_home_button2_text')); ?> <i class="fa fa-angle-double-right"></i>
                                                                    </a>
                                                                </div>  
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <div class="read-more">
                                                                    <a class="btn" href="<?php echo esc_url(get_theme_mod('sm_home_button2_url')); ?>"><?php echo esc_attr(get_theme_mod('sm_home_button2_text')); ?> <i class="fa fa-angle-double-right"></i>
                                                                    </a>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    ?></div></div><?php
                        } else {
                            //slider
                        }
                        ?>
                        </section>

<div class="cpb-myCarousel">
                        <div id="myCarousel" class="carousel slide">
                            <!-- Indicators --> 
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                            </ol>

                            <!-- Wrapper for Slides -->
                            <div class="carousel-inner">
                                
                                <div class="item active">
                                    <div class="overlay"></div>
                                    <!-- Set the first background image using inline CSS below. -->
                                    <div class="cpb-banner fill">
                                        <a href="<?php echo get_home_url(); ?>/product/custom-retail-shopping-bags/matte-gloss-laminated-custom-retail-paper-shopping-bags/" title="custom retail paper shopping bags"><img class="cpb-banner-img Landing-Page-Banner-desktop" src="<?php echo get_template_directory_uri() . '/img/CPB-banner-top-ways-1920x380.jpg' ?>" alt="Custom Print Box"/></a>     
                                        <a href="<?php echo get_home_url(); ?>/product/custom-retail-shopping-bags/matte-gloss-laminated-custom-retail-paper-shopping-bags/" title="custom retail paper shopping bags"><img class="cpb-banner-img Landing-Page-Banner-tablet" src="<?php echo get_template_directory_uri() . '/img/CPB-banner-top-ways-1366x380.jpg' ?>" alt="Custom Print Box"/></a>
                                        <a href="<?php echo get_home_url(); ?>/product/custom-retail-shopping-bags/matte-gloss-laminated-custom-retail-paper-shopping-bags/" title="custom retail paper shopping bags"><img class="cpb-banner-img Landing-Page-Banner-mobile" src="<?php echo get_template_directory_uri() . '/img/CPB-banner-top-ways-420x200.jpg' ?>" alt="Custom Print Box"/></a>
                                    </div>

                                </div>
                            
                            	<div class="item">
                                    <div class="overlay"></div>
                                    <!-- Set the first background image using inline CSS below. -->
                                    <div class="cpb-banner fill">
                                    <a href="<?php echo get_home_url(); ?>/product/custom-retail-shopping-bags/matte-gloss-laminated-custom-retail-paper-shopping-bags/" title="custom retail paper shopping bags">
                                        <video autoplay muted loop poster="" class="video">
                                            <source src="<?php echo get_template_directory_uri() . '/img/Web-Use-Scodix-Banner-02.mp4'?>" type="video/mp4">
                                        </video>
                                    </a>
                                    </div>
                                    <div class="carousel-caption">
                                        <p><font face="Droid Serif"><?php echo __('ENHANCE YOUR COMPETITIVE EDGE');?></font></p>
                                        <p><font face="Dosis" size="+3"><?php echo __('Help your brand stand out ');?><i class="icomoon icon-controller-record" style="color:#f68b1f; font-size: 0.5em"></i><?php echo __(' Make your customers feel special');?></font></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Controls -->
                            <a class="cpb-banner left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="icon-prev"></span>
                            </a>
                            <a class="cpb-banner right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="icon-next"></span>
                            </a>
                        </div>
                        </div>
                        <?php
                    }
