<?php
/**
 * Active callback functions.
 *
 * @package BusinesStar
 */

function businesstar_testimonial_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_testimonial_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}


function businesstar_services_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_services_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function businesstar_services_seperator( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[service_content_type]' )->value();
    return  businesstar_services_seperator( $control ) && ( in_array( $content_type, array( 'service_page', 'service_post', 'service_custom' ) ) ) ;
}

function businesstar_services_seperator_image( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[home_page_layout_content_type]' )->value();
    return ( businesstar_services_active( $control ) && ( 'home-two' == $content_type ) );
}

function businesstar_services_icon_active( $control ) {
    if(($control->manager->get_setting( 'theme_options[disable_services_icon]' )->value() == true ) ) {
        return true;
    }else{
        return false;
    }
}


function businesstar_features_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_features_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function businesstar_features_seperator( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[features_content_type]' )->value();
    return  businesstar_features_seperator( $control ) && ( in_array( $content_type, array( 'features_page', 'features_post', 'features_custom' ) ) ) ;
}

function businesstar_features_icon( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[home_page_layout_content_type]' )->value();
    return ( businesstar_features_active( $control ) && ( 'home-two' == $content_type ) );
}


function businesstar_about_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_about_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}


function businesstar_slider_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_featured-slider_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}


function businesstar_blog_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_blog_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}


/**
 * Active Callback for top bar section
 */
function businesstar_contact_info_ac( $control ) {

    $show_contact_info = $control->manager->get_setting( 'theme_options[show_header_contact_info]')->value();
    $control_id        = $control->id;
         
    if ( $control_id == 'theme_options[header_location]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_email]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_phone]' && $show_contact_info ) return true;

    return false;
}

function businesstar_social_links_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[show_header_social_links]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}