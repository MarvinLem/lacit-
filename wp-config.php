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
define('DB_NAME', 'lacite');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'dGMA[1k,TYJ,0J09*z }vqC}XeCI.vQTi[R:snqbRA%`iaRgo%S[Eh&CKEPND;+n');
define('SECURE_AUTH_KEY',  '.KO}6Y$.8|u7-z/rcITK^3_,=UOp/jb3@jVYNsQ]vV/2t,+$N/r8BM,X1 dnM.n{');
define('LOGGED_IN_KEY',    '>lI|,?*n+M/&}akNM>|xcpdPv?h(%Ao|+y1~=KGr&~>?GH,67I igD/*I}c$ Z#&');
define('NONCE_KEY',        'z7(+D=K$Ia<:|Be_=f.050)}ocY]@aJ6EE;:oJ95PL?PDmO:[Jbd8P_632eG,-<1');
define('AUTH_SALT',        'VN,%3.1?+^q,tDz5u1|g2[yB+qWtt(v~()!TK>(z&YBA[6+{,sW2]lt}!kSD*FSz');
define('SECURE_AUTH_SALT', 'x-*~#s{rUxV+4z}mT(nHp8m|CRWV&@3G W!##$[jfZo}KDCVfKdNY,^s0GhE?j_!');
define('LOGGED_IN_SALT',   'ij~wa`n8Y9^CN>MN%/|P_lQ 2H(?A8l @.1{DARG44f~RD_|)g^%:;&v1hDdp%XX');
define('NONCE_SALT',       'J3f(Pf|QiRal$/@p}*Jzu,xT6[^c8ZWU@pfjS+5Gm}$Y#KrJQ(b(yFe!{6_rV~Ah');

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
