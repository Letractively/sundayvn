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
define('DB_NAME', 'dieuhoa');

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
define('AUTH_KEY',         '=:NhUW}Lv~->`E?CDg|l7MIsw^7jRoHILH[Jv@2/2NQo:[G7)=%boadt@G5HS=q(');
define('SECURE_AUTH_KEY',  '@&zmgT*_3+NyzQA0.T-G*dPw/u}4_3(M@Dg?iLO#m.}4kMkUM_#J^)!ifS>Z,iv ');
define('LOGGED_IN_KEY',    'Ze!)rSO6ssxCMh^9xU-CJ_k3WYuS}%jcZv4sNsja38Z?-0g:<24i|T<wqoR;Tui,');
define('NONCE_KEY',        '}zfl4AC_JY6B%m-~#`8b#|#s%7KI_K%XrBr=}HHG` (&f|+6N]T _m;CJE)C4B*j');
define('AUTH_SALT',        '4#|=hEa?~Pi#`e+$+0[3L4m<WNmK<1^0MR)(0t+}._@a2@Z?2 ZcT5oM[4MP+n<0');
define('SECURE_AUTH_SALT', 'Ue)y/vxd5)|a~R:NwDfD=E_wo!OKX3[C8QpA<QF`L@Yr[.M2 +e0{PmdQS0_5S=[');
define('LOGGED_IN_SALT',   '0mE9qY#qt`7jviKxxhC&S3qDk{*hi)r3JX)-(QQHlrnQBrMn[{zzV1J55SZ2+Mxz');
define('NONCE_SALT',       '%bLV|{ARGyc@.AW<x-gX}9*tt}!ipi}*3%tO0-|a%Y#m*m]2-S;b_p}>$4S|Eo%C');

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
