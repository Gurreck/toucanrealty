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
define( 'DB_NAME', 'bd_toucanrealty' );

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
define( 'AUTH_KEY',         '{[.HWiB&s`t%BYGb1#(O}{)lj8SEJ?OG-=_K. Vp(&Ei[i|7~u+oCL&1Q7%5ec`~' );
define( 'SECURE_AUTH_KEY',  'y17)Xaz&,?*+`%JqEf=*PB&pA3~97;=k(,hQ%$(C{.M6WRP3J5z D?#]Ufw>W{8R' );
define( 'LOGGED_IN_KEY',    'byuhNK:/*cb4~cL9<v^BDsO=Is}rAIz z&vH+i$K5V*z!aGQ n0} g-5o}IG]HG]' );
define( 'NONCE_KEY',        'b;0JrJ5/x[1gRv@bE9Vx*5J[hVkkOO?L|<X7~!beo]b FhRT|8x=XK!Ni/!)90mC' );
define( 'AUTH_SALT',        '<)3dxOe$Yb]7FsM{rZ4#!gVT$H/hq%q<~M5VN,W:lHHZq;Z!-W*`tVf^j^6Y3VVa' );
define( 'SECURE_AUTH_SALT', 'Q&f46g1hNL[UC^<G;Y-]kvZbF#K7#d`>KKAmK+{eRyR!nZFxdU}7E=udVbD;)XYx' );
define( 'LOGGED_IN_SALT',   'ss9>6oD}03wOusdFv:5.xk/:<4;;5%R@lZ@Z^_ky>fYJ.ilzT^]I+-W2s#)yhG^1' );
define( 'NONCE_SALT',       't#.9gQKL@XrJ VtE{J9S^F^1,}{pN+s`%9bfuR6 ;P_Pi_LCOgASguo2{boR.Y8}' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'tr_';

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
