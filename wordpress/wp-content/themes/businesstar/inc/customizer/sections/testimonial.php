<?php
/**
 * Testimonial options.
 *
 * @package BusinesStar
 */

$businesstar_default = businesstar_get_default_theme_options();

// Testimonial Section
$wp_customize->add_section( 'section_home_testimonial',
	array(
		'title'      => __( 'Testimonial Section', 'businesstar' ),
		'priority'   => 60,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_testimonial_section]',
	array(
		'default'           => $businesstar_default['disable_testimonial_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'businesstar_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Businesstar_Switch_Control( $wp_customize, 'theme_options[disable_testimonial_section]',
    array(
		'label' 			=> __('Enable/Disable Testimonial Section', 'businesstar'),
		'section'    		=> 'section_home_testimonial',
		'settings'  		=> 'theme_options[disable_testimonial_section]',
		'on_off_label' 		=> businesstar_switch_options(),
    )
) );

//Testimonial Section title
$wp_customize->add_setting('theme_options[testimonial_title]', 
	array(
	'default'           => $businesstar_default['testimonial_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[testimonial_title]', 
	array(
	'label'       => __('Section Title', 'businesstar'),
	'section'     => 'section_home_testimonial',   
	'settings'    => 'theme_options[testimonial_title]',
	'active_callback' => 'businesstar_testimonial_active',		
	'type'        => 'text'
	)
);


// Testimonial background image control and setting
$wp_customize->add_setting( 'theme_options[testimonial_image]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_options[testimonial_image]', array(
	'label'             => esc_html__( 'Background Image', 'businesstar' ),
	'section'           => 'section_home_testimonial',
	'active_callback'   => 'businesstar_testimonial_active',
) ) );


for( $i=1; $i<=4; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[testimonial_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'businesstar_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[testimonial_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'businesstar'), $i),
		'section'     => 'section_home_testimonial',   
		'settings'    => 'theme_options[testimonial_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'businesstar_testimonial_active',
		)
	);
}


