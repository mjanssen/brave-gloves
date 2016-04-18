import riot from 'riot';
import {load} from '../../utils/Utils';

var template = require('./templates/PageTitle.html');

riot.tag('PageTitle', template,

    function (opts)
    {
        this.callback = (data) =>
        {
            this.title = data.application.name;
            this.update();
        };

        load('/', this.callback)
    }
);
