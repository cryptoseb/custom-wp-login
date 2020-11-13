<?php 
//If you're using this in your functions.php file, remove the opening <?php

function my_login_page_remove_back_to_link() { ?>
    <style type="text/css">
        body.login div#login p#backtoblog {
          display: none;
        }
    </style>
<?php }

function my_custom_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style.css' );
}

//This loads the function above on the login page
add_action( 'login_enqueue_scripts', 'my_login_page_remove_back_to_link' );

add_action( 'login_enqueue_scripts', 'my_custom_login_stylesheet' );

function login_error_override()
{
    return 'You have specified incorrect details. Try again.';
}
add_filter('login_errors', 'login_error_override');

function wpb_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'wpb_login_logo_url' );
 
function wpb_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'wpb_login_logo_url_title' );

?>
