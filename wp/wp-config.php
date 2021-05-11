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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp');

/** MySQL database username */
define('DB_USER', 'tamirya');

/** MySQL database password */
define('DB_PASSWORD', 'tamir2206');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

define('FS_METHOD','direct');

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
define('AUTH_KEY',         '0fu!RJ+d*sN?gA=}`R4UUjD+S0oS&BVpZ:%cpR|x(^)Z3t[L&6hoMsY@nX#&73o_');
define('SECURE_AUTH_KEY',  'bVtN)|Y[skUV>eR&{xv9#<?7|7]qVMN}ot>Yvd!&{Y_32C_mM-{a@J|XbIv]<jQk');
define('LOGGED_IN_KEY',    'NuzZE&(lZ4W9i qP`v^^sg(En;%Gh(S~V3U5]d)D5dF=x&W>oyPp*ulzVH-f,4jn');
define('NONCE_KEY',        'u1;lS-k|[SOq`)yxBm$Z;u:T*/1_:[p8%$&FRxM!Q7x*%2EB?1.yVE ^a&Y~#uoe');
define('AUTH_SALT',        'U7t04MkQ}o4q}<B:f8yuC2#PyB9j?ct@=~/c O06M54;=-h >jDr;r~EEF1$*RM!');
define('SECURE_AUTH_SALT', 'OXWg*M+Rr@&*F:G8v=1XlN]kdNG%z8{R?ADCZIwCe{hY+<7aV2Y5HRMZi+dYfvGZ');
define('LOGGED_IN_SALT',   ',Z|UC-#4j=h2fcVee$f^ezYSR1?9[!6[@hf=ZQvbY*GiTA#LxV>fVg^a YEtOF8y');
define('NONCE_SALT',       'R*?sifL1]9&U!#+P3KmA?)WjDJZMUy_Du})WjWx;()4h|V@k7x3n}c+)Ud/=qU3S');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
