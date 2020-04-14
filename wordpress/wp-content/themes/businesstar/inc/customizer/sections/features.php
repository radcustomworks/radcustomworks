<?php
/**
 * Features options.
 *
 * @package BusinesStar
 */

$businesstar_default = businesstar_get_default_theme_options();

// Features Section
$wp_customize->add_section( 'section_home_features',
	array(
		'title'      => __( ' Features Section', 'businesstar' ),
		'priority'   => 25,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_features_section]',
	array(
		'default'           => $businesstar_default['disable_features_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'businesstar_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Businesstar_Switch_Control( $wp_customize, 'theme_options[disable_features_section]',
    array(
		'label' 			=> __('Enable/Disable Features Section', 'businesstar'),
		'section'    		=> 'section_home_features',
		'settings'  		=> 'theme_options[disable_features_section]',
		'on_off_label' 		=> businesstar_switch_options(),
    )
) );

//Features Section title
$wp_customize->add_setting('theme_options[features_title]', 
	array(
	'default'           => $businesstar_default['features_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[features_title]', 
	array(
	'label'       => __('Section Title', 'businesstar'),
	'section'     => 'section_home_features',   
	'settings'    => 'theme_options[features_title]',
	'active_callback' => 'businesstar_features_active',		
	'type'        => 'text'
	)
);

for( $i=1; $i<=4; $i++ ){

	//Features Section icon
	$wp_customize->add_setting('theme_options[features_icon_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[features_icon_'.$i.']', 
		array(
		'label'       => sprintf( __('Icon #%1$s', 'businesstar'), $i),
		'description' => sprintf( __('Please input icon as eg: fa-archive. Find Font-awesome icons %1$shere%2$s', 'businesstar'), '<a href="' . esc_url( 'https://fontawesome.com/v4.7.0/cheatsheet/' ) . '" target="_blank">', '</a>' ),
		'section'     => 'section_home_features',   
		'settings'    => 'theme_options[features_icon_'.$i.']',
		'active_callback' => 'businesstar_features_icon',		
		'type'        => 'text'
		)
	);

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[features_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'businesstar_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[features_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'businesstar'), $i),
		'section'     => 'section_home_features',   
		'settings'    => 'theme_options[features_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'businesstar_features_active',
		)
	);
}