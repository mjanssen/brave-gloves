<?php namespace setup\Routes;

use Phalcon\Mvc\Router;

/**
 * Class ApiRoutes
 * @package setup\Routes;
 */
class ApiRoutes extends Router
{
    public function __construct()
    {
        // Set default api namespace
        $this->setDefaultNamespace("Api");

        // Remove trailing slashes automatically
        $this->removeExtraSlashes(true);

        // Add routes below
        $this->addGet('/', 'Index::index');
    }
}
