<?php
/**
 * @package somalite
 */
get_header();

somalite_get_page_title($blogtitle = false, $shop = true);
?>

<?php
if (!is_front_page()) {
    ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php
            get_template_part('template-parts/content', 'woocommerce');
            ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php } ?>

<?php
if (is_front_page()) {
    ?>
    <div id="primary" class="content-area">

        <main id="main" class="site-main" role="main">

            <?php
            //get_template_part( 'template-parts/content', 'woocommerce' );           
            ?>
            <div class="homepagetitle">
                <h2 class="cpb-font-h2"><?php echo __('Let Your Design Shine Through Custom Packaging') ?></h2>
                <p class="cpb-font-p">
                    <?php echo __("An easy and affordable way to help your brand stand out and your customers feel special"); ?>
                </p>
            </div>

            <div class="cpb-product-display-section">

                <figure class="snip1206">
                    <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2018/01/create-favor-box.png" alt="sample74"/>
                    <figcaption>
                        <h2 class="snip1206-h2">Favor Box</h2>
                        <p class="snip1206-p">Coming Soon</p>
                    </figcaption>
                    <a href="<?php echo get_site_url(); ?>/product/uncategorized/mosaic-favor-box/"></a>
                </figure>
                <figure class="snip1206">
                    <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2018/01/create-shopping-bag.png" alt="sample69"/>
                    <figcaption>
                        <h2 class="snip1206-h2">Shopping Bag</h2>
                        <p class="snip1206-p">Shop Now</p>
                    </figcaption>
                    <a href="<?php echo get_site_url(); ?>/product-category/custom-retail-shopping-bags/"></a>
                </figure>
                <figure class="snip1206">
                    <img src="<?php echo get_template_directory_uri() . '/img/WP7685-icon1.png' ?>" alt="Wine Box"/>
                    <figcaption>
                        <h2 class="snip1206-h2">Wine Box</h2>
                        <p class="snip1206-p">Shop Now</p>
                    </figcaption>
                    <a href="<?php echo get_site_url(); ?>/product/wine-box/wine-box/"></a>
                </figure>            

                <div class="left-product-column" onmouseover="leftProductColumnMouseOver()" onmouseout="leftProductColumnMouseOut()">
                    <img id="cpb-product-info" src="<?php echo get_template_directory_uri() . '/img/left-img.jpg' ?>" alt=""/>
                    <button class="click-it-to-show-box" ><?php echo __("Create Your Own"); ?></button>
                    <!-- Swiper -->
                    <div id="swiper-container1" class="swiper-container" style="visibility:hidden;">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><a href="invitation-card-coming-soon"><img src="<?php echo get_template_directory_uri() . '/img/create-your-own-invitation-card.png' ?>" alt=""/><p class="swiper-slide-text">Invitation Card</p></a></div>                            
                            <div class="swiper-slide"><a href="<?php echo get_site_url(); ?>/product/matte-gloss-laminated-custom-retail-paper-shopping-bags/"><img src="<?php echo get_template_directory_uri() . '/img/create-your-own-paper-shopping-bag.png' ?>" alt=""/><p class="swiper-slide-text">Paper Shopping Bag</p></a></div>    
                            <div class="swiper-slide"><a href="folded-box-coming-soon"><img src="<?php echo get_template_directory_uri() . '/img/create-your-own-folded-box.png' ?>" alt=""/><p class="swiper-slide-text">Folded Box</p></a></div>
                            <div class="swiper-slide"><a href="rigid-box-coming-soon"><img src="<?php echo get_template_directory_uri() . '/img/create-your-own-rigid-box.png' ?>" alt="rigid box"/><p class="swiper-slide-text">Rigid Box</p></a></div>
                        </div>

                        <!-- Slide Button -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <!--<button class="close-windows" onclick="outImageSwiper()">X</button>-->
                    </div>
                </div>
                <span class="product_line"></span>
                <div class="right-product-column" onmouseover="rightProductColumnMouseOver()" onmouseout="rightProductColumnMouseOut()">
                    <img id="cpb-product-info2" src="<?php echo get_template_directory_uri() . '/img/right-img.jpg' ?>" alt="" />
                    <button class="click-it-to-show-box" ><?php echo __("Choose Our Designs"); ?></button>
                    <!-- Swiper -->
                    <div id="swiper-container2" class="swiper-container" style="visibility:hidden;">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><a href="invitation-card-coming-soon"><img src="<?php echo get_template_directory_uri() . '/img/choose-our-design-invitation-card.png' ?>" alt=""/><p class="swiper-slide-text">Invitation Card</p></a></div>
                            <div class="swiper-slide"><a href="<?php echo get_site_url(); ?>/product/matte-gloss-laminated-custom-retail-paper-shopping-bags/"><img src="<?php echo get_template_directory_uri() . '/img/choose-our-design-paper-shopping-bag.png' ?>" alt=""/><p class="swiper-slide-text">Paper Shopping Bag</p></a></div>
                            <div class="swiper-slide"><a href="folded-box-coming-soon"><img src="<?php echo get_template_directory_uri() . '/img/choose-our-design-folded-box.png' ?>" alt=""/><p class="swiper-slide-text">Folded Box</p></a></div>
                            <div class="swiper-slide"><a href="folded-box-coming-soon"><img src="<?php echo get_template_directory_uri() . '/img/choose-our-design-rigid-box.png' ?>" alt=""/><p class="swiper-slide-text">Folded Box</p></a></div>
                        </div>

                        <!-- Slide Button -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <!--<button class="close-windows" onclick="outImageSwiper2()">X</button>-->
                    </div>
                </div>
            </div>

            <div class="wrap">
                <div class="cpb-blog-container">
                    <!--<div class="row">
                        <div class="twelve columns">
                            <h4>Filter Blog</h4>
                        </div>
                    </div>-->

                    <div class="row cpb-mitItUp-filter">
                        <div class="twelve columns">
                            <div class="programs">
                                <button id="btn_all" class="filter-btn hvr-underline-from-left" data-filter="all"><?php echo __("All"); ?></button>
                                <button id="btn_fBox" class="filter-btn hvr-underline-from-left" data-filter=".17"><?php echo __("Favor Box"); ?></button>
                                <button id="btn_icard" class="filter-btn hvr-underline-from-left" data-filter=".16"><?php echo __("Invitations"); ?></button>
                                <button id="btn_sBag" class="filter-btn hvr-underline-from-left" data-filter=".18"><?php echo __("Shopping Bag"); ?></button>
                                <!--<button id="btn_wBox" class="filter-btn hvr-underline-from-left" data-filter=".19"><?php echo __("Wine Box"); ?></button>-->
                            </div>
                        </div>
                    </div><!-- end of row -->

                    <!--<div class="row">
                        <div class="columns twelve">
                            <h4>Sort Blog</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="columns twelve">
                            <div class="programs">
                                <button class="sort-btn" data-sort="default:asc">Default</button>
                                <button class="sort-btn" data-sort="random">Random</button>
                                <button class="sort-btn" data-sort="order:asc">Ascending</button>
                                <button class="sort-btn" data-sort="year:desc order:desc">Descending<span class="multi">(Multi)</span></button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="twelve columns">
                            <h4>Blog List</h4>
                        </div>
                    </div> -->

                    <div class="row">
                        <div id="portfolio"> 
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 100
                            );

                            $post_query = new WP_Query($args);
                            if ($post_query->have_posts()) {
                                while ($post_query->have_posts()) {
                                    $post_query->the_post();
                                    ?>
                                    <div class="mix-target scale-anm <?php
                                    if (the_category_ID(0) == 16 || the_category_ID(0) == 31 || the_category_ID(0) == 33) {
                                        echo 16;
                                    } else if (the_category_ID(0) == 18 || the_category_ID(0) == 36 || the_category_ID(0) == 37) {
                                        echo 18;
                                    } else if (the_category_ID(0) == 17 || the_category_ID(0) == 30 || the_category_ID(0) == 32) {
                                        echo 17;
                                    } else if (the_category_ID(0) == 19 || the_category_ID(0) == 34 || the_category_ID(0) == 35) {
                                        echo 19;
                                    };
                                    ?>" >
                                        <div class="cpb-blog-div">
                                            <div class="cpb-blog-title">
                                                <h2 class="cpb-blog-title-h2"><?php the_title(); ?></h2>
                                            </div>
                                            <div class="cpb-blog-imag" >
            <?php echo the_post_thumbnail('medium'); ?>
                                            </div>
                                            <div class="cpb-blog-content">
                                                <div class="cpb-blog-content-adjust">
                                                    <a class="cpb-product-details" href="<?php echo get_home_url(); ?><?php
                                                    $pid = the_category_ID(0);
                                                    if ($pid == 16) {
                                                        echo '';
                                                    } else if ($pid == 18) {
                                                        echo '/product/matte-gloss-laminated-custom-retail-paper-shopping-bags/';
                                                    }
                                                    ?>"><?php echo __("Product Details"); ?></a>
                                                    <div class="cpb-blog-excerpt"><?php echo the_excerpt(); ?></div>                                                   
                                                </div>
                                                <div class="cpb_link_div">
                                                    <a href="<?php the_permalink() ?>"><?php echo __("Continue Reading"); ?> <i class="icomoon icon-blog"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div><!-- end of row -->  
                </div><!-- end of container -->
            </div><!-- end of wrap -->
        </main><!-- #main -->
    </div><!-- #primary -->
    <?php
}
?>

<?php
get_footer();
?>