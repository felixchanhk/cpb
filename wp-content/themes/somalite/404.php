<?php
/**
 *
 * @package somalite
 */

get_header(); 

somalite_get_page_title_error(); ?>

<section id="page-not-found-section">
    <div class="container">
        <div class="row">

            <?php 
                if('left'===esc_attr(get_theme_mod('sm_blog_sidebar','right'))) {
                    ?>
                        <?php
                            if ( is_active_sidebar('primary')){
                                ?>
                                    <div class="col-md-3">
                                        <?php get_sidebar('primary'); ?>
                                    </div>
                                    <div class="col-md-8 col-md-offset-1">
                                        <div class="content-area">  
                                            <h2 class="page-error"><?php _e( 'Oops! That page can&rsquo;t be found.', 'somalite' ); ?></h2>
                                            <p><?php _e( 'It looks like nothing was found at this location. Please try again with some different keywords.', 'somalite' ); ?></p>
                                            <?php get_search_form(); ?>
                                        </div>
                                    </div>                      
                                <?php
                            }
                            else{
                                ?>
                                    <div class="col-md-12">
                                        <div class="content-area">  
                                            <h2 class="page-error"><?php _e( 'Oops! That page can&rsquo;t be found.', 'somalite' ); ?></h2>
                                            <p><?php _e( 'It looks like nothing was found at this location. Please try again with some different keywords.', 'somalite' ); ?></p>
                                            <?php get_search_form(); ?>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>                            
                    <?php
                }
                else{
                    ?>
                        <?php
                            if ( is_active_sidebar('primary')){
                                ?>
                                    <div class="col-md-8">
                                        <div class="content-area">  
                                            <h2 class="page-error"><?php _e( 'Oops! That page can&rsquo;t be found.', 'somalite' ); ?></h2>
                                            <p><?php _e( 'It looks like nothing was found at this location. Please try again with some different keywords.', 'somalite' ); ?></p>
                                            <?php get_search_form(); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-md-offset-1">
                                        <?php get_sidebar('primary'); ?>
                                   </div>
                                <?php
                            }
                            else{
                                ?>
                                    <div class="col-md-12">
                                        <div class="content-area">  
                                            <h2 class="page-error"><?php _e( 'Oops! That page can&rsquo;t be found.', 'somalite' ); ?></h2>
                                            <p><?php _e( 'It looks like nothing was found at this location. Please try again with some different keywords.', 'somalite' ); ?></p>
                                            <?php get_search_form(); ?>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>                            
                    <?php
                }
            ?>
        </div>
    </div>
</section>
<?php
get_footer();
