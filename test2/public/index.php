<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    $file2 = __DIR__ . $_SERVER['PATH_INFO'];
    if(is_file($file2)) {
	    $type = mime_content_type($file2);
	    if(substr($type, 0, 10) == "text/plain") {
		    if(substr($file2, -3) == "css") $type = "text/css";
		    if(substr($file2, -2) == "js") $type = "application/javascript";
	    }
	    if(substr($file2, -3) == "svg") $type = "image/svg+xml";
	    header("Content-type: " . $type);
	    echo file_get_contents($file2);
	    return true;
    }
    if (is_file($file)) {
	    return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';

// Run app
$app->run();
