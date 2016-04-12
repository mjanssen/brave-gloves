<?php namespace setup\Bootstrap;

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Application;
use Phalcon\Mvc\View;
use setup\Router\Router;

/**
 * Class Bootstrap
 * @package app\setup\Bootstrap;
 */
class Bootstrap
{
    /**
     * @var \Phalcon\DI\FactoryDefault
     */
    private $di;

    /**
     * Bootstrap constructor.
     */
    public function __construct()
    {
        $this->di = new FactoryDefault();

        // Setup basic Dependency injector vars
        $this->di->set('view', new View());

        // Initialize the API router
        Router::initialize($this->di);
    }

    public function run()
    {
        $application = new Application($this->di);
        return $application->handle()->getContent();
    }
}
