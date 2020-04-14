<?php 

/**
 * Theme Options.
 *
 * @package BusinesStar
 */

$businesstar_default = businesstar_get_default_theme_options();
//For General Option
$wp_customize->add_section('section_general', array(    
'title'       => __('General Setting', 'businesstar'),
'panel'       => 'theme_option_panel'    
));



// Setting Read More Text.
$wp_customize->add_setting( 'theme_options[blog_readmore_text]',
	array(
	'default'           => $businesstar_default['blog_readmore_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'businesstar_sanitize_textarea_content',
	'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'theme_options[blog_readmore_text]',
	array(
	'label'    => __( 'Read More Text', 'businesstar' ),
	'section'  => 'section_general',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]', array(
	'default'           => $businesstar_default['excerpt_length'],
	'sanitize_callback' => 'businesstar_sanitize_positive_integer',
) );
$wp_customize->add_control( 'theme_options[excerpt_length]', array(
	'label'       => esc_html__( 'Excerpt Length', 'businesstar' ),
	'description' => esc_html__( 'in words', 'businesstar' ),
	'section'     => 'section_general',
	'type'        => 'number',
	'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
) );

 ?>