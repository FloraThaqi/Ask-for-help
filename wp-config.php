<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'starlabs_internship' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '|y*vk4yOvI5_--Tp~{h0?YLY*9f?1|v{*?OAxv{j1rH^]yPV|/D)W]u~2tPQxZ.G' );
define( 'SECURE_AUTH_KEY',  'A`w}a**j5m.`:cQ~0K6L6DrYH>18pL8?[UGr1s;Al&di=o`Tk1}bl yAtP[#*>s:' );
define( 'LOGGED_IN_KEY',    'k_/!,+WTB?a.qPi h#`&7rP66xd9j 22QyOnc:k_?i&xT#l+>i^p/jq9kjiKPO[E' );
define( 'NONCE_KEY',        'Go4*+xUCPR46(v&5W}DB5c/-50},SF{4%Hn#~FF[p1l$dZM~drQ]90<Acf`XUyr]' );
define( 'AUTH_SALT',        'wxi;ap%[pSK-%`Qn`CIh^kRJGpw~g+cmZC<H=EnG;,0oMwQ-fJA1rS4NF&f^U!kk' );
define( 'SECURE_AUTH_SALT', 'f!&Ykok;%4B]VsN=CnyT.{@f]=Tqu%=PIiMV !c{&A-.44v4BG~opbo~$)81H/Wo' );
define( 'LOGGED_IN_SALT',   'rul#A`#BeU,U6SVDp(&ls_wQA}lHNiSJ/gR~Y#Yo0%28lt^10AV&+Z7q=m4?yx}f' );
define( 'NONCE_SALT',       '.{~pCb=S4A!ifX]]09=KzNW?nk({W6<#MqFT}:]1?jH?=00Y-`zvINm43@MOar~<' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
