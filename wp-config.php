<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'NAMEHERE');

/** MySQL database username */
define('DB_USER', 'USERHERE');

/** MySQL database password */
define('DB_PASSWORD', 'PWHERE');

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
define('AUTH_KEY', ';J&&Wv?Oom{@q!P<gXRIobX%|td+|dM[_(qAwYs)iA-obbLL{BxLE@k$aHP]Axt=P@bsdft!-m|RiU[iR!X!lDjK*@D+Ei)DpVq=C%?vcklFIaR_OIi%D>l;wOp=)(rI');
define('SECURE_AUTH_KEY', 'HyhXQIXIv+d%_N{)TGg}(+by|sp*QpWXt_m]?QmPqvgTI>&XcbP$&hQJ$?_Jb>GH/w}%I+^tGE/b]_u^[XezlZM@p-!pA)P%euz/k*vYHGnW{s)lyeZZN}k^$nkXOQ{<');
define('LOGGED_IN_KEY', ')vIO!N>AnX(rt-_}+d=MgZ=@O-hiHJbIvI;KxyHtTxFb}mn|CJ!exq*ZE-slEq-R[${;fA(ZAommRy&ZQ!N[HJQN?iNpfa|Hd_$Use)x@p[}))Q[zV-}k;JA/^RrRrc(');
define('NONCE_KEY', '[OLR?Q/oi}tJCu+QHsa{-<oSa!N*/|H$;{vkTaNyk{@fp@wWlzIHB%OrW+B!|wn)m&v};s!n!TeuD&/[UDN*$)yHTFi@=QCOQ![+tQ/&nNER+b$HEk|XKPcDDb*|U=w=');
define('AUTH_SALT', 'Oa{<ygGhcL}c$$E$$(}(RaGNsEjK>CRE(ZxO<Ia-]Ql>Ai-qTMn]Lnt>cz)<@Rcm{_c/AnMYVD^HsFiTi*Jrkue]HD<RnRoHU[nS!DJ(sYsOM*qFlP|H>!z*_OOB<nxO');
define('SECURE_AUTH_SALT', 'nr)If$Jq+utAohED^@%Tce?Z);IapkT<vlAwt&YjA|>cD;vtLXu*]Of?{K(DlyyLkeIFZBszsygNv(g-Y(^M^KHZ!KZC=(Ej[nYfO@;VMhZRDJp=RaLV-g{)@Ej$D/|%');
define('LOGGED_IN_SALT', 'CixO/Hc^<Fjm{yeVXFHYr->{tj&?COA=<$BHtb{l!RI!hH_DNs(qO_yLzzo!g+Xk]KA<&$_gY|sctVb*Q;)Fq$i}jOYOwjb&=fwbmaC<bJW-K@|=cXxijLRCKtokWkLl');
define('NONCE_SALT', '=jbojLcl$lD;pLppGaEy=Z?FN>)bV*bo?XbTHfOjyaF>E[BA?|APA*p;{FkIQZxq>YA&(tK*FW|^qtK}nnrj+KLRC+&[hs)>!=@o<Z_)zAUB_vgbx?=QPgBJRGnEf]*)');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_ihoy_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
define('WP_MEMORY_LIMIT', '96M');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}
