<?php namespace setup\Router;

use setup\Routes\ApiRoutes;

/**
 * Class Router
 * @package setup\Router;
 */
class Router
{
    /**
     * @param $di \Phalcon\DI\FactoryDefault
     */
    public static function initialize($di)
    {
        $di->set('router', new ApiRoutes());
    }
}
