<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
// include("../scripts/conectDB.php");
	define('DB_NAME', 'carsale');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_HOST', 'localhost');

// /** The name of the database for WordPress */
// define('DB_NAME', 'db499362938');

// /** MySQL database username */
// define('DB_USER', 'dbo499362938');

// * MySQL database password 
// define('DB_PASSWORD', 'carsale');

// /** MySQL hostname */
// define('DB_HOST', 'db499362938.db.1and1.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '8]iD1-Pj*]+7lj/Hg9pye[CBIMT6y4d!Uy5. -@mDL!iCu/|@AUG8t0FLVYoLUOn');
define('SECURE_AUTH_KEY',  'dj-8OSm?L9O+y!#K14*pMaQ#6% +u-@6Q7DtG-|g6&%r.NK^Msgm&yci$ZrL+Os]');
define('LOGGED_IN_KEY',    '3*!k2}KMa<-l5ar0{A>:)a3._9v;YK-AiV2+su_~DJv5RKmL`A`D]u#tfu0Ej1v[');
define('NONCE_KEY',        'WmkIRiug^PA%d|P~ma=<=taSqE|ik0{-q/wO_QotEV1c[)HEUxc:]LCa1WqG$k|C');
define('AUTH_SALT',        '&Zf-/U(?76NF[WQ528;~yd/B2)x@^Va:M2my!%i7olO_^,Q#.9Q!)f*:F9IrkRS+');
define('SECURE_AUTH_SALT', 'c*!Kw[{gcLCAEy]x>DLJD*~{>S} 8A/!*mYumGz}878K`!jlU+SK+3Yi}!=|W!gJ');
define('LOGGED_IN_SALT',   'ix;^Z6#o*R|(Ku{]OPG%tR Yz!}j23Y0Xmxw.eR3N?AA}Rj~K@?/|I3)1$-=|&|y');
define('NONCE_SALT',       '23-lk|-8oQyxYNkIx|}41?520IhXdC@,cs={|.|-m:Z3mhkS``[6jZptbU1[P@>|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_news';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
