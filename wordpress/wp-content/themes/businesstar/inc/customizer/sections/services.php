<?php
/**
 * Services options.
 *
 * @package BusinesStar
 */

$businesstar_default = businesstar_get_default_theme_options();

// Services Section
$wp_customize->add_section( 'section_home_service',
	array(
		'title'      => __( 'Services Section', 'businesstar' ),
		'priority'   => 15,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_services_section]',
	array(
		'default'           => $businesstar_default['disable_services_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'businesstar_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Businesstar_Switch_Control( $wp_customize, 'theme_options[disable_services_section]',
    array(
		'label' 			=> __('Enable/Disable Service Section', 'businesstar'),
		'section'    		=> 'section_home_service',
		 'settings'  		=> 'theme_options[disable_services_section]',
		'on_off_label' 		=> businesstar_switch_options(),
    )
) );

//Services Section title
$wp_customize->add_setting('theme_options[service_title]', 
	array(
	'default'           => $businesstar_default['service_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[service_title]', 
	array(
	'label'       => __('Section Title', 'businesstar'),
	'section'     => 'section_home_service',   
	'settings'    => 'theme_options[service_title]',
	'active_callback' => 'businesstar_services_active',		
	'type'        => 'text'
	)
);


// pricing number control and setting
$wp_customize->add_setting( 'theme_options[services_seperator_image]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_options[services_seperator_image]', array(
	'label'             => esc_html__( 'Seperator Image', 'businesstar' ),
	'section'           => 'section_home_service',
	'active_callback'   => 'businesstar_services_seperator_image',
) ) );

for( $i=1; $i<=6; $i++ ){

		//Services Section icon
	$wp_customize->add_setting('theme_options[service_icon_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[service_icon_'.$i.']', 
		array(
		'label'       => sprintf( __('Icon #%1$s', 'businesstar'), $i),
		'description' => sprintf( __('Please input icon as eg: fa-archive. Find Font-awesome icons %1$shere%2$s', 'businesstar'), '<a href="' . esc_url( 'https://fontawesome.com/v4.7.0/cheatsheet/' ) . '" target="_blank">', '</a>' ),
		'section'     => 'section_home_service',   
		'settings'    => 'theme_options[service_icon_'.$i.']',
		'active_callback' => 'businesstar_services_active',		
		'type'        => 'text'
		)
	);

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[services_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'businesstar_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[services_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'businesstar'), $i),
		'section'     => 'section_home_service',   
		'settings'    => 'theme_options[services_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'businesstar_services_active',
		)
	);
}
