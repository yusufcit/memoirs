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
/** The name of the database for WordPress */
define('DB_NAME', 'memoirs');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'flufyckng290eqat8iw8vdirk4wt6gkik8quprtx5oheadvdbwq7xzrmjnpqzcel');
define('SECURE_AUTH_KEY',  'mm4prsw5taw4rb4ui5q9qqjk3dsuurlpfh96vkzd0j9oe2xtc27wkx85oj6wab7t');
define('LOGGED_IN_KEY',    'c0s4zwnlgg3fkxfcznbmuvhrtmedqzwpizbtt3gwuo22je25zhjjq331t4dh2cvp');
define('NONCE_KEY',        'i57249ouhmu1guarmbkp2rwmywxbwknf5kst3hbcrm0bhaly6eg7pqz61idmfjjk');
define('AUTH_SALT',        'osebdodmrzuf84dw4esefc3xsgqjcyqfqm3acmdk1jslumqckqcqxryl3kyazd3v');
define('SECURE_AUTH_SALT', 'poatdhabajgecfwwgj2ylxsu7vbhlgnremsioclivlzjqbjb1jq6gtx0wqg7jtmb');
define('LOGGED_IN_SALT',   'zgzah4j65jd5g39lhygn02yxsqw5qpntesaqpdzaqvvr2vkytcu4xt7efqhat9nt');
define('NONCE_SALT',       'twqpiqjwhhfcexjeeadg01mi1tpoumimmkolzdu7icdjdhfkfzbbbnjb2cth8k4l');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define ('WPLANG', '');

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
