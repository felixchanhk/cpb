<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package somalite
 */

get_header();

somalite_get_page_title_single();

?>

<section id="blog-section">
    <div class="container">
        <div class="row">
            <?php
                if ( is_active_sidebar('primary')){
                    ?>
                        <div class="col-md-8">
                            <?php
                                while ( have_posts() ){
                                    the_post();

                                    get_template_part( 'template-parts/content', get_post_format());

                                    the_post_navigation();
                        
                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                    endif;
                                }
                            ?>
                        </div>
                        <div class="col-md-3 col-md-offset-1">
                            <?php get_sidebar('primary'); ?>
                        </div>
                    <?php
                }
                else{
                    ?>
                        <div class="col-md-12">
                            <?php
                                while ( have_posts() ){
                                    the_post();

                                    get_template_part( 'template-parts/content', get_post_format());

                                    the_post_navigation();
                        
                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                    endif;
                                }
                            ?>
                        </div>
                    <?php
                }
            ?>            
        </div>
    </div>
</section>

<?php
get_footer();
?>