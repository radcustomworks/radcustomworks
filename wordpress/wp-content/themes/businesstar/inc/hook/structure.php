<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package BusinesStar
 */

if ( ! function_exists( 'businesstar_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
function businesstar_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
}
endif;

add_action( 'businesstar_action_doctype', 'businesstar_doctype', 10 );


if ( ! function_exists( 'businesstar_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
function businesstar_head() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php
}
endif;
add_action( 'businesstar_action_head', 'businesstar_head', 10 );

if ( ! function_exists( 'businesstar_page_start' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function businesstar_page_start() {
	?><div id="page" class="site"><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'businesstar' ); ?></a><?php
	}
endif;

add_action( 'businesstar_action_before', 'businesstar_page_start', 10 );

if ( ! function_exists( 'businesstar_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function businesstar_header_start() {

         ?><header id="masthead" class="site-header nav-shrink" role="banner"><?php
	}
endif;
add_action( 'businesstar_action_before_header', 'businesstar_header_start' );

if ( ! function_exists( 'businesstar_header_end' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function businesstar_header_end() {

		?></header> <!-- header ends here --><?php
	}
endif;
add_action( 'businesstar_action_header', 'businesstar_header_end', 15 );

if ( ! function_exists( 'businesstar_content_start' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function businesstar_content_start() { 
	?>
	<div id="content" class="site-content">
	<?php 

	}
endif;

add_action( 'businesstar_action_before_content', 'businesstar_content_start', 10 );

if ( ! function_exists( 'businesstar_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function businesstar_footer_start() {
		if( !(is_home() || is_front_page()) ){
			echo '</div>';
		} ?>
		</div>
		<footer id="colophon" class="site-footer" role="contentinfo"><?php
		if ( true === businesstar_get_option('scroll_top_visible') ) : ?>
			<div class="backtotop"><i class="fa fa-chevron-up"></i></div>
		<?php endif;
	} 
endif;
add_action( 'businesstar_action_before_footer', 'businesstar_footer_start' );


if ( ! function_exists( 'businesstar_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function businesstar_footer_end() {?>
		</footer><?php
	}
endif;
add_action( 'businesstar_action_after_footer', 'businesstar_footer_end', 100 );

