<?php

/**
 * wpform_set_submitted_cookie function.
 * 
 * @access public
 * @param mixed $fields

 * @param mixed $entry

 * @param mixed $form_data

 * @param mixed $entry_id
 * @return void
 */
function wpform_set_submitted_cookie( $fields, $entry, $form_data, $entry_id ) {

    // Set a third parameter to specify a cookie expiration time,
    // otherwise it will last until the end of the current session.

    setcookie( 'wpform_form_submitted', 'true' );
}
add_action( 'wpforms_process_complete_{Wp-forms-form-ID}', 'wpform_set_submitted_cookie', 10, 4 );


/**
 * wpform_protect_confirmation_page function.
 * 
 * @access public
 * @return void
 */
function wpform_protect_confirmation_page() {
    if( is_page( '{your-page-slug}' ) && isset( $_COOKIE['wpform_form_submitted'] ) ) {
        wp_redirect( home_url( '/' ) );
        exit();
    }
}
add_action( 'template_redirect', 'wpform_protect_confirmation_page' );


?>
