<?php 
/**
 * Template part for displaying Featured Slider Section
 *
 *@package Businesstar
 */
$businesstar_disable_featured_slider = businesstar_get_option( 'disable_featured-slider_section' );
    if ($businesstar_disable_featured_slider == true) {

    $businesstar_slider_autoplay   = businesstar_get_option( 'slider_autoplay' );
    $businesstar_class_autoplay ='';

    if (true == $businesstar_slider_autoplay ) {
       $businesstar_class_autoplay = 'true';
    } else{
        $businesstar_class_autoplay = 'false';
    }

    for( $i=1; $i<=3; $i++ ) :
        $featured_slider_page_posts[] = businesstar_get_option( 'slider_page_'.$i );
    endfor;
    ?>
    
        <div class="featured-slider-wrapper" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": true, "arrows":true, "autoplay": <?php echo esc_attr( $businesstar_class_autoplay) ?>, "fade": false }'>

            <?php
                $args = array (

                'post_type'     => 'page',
                'post_per_page' => count( $featured_slider_page_posts ),
                'post__in'      => $featured_slider_page_posts,
                'orderby'       =>'post__in',
            );
            $loop = new WP_Query($args);                        
                if ( $loop->have_posts() ) :
                $i=0;  
                    while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                        <article class="slick-item" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                            <?php  $home_layout= businesstar_get_option('home_page_layout_content_type');
                            if ($home_layout == 'home-one') {  ?>
                                <div class="overlay"></div>
                            <?php } ?> 
                            <div class="wrapper">
                                <div class="featured-content-wrapper">
                                    <header class="entry-header">
                                        <h2 class="entry-title"><?php the_title();?></h2>
                                    </header>
                                    <div class="entry-content">
                                        <?php
                                            $excerpt = businesstar_the_excerpt( 20 );
                                            echo wp_kses_post( wpautop( $excerpt ) );
                                        ?>
                                    </div><!-- .entry-content -->
                                    <?php
                                    $readmore_text   = businesstar_get_option( 'slider_custom_btn_text_' . $i );
                                    if ( ! empty( $readmore_text ) ) { ?>
                                        <div class="read-more">
                                        <?php if ( ! empty( $readmore_text ) ) : ?>
                                                <a href="<?php the_permalink();?>" class="btn btn-primary"><?php echo esc_html($readmore_text);?></a>
                                            <?php endif; ?>
                                        </div><!-- .read-more -->
                                    <?php } ?>
                                </div><!-- .featured-content-wrapper -->
                            </div><!-- .wrapper -->
                        </article><!-- .slick-item -->
                    <?php endwhile;?>
                    <?php wp_reset_postdata();
                endif;?>
        </div><!-- .featured-slider-wrapper -->
<?php } ?>
    