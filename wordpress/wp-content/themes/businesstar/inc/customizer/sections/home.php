<?php
/**
 * About options.
 *
 * @package BusinesStar
 */

$businesstar_default = businesstar_get_default_theme_options();

// About Section
$wp_customize->add_section( 'section_home_page_layout',
	array(
		'title'      => __( 'Home Page Layout', 'businesstar' ),
		'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);


$wp_customize->add_setting('theme_options[home_page_layout_content_type]', 
	array(
	'default' 			=> $businesstar_default['home_page_layout_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'businesstar_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[home_page_layout_content_type]', 
	array(
	'label'       => __('Home page layout Content Type', 'businesstar'),
	'section'     => 'section_home_page_layout',   
	'settings'    => 'theme_options[home_page_layout_content_type]',		
	'type'        => 'select',
	'choices'	  => array(
			'home-one'	  => __('Home One','businesstar'),
			'home-two'	  => __('Home Two','businesstar'),
		),
	)
);