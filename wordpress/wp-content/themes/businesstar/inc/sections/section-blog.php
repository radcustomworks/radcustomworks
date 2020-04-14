<?php 
/**
 * Template part for displaying Blog Section
 *
 *@package Businesstar
 */
$businesstar_disable_blog_section = businesstar_get_option( 'disable_blog_section' );
 if ( $businesstar_disable_blog_section==true ) {

	 $businesstar_blog_post_title    = businesstar_get_option( 'blog_title' );
	 $businesstar_blog_category = businesstar_get_option( 'blog_category' );	 
	 
        ?> 
    <?php if( !empty($businesstar_blog_post_title) ):?>
        <div class="section-header">
        <?php if( !empty($businesstar_blog_post_title)):?>
            <h2 class="section-title"><?php echo esc_html($businesstar_blog_post_title);?></h2>
        <?php endif;?>
        </div>
    
    <?php endif;?>
  <div class="section-content col-3">
  	<?php 
        $args = array (

            'posts_per_page' =>3,              
            'post_type' => 'post',
            'post_status' => 'publish',
            'paged' => 1,
            );
            if ( absint( $businesstar_blog_category ) > 0 ) {
                $args['cat'] = absint( $businesstar_blog_category );
            }
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
				    <article>
                    <?php $blog_image_buttom    = businesstar_get_option( 'image_buttom' );
                        if ( true == $blog_image_buttom ) {
                            $classes = 'image-buttom';
                        } else {
                            $classes = 'image-top';
                        }?>
				    	<div class="post-item <?php echo esc_attr( $classes ); ?>">
					      	<?php if(has_post_thumbnail()):?>
						        <div class="featured-image">
						        	<a href="<?php the_permalink();?>"><?php the_post_thumbnail('businesstar-blog');?></a>  
						        </div>
					    	<?php endif;?>

					    	<div class="entry-container">
						    	<div class="entry-meta">		         
						            <?php businesstar_posted_on();
                                    the_category();?>
						        </div><!-- .entry-meta -->

						        <header class="entry-header">
									<h2 class="entry-title">
										<a href="<?php the_permalink();?>"><?php the_title();?></a>
									</h2>
						        </header>

						        <div class="entry-content">
				 				    <?php
										$excerpt = businesstar_the_excerpt( 20 );
										echo wp_kses_post( wpautop( $excerpt ) );
									?>
						        </div><!-- .entry-content -->

						        <?php $readmore_text = businesstar_get_option( 'readmore_text' );
                                if (!empty ($readmore_text)) { ?>

						          <a href="<?php the_permalink();?>" class="btn"><?php echo esc_html($readmore_text);?></a>
                                <?php } ?>
					        </div><!-- .entry-container -->
					    </div><!-- .post-item -->
				    </article>
	    <?php endwhile;?>
	    <?php wp_reset_postdata(); ?>
    <?php endif;?>
  </div>
<?php } ?>