<?php
/**
 * Default theme options.
 *
 * @package BusinesStar
 */

if ( ! function_exists( 'businesstar_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function businesstar_get_default_theme_options() {

	$theme_data = wp_get_theme();
	$defaults = array();

    $defaults['home_page_layout_content_type']  = 'home-one';

	// Featured Slider Section
	$defaults['disable_featured-slider_section']	= false;
	$defaults['slider_autoplay']					= false;
	

	//About Section	
	$defaults['disable_about_section']	   		= false;
	$defaults['about_section_title']			= esc_html__( 'About', 'businesstar' );
	$defaults['about_btn_text']	   	 			= esc_html__( 'Read More', 'businesstar' );


	// Our Service Section
	$defaults['disable_services_section']		= false;
	$defaults['service_title']	   	 			= esc_html__( 'Our Services', 'businesstar' );


	// Featured Section
	$defaults['disable_features_section']		= false;
	$defaults['features_title']	   	 			= esc_html__( 'Our Features', 'businesstar' );

	// Testimonial Section
	$defaults['disable_testimonial_section']	= false;
	$defaults['testimonial_title']	   	 		= esc_html__( 'Happy Customer', 'businesstar' );


	// Blog Section
	$defaults['disable_blog_section']			= false;
	$defaults['blog_title']	   	 				= esc_html__( 'Latest Post', 'businesstar' ); 
	$defaults['image_buttom']					= false;


	//General Section
	$defaults['blog_readmore_text']				= esc_html__('Read More','businesstar');
	$defaults['excerpt_length']					= 40;
	$defaults['layout_options_blog']			= 'right-sidebar';
	$defaults['layout_options_archive']			= 'right-sidebar';
	$defaults['layout_options_page']			= 'right-sidebar';	
	$defaults['layout_options_single']			= 'right-sidebar';	


	//Footer section 		
	$defaults['copyright_text']					= esc_html__( 'Copyright &copy; All rights reserved.', 'businesstar' );

	// Pass through filter.
	$defaults = apply_filters( 'businesstar_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'businesstar_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function businesstar_get_option( $key ) {

		$default_options = businesstar_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;