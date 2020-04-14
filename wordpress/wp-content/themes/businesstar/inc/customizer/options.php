<?php 
/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function businesstar_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'businesstar' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'businesstar_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function businesstar_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'On', 'businesstar' ),
            'off'       => esc_html__( 'Off', 'businesstar' )
        );
        return apply_filters( 'businesstar_switch_options', $arr );
    }
endif;


 /**
 * Get an array of google fonts.
 * 
 */
function businesstar_font_choices() {
    $font_family_arr = array();
    $font_family_arr[''] = esc_html__( '--Default--', 'businesstar' );

    // Make the request
    $request = wp_remote_get( get_theme_file_uri( 'assets/fonts/webfonts.json' ) );

    if( is_wp_error( $request ) ) {
        return false; // Bail early
    }
    // Retrieve the data
    $body = wp_remote_retrieve_body( $request );
    $data = json_decode( $body );
    if ( ! empty( $data ) ) {
        foreach ( $data->items as $items => $fonts ) {
            $family_str_arr = explode( ' ', $fonts->family );
            $family_value = implode( '-', array_map( 'strtolower', $family_str_arr ) );
            $font_family_arr[ $family_value ] = $fonts->family;
        }
    }

    return apply_filters( 'businesstar_font_choices', $font_family_arr );
}

 ?>