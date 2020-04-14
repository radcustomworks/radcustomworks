<?php
/**
 * Home Page Options.
 *
 * @package BusinesStar
 */

$businesstar_default = businesstar_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => __( 'Front Page Sections', 'businesstar' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

/**
* Section Customizer Options.
*/
require get_template_directory() . '/inc/customizer/sections/home.php';
require get_template_directory() . '/inc/customizer/sections/slider.php';
require get_template_directory() . '/inc/customizer/sections/about.php';
require get_template_directory() . '/inc/customizer/sections/services.php';
require get_template_directory() . '/inc/customizer/sections/features.php';
require get_template_directory() . '/inc/customizer/sections/testimonial.php';
require get_template_directory() . '/inc/customizer/sections/blog.php';