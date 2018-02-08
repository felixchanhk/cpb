<?php
/**
 * @package somalite
 */

get_header();

somalite_get_page_title(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
            while ( have_posts() ) : the_post();

                if(somalite_is_woocommerce_activated() && somalite_check_class('woocommerce-page') ){
                    get_template_part( 'template-parts/content', 'wcpage' );
                }
                else{
                    get_template_part( 'template-parts/content', 'page' );
                    ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                        // If comments are open or we have at least one comment, load up the comment template.
                                        if ( comments_open() || get_comments_number() ) :
                                            comments_template();
                                        endif;    
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                }                
            endwhile; // End of the loop.
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
    get_footer();
?>
