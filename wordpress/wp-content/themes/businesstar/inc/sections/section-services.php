<?php 
/**
 * Template part for displaying Services Section
 *
 *@package Businesstar
 */
$businesstar_disable_services = businesstar_get_option( 'disable_services_section' );
if ($businesstar_disable_services==true) {

    $businesstar_service_title       = businesstar_get_option( 'service_title' );

    for( $i=1; $i<=6; $i++ ) :
        $services_page_posts[] = absint(businesstar_get_option( 'services_page_'.$i ) );
        $services_icon   = businesstar_get_option( 'services_icon_'.$i );
    endfor;
    ?>

    <?php if( !empty($businesstar_service_title) ):?>
        <div class="section-header">
        <?php if( !empty($businesstar_service_title)):?>
            <h2 class="section-title"><?php echo esc_html($businesstar_service_title);?></h2>
        <?php endif;?>
        </div>
        
    <?php endif; 
    $home_layout= businesstar_get_option('home_page_layout_content_type');
    ?>
    
    <div class="section-content <?php if ($home_layout == 'home-one') { ?>col-3 <?php } else { echo 'clear'; }?>">
                <?php $args = array (
                    'post_type'     => 'page',
                    'post_per_page' => count( $services_page_posts ),
                    'post__in'      => $services_page_posts,
                    'orderby'       =>'post__in', 
                ); 
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                    <?php $home_layout= businesstar_get_option('home_page_layout_content_type');
                     if ($home_layout == 'home-one') { ?>
                        <article>
                            <?php 
                            $services_icon = businesstar_get_option( 'service_icon_'.$i );
                            if ( !empty($services_icon) ) { ?>
                                <div class="services-icon-container">
                                    <i class="fa <?php echo esc_attr( $services_icon); ?>"></i>
                                </div>
                            <?php  } ?>
                            <div class="service-content">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <?php
                                        $excerpt = businesstar_the_excerpt( 10 );
                                        echo wp_kses_post( wpautop( $excerpt ) );
                                    ?>
                                </div><!-- .entry-content -->
                            </div>
                        </article>
                    <?php } else { ?>
                        <article class="hentry">
                        <?php 
                            $services_icon = businesstar_get_option( 'service_icon_'.$i );
                            if ( !empty($services_icon) ) { ?>
                                <div class="icon-container">
                                    <i class="fa <?php echo esc_attr( $services_icon); ?>"></i>
                                </div><!-- .icon-container -->
                            <?php } ?>
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </header>
                            <div class="entry-content">
                                <?php $excerpt = businesstar_the_excerpt( 10 );
                                        echo wp_kses_post( wpautop( $excerpt ) ); ?>
                            </div><!-- .entry-content -->
                        </article><!-- .hentry -->
                    <?php } 
                    if ($home_layout == 'home-two') { 
                        $services_seperator_image = businesstar_get_option( 'services_seperator_image');?>
                        <?php if ( $i == 2 ) : ?>
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $services_seperator_image ); ?>');"></div>
                        <?php endif;  
                    } ?>


                <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
    </div> 
<?php } ?>