<?php

error_reporting(E_ALL);

define('APP_PATH', realpath('..'));

try {

    /**
     * Include composer autoloader
     */
    require APP_PATH . "/vendor/autoload.php";

    $bootstrap = new \setup\Bootstrap\Bootstrap();

    print $bootstrap->run();

} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
