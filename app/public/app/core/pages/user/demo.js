import riot from 'riot';
import {load} from "../../utils/Utils";

var template = require('./templates/Demo.html');

import 'elements/global/PageHeader';

riot.tag('demo', template,

    function (opts)
    {
        riot.mount('PageHeader');

        this.callback = (data) =>
        {
            this.user = data.user;
            this.gym = data.gym;
            this.time = data.time;

            this.update();
        };

        load('/user/demo', this.callback)
    }
);
