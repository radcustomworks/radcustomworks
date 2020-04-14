<?php 
$businesstar_$disable_testimonial_section = businesstar_get_option( 'disable_testimonial_section' ); 
if ($businesstar_$disable_testimonial_section==true) {
    $businesstar_testimonial_title = businesstar_get_option( 'testimonial_title' );

    for( $i=1; $i<=4; $i++ ) :
        $testimonial_page_posts[] = absint(businesstar_get_option( 'testimonial_page_'.$i ) );
    endfor; 
        ?>             
    <?php if ( ! empty( $businesstar_testimonial_title ) ) : ?>
       <div class="section-header">
         <?php if(!empty($businesstar_testimonial_title)):?>
            <h2 class="section-title"><?php echo esc_html($businesstar_testimonial_title); ?></h2>                                  
            <div class="separator"></div>
        <?php endif; ?>
        </div><!-- .section-header -->
    <?php endif; 
    $home_layout= businesstar_get_option('home_page_layout_content_type'); ?>  
    <div class="section-content">
        <div class="testimonial-slider" data-slick='{"slidesToShow": <?php echo (esc_attr($home_layout) == 'home-two' ) ? 1 : 2; ?>, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": true, "arrows":true, "autoplay": true, "fade": false, "draggable": true }'>      
            <?php $args = array (
                'post_type'     => 'page',
                'post_per_page' => count( $testimonial_page_posts ),
                'post__in'      => $testimonial_page_posts,
                'orderby'       =>'post__in', 
            ); 
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                            <div class="slick-item">
                                <div class="quote">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/quote.png' ); ?>">
                                </div><!-- .quote -->
                                <div class="client-wrapper">
                                        <div class="entry-content">
                                            <?php 
                                                $excerpt = businesstar_the_excerpt( 20 );
                                                echo wp_kses_post( wpautop( $excerpt ) );
                                            ?>
                                        </div><!-- .entry-content -->
                                        <header class="entry-header">
                                            <h2 class="entry-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h2>
                                        </header>
                                   
                                        <div class="featured-image">
                                            <img src="<?php the_post_thumbnail_url('gallery');  ?>" alt="<?php the_title();?>">
                                        </div><!-- .featured-image -->
                                </div><!-- .client-wrapper -->
                            </div><!-- .slick-item -->
                   
                    <?php endwhile;?>
                <?php wp_reset_postdata(); 
             endif;?>
        </div><!-- .testimonial-slider -->
    </div><!-- .section-content -->
<?php   } ?>
