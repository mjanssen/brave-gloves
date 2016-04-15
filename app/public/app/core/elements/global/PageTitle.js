import Riot from 'riot';
import {load} from '../../utils/Utils';

var template = require('./templates/PageTitle.html');

Riot.tag('PageTitle', template,

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
