<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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
define('DB_NAME', 'phonerate_dk_db');

/** MySQL database username */
define('DB_USER', 'phonerate_dk');

/** MySQL database password */
define('DB_PASSWORD', 'pr4321');

/** MySQL hostname */
define('DB_HOST', 'mysql22.unoeuro.com:');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'j@!cFXt@33n5bTN7bmHAYYBaUWToIrONv9q(WaozqUpq((d92b^AQNiH7EDI7xK&');
define('SECURE_AUTH_KEY',  'GV)v$Rc)TAmzOqRNn#I!FLqsjb&Zh52ApC$@(aD6RlL1cQCvA9Wtrfuv#2aDQxMS');
define('LOGGED_IN_KEY',    '18B&6kO&^mOQ0KzvR1Q(s&Q^8CbTc0sYw!8Pw5iCBowfcjPw^j8!jo%OI0d4%pBV');
define('NONCE_KEY',        'grFPR6kkFe#Lr2(9%rCR$v36gw8horv5#(Y6#(6lhcWlP*Tmczk$eTTOuRHO60pT');
define('AUTH_SALT',        'YDbUeyPTGp@Bv9aASD9TJbICKOooSrYci18%8sV8ICwKs$q!h(lvHz(P06l9DunQ');
define('SECURE_AUTH_SALT', 'kqT&RTtd9Oaik*7NyTZ3cOdSMCu&LhoO5F)@xl3KQoi2@PmLXLV%CQg!btkeDDzc');
define('LOGGED_IN_SALT',   '9yBuo1HdUh7H^bbHgG9zHzJ8gY*3CtRhh7zybvatc61C5H6&0R90qQpf0gAmqDs^');
define('NONCE_SALT',       'enbCdiIWYpsEfdFRej65Ap9i6JO^YMsMXUdc1Oh)dppkQ$RoSRAY$l757t4XYI0s');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = '1wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'da_DK');

define ('FS_METHOD', 'direct');

define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

?>
