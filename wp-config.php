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
define( 'DB_NAME', 'sports-website' );

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
define( 'AUTH_KEY',         'R=DwRd-_V?:KVw<so01ejiqP8pq<M@Sd9<2J.`juLfPEZTGq&_:fb$7Vo2AN45.;' );
define( 'SECURE_AUTH_KEY',  'ws5>}6F=;]]8q.6ab|^Tx7Hk5*XDeqm.h^ uJ5yArq;FC|p}sLiR%[_ex)jwz@-V' );
define( 'LOGGED_IN_KEY',    'S#RAQ0* x{[nD5UVs0vr?Me~4-5@i?fkR-_ }XpeX>,*7TnjfR< @[jei},|2_Lv' );
define( 'NONCE_KEY',        '[eE${g`6%8-mulB,W3Yi<TY0qf.:lVe_2wwn*|d%SmJ215,|lcHY5mceNO40gH0(' );
define( 'AUTH_SALT',        'Shdn|VFmNkvX+tBw>VF3A%aj^yCy26iAR~<Rq--VGwFjD0n`8g)e^(o2`_S`}RX0' );
define( 'SECURE_AUTH_SALT', 'Q1e}{qV }JysB5)CSG8I[%fR]2ZA2xu4Ww(#t_W|<^Nquhr5nJ53~q^8xi10|fJS' );
define( 'LOGGED_IN_SALT',   'J^4Oqbkm9YR`Bzey$xF}f~iub<O@K`Xa)cFwbAF(N#n}@W?b8|x5XE;kiUAv<3m#' );
define( 'NONCE_SALT',       '%`CBVCM46SHRY~:P5QS|(jxrj#3O5^9PkFPc{jT?uzqOTSe+?*IXfm(Y*(A67N0Y' );

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
