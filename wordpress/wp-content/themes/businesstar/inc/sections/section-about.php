<?php 
/**
 * Template part for displaying Services Section
 *
 *@package BusinesStar
 */ 
$businesstar_disable_about_section = businesstar_get_option( 'disable_about_section' );
if ($businesstar_disable_about_section ==true) {
    $businesstar_about_section_title  = businesstar_get_option( 'about_section_title');
    $businesstar_btn_text = businesstar_get_option( 'about_btn_text');
    $businesstar_home_layout= businesstar_get_option('home_page_layout_content_type');
    ?>  
<?php if ($businesstar_home_layout == 'home-two') { ?>
    <div class="section-header">
        <?php if ( ! empty ( $businesstar_about_section_title ) ) : ?>
            <h2 class="section-title"><?php echo esc_html( $businesstar_about_section_title ); ?></h2>
        <?php endif; ?>
    </div><!-- .section-header -->  
<?php } ?>

<div class="about-section-wrapper has-post-thumbnail ">
    <?php  
        $about_id = businesstar_get_option( 'about_page' );
            $args = array (
            'post_type'     => 'page',
            'posts_per_page' => 1,
            'p' => $about_id,
            
        ); 
        $the_query = new WP_Query( $args );

        // The Loop
        while ( $the_query->have_posts() ) : $the_query->the_post();
        ?>
            <?php if(has_post_thumbnail()) : ?>
                <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'post-thumbnails' ); ?>');">  
                </div><!-- .featured-image -->
            <?php endif; ?>

            <div class="entry-container" <?php echo ! has_post_thumbnail() ? 'style="width:100%; padding:0;"' : ''; ?> >
                <div class="section-header">
                    <h2 class="section-title separator"><?php the_title(); ?></h2>
                </div><!-- .section-header -->
                <div class="section-content">
                    <?php  
                        $excerpt = businesstar_the_excerpt( 50 );
                        echo wp_kses_post( wpautop( $excerpt ) );
                    ?>
                </div><!-- .entry-content -->

                <?php if ( ! empty( $businesstar_btn_text ) ) : ?>
                    <div class="more-link">
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo esc_html( $businesstar_btn_text ); ?></a>
                    </div><!-- .more-link -->
                <?php endif; ?>
            </div><!-- .entry-container -->
    <?php endwhile;?>
</div>  
<?php } ?> 