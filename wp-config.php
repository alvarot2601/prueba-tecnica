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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'prueba' );

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
define( 'AUTH_KEY',         '+)3eY5rk%{iXte=8zv{u]k[$,kF;3%|S^3~&%;a8`)(d]HxE|rhKnDN$de8r)eMj' );
define( 'SECURE_AUTH_KEY',  'j}(|[$?nju3h,07C2;-2vq;YSVI9]-$owu)`@u{=ClQg{x$,f&*%3(x59qY,&9@h' );
define( 'LOGGED_IN_KEY',    'E*1]Fmm!c^j:+.?sM2vvYTOpVUWX*/ Q#IrB)@]%HA|2/CV>H^;C{YT|=.ug)+vg' );
define( 'NONCE_KEY',        'Ve180j7[*LSI)1;~+cj>_g S7tY7&ntJZXuc-TNC}i$;THj:j>sTO4pZ!;]poE#9' );
define( 'AUTH_SALT',        'O&1v*#1[pX]!=u28}58jV=`irux Y[w)0XDZ$QX )T8yP~NPi)e(/TL0L5~$mc_^' );
define( 'SECURE_AUTH_SALT', 'W#g%M0e{L(gB(m|^TEokN:z$5k~X:CkHQk)TBxv[<+jJsb1}4_Bd95c+hR<LJtZ[' );
define( 'LOGGED_IN_SALT',   ')_14Pw4vSwkd]|G(%j]{c2WEE]&4-A;l*Y>V%de~GOml FZGG6,SNiRxHj0&ya~%' );
define( 'NONCE_SALT',       'bf1$OHnzMn3^BU3$Nl[_Y-~`yt:6J|wOYW-{G09:q{}GBh!RB,AES)^G]V|(AjL*' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
