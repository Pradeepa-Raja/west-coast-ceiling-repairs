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
define('DB_NAME', 'devpredi_wp674');

/** MySQL database username */
define('DB_USER', 'devpredi_wp674');

/** MySQL database password */
define('DB_PASSWORD', '5Suf-8]4Fp');

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
define('AUTH_KEY',         'w9jsyacxgunwds5zvs1cl1ujety8znhqgwirjuqzp5h82dccnptmu5jl1gx8f8mp');
define('SECURE_AUTH_KEY',  'ulreugeszruwtf69pgwkzfj1t3j8n0i1p2i3mae9pr1wgb0z4qs6iexne1gtks0n');
define('LOGGED_IN_KEY',    'dtlmwkc0fhjsavx2hdxwdryitqjzv57it5oejpps6y51lbp5azbjvqoosgxbimzb');
define('NONCE_KEY',        'qiikxtjn3it7mmaplhbt0ycwuwqttqks2wvnsiefhcmspbfqlngvizjymyb00vbe');
define('AUTH_SALT',        'surogf9yrpyhayqqyaiypvsfx798bmcwgmeeduoglfcvhgj4rng683qrouln6f7j');
define('SECURE_AUTH_SALT', 'laierb7m0oujbaqiroxtlzyzwfumjvytlggtf4x8zwvcpy3mq8h8cywy6lzriixa');
define('LOGGED_IN_SALT',   '9mety5ev6rqz24ufml2cscxvtuuvcl8yjhpkzrj2u0dcktu9jxkhp48f4riyeynk');
define('NONCE_SALT',       'vbn2nj5njiwetgrc9hl44awriht4be2wm16f9tn1nnrqgny0z6ntjyswboyvdh0v');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp90_';

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
