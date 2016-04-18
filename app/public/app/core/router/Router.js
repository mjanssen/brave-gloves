// Import all routes from ./routes directory

import * as routes from './Routes'
import * as routeHandlers from './RouteHandlers'

import director from 'director';

export default function ()
{
    var router, routerRoutes = {};

    this.init = function () {

        Object.keys(routes).map(function (routeName) {
            routes[routeName].map(function (route) {
                routerRoutes[route.route] = new routeHandlers[routeName]()[route.action];
            });
        });

        router = new director.Router(routerRoutes).configure({
            html5history: true,
            on: onAllRoutes.bind(this),
            before: beforeAllRoutes.bind(this),
            after: afterAllRoutes.bind(this),
            once: onceAllRoutes.bind(this),
            notfound: notFound.bind(this),
            strict: false // allow trailing slash
        });

        router.init();
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
