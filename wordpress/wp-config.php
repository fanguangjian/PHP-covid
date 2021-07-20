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
define( 'DB_NAME', 'wp_wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wp_wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wp_wordpress' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'i(4Qe@Rk_w`g,b UdC1Z70^z*ju&UpZWpZ4zQM:H-t/?h2KK2gD90_U~{bn4N,6{' );
define( 'SECURE_AUTH_KEY',  'D/jHq7A!E4/f JC4`x]kEL~SZnje:wQ^}Zsnh=P!,yo+n90 oUF8y!P:f{z{}^QZ' );
define( 'LOGGED_IN_KEY',    's;VDlW@2PQ8A!h&2=[,tvk|5,IwgL,y*FD1:~QUz@}LISi:;M8||QSO15aB9p>qo' );
define( 'NONCE_KEY',        '(Ejb5c;T)3viAh{5 (.c7O)rx;^aHSMg,aX_@C$z<:^gQ=dXZ7?VhtUWp:S0qNi]' );
define( 'AUTH_SALT',        'G^=Y7Qp@P^gsKrqLZePZB7aJd_L@h{R:H<iS5In?~%xb,np3zfga$cC)Uf`>+Lhr' );
define( 'SECURE_AUTH_SALT', 'n6cTw}#Yt;po!k~WX[p/H)z;6WxS9&3rRHK_-|^dnU=(Cr -Wp#c%`t4!u]U%BoW' );
define( 'LOGGED_IN_SALT',   'X.gs]=$&B,G-e`#92T7}GnN#8/cl-5.:p$fCcUk`3:VrT`eeBnF$4:d.k[,ZSRp-' );
define( 'NONCE_SALT',       '>fcvNG*5<M+%#-E?T,eukF2xaj1Z7~1$!!=3T!&B~b}O%}#`@fm%R(MIKC~K3yBB' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
