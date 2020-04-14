<?php
/**
 * Home Page Options.
 *
 * @package BusinesStar
 */

$businesstar_default = businesstar_get_default_theme_options();

// Latest Blog Section
$wp_customize->add_section( 'section_home_blog',
	array(
		'title'      => __( 'Blog Section', 'businesstar' ),
		'priority'   => 110,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);


$wp_customize->add_setting( 'theme_options[disable_blog_section]',
	array(
		'default'           => $businesstar_default['disable_blog_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'businesstar_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Businesstar_Switch_Control( $wp_customize, 'theme_options[disable_blog_section]',
    array(
		'label' 	=> __('Disable Blog Section', 'businesstar'),
		'section'    			=> 'section_home_blog',
		'on_off_label' 		=> businesstar_switch_options(),
    )
) );


// Blog title
$wp_customize->add_setting('theme_options[blog_title]', 
	array(
	'default'           => $businesstar_default['blog_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[blog_title]', 
	array(
	'label'       => __('Section Title', 'businesstar'),
	'section'     => 'section_home_blog',   
	'settings'    => 'theme_options[blog_title]',	
	'active_callback' => 'businesstar_blog_active',		
	'type'        => 'text'
	)
);

// Blog Button Text
$wp_customize->add_setting('theme_options[readmore_text]', 
	array(

	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[readmore_text]', 
	array(
	'label'       => __('Button Label', 'businesstar'),
	'section'     => 'section_home_blog',   
	'settings'    => 'theme_options[readmore_text]',	
	'active_callback' => 'businesstar_blog_active',	
	'type'        => 'text'
	)
);

$wp_customize->add_setting( 'theme_options[image_buttom]',
	array(
		'default'           => $businesstar_default['image_buttom'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'businesstar_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Businesstar_Switch_Control( $wp_customize, 'theme_options[image_buttom]',
    array(
		'label' 	=> __('Enable for Image After Content', 'businesstar'),
		'section'    			=> 'section_home_blog',
		'on_off_label' 		=> businesstar_switch_options(),
    )
) );

// Setting  Blog Category.
$wp_customize->add_setting( 'theme_options[blog_category]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new businesstar_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[blog_category]',
		array(
		'label'    => __( 'Select Category', 'businesstar' ),
		'section'  => 'section_home_blog',
		'settings' => 'theme_options[blog_category]',	
		'active_callback' => 'businesstar_blog_active',		
		'priority' => 100,
		)
	)
);

