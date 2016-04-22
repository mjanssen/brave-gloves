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

        $this->setupDatabase();

        // Initialize the API router
        Router::initialize($this->di);
    }

    private function setupDatabase()
    {
        $config = [
            'host' => 'localhost',
            'database' => 'scotchbox',
            'options' => [
                'username' => 'root',
                'password' => 'root'
            ]
        ];

        $this->di->set('db', function () use ($config) {
            try {
                $db = new \Phalcon\Db\Adapter\Pdo\Mysql(
                    array(
                        "host" => $config['host'],
                        "username" => $config['options']['username'],
                        "password" => $config['options']['password'],
                        "dbname" => $config['database']
                    )
                );
            } catch (Exception $e) {
                die("<b>Error when initializing database connection:</b> " . $e->getMessage());
            }
            return $db;
        });
    }

    public function run()
    {
        $application = new Application($this->di);
        return $application->handle()->getContent();
    }
}
