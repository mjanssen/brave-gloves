<?php namespace setup\Phalcon;

/**
 * Class Phalcon
 * @package setup\Phalcon;
 */
class Phalcon
{
    public function __construct()
    {
        /**
         * Read the configuration
         */
        $config = include APP_PATH . "/app/config/config.php";

        /**
         * Read auto-loader
         */
        include APP_PATH . "/app/config/loader.php";

        /**
         * Read services
         */
        include APP_PATH . "/app/config/services.php";

        /**
         * Handle the request
         */
        $application = new \Phalcon\Mvc\Application($di);

        echo $application->handle()->getContent();
    }
}
