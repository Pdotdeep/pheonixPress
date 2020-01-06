<?php
/**
* The base configuration for WordPress
*
* The wp-config.php creation script uses this file during the
* installation. You don't have to use the web site, you can
* copy this file to "wp-config.php" and fill in the values.
*
* This file contains the following configurations:
*
* * MySQL settings
* * Secret keys
* * Database table prefix
* * ABSPATH
*
* @link https://codex.wordpress.org/Editing_wp-config.php
*
* @package WordPress
*/

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'news');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
* Authentication Unique Keys and Salts.
*
* Change these to different unique phrases!
* You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
* You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
*
* @since 2.6.0
*/
define('AUTH_KEY', 'Gzh2yGr6Y5OaKXT6cvEphCrLE9WrSpfV8DYmrtGagbLmZFiOk1Av17NQchtRPkUE');
define('SECURE_AUTH_KEY', 'S/TV1vNhxlo7psn+/mrBL4QMop2K+ofY3RFqdpxVndP5okAz/zTnYgFNYo/tuTL6');
define('LOGGED_IN_KEY', 'na597l3ZMvsiVXX7nEc23xGbeGw6Jch5J2i2fmbQ2gXmWaGTOC0J+pXF76lC/kGZ');
define('NONCE_KEY', 'q0Lhc9Rerbu1yqpJ0XWBE4IDaVCd2WCWvHV+hlJNSbjDw8xBLhJ+mbx5r4zQHRSR');
define('AUTH_SALT', 'hTr8YmNH+xtZvEM2QCCOM0nV/Cb5JRUKKTGrD9FpHDC1rSNS0HJtiy5wD+SJvOf7');
define('SECURE_AUTH_SALT', 'l6FIUlOg2CFN1x2C/nQPfUwQsTvTa6jhZ3nw0/4D07xf+9WDr8+pY9C06MVPbWoA');
define('LOGGED_IN_SALT', 'jG9WPFlYXNYwwuPL0bNwfRfO1wn4HfRZ5tmkjaaz/ri9ouBPWybouZUFJZVZXovJ');
define('NONCE_SALT', 'acjHouaqBjRAiFX/FChuVEKvxNMdHYJ0Rzi0fnk2GRTDo3pZ/gsRaISCr7QQMdxh');

/**#@-*/

/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each
* a unique prefix. Only numbers, letters, and underscores please!
*/
$table_prefix = 'wpbu_';

/**
* For developers: WordPress debugging mode.
*
* Change this to true to enable the display of notices during development.
* It is strongly recommended that plugin and theme developers use WP_DEBUG
* in their development environments.
*
* For information on other constants that can be used for debugging,
* visit the Codex.
*
* @link https://codex.wordpress.org/Debugging_in_WordPress
*/
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
