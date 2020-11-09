<?php
/**
 * @package Make Child
 */

/**
 * The child theme version.
 *
 * This version number is used by the parent theme to determine how to handle
 * parent and child stylesheets. It is not used as a version parameter on the
 * child theme's stylesheet URL.
 *
 * @see MAKE_Setup_Scripts::enqueue_frontend_styles()
 */
define( 'TTFMAKE_CHILD_VERSION', '1.1.0' );

/**
 * Turn off the parent theme styles.
 *
 * If you would like to use this child theme to style Make from scratch, rather
 * than simply overriding specific style rules, remove the '//' from the
 * 'add_filter' line below. This will tell the theme not to enqueue the parent
 * stylesheet along with the child one.
 */
//add_filter( 'make_enqueue_parent_stylesheet', '__return_false' );

/**
 * Define a version number for the child theme's stylesheet.
 *
 * In order to prevent old versions of the child theme's stylesheet from loading
 * from a browser's cache, update the version number below each time changes are
 * made to the stylesheet.
 *
 * @uses MAKE_Setup_Scripts::update_version()
 */
function childtheme_style_version() {
	// Ensure the Make API is available.
	if ( ! function_exists( 'Make' ) ) {
		return;
	}

	// Version string to append to the child theme's style.css URL.
	$version = '1.0.0'; // <- Update this!

	Make()->scripts()->update_version( 'make-main', $version, 'style' );
}

add_action( 'wp_enqueue_scripts', 'childtheme_style_version', 20 );

/**
 * Add your custom theme functions here.
 */

function my_login_page_remove_back_to_link() { ?>
    <style type="text/css">
		
		/* Hide the back to website text/link */
        body.login div#login p#backtoblog {
          display: none;
		}
		
		/* Hide the remember me check box*/
		body.login div#login form#loginform p.forgetmenot {
			display: none;
		}

		/* This is the general login form box */
		body.login div#login form#loginform {
			background-color:#ffffff;
			opacity: 0.8;
			height: 270px;
			margin-bottom: -10px;
			margin-top: -30px;
		}
		
		/* This is the input field for the login form */
		body.login div#login form#loginform input{
			background-color: #F5F5F5;
			color: #a3597f;
		}
				
		/* This adds the focus border and glow */
		#login #loginform input[type=text]:focus,
		#login #loginform input[type=password]:focus,
		#login #loginform input[type=checkbox]:focus {
  		  border-color:#a3597f;
  		  -webkit-box-shadow:0 0 2px rgba(163,89,127,.8);
   		 box-shadow:0 0 2px rgba(163,89,127,.8);
		}
		
		/* This is the login button */
		body.login div#login form#loginform p.submit input#wp-submit {
  			background-color: #a3597f;
  			color: #cdc1b3;
			border-color: #a3597f;
		}
		
		/* Edits the background colour for the entire page */
		body.login {
  			background-image: url('https://saskseats.ca/wp-content/uploads/2020/11/login-background.jpg');
  			background-repeat: no-repeat;
  			background-attachment: fixed;
  			background-position: center;
		}
		
		/* Edits the logo that displays above the input fields */
		body.login div#login h1 a {
  			background-image: url('https://saskseats.ca/wp-content/uploads/2020/11/LogoTransparent-White.png');
		    background-size: 280px;
			width: 280px;
			height: 205px;
			background-position: center;
  			margin-top: -80px;
			margin-bottom; -20px;
			}
		
		/* Edits the Lost Your Password? button at the bottom */
		body.login div#login p#nav a:link {
			font-size: 18px;
			color: #707070;
			background-color: #ffffff;
			opacity: 0.8;
			padding: 14px 25px;
			text-align: center;
			display: inline-block;
			width: 268px;
			margin-left: -22px;
			border: none;
			margin-bottom: -80px;
		}
		
		/* Edits the Lost Your Password? button at the bottom on hover */
		body.login div#login p#nav a:hover {
			font-size: 18px;
			color: #a3597f;
			background-color: #ffffff;
			opacity: 0.8;
			padding: 14px 25px;
			text-align: center;
			display: inline-block;
			width: 268px;
			margin-left: -22px;
			margin-bottom: -80px;
		}
    </style>
<?php }
//This loads the function above on the login page
add_action( 'login_enqueue_scripts', 'my_login_page_remove_back_to_link' );

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
