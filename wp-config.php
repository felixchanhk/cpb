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
define('DB_NAME', 'cpb_uat');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'qpp-201708');

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
define('AUTH_KEY',         'xBYjt[{h|%Pux+[(FXr{|mCDNere8_IoJd_SduWJy~_aq7in6=Eyk0&0tNxYEK1A');
define('SECURE_AUTH_KEY',  't7g3ERrO}VFan)R?92YZ<#d]Bo)3ym_8]*_nG:7|ZHW70Lj(Djk)s2;;o?cUA;c1');
define('LOGGED_IN_KEY',    '=tMqH17RgF1u-(6 _-JkKNgUgwPw5Iq*(bi`JT.H5IoQ]Alp|^,Ae6W}c{MI.3<r');
define('NONCE_KEY',        'fL*Aei&vb&p=Qk)=s<f!J^Dwl(bm*S(H54?8b=8tE!Wu$W}I)5W9LjUa7@T^JP$5');
define('AUTH_SALT',        'K3vv(7})p]0#2:3y]DfKbLCjk2#3Crqt}.Hq16i8VT#A C(*#kZr5Us9R;9aH6=d');
define('SECURE_AUTH_SALT', 'kS;+qn@a J%m _}*XEch0Y:@1qOfH96(C9yjoG G`N/[oAHdWwV!23I:h|xdx8cu');
define('LOGGED_IN_SALT',   '=HGxsppCm:]:u],PZ4]{Ue!/s$<_N[#s{HXC+`|vLnPDLy)fhRUVu&H+K9a(5DWc');
define('NONCE_SALT',       'yz)rr,kf_~!ypRO.LC,l1b=eqEJGa^C,iY!ohnj0zApnI$6KUENiK%0)+1V^Nexi');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'cpb_';

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
define( 'WP_MEMORY_LIMIT', '1024M' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
