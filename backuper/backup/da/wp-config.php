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
define('DB_PASSWORD', 'bestlife2911');

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
define('AUTH_KEY',         '&7VCuG8JbH(IRgFo6$ieT)89Xa0eIt4SM5LBpV4^i9!)^&I!bliGdjC@T7MlJeQA');
define('SECURE_AUTH_KEY',  'cBm%SPIkxYr#pnAOxQ#@@VqXq%r7*Egj@A00^JtanTuo0P*aUX7Av6BU6cdmQ@fX');
define('LOGGED_IN_KEY',    'M1Zgc)u6vNvj*CeU7Z8EXgf0(PsDp)4*pza^fSVTOe26YD6tHCIu0DRZn5yfKZP%');
define('NONCE_KEY',        '%Y#hCFY6stjuhk6fiWEd1rV@YwyyPlPfE4!GFGska*XU!*&%AJ&TLUdJsvq6L)%T');
define('AUTH_SALT',        'F5%zmxAi*F#Tc38stg^CQTnkVJR!MMfR@pRbruVs9^IdsQ$Ay1qqpMU1hVSEaIWZ');
define('SECURE_AUTH_SALT', 'uA7h@XNIWJZUsjaTZBAJ4!tFvP(KJIsfvMOsK2!gcUL7xX2FWxl0nh60ZH6GXb6v');
define('LOGGED_IN_SALT',   'sONW)P)&3T$4G37goYp5kl&R7ljBTDn%Wp(PBql%GBDRnmns3i&Ah6tLE$EsisKr');
define('NONCE_SALT',       'hvi(A#5OG#QmLGYgRB5(*qc589@0sywv&W&1C(U#AYAP4aBF4$zmQ)J(6rC&db8R');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = '2wp_';

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
