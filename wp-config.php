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
define('DB_NAME', 'willfaulconerphotography');

/** MySQL database username */
define('DB_USER', 'cobblehill');

/** MySQL database password */
define('DB_PASSWORD', 'cobblehill000');

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
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'I]~EH?|8h`Oxr|HCZS0c=MLO03bfpFn_GuI<qB9y0Q5!mt)itH~~U$-?B}uXEM>Y');
define('SECURE_AUTH_KEY',  'aD^:0i]NF8MkC59>%Rcrf9Vb&x` yK9@+?5GAZq~jCP_kYx]J=Ect l2C:Uh<5Oi');
define('LOGGED_IN_KEY',    '!,i5<^lrEVo(7M_-|;?<xoYNTYi~RE&;x%.wzdh2-nSY>2eRqN@v[Q@V(k/ML)^F');
define('NONCE_KEY',        '(_DT1i4TrLAt76yLxb!}$_)i]HNRk_GxV~jq0NY<#e(?r[U`+q{Yh|gXB2]qif3<');
define('AUTH_SALT',        ')JDhj3F9|63.yewb2J6vGXsK/cqyGKu@3m~@/.1p>6eEskEl.UtSo|G cRU(:7q(');
define('SECURE_AUTH_SALT', 'g>fjU1CS#lxMWBlOpA7J17b[I@CD#^Ki1[Z3o#kvN!`ig7$zoi;Eh_G|Www>O-U(');
define('LOGGED_IN_SALT',   'QKMBv6kI]e#2&wUtvG-6 }Pt++[0=OrWwnPe[}2,G7)mQIe|Wy718o-fwAsi;xe>');
define('NONCE_SALT',       'E7XfUI:3b7W71tle,CsD6~K,[:+=7,]>Q6-aRR0Yd*>-8D/qEXIl8!*h,.?3]/iH');

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

define('WP_SITEURL', 'http://www.willfaulconerphotography.com');

define('WP_HOME', 'http://www.willfaulconerphotography.com');

