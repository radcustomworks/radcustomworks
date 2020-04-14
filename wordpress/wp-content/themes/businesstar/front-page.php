<?php
/**
 * The template for displaying home page.
 * @package BusinesStar
 */

if ( 'posts' != get_option( 'show_on_front' ) ){ 
    get_header(); ?>
    <?php $enabled_sections = businesstar_get_sections();
    if( is_array( $enabled_sections ) ) { 
        foreach( $enabled_sections as $section ) {

            if( ( $section['id'] == 'featured-slider' ) ){ ?>
                <?php $disable_featured_slider = businesstar_get_option( 'disable_featured-slider_section' );
                if( true == $disable_featured_slider): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'services' ) { ?>
                <?php $disable_services_section = businesstar_get_option( 'disable_services_section' );
                if( true ==$disable_services_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section relative">
                        <div class="services-wrapper">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                        </div>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'about' ) { ?>
                <?php $disable_about_section = businesstar_get_option( 'disable_about_section' );
                if( true ==$disable_about_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section relative">

                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>

                    </section>
            <?php endif; ?>

             <?php } elseif( $section['id'] == 'features' ) { ?>
                <?php $disable_features_section = businesstar_get_option( 'disable_features_section' );
                if( true ==$disable_features_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section relative">

                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>

                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'testimonial' ) { ?>
            <?php $disable_testimonial_section = businesstar_get_option( 'disable_testimonial_section' );
            $testimonial_image = businesstar_get_option( 'testimonial_image' );
            if( true ==$disable_testimonial_section): ?>
                <section id="<?php echo esc_attr( $section['id'] ); ?>" style="background-image: url('<?php echo esc_url( $testimonial_image );?>');">
                <div class="overlay"></div>
                    <div class="wrapper">
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </div>
                </section>            
            <?php endif; ?>

           <?php } elseif ( $section['id'] == 'blog' ) { ?>
                <?php $disable_blog_section = businesstar_get_option( 'disable_blog_section' );
                if( true === $disable_blog_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="blog-posts-wrapper page-section">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                <?php endif; 

                
            }
        }
    }
    get_footer();
} 
elseif('posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} 
else{
    include( get_page_template() );
}