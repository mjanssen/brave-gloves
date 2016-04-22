import riot from 'riot';
import {load} from "../../utils/Utils";

var template = require('./templates/Demo.html');

import 'elements/global/PageHeader';
import 'elements/global/SubHeading';
import './UserSession';
import './ActiveSession';

riot.tag('demo', template,

    function (opts)
    {
        riot.mount('PageHeader');
        riot.mount('SubHeading');
        riot.mount('ActiveSession');

        this.callback = (data) =>
        {
            this.user = data.user;
            this.gym = data.gym;
            this.averages = data.sessions.averages;
            this.sessions = data.sessions.items;
            this.activeSessions = data.sessions.active;

            this.update();
        };

        this.apiCall = () =>
        {
            load('/user/demo', this.callback)
        };

        this.interval = setInterval(this.apiCall, 1000);
    }
);
