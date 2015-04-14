<?php
define('DB_NAME', 'db_name');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');
define('WP_SITEURL', 'http://wordpress-start.dev/wordpress');
define('WP_HOME', 'http://wordpress-start.dev/');
define('WP_CONTENT_URL', 'http://wordpress-start.dev/content');
define('WP_CONTENT_DIR', '/var/www/wordpress-start/content');
define('UPLOADS','../uploads' );
define('PB_DEBUG', false);
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);
@ini_set('display_errors', 1);
error_reporting(E_ALL);
