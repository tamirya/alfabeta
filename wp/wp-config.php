<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'alfabetabkp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'C4s/}Veb(1zgA,P`KncE^P8QLNE[o=>sc4m%)f;}WMc3:Hi$ HT{.RLxR2PK}*;B' );
define( 'SECURE_AUTH_KEY',  '[tYs4M)IzYyI{hC*XvF9XT)I_,*ck#x}0J~#)= h_sbj)?2 kfEcv$mGHDeh()zN' );
define( 'LOGGED_IN_KEY',    'gdH0S-Z28js],^yZ)}2^v}xvL%T3<C^y,)?(_7.gRqIxbdVmEG%3YnhYB]aDly|b' );
define( 'NONCE_KEY',        'p=k79xvmphdIr.bI2iWj[y(>?6MvRPIf?Wb(c&VxmuRurF=r zDA[[n %Epd.mT@' );
define( 'AUTH_SALT',        'd*%t$1?kqw}DzG1]k@+m1E7;WLHN ?M0|`#-{hn{/4zm$Hxu)(kLRA,OaIt/~QQ|' );
define( 'SECURE_AUTH_SALT', 'qWu*/?>TB[H6)bQ &agb7; bfC~(p2IWbKd|y49UFR--6yVk/6x_{c*Fh/0!Palh' );
define( 'LOGGED_IN_SALT',   'b_l!/b^$<Fd?hm>f}P``97NSm=ke*bG.5CgKcisctpjj>?euiHn)q=[H${LGB4$L' );
define( 'NONCE_SALT',       '+Q(@AFDh1u5NMN?Q(FdptIAt+yW71Dh {eA4mM/r3suNWUg~5d-UM+x3#td@ok<#' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
//define( 'WP_DEBUG', false );
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
