// Import all routes from ./routes directory

import * as routes from './Routes'
import * as routeHandlers from './RouteHandlers'

import director from 'director';
import ModuleHandler from '../modules/ModuleHandler';

export default function ()
{
    var moduleHandler, routerRoutes = {};

    this.init = function () {

        moduleHandler = new ModuleHandler();

        Object.keys(routes).map(function (routeName) {
            routes[routeName].map(function (route) {
                routerRoutes[route.route] = new routeHandlers[routeName](moduleHandler)[route.action];
            });
        });

        app.router = new director.Router(routerRoutes).configure({
            html5history: true,
            on: onAllRoutes.bind(this),
            before: beforeAllRoutes.bind(this),
            after: afterAllRoutes.bind(this),
            once: onceAllRoutes.bind(this),
            notfound: notFound.bind(this),
            strict: false // allow trailing slash
        });

        app.router.init();
    };

    var onAllRoutes = function ()
    {
    };

    var beforeAllRoutes = function ()
    {
    };

    var afterAllRoutes = function ()
    {
    };

    var onceAllRoutes = function ()
    {
    };

    var notFound = function ()
    {

    };
}
