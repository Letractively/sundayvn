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
define('DB_NAME', 'sunday_travel');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'R$RCy2;}TR|Ns<((|X_7n`2zw=y8X/;)(BMmTmFiZ93#n*w?*dK16Hzq3b%rFKS&');
define('SECURE_AUTH_KEY',  'YeyG-;f}p6u?QRgUjB166Ced@+6RT)HJ5qJ:k:.a35 o{KGVp0AdJEXsH8R+UkHb');
define('LOGGED_IN_KEY',    ' YL+_wsN BcR8+D_NdiWxe.B#mWKl}Gy!h/9Zv$15gH01k$=(I{3u{60n*}uM[5c');
define('NONCE_KEY',        'fOJ{nO$,fK9 nU=*(;hHeOoN_A}ha.KyVi4FX>lc,kjf$I.zgu(=&4D!4Q.`DoS<');
define('AUTH_SALT',        'U>1ejery3^e2jQgkf6;:]2kI-zV}33>Q=y+R;:xr.CpB,W3J1BQ[DJL0F.xz#85i');
define('SECURE_AUTH_SALT', '=NAKRu!A-u@(0o#Ei,;_lOA:rD!{^wQHZSfPqat<3X$xwX4S&)G+.:io6pkR{/wo');
define('LOGGED_IN_SALT',   '%Jk..iLZ)dC=HYw]2pSR8D- uy.P]Hz51!)}fPa5$S($@45V#RGI`,i<SYPWCiVL');
define('NONCE_SALT',       'ztu_vOG.Q[6UkN_=)@IQ0]}%>6E,`8qg?MqN0Ts~=$AkKFX_jW^g>yQ 1~q?zt%=');

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
