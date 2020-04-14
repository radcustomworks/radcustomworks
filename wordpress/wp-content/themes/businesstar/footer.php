<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BusinesStar
 */

/**
 *
 * @hooked businesstar_footer_start
 */
do_action( 'businesstar_action_before_footer' );

/**
 * Hooked - businesstar_footer_top_section -10
 * Hooked - businesstar_footer_section -20
 */
do_action( 'businesstar_action_footer' );

/**
 * Hooked - businesstar_footer_end. 
 */
do_action( 'businesstar_action_after_footer' );

wp_footer(); ?>

</body>  
</html>