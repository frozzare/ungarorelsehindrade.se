<?php

/**
 * Development configuration.
 */

define('DB_NAME', 'ungarh');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');

define('WP_HOME', 'http://ungarh.dev');
define('WP_SITEURL', 'http://ungarh.dev/wp');

define('SAVEQUERIES', true);
define('WP_DEBUG', true);
define('SCRIPT_DEBUG', true);
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 'On');


/* Get this keys at https://api.wordpress.org/secret-key/1.1/salt/ */
define('AUTH_KEY',         'ITV#1DYW%1~}N}t-zB]p-w,4Sfv!kK*2B24thHB=:m|lgoJ@NZ?o<sO2+Juvy /a');
define('SECURE_AUTH_KEY',  'TpJ<({eAx-b~`Oj5)?AQdR&9+6Vw*|L9yx&N`y$z+XMM~vA,h]j,+:<(;R]>L)>!');
define('LOGGED_IN_KEY',    '<sr7nNE[6h{p&f05V73RjPQ=mQ4H[~lN+1)XHOyBW2T7~`sYL:EAHGnJQWtF30qu');
define('NONCE_KEY',        'PRNaEl?1wURQz2~8mLl(v $b9_R+o?RrZLg)mY%*_We06y7.08Z@RF<NCv(sfo#*');
define('AUTH_SALT',        'uZg_KX^es0lH(f&1B[vJ>#:P<wu>]1IWK?U!<!09)8@I1C9/sq($htF7[zACRW%r');
define('SECURE_AUTH_SALT', '.E_bz#]y]7FS|&k38pm!}hFAe/=twgm<nT,luj5AS$_rW[-$wJGKKuWy53||Oo}u');
define('LOGGED_IN_SALT',   'g]9K]h&%E^nIip]:j-R)^Sc{qbqRrPA%{k=+lgk!=/~ {xC_QW-fW~0Pr*gqpt?.');
define('NONCE_SALT',       '&sy0j=(`F6TLgMR9Uj -.$<tA2A^qNvWo6.-LdaDahX<w<%O!/|[Z<[V+pO=)3.x');
