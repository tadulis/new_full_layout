<?php

// Getting start time of the app for performance widget
define("START", microtime(true));

// Show all PHP errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// check PHP version
if (phpversion() < 7) {
    die("<pre>Your server is using PHP version " . phpversion() . ".<br/>Please upgrade to PHP v7.0.25 or higher.");
}

// check .htaccess file
if (!file_exists('.htaccess')) {
	die("<pre>No <b>.htaccess</b> file found. But it was in the .zip package.");
}

// Autoload all Frame Core classes
spl_autoload_register(function ($class_name) {
	include str_replace("\\", DIRECTORY_SEPARATOR, $class_name) . ".php";
});

// Including configuration variables
require_once "config.php";

// Let's create an instance of the application
$app = new Frame\App();
