<?php
$businesstar_disable_features_section = businesstar_get_option( 'disable_features_section' ); 
if ($businesstar_disable_features_section==true) {
 $businesstar_features_title       = businesstar_get_option( 'features_title' );

    for( $i=1; $i<=4; $i++ ) :
        $features_page_posts[] = absint(businesstar_get_option( 'features_page_'.$i ) );
    endfor;

?>
        <?php if( !empty($businesstar_features_title) ):?>
            <div class="section-header">
            <?php if( !empty($businesstar_features_title)):?>
                <h2 class="section-title"><?php echo esc_html($businesstar_features_title);?></h2>
            <?php endif;?>
            </div>
        
        <?php endif;?>

        <div class="section-content clear">
            <?php $args = array (
                'post_type'     => 'page',
                'post_per_page' => 4,
                'post__in'      => $features_page_posts,
                'orderby'       =>'post__in', 
            ); 
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>           
                    <article>
                        <?php $home_layout= businesstar_get_option('home_page_layout_content_type');
                         if ($home_layout == 'home-one') { ?>
                            <?php if(has_post_thumbnail()):?>
                                <div class="featured-image">
                                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>  
                                </div>
                        <?php endif; }?>
                        <div class="entry-container">
                            <?php if ($home_layout == 'home-two') {  ?>
                            <?php $features_icon = businesstar_get_option( 'features_icon_'.$i );
                                if ( !empty($features_icon) ) { ?>
                                    <div class="services-icon-container">
                                        <i class="fa <?php echo esc_attr( $features_icon); ?>"></i>
                                    </div>
                            <?php  } } ?>
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </header>

                            <div class="entry-content">
                               <?php
                                    $excerpt = businesstar_the_excerpt( 10 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div><!-- .entry-content -->
                        </div><!-- .entry-container -->
                    </article>

                <?php endwhile;?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
    </div><!-- .section-content -->
<?php  } ?>