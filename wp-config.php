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
define( 'DB_NAME', 'e-commerce' );

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
define( 'AUTH_KEY',         'Q:x5l5efnxv;2W,Y*:~2+eO%FO#P;{mEPCzE)vq%Z_x^[kq.LnM=LHNGxZWrCBB/' );
define( 'SECURE_AUTH_KEY',  'ikU4K-ek/EkulD.QZnvOjz~Tf*ka*xE/ZX;nf&vHU&aUMpGSca9EWmq~V{N3}bTn' );
define( 'LOGGED_IN_KEY',    '#AjdFNBK!$R,1bNST&Yq.R1!AU3{Qcy$NZFvWF=RdBEaMjy[nZDM]h((YrsEV*Nh' );
define( 'NONCE_KEY',        '{-Iyi`?l7c9wqQQI^jOdJUgR{c@{g ?);$o/Ey}O9%0^Xwh4?Y{U2E1H=8hu)aj!' );
define( 'AUTH_SALT',        ')w-&l]$w~s;;^JtgJ@H9/ XDmonhw6|J1]}W)S()6_w)wOK!nB2FTaH{LdY7QN]j' );
define( 'SECURE_AUTH_SALT', 'jq9^t?$&@dMETX-|jEqOF68`Ha@q9^<z8P={NU)BV@6^v9Ij&~?=WOWs%I.)$$w,' );
define( 'LOGGED_IN_SALT',   'i6v0+th:dlqwSNAJ<_V /1MQ VhXY+GPT*_TpPa/+lo.BDgl2PFuni3?aa}&-eAO' );
define( 'NONCE_SALT',       'SI?;;}2_SK>NLfkfi,[7sul}S3q]&FSHuEfcr(DoxtE8o|+co5PoH%oyU`w|p;lN' );

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
