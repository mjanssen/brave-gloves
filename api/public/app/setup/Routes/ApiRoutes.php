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

        // User routes
        $this->addGet('/user/{username}', 'User::getUser');
        
        // Session routes
        $this->addPost('/sessions/{username}', 'Session::updateGymSession');
        $this->addPost('/sessions/new/{username}', 'Session::newSessionForUser');

        // Session times
        $this->addPost('/sessions/times/{username}/start', 'Session::startGymEffectiveSession');
        $this->addPost('/sessions/times/{username}/stop', 'Session::stopGymEffectiveSession');
    }
}
