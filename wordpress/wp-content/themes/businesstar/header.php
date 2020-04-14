<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BusinesStar
 */
/**
* Hook - businesstar_action_doctype.
*
* @hooked businesstar_doctype -  10
*/
do_action( 'businesstar_action_doctype' );
?>
<head>
<?php
/**
* Hook - businesstar_action_head.
*
* @hooked businesstar_head -  10
*/
do_action( 'businesstar_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<?php

/**
* Hook - businesstar_action_before.
*
* @hooked businesstar_page_start - 10
*/
do_action( 'businesstar_action_before' );

/**
*
* @hooked businesstar_header_start - 10
*/
do_action( 'businesstar_action_before_header' );

/**
*
*@hooked businesstar_site_branding - 10
*@hooked businesstar_header_end - 15 
*/
do_action('businesstar_action_header');

/**
*
* @hooked businesstar_content_start - 10
*/
do_action( 'businesstar_action_before_content' );

/**
 * Banner start
 * 
 * @hooked businesstar_banner_header - 10
*/
do_action( 'businesstar_banner_header' );  
