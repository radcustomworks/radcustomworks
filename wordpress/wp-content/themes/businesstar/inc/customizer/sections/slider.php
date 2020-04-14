<?php
/**
 * Slider options.
 *
 * @package BusinesStar
 */

$businesstar_default = businesstar_get_default_theme_options();

// Featured Slider Section
$wp_customize->add_section( 'section_featured_slider',
	array(
		'title'      => __( 'Featured Slider Section', 'businesstar' ),
		'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_featured-slider_section]',
	array(
		'default'           => $businesstar_default['disable_featured-slider_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'businesstar_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Businesstar_Switch_Control( $wp_customize, 'theme_options[disable_featured-slider_section]',
    array(
		'label' 	=> __('Disable slider Section', 'businesstar'),
		'section'    			=> 'section_featured_slider',
		
		'on_off_label' 		=> businesstar_switch_options(),
    )
) );

//Slider Autoplay enable
$wp_customize->add_setting( 'theme_options[slider_autoplay]',
	array(

		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'businesstar_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Businesstar_Switch_Control( $wp_customize, 'theme_options[slider_autoplay]',
    array(
		'label' 			=> __('Disable Slider Autoplay', 'businesstar'),
		'section'    		=> 'section_featured_slider',
		'on_off_label' 		=> businesstar_switch_options(),
    )
) );

for( $i=1; $i<=3; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[slider_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'businesstar_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[slider_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'businesstar'), $i),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'businesstar_slider_active',
		)
	);

	
	// Slider Button Text
	$wp_customize->add_setting('theme_options[slider_custom_btn_text_' . $i . ']', 
		array(

		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[slider_custom_btn_text_' . $i . ']', 
		array(
		'label'       => sprintf( __('Button Label %d', 'businesstar'),$i ),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_custom_btn_text_' . $i . ']',	
		'active_callback' => 'businesstar_slider_active',	
		'type'        => 'text',
		)
	);
}
