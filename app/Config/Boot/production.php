<?php

/*
 |--------------------------------------------------------------------------
 | ERROR DISPLAY
 |--------------------------------------------------------------------------
 | Don't show ANY in production environments. Instead, let the system catch
 | it and display a generic error message.
 |
 | If you set 'display_errors' to '1', CI4's detailed error report will show.
 */
error_reporting(E_ALL & ~E_DEPRECATED);
// If you want to suppress more types of errors.
// error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
//ini_set('display_errors', '0');


// Turn off error display
error_reporting(E_ALL);        // Report all errors
ini_set('display_errors', '0'); // Do NOT show errors to users
ini_set('display_startup_errors', '0'); // Do NOT show startup errors

// Optional: log errors to a file
//ini_set('log_errors', '1');
//ini_set('error_log', '/path/to/your/logs/php-error.log'); // Make sure path is writable

/*
error_reporting(-1);
ini_set('display_errors', '1');

ini_set('display_startup_errors', '1');*/

/*
 |--------------------------------------------------------------------------
 | DEBUG MODE
 |--------------------------------------------------------------------------
 | Debug mode is an experimental flag that can allow changes throughout
 | the system. It's not widely used currently, and may not survive
 | release of the framework.
 */
defined('CI_DEBUG') || define('CI_DEBUG', false);
