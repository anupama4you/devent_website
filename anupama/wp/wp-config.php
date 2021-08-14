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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'deventlk_wp703' );

/** MySQL database username */
define( 'DB_USER', 'deventlk_wp703' );

/** MySQL database password */
define( 'DB_PASSWORD', '3Sg9[(21pS' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'flegsg6nhckxvmkh9dmomeflkvt79zsvl4h3clamjytn4kxxshx0rdayf75qclk6' );
define( 'SECURE_AUTH_KEY',  'g0xkirkaq90k38jgmdpjrl4uwgqfnsouivp8ujm9vo9g9vkmaegcu5gjijvk8blc' );
define( 'LOGGED_IN_KEY',    '0uxbfyp0qatcoupfhcq6dblleh1oigxvkwuajg39cjfiy4ud8sztaaq7j3nh7uxd' );
define( 'NONCE_KEY',        'ionnkfzkgnmn1vb5hhfevorvwjumtkp95vjwbhqjglwyiyft7d1ow2ybjiumv2lu' );
define( 'AUTH_SALT',        'osvvotozbk00gt55fzb56gh2dmm4sjxc0gj9mf4qfolgvqquwpytbhttlagx0ckw' );
define( 'SECURE_AUTH_SALT', 'ljcnrpciqslierxagy2h6fu3kg17lie2ibkjin4fw9ytoj7lavnvrezvyka5198d' );
define( 'LOGGED_IN_SALT',   'mf4lwcvi4fzb3bxppemgtrdyrsfr5gpwvaofkpkkwha3xwdkhmbzev4m3wnjtfqx' );
define( 'NONCE_SALT',       'wonc7easkpeaued97ovkzqncridrbycubzqzervaraathxaxpp1ieh56l5pygtrf' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpiw_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
